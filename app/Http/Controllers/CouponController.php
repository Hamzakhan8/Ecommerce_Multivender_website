<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::all();
        return view('admin-dashboard.coupon-management.all-coupons',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.coupon-management.create-coupon');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::create([
            'code' => $request->code,
            'price' => $request->price,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            ]);
        return redirect()->route('coupon.index')->with('success','Coupon Has Been Generated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin-dashboard.coupon-management.edit-coupon',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->code = $request->code;
        $coupon->price = $request->price;
        $coupon->from_date = $request->from_date;
        $coupon->to_date = $request->to_date;

        $coupon->save();
        return redirect()->route('coupon.index')->with('success','Coupon Has Been Already Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {   
        $coupon->delete();
        return back()->with('success', 'Coupon Has Been Deleted');
    }
}
