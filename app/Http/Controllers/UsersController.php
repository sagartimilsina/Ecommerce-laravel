<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Orders;
use App\Models\Payments;
use App\Models\PermanentAddress;
use App\Models\TemporaryAddress;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.main', compact('users'));
    }

    public function edit_profile()
    {

        $user = User::find(auth()->user()->id);
        return view('frontend.profile.edit_profile', compact('user'));
    }
    public function address_update()
    {
        $user = User::find(auth()->user()->id);
        $editpermanentaddress = PermanentAddress::with('user')->where('user_id', auth()->user()->id)->first();
        $edittemporaryaddress = TemporaryAddress::with('user')->where('user_id', auth()->user()->id)->first();
        $editdeliveryaddress = DeliveryAddress::with('user')->where('user_id', auth()->user()->id)->first();

        return view('frontend.profile.address', compact('user', 'editpermanentaddress', 'edittemporaryaddress', 'editdeliveryaddress'));
    }


    public function user_credentials_update(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:255',
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::findOrFail(auth()->user()->id);

        // Check if the current password matches the user's password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        // Update user credentials
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password); // Hash the new password

        // Save the updated user data
        $user->save();

        // Set success notification
        notify()->success('User credentials updated successfully');
        return redirect()->back();
    }

    public function account_details()
    {
        $user = User::find(auth()->user()->id);
        return view('frontend.profile.settings', compact('user'));
    }
    public function user_orders_details($id)

    {

        $orders = Payments::with('user', 'product', 'order')->where('order_id', $id)->first();
        $delivery_address = DeliveryAddress::with('user')->where('user_id', auth()->user()->id)->first();


        return view('frontend.order_details', compact('orders', 'delivery_address'));
    }
    public function user_orders_lists()
    {
        $allOrders = Payments::with('user', 'product', 'order')->where('user_id', auth()->user()->id)->Paginate(10);
        

        $paidOrders = Payments::with('order', 'product')->where('user_id', auth()->user()->id)->where('payment_status', 'Verified')->paginate(10);
        $unpaidOrders = Payments::with('order', 'product')->where('user_id', auth()->user()->id)->where('payment_status', 'Failed')->paginate(10);
    


        return view('frontend.orders_lists', compact('allOrders', 'paidOrders', 'unpaidOrders'));
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
    public function update(Request $request)
    {

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming profile is an image upload
        ]);

        $old_photo = $request->old_profile;
        // Find the user by ID
        $user = User::findOrFail($request->id);

        // Update user profile fields
        $user->name = $request->name;
        $user->phone = $request->phone;

        // Handle profile image upload if provided
        if ($request->hasFile('profile')) {
            // Generate a unique name for the uploaded image
            $photo_name = time() . '.' . $request->file('profile')->getClientOriginalExtension();
            // Move the uploaded image to the specified path
            $request->file('profile')->move(public_path('uploads/profile/'), $photo_name);
        } else {
            $photo_name = $old_photo;
        }

        // Save the updated user
        $user->profile_photo_path = $photo_name;
        $user->save();

        // Redirect back with success message
        notify('Profile updated successfully', 'success');
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function create_permanent_address(Request $request)
    {

        // Validate input
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = PermanentAddress::create([
            'user_id' => Auth::user()->id,
            'country' => $request->input('country'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
        ]);
        notify()->success('Permanent address created successfully');
        return redirect()->back();
    }
    public function create_temporary_address(Request $request)
    {

        // Validate input
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = TemporaryAddress::create([
            'user_id' => Auth::user()->id,
            'country' => $request->input('country'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
        ]);
        notify()->success('Temporary address created successfully');
        return redirect()->back();
    }
    public function update_permanent_address(Request $request, $id)
    {
        // Validate input   
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Find the address by ID
        $address = PermanentAddress::findOrFail($id);

        // Check if the authenticated user is the owner of the address
        if (Auth::id() !== $address->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the address
        $address->country = $request->input('country');
        $address->province = $request->input('province');
        $address->district = $request->input('district');
        $address->city = $request->input('city');
        $address->area = $request->input('area');
        $address->address = $request->input('address');
        $address->save();

        notify()->success('Permanent address updated successfully');
        return redirect()->back();
    }
    public function update_temporary_address(Request $request, $id)
    {
        // Validate input   
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Find the address by ID
        $address = TemporaryAddress::findOrFail($id);

        // Check if the authenticated user is the owner of the address
        if (Auth::id() !== $address->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the address
        $address->country = $request->input('country');
        $address->province = $request->input('province');
        $address->district = $request->input('district');
        $address->city = $request->input('city');
        $address->area = $request->input('area');
        $address->address = $request->input('address');
        $address->save();

        notify()->success('Temporary address updated successfully');
        return redirect()->back();
    }
    public function create_delivery_address(Request $request)
    {

        // Validate input
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $user = DeliveryAddress::create([
            'user_id' => Auth::user()->id,
            'country' => $request->input('country'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'city' => $request->input('city'),
            'area' => $request->input('area'),
            'address' => $request->input('address'),
        ]);
        notify()->success('Delivery address created successfully');
        return redirect()->back();
    }
    public function update_delivery_address(Request $request, $id)
    {

        // Validate input   
        $request->validate([
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Find the address by ID
        $address = DeliveryAddress::findOrFail($id);

        // Check if the authenticated user is the owner of the address
        if (Auth::id() !== $address->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        // Update the address
        $address->country = $request->input('country');
        $address->province = $request->input('province');
        $address->district = $request->input('district');
        $address->city = $request->input('city');
        $address->area = $request->input('area');
        $address->address = $request->input('address');
        $address->save();

        notify()->success('Delivery address updated successfully');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(users $users)
    {
        //
    }
}
