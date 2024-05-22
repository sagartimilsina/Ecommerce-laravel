<?php

namespace App\Http\Controllers;

use App\Models\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function edit_profile()
    {

        $user = users::find(auth()->user()->id);
        return view('frontend.profile.edit_profile', compact('user'));
    }
    public function address_update(){
        $user = users::find(auth()->user()->id);
        return view('frontend.profile.address', compact('user'));
    }

    public function account_details(){
        $user = users::find(auth()->user()->id);
        return view('frontend.profile.settings', compact('user'));
    }
    public function user_orders_details(){

        return view('frontend.order_details');
    }

    public function user_orders_lists(){

        return view('frontend.orders_lists');
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
    public function show(users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }
}
