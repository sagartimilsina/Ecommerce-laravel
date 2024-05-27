<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Payments;
use App\Models\User;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product; // Make sure to include the Product model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Xentixar\EsewaSdk\Esewa;

class EsewaPaymentController extends Controller
{
    public function esewa_payment(Request $request)
    {
        // Retrieve selected items from the request
        // $selectedItems = $request->input('selectedItems', []);

        // // Serialize the selected items array into a string
        // $serializedSelectedItems = serialize($selectedItems);

        // // Store the serialized selected items array in the session
        // session()->put('selectedItems', $serializedSelectedItems);
        // // Validate the incoming request data
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'district' => 'required',
            'area' => 'required',
            'payment_method' => 'required',
            // 'product_id' => 'required|array',
            // 'product_id.*' => 'required|integer',
            'total_amount' => 'required|numeric',
        ]);

        $update_payment = Payments::where('id', $request->id)->first();
        if(@$update_payment){
           
        }
        // Check if a delivery address exists for the authenticated user
        $delivery_address = DeliveryAddress::where('user_id', Auth::user()->id)->first();

        if ($delivery_address) {
            // Update the existing delivery address
            $delivery_address->update([
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'district' => $request->district,
                'area' => $request->area,
            ]);
        } else {
            // Create a new delivery address
            $delivery_address = DeliveryAddress::create([
                'user_id' => Auth::user()->id,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'district' => $request->district,
                'area' => $request->area,
            ]);
        }

        // Update the user's phone number and delivery address ID
        $user = Auth::user();
        $user->update([
            'phone' => $request->phone,
            'delivery_address_id' => $delivery_address->id,
        ]);

        // eSewa payment configuration and initiation
        $total_amount = $request->total_amount;
        if ($total_amount > 0) {
            $esewa = new Esewa();
            $esewa->config(
                route('esewa_payment_response'), // Success URL
                // route('esewa_payment_failure'),  // Failure URL
                route('esewa_payment_cancel'),  // Cancel URL
                $request->total_amount,
            );

            return $esewa->init();
        }

        return redirect()->back()->withErrors(['total_amount' => 'Invalid payment amount']);
    }
    public function esewa_payment_response(Request $request)
    {
        $esewa = new Esewa();
        $data = $esewa->decode();

        if ($data && $data['status'] === 'COMPLETE') {
            $carts = Cart::with('product')->where('user_id', Auth::id())->get();

            foreach ($carts as $cart) {
                $order = Orders::create([
                    'user_id' => Auth::id(),
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'total_amount' => $data['total_amount'],
                    'order_status' => 'Pending',
                    'date' => now(),
                ]);


                $paymentStatus = 'Pending';
                if ($data['status'] === 'COMPLETE' || $data['transaction_uuid'] !== null) {
                    $paymentStatus = 'Verified';
                } elseif ($data['status'] === 'FAILED') {
                    $paymentStatus = 'Failed';
                }
                Payments::create([
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'transaction_code' => $data['transaction_code'],
                    'transaction_uuid' => $data['transaction_uuid'],
                    'payment_amount' => $data['total_amount'],
                    'signature' => $data['signature'],
                    'payment_method' => 'Esewa',
                    'payment_date' => now(),
                    'payment_status' => $paymentStatus,
                    'status' => $data['status'],
                    'product_code' => $data['product_code'],
                ]);

                // Subtract the quantity from the Product table
                $product = Product::find($cart->product_id);
                if ($product) {
                    $product->product_quantity -= $cart->quantity;
                    $product->save();
                }
                if ($paymentStatus === 'Verified') {
                    $cart->delete();
                }
            }

            $transaction_code = $data['transaction_code'];
            // Update payment status to 'Verified'
            // Payments::where('transaction_code', $transaction_code)->update(['payment_status' => 'Verified']);

            $items = Payments::with('user', 'product')
                ->where('transaction_code', $transaction_code)
                ->paginate(15);


            $datas = Payments::with('user', 'product')
                ->where('transaction_code', $transaction_code)
                ->first();

            $total_amount = $data['total_amount'];
            notify()->success('Payment Successful, Order Placed Successfully!');
            return view('frontend.orders_lists', compact('items', 'total_amount', 'datas', 'transaction_code'));
        }
    }


    public function esewa_payment_cancel(Request $request)
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            // Create order with pending status
            $order = Orders::create([
                'user_id' => Auth::id(),
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'total_amount' => $request->total_amount, // Set total amount as per your requirement
                'order_status' => 'Pending',
                'date' => now(),
            ]);

            // Create payment entry with failed status
            Payments::create([
                'user_id' => Auth::id(),
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'transaction_code' => null,
                'transaction_uuid' => null,
                'payment_amount' => 0, // Set payment amount as per your requirement
                'signature' => null,
                'payment_method' => 'Esewa',
                'payment_date' => now(),
                'payment_status' => 'Failed',
                'status' => 'Failed', // Set status as per your requirement
                'product_code' => null,
            ]);

            // Subtract the quantity from the Product table
            $product = Product::find($cart->product_id);
            if ($product) {
                $product->product_quantity -= $cart->quantity;
                $product->save();
            }

            $cart->delete();
        }
        notify()->error('Payment unsuccessful, Order Placed Successfully!');
        return view('frontend.orders_lists');
    }

    // public function esewa_payment_failure(Request $request)
    // {
    //     $esewa = new Esewa();
    //     $data = $esewa->decode();
    //     if ($data && $data['status'] !== 'COMPLETE') {

    //         $carts = Cart::with('product')->where('user_id', Auth::id())->get();
    //         // Process failed payment
    //         foreach ($carts as $cart) {
    //             // Create order with pending status
    //             $order = Orders::create([
    //                 'user_id' => Auth::id(),
    //                 'product_id' => $cart->product_id,
    //                 'quantity' => $cart->quantity,
    //                 'total_amount' => $data['total_amount'],
    //                 'order_status' => 'Pending',
    //                 'date' => now(),
    //             ]);
    //             // Create payment entry with failed status
    //             Payments::create([
    //                 'user_id' => Auth::id(),
    //                 'order_id' => $order->id,
    //                 'product_id' => $cart->product_id,
    //                 'transaction_code' => $data['transaction_code'],
    //                 'transaction_uuid' => $data['transaction_uuid'],
    //                 'payment_amount' => $data['total_amount'],
    //                 'signature' => $data['signature'],
    //                 'payment_method' => 'Esewa',
    //                 'payment_date' => now(),
    //                 'payment_status' => 'Failed',
    //                 'status' => $data['status'],
    //                 'product_code' => $data['product_code'],
    //             ]);
    //         }
    //         // Clear the cart
    //         // You might need to add logic here to clear the cart based on your application's structure

    //         // Redirect to checkout page with error message
    //         notify()->error('Payment Failed!');

    //         return redirect()->route('checkout')->withErrors(['payment' => 'Payment failed. Please try again.']);
    //     }
    // }
}
