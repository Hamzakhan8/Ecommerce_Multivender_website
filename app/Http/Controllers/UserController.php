<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateRequest;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role','!=',1)->get();
        return view('admin-dashboard.user-management.all-users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.user-management.create-user-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::create([
            'name'  => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'country'  => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'contact' => $request->contact,
            'cnic' => $request->cnic,
            'role' => $request->role,
            'company'  => $request->company,
            'address' => $request->address,
        ]);

        return redirect()->route('user.index')->with('success','user has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin-dashboard.user-management.edit-user',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->status==1) {$user->password ='[blocked..]';}
        
        if(!empty($request->password)){
        $user->password = Hash::make($request->password);
        }else{
        $user->password = $user->password;
        }
        
        $user->contact = $request->contact;
        $user->country = $request->country;
        $user->company = $request->company;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->cnic = $request->cnic;
        $user->status = $request->status;
        $user->role = $request->role;

        $user->save();
        return redirect()->route('user.index')->with('success','user has been Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('success','user has been deleted');

    }

    public function allAdmins()
    {
        $users = User::where('role','2')->get();
        return view('admin-dashboard.user-management.all-admins',compact('users'));
    }
}
