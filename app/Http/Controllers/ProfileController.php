<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('admin-dashboard.profile-setting.show-profile',compact('user'));
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
           return view ('admin-dashboard.profile-setting.edit-profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$user)
    {
        $user = User::find($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->company = $request->company;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->cnic = $request->cnic;
        // $user->img_path=$request->img_path;
        $user->update();

        if(!empty($request->password))
        {
        $user->password = Hash::make($request->password);
        }else
        {
        $user->password = $user->password;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('uploads/profile/',$filename);
            $user->image_path=$filename;
            $user->update();



        }

        return redirect()->route('profile.show',$user->id)->with('success','Profile Setting Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
