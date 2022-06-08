<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
        $order = ''; 
        if(auth()->user()->role == 1){
            $order = Order::all();
        }elseif(auth()->user()->role == 2){
            $userid = auth()->user()->id;
            $order = Order::where('seller_id', $userid)->get();
        }elseif(auth()->user()->role == 3){
            $userid = auth()->user()->id;
            $order = Order::where('buyer_id', $userid)->get();
        }
        return view('admin-dashboard/order-management/all-orders',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard/order-management/create-order-form');
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->status = 1;
        $order->save();
        return back()->with('success','Order Has Been Changed To Shipped Status');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
         $order->delete();
        return redirect()->route('order.index')->with('success', 'Order Has Been Deleted');
    }
}
