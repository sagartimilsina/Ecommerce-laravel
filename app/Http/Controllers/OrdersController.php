<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{


    public function pending_order()
    {
        $pending_orders = Orders::where('order_status', 'Pending')->get();
        return view('backend.orders.main', compact('pending_orders'));
    }

    public function delivered_order()
    {
        $delivered_orders = Orders::where('order_status', 'Delivered')->get();
        return view('orders.delivered', compact('delivered_orders'));
    }

    public function cancel_order()
    {
        $cancelled_orders = Orders::where('order_status', 'Cancelled')->get();
        return view('orders.cancelled', compact('cancelled_orders'));
    }

    public function user_orders_store(Request $request)
    {
        return $request;
        $request->validate([
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required',
            'total_price' => 'required',
            'status' => 'required',
            'payment_method' => 'required',
            'payment_status' => 'required',
        ]);
        $billing_address = DeliveryAddress::create([
            'address' => $request->address,
            'city' => $request->city,
            'province' => $request->province,
            'country' => $request->country,
            'user_id' => $request->user_id,


        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
