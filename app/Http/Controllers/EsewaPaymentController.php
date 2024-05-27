<?php

namespace App\Http\Controllers;

use App\Models\DeliveryAddress;
use App\Models\Payments;
use App\Models\User;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xentixar\EsewaSdk\Esewa;
use Illuminate\Support\Facades\Log;

class EsewaPaymentController extends Controller
{
    public function esewa_payment(Request $request)

    {

        $request->validate([
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'district' => 'required',
            'area' => 'required',
            'payment_method' => 'required',
            'total_amount' => 'required|numeric',
        ]);

        $delivery_address = DeliveryAddress::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'country' => $request->country,
                'district' => $request->district,
                'area' => $request->area,
            ]
        );

        $user = Auth::user();
        $user->update([
            'phone' => $request->phone,
            'delivery_address_id' => $delivery_address->id,
        ]);

        $total_amount = $request->total_amount;
        if ($total_amount > 0) {
            $esewa = new Esewa();
            $esewa->config(
                route('esewa_payment_response'),
                route('esewa_payment_cancel'),
                $request->total_amount, // total amount

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
            $payments = Payments::with('order')->where('id', $request->payment_id)->get();

            if ($carts->count() > 0) {
                foreach ($carts as $cart) {
                    $order = Orders::create(
                        [
                            'user_id' => Auth::id(),
                            'product_id' => $cart->product_id,
                            'quantity' => $cart->quantity,
                            'total_amount' => $data['total_amount'],
                            'order_status' => 'Pending',
                            'date' => now(),
                        ],
                    );

                    $paymentStatus = $data['status'] === 'COMPLETE' || $data['transaction_uuid'] !== null ? 'Verified' : 'Failed';
                    $payment = Payments::create(
                        [
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
                        ]
                    );
                }


                $product = Product::find($cart->product_id);
                if ($product) {
                    $product->product_quantity -= $cart->quantity;
                    $product->save();
                }

                if ($paymentStatus === 'Verified') {
                    $cart->delete();
                }


                $transaction_code = $data['transaction_code'];
                $items = Payments::with('user', 'product')
                    ->where('transaction_code', $transaction_code)
                    ->get();
                notify()->success('Payment Successful, Order Placed Successfully!');
                return view('frontend.esewa.success', compact('items'));
            } elseif ($payments->count() > 0) {
                // foreach ($payments as $payment) {
                $order = Orders::findOrFail($payments->order_id);
                $order->user_id = Auth::id();
                $order->product_id = $payments->product_id;
                $order->quantity = $payments->order->quantity;
                $order->total_amount = $data['total_amount'];
                $order->order_status = 'Pending';
                $order->date = $payments->order->date;
                $order->save();

                // $order = Orders::create(
                //     [
                //         'user_id' => Auth::id(),
                //         'product_id' => $payment->product_id,
                //         'quantity' => $payment->order->quantity,
                //         'total_amount' => $data['total_amount'],
                //         'order_status' => 'Pending',
                //         'date' => $payment->order->date,
                //     ],
                // );

                $paymentStatus = $data['status'] === 'COMPLETE' || $data['transaction_uuid'] !== null ? 'Verified' : 'Failed';

                $payment_update = Payments::FindOrFail($payments->id);
                $payment_update->payment_status = $paymentStatus;
                $payment_update->status = $data['status'];
                $payment_update->product_code = $data['product_code'];
                $payment_update->payment_date = now();
                $payment_update->signature = $data['signature'];
                $payment_update->transaction_code = $data['transaction_code'];
                $payment_update->transaction_uuid = $data['transaction_uuid'];
                $payment_update->payment_method = 'Esewa';
                $payment_update->payment_amount = $data['total_amount'];
                $payment_update->user_id = Auth::id();
                $payment_update->product_id = $payments->product_id;
                $payment_update->order_id = $order->order_id;

                $payment_update->save();


                // $payment = Payments::create(
                //     [
                //         'user_id' => Auth::id(),
                //         'order_id' => $order->id,
                //         'product_id' => $cart->product_id,
                //         'transaction_code' => $data['transaction_code'],
                //         'transaction_uuid' => $data['transaction_uuid'],
                //         'payment_amount' => $data['total_amount'],
                //         'signature' => $data['signature'],
                //         'payment_method' => 'Esewa',
                //         'payment_date' => now(),
                //         'payment_status' => $paymentStatus,
                //         'status' => $data['status'],
                //         'product_code' => $data['product_code'],
                //     ]
                // );


                $transaction_code = $data['transaction_code'];
                $items = Payments::with('user', 'product')
                    ->where('transaction_code', $transaction_code)
                    ->get();
                return view('frontend.esewa.success', compact('items', 'transaction_code', 'total_amount'));
            } else {
                return redirect()->route('esewa_payment_cancel');
            }
        }
    }


    public function esewa_payment_cancel(Request $request)
    {
        $carts = Cart::with('product')->where('user_id', Auth::id())->get();

        foreach ($carts as $cart) {
            $order = Orders::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_id' => $cart->product_id,
                ],
                [
                    'quantity' => $cart->quantity,
                    'total_amount' => $request->total_amount,
                    'order_status' => 'Pending',
                    'date' => now(),
                ]
            );

            Payments::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                ],
                [
                    'transaction_code' => null,
                    'transaction_uuid' => null,
                    'payment_amount' => 0,
                    'signature' => null,
                    'payment_method' => 'Esewa',
                    'payment_date' => now(),
                    'payment_status' => 'Failed',
                    'status' => 'Failed',
                    'product_code' => null,
                ]
            );

            $product = Product::find($cart->product_id);
            if ($product) {
                $product->product_quantity -= $cart->quantity;
                $product->save();
            }

            $cart->delete();
        }
        $items = Payments::with('user', 'product', 'order')
            ->where('user_id', Auth::id())
            ->where('payment_status', 'Failed')
            ->get();


        notify()->error('Payment unsuccessful, Order Placed Successfully!');
        return view('frontend.esewa.failure', compact('items'));
    }
}
