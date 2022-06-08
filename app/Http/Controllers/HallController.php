<?php

namespace App\Http\Controllers;

use App\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hall = Hall::all();
        return view('admin-dashboard.hall-management.all-halls',compact('hall'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.hall-management.create-hall');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hall::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
        ]);
         return redirect()->route('hall.index')->with('success', 'Hall Has Been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(Hall $hall)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(Hall $hall)
    {
        return view('admin-dashboard.hall-management.edit-hall', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hall $hall)
    {
        $hall->name = $request->name;
        $hall->contact = $request->contact;
        $hall->address = $request->address;
        $hall->save();

        return redirect()->route('hall.index')->with('success','Hall Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('hall.index')->with('success','Hall Has Been Deleted');
    }
}
