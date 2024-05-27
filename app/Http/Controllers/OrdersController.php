<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function pending_order()
    {

        $user_ids = User::where('role', 'user')->pluck('id');


        $all_pending_orders = new Collection();


        foreach ($user_ids as $id) {
            $pending_order = Orders::with('user')
                ->where('user_id', $id)
                ->where('order_status', 'pending')
                ->first();
            if ($pending_order) {
                $all_pending_orders->push($pending_order);
            }
        }
        return view('backend.orders.user_order_pending', ['pending_orders' => $all_pending_orders]);
    }

    public function show_all_users_pending_orders($id)
    {


        $pending_order = Orders::with('user')
            ->where('user_id', $id)
            ->where('order_status', 'pending')
            ->paginate(20);

        $user = User::find($id);
        return view('backend.orders.main', ['pending_orders' => $pending_order, 'user' => $user]);
    }

    public function update_order_status(Request $request, $id)
    {
        $order = Orders::find($id);
        $order->order_status = $request->order_status;
        $order->save();
        notify()->success('Order Status Updated Successfully');
        return redirect()->back();
    }



    public function delivered_order()
    {
        $user_ids = User::where('role', 'user')->pluck('id');


        $all_delivery_orders = new Collection();


        foreach ($user_ids as $id) {
            $delivered_orders = Orders::with('user')
                ->where('user_id', $id)
                ->where('order_status', 'delivered')
                ->first();
            if ($delivered_orders) {
                $all_delivery_orders->push($delivered_orders);
            }
        }
        return view('backend.orders.user_order_delivered', ['delivered_orders' => $all_delivery_orders]);
    }
    public function show_all_users_delivered_orders($id)
    {
        $delivered_orders = Orders::with('user')
            ->where('user_id', $id)
            ->where('order_status', 'delivered')
            ->paginate(20);
        $user = User::find($id);
        return view('backend.orders.delivered', compact('delivered_orders', 'user'));
    }

    public function show_all_users_cancelled_orders($id)
    {
        $cancelled_orders = Orders::with('user')
            ->where('user_id', $id)
            ->where('order_status', 'cancelled')
            ->paginate(20);
        $user = User::find($id);

        return view('backend.orders.cancel', compact('cancelled_orders', 'user'));
    }

    public function cancel_order()
    {

        $user_ids = User::where('role', 'user')->pluck('id');


        $all_cancelled_orders = new Collection();


        foreach ($user_ids as $id) {
            $cancelled_orders = Orders::with('user')
                ->where('user_id', $id)
                ->where('order_status', 'cancelled')
                ->first();
            if ($cancelled_orders) {
                $all_cancelled_orders->push($cancelled_orders);
            }
        }
        return view('backend.orders.user_order_cancelled', ['cancelled_orders' => $all_cancelled_orders]);
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
        $user = User::pluck('id');
        $users = Orders::where('user_id', $user)->get();
        return $users;
        return view('backend.orders.index', compact('orders', 'users'));
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
