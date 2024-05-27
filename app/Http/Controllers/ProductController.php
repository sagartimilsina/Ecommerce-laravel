<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::paginate(20);
            return view('backend.product.main', compact('products'));
        } catch (\Exception $e) {
            notify()->error('Something went wrong!');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_image' => 'required|image',
            'product_price' => 'required|string',
            'product_quantity' => 'required|string',
            'product_status' => 'nullable|string',
            'product_code' => 'nullable|string',
            'product_discount' => 'nullable|string',
        ]);
        try {
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;

            if ($request->hasFile('product_image')) {
                $fileName = time() . '.' . $request->file('product_image')->getClientOriginalExtension();
                $path = public_path('uploads/product_images/');

                // Ensure the directory exists
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                $image = Image::make($request->file('product_image'));
                $image->fit(500, 500, function ($constraint) {
                    $constraint->upsize();
                });
                $image->save($path . $fileName);

                $product->product_image = 'uploads/product_images/' . $fileName;
            }


            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_status = $request->product_status;
            $product->product_code = $request->product_code;
            $product->product_discount = $request->product_discount;
            $product->save();

            notify()->success('Product created successfully');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            notify()->error('Something went wrong!');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        try {
            $product = Product::findOrFail($product->id);
            $categories = Category::all();
            return view('backend.product.edit', compact('product', 'categories'));
        } catch (\Exception $e) {
            notify()->error('Something went wrong!');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'product_image' => 'nullable|image',
            'product_price' => 'required|string',
            'product_quantity' => 'required|string',
            'product_status' => 'nullable|string',
            'product_code' => 'nullable|string',
            'product_discount' => 'nullable|string',
        ]);
        try {
            $product = Product::findOrFail($id);
            $product->category_id = $request->category_id;
            $product->product_name = $request->product_name;
            $product->product_description = $request->product_description;

            if ($request->hasFile('product_image')) {
                // Delete the old image
                if (File::exists(public_path($product->product_image))) {
                    File::delete(public_path($product->product_image));
                }

                $fileName = time() . '.' . $request->file('product_image')->getClientOriginalExtension();
                $path = public_path('uploads/product_images/');

                // Ensure the directory exists
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                $image = Image::make($request->file('product_image'));
                $image->fit(500, 500, function ($constraint) {
                    $constraint->upsize();
                });
                $image->save($path . $fileName);

                $product->product_image = 'uploads/product_images/' . $fileName;
            } else {
                $product->product_image = $request->product_image_old;
            }

            $product->product_price = $request->product_price;
            $product->product_quantity = $request->product_quantity;
            $product->product_status = $request->product_status;
            $product->product_code = $request->product_code;
            $product->product_discount = $request->product_discount;
            $product->save();

            notify()->success('Product updated successfully');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            notify()->error('Something went wrong!');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            // Delete the image file
            if (File::exists(public_path($product->product_image))) {
                File::delete(public_path($product->product_image));
            }

            $product->delete();

            notify()->success('Product deleted successfully');
            return redirect()->route('products.index');
        } catch (\Exception $e) {
            notify()->error('Something went wrong!');
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
