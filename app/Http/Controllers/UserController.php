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
        $roles = Role::pluck('name', 'name')->all();
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
            // 'department' => 'required',
            'state' => 'required',
            'district' => 'required',
            'email' => 'required|email|unique:users,email',
            // 'username' => 'required|unique:users,username',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
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
        $roles = Role::pluck('name', 'name')->all();
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
            // 'department' => 'required',
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
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 777, true);
                exec('chmod -R 777 ' . $destinationPath);
            } else {
                exec('chmod -R 777 ' . $destinationPath);
            }
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
}
