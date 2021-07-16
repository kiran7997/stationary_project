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
use \PDF;

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
        $input['department'] = DB::table("roles")->where('id', $rol_id)->first()->name;
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
        $input['department'] = DB::table("roles")->where('id', $rol_id)->first()->name;
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
        foreach (Auth::user()->getRoleNames() as $v) { //getting role name
            $user_role = $v;
        }

        if ($user_role == 'Account') { //Account dashboard

            $order_count = \App\Orders::where(['order_status' => 'order'])->count();
            $process_order_count = \App\Orders::where(['order_status' => 'process'])->count();
            return view('account_dash', compact('order_count','process_order_count'));
        } elseif ($user_role == 'Sales') { //Sales dashboard
            $user_id = Auth::user()->id;
            $order_count = \App\Orders::where(['order_status' => 'payment_completed', 'sales_person'=>$user_id])->count();
            return view('sales_dash', compact('order_count'));
        } elseif ($user_role == 'Logistic') { //Logistic dashboard
            $user_id = Auth::user()->id;
            $order_count = DB::table('notifications')
                         ->select('notifications.*','orders.order_id')
                         ->leftjoin('orders','orders.order_id','notifications.order_id')
                         ->where(['user_id'=>$user_id,'orders.order_status'=>'process','is_read'=>0])->count();
            return view('logistic_dash', compact('order_count'));
        } elseif ($user_role == 'Manufacturing') { //Manufacturing dashboard
            // dd();
            $order_count = \App\Orders::where(['order_status' => 'payment_completed','manufacturing_notification'=>1])->count();
            return view('manufactur_dash', compact('order_count'));
        } else {
            $order_count = \App\Orders::where(['order_status' => 'order'])->count();
            return view('employee_dash', compact('order_count'));
        }
    }

    public function orderList()
    {
        // $order_list = \App\Orders::where(['order_status' => 'order'])->get();
        $order_list = DB::table('orders')
                    ->select('orders.*','users.firstname', 'users.lastname')
                    ->leftjoin('users','users.id','=','orders.sales_person')
                    ->where(['order_status'=>'order'])
                    ->get();
        // \App\Notification::where(['user_id'=>$requestData['order_id']])->update(['sales_person' => $requestData['sales_person'],'order_status'=>'payment_completed']);
        return view('employee-dashboard-list.order-list', compact('order_list'));
    }

    public function assignSalesTeam($id)
    {
        $order_list = \App\Orders::where(['order_id' => $id])->first();
        $order_item_data = DB::table('order_items')
            ->select('order_items.*', 'aproducts.image_url')
            ->leftjoin('aproducts', 'aproducts.product_id', 'order_items.product_id')
            ->where(['order_id' => $id])->get();
        $users = \App\User::where(['department' => "Sales"])->get();
        $states = DB::table('state')->select('state_id', 'state_title')->get();
        return view('employee-dashboard-list.assign_to_sales_team', compact('order_list', 'users', 'states', 'order_item_data', 'id'));
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
    public function getSalesUser(Request $request)
    {
        return DB::table('users')->select('id', 'firstname', 'lastname')->where('district', $request->district_id)->where(['department' => "Sales"])->get();
    }

    public function saveAssignSalesData(Request $request)
    {
        $requestData = $request->all();
        $id = Auth::user()->id;
        $data_customer = DB::table('orders')->where(['order_id'=>$requestData['order_id']])->update(['sales_person' => $requestData['sales_person'],'order_status'=>'payment_completed']);
        \App\Notification::where(['user_id'=>$id])->update(['is_read' => 1]);
        $notification['order_id'] = $requestData['order_id'];
        $notification['user_id'] = $requestData['sales_person'];
        $notification['role_id'] = 2;
        $notification['notification_type'] = 'Sales';
        $notification['notification_date'] = date('Y-m-d');
        \App\Notification::create($notification);
        // dd($requestData);
        return redirect('employee-order-list');
    }

    public function getSalesAssignData(){
        // $order_list = \App\Orders::where(['order_status'=>'order'])->get();
        $user_id = Auth::user()->id;
        $order_list = DB::table('notifications')
                    ->select('notifications.order_id','orders.*')
                    ->leftjoin('orders','orders.order_id','notifications.order_id')
                    ->where(['notifications.user_id'=>$user_id,'order_status' => 'payment_completed'])
                    ->get();
        return view('employee-dashboard-list.sales-order-list',compact('order_list'));   
    }

    public function GeneratePOData($id,$id1){
        // $order_list = \App\Orders::where(['order_id'=>$id])->first();
        $order_list = DB::table('orders')
                            ->select('orders.*','orders.phone_no','users.name')
                            ->leftjoin('users','users.id','orders.sales_person')
                            ->where(['order_id'=>$id])->first();
        $order_item_data = DB::table('order_items')
                            ->select('order_items.*','aproducts.image_url')
                            ->leftjoin('aproducts','aproducts.product_id','order_items.product_id')
                            ->where(['order_id'=>$id])->get();
        if($order_list->order_status == "payment_completed"){
            $data_customer = DB::table('orders')->where(['order_id'=>$id])->update(['order_status' => 'process']);
            $users = \App\User::select('id')->where(['department'=>'Account'])->get();
            $user_id = Auth::user()->id;
            \App\Notification::where(['user_id'=>$user_id])->update(['is_read' => 1]);
            //notification to account and sales 
            foreach($users as $row){            
                $notification['order_id'] = $id;
                $notification['user_id'] = $row['id'];
                $notification['role_id'] = 3;
                $notification['notification_type'] = 'Account_PO';
                $notification['notification_date'] = date('Y-m-d');
                \App\Notification::create($notification);
            }
        } 

        if($id1 == "view"){            
            return view('employee-dashboard-list.po_data',compact('order_list','order_item_data','id'));
        }else{
            $pdf = PDF::loadView("employee-dashboard-list.download_po",compact('order_list','order_item_data'));  
            return $pdf->stream('PO.pdf',array("Attachment" => false)); 
        }
    }

    public function sendNotification($id){
        $users = \App\User::select('id')->where(['department' => 'Manufacturing'])->get();
        foreach($users as $row){
            $notification['order_id'] = $id;
            $notification['user_id'] = $row['id'];
            $notification['role_id'] = 3;
            $notification['notification_type'] = 'Manufacturing';
            $notification['notification_date'] = date('Y-m-d');
            \App\Notification::create($notification);
        }

        $data_customer = DB::table('orders')->where(['order_id'=>$id])->update(['manufacturing_notification' => 1]);
        return redirect('process-order-list');
        
    }

    public function getManufacturingOrder(){
        
        $user_id = Auth::user()->id;
        $order_list = DB::table('notifications')
                    ->select('notifications.order_id','orders.*')
                    ->leftjoin('orders','orders.order_id','notifications.order_id')
                    ->where(['notifications.user_id'=>$user_id,'is_read'=>0,'order_status' => 'payment_completed','manufacturing_notification'=>1])
                    ->get();
        return view('employee-dashboard-list.manufacturing-order-list',compact('order_list'));
    }

    public function changeOrderStatus($id){
        $order_list = \App\Orders::where(['order_id' => $id])->first();
        $order_item_data = DB::table('order_items')
            ->select('order_items.*', 'aproducts.image_url')
            ->leftjoin('aproducts', 'aproducts.product_id', 'order_items.product_id')
            ->where(['order_id' => $id])->get();
        return view('employee-dashboard-list.change-order-status', compact('order_list', 'order_item_data', 'id'));
    }

    public function updateOrderStatus(Request $request){
        $requestData = $request->all();
        $order_data = \App\Orders::select('sales_person')->where(['order_id'=>$requestData['order_id']])->first();
        $data_customer = DB::table('orders')->where(['order_id'=>$requestData['order_id']])->update(['order_status' => $requestData['order_status']]);
        $notification['order_id'] = $requestData['order_id'];
        $notification['user_id'] = $order_data->sales_person;
        $notification['role_id'] = 2;
        $notification['notification_type'] = 'Manufacturing-Revert';
        $notification['notification_date'] = date('Y-m-d');
        \App\Notification::create($notification);
        return redirect('manufacturing-order-list');
    }

    public function orderProcessList(){
        $order_list = DB::table('orders')
                    ->select('orders.*','users.name')
                    ->leftjoin('users','users.id','=','orders.sales_person')
                    ->where(['order_status'=>'process'])
                    ->get();
        return view('employee-dashboard-list.process-order-list', compact('order_list'));
    }

    public function GenerateInvoiceData($id,$id1){
        $order_list = DB::table('orders')
                            ->select('orders.*','orders.phone_no','users.name')
                            ->leftjoin('users','users.id','orders.sales_person')
                            ->where(['order_id'=>$id])->first();
        $order_item_data = DB::table('order_items')
                            ->select('order_items.*','aproducts.image_url')
                            ->leftjoin('aproducts','aproducts.product_id','order_items.product_id')
                            ->where(['order_id'=>$id])->get();

        if($order_list->invoice_status == 0){
            $users = \App\User::select('id')->where(['department'=>'Logistic'])->get();
            $user_id = Auth::user()->id;
            \App\Notification::where(['user_id'=>$user_id])->update(['is_read' => 1]);
            \App\Orders::where(['order_id'=>$id])->update(['invoice_status' => 1]);
            //notification to account and sales 
            foreach($users as $row){            
                $notification['order_id'] = $id;
                $notification['user_id'] = $row['id'];
                $notification['role_id'] = 3;
                $notification['notification_type'] = 'Logistic';
                $notification['notification_date'] = date('Y-m-d');
                \App\Notification::create($notification);
            }
        } 

        if($id1 == "view"){            
            return view('employee-dashboard-list.invoice_data',compact('order_list','order_item_data','id'));
        }else{
            $pdf = PDF::loadView("employee-dashboard-list.download_invoice_data",compact('order_list','order_item_data'));  
            return $pdf->stream('PO.pdf',array("Attachment" => false)); 
        }
    }

    public function notificationRead($id){
        if($id == 'All'){
            $user_id = Auth::user()->id;
            \App\Notification::where(['user_id'=>$user_id])->update(['is_read' => 1]);
        }else{
            \App\Notification::where(['id'=>$id])->update(['is_read' => 1]);
        }
        
        echo "success"; 
    }
    
}
