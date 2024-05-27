<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'nullable',
        ]);
        $user_id = Auth::user()->id;

        $cart = Cart::where('user_id', $user_id)->where('product_id', $request->product_id)->first();
        if ($cart) {
            // If product already exists in cart, return a notification
            notify()->warning('Product is already in the cart!');
            return redirect()->route('cart', $request->product_id);
        } else {
            // If product does not exist in cart, add it
            $cart = new Cart();
            $cart->user_id = $user_id;
            $cart->product_id = $request->product_id;
            $cart->quantity = $request->quantity;
            $cart->save();

            notify()->success('Product added to cart successfully!');
            return redirect()->route('cart', $request->product_id);
        }
    }


    public function update_cart(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|integer',
                'quantity' => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
            }

            $cart = Cart::find($request->id);

            if (!$cart) {
                return response()->json(['success' => false, 'message' => 'Cart item not found'], 404);
            }

            $product = Product::find($cart->product_id);

            if (!$product) {
                return response()->json(['success' => false, 'message' => 'Product not found'], 404);
            }

            // Check if requested quantity is greater than available product quantity
            if ($request->quantity > $product->product_quantity) {
                return response()->json(['success' => false, 'message' => 'Requested quantity exceeds available stock', 'product_quantity' => $product->product_quantity], 400);
            }

            // Update cart quantity
            $cart->quantity = $request->quantity;
            $cart->save();


            return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }




    public function destory($id)
    {

        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        // Send notification
        notify()->success('Item deleted successfully!');

        return response()->json(['success' => true]);
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
