<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Department;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Auth;
use DB;
use Hash;

class UserController extends Controller
{
    //initial commit
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::where('deleted', 0)->where('role', '!=', '1')->orderBy('id', 'DESC')->get();
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('name', '!=', 'Admin')->pluck('name', 'name')->all();
        $states = DB::table('state')->select('state_id', 'state_title')->get();
        $departments = Department::where('is_active', 0)->get();
        return view('users.create', compact('roles', 'states', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'username' => 'required',
            'state' => 'required',
            'district' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'username' => 'required|unique:users,username',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $input = $request->all();

        if ($request->hasfile('profile_image')) {

            $file = $request->file('profile_image');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('user_images/');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
            $file->move($destinationPath, $filename);
            $input['profile_image'] = $filename;
        }
        $input['password'] = Hash::make($input['password']);
        $input['created_by'] = Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;
        $input['name'] = '';
        $role = $request->input('roles')[0];
        $rol_id = DB::table("roles")->where('name', $role)->first()->id;
        $input['role'] = $rol_id;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::where('name', '!=', 'Admin')->pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $states = DB::table('state')->select('state_id', 'state_title')->get();
        $districts = DB::table('district')->select('districtid', 'district_title')->where('state_id', $user->state)->get();
        $departments = Department::where('is_active', 0)->get();
        return view('users.edit', compact('user', 'roles', 'userRole', 'states', 'districts', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'username' => 'required',
            'state' => 'required',
            'district' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            // 'username' => 'required|unique:users,username,' . $id,
            // 'password' => 'same:confirm-password',
            'roles' => 'required',
            // 'profile_image' => 'required'
        ]);

        $input = $request->all();
        // dd($input);
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('user_images/');
            // if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 777, true);
            //     exec('chmod -R 777 ' . $destinationPath);
            // } else {
            //     exec('chmod -R 777 ' . $destinationPath);
            // }
            $file->move($destinationPath, $filename);
            $input['profile_image'] = $filename;
        } else {
            $input['profile_image'] = $request->old_profile_image;
        }



        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $input['updated_by'] = Auth::user()->id;
        $role = $request->input('roles')[0];
        $rol_id = DB::table("roles")->where('name', $role)->first()->id;
        $input['role'] = $rol_id;
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->update(['deleted' => 1]);
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function get_district(Request $request)
    {
        return DB::table('district')->select('districtid as id', 'district_title as title')->where('state_id', $request->state_id)->get();
    }

    public function check_username(Request $request)
    {
        $response = 0;
        //checking for username is present 
        if (isset($request->id)) {
            //check for update page condition
            $cnt = User::where('username', $request->username)->where('id', '!=', $request->id)->count();
        } else {
            //check for create page condition
            $cnt = User::where('username', $request->username)->count();
        }
        if ($cnt > 0) {
            $response = 1;
        }
        return $response;
    }

    public function dashboard()
    {
        //employee dashboard
        $order_count = \App\Orders::where(['order_status'=>'order'])->count();
        return view('employee_dash',compact('order_count'));
    }

    public function orderList(){
        $order_list = \App\Orders::where(['order_status'=>'order'])->get();
        // $order_list = DB::table('orders')
        //             ->select('orders.*','customers.customer_firstname','customers.customer_lastname')
        //             ->leftjoin('customers','customers.customer_id','=','orders.customer_id')
        //             // ->leftjoin('')
        //             ->where(['order_status'=>'order'])
        //             ->get();
        return view('employee-dashboard-list.order-list',compact('order_list'));
    }

    public function assignSalesTeam($id){
        $order_list = \App\Orders::where(['order_id'=>$id])->first();
        $order_item_data = DB::table('order_items')
                        ->select('order_items.*','aproducts.image_url')
                        ->leftjoin('aproducts','aproducts.product_id','order_items.product_id')
                        ->where(['order_id'=>$id])->get();
        $users = \App\User::where(['role'=>4])->get();
        $states = DB::table('state')->select('state_id', 'state_title')->get();
        return view('employee-dashboard-list.assign_to_sales_team',compact('order_list','users','states','order_item_data','id'));
    }

    public function profile()
    {
        return view('users.profile');
    }

    public function save_profile(Request $request, $id)
    {

        $input = $request->all();
        if ($request->hasfile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = rand(0, 999) . $file->getClientOriginalName();
            $destinationPath = public_path('user_images/');
            // if (!file_exists($destinationPath)) {
            //     mkdir($destinationPath, 777, true);
            //     exec('chmod -R 777 ' . $destinationPath);
            // } else {
            //     exec('chmod -R 777 ' . $destinationPath);
            // }
            $file->move($destinationPath, $filename);
            $input['profile_image'] = $filename;
        } else {
            $input['profile_image'] = $request->old_profile_image;
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        return redirect('profile')->with('success', 'User updated successfully');
    }

    public function check_user_email(Request $request)
    {
        $response = 0;
        //checking for email is present 
        if (isset($request->id)) {
            //check for update page condition
            $cnt = User::where('email', $request->email)->where('id', '!=', $request->id)->count();
        } else {
            //check for create page condition
            $cnt = User::where('email', $request->email)->count();
        }
        if ($cnt > 0) {
            $response = 1;
        }
        return $response;
    }

    //Get sales users
    public function getSalesUser(Request $request){
        return DB::table('users')->select('id', 'name')->where('district', $request->district_id)->where(['role'=>2])->get();
    }

    public function saveAssignSalesData(Request $request){
        $requestData = $request->all();
        $data_customer = DB::table('orders')->where(['order_id'=>$requestData['order_id']])->update(['sales_person' => $requestData['sales_person']]);
        // dd($requestData);
        return redirect('employee-order-list');
    }
}
