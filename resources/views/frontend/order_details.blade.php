@extends('frontend.layouts.main')

@section('content')
    <style>
        .vertical-line {
            width: auto;
            /* Width of the line */
            height: 3px;
            /* Height of the line */
            background-color: rgb(129, 196, 8);
            /* Color of the line */
        }

        .border-line {
            border: #0dcaf0 solid 2px !important;
        }
    </style>
    <div class="container">
        @include('notify::components.notify')
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
            <a class="breadcrumb-item" href="{{ route('user_orders_lists') }}">Order Lists</a>
            <span class="breadcrumb-item active  text-primary" aria-current="page">Order Details</span>
        </nav>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Order Details</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="order_number col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Order Number</p>
                            <p class="mt-2">{{ $orders->order->id }}</p>
                        </div>
                        <div class="img col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Item Image</p>
                            <img src="{{ asset($orders->product->product_image) }}" alt="" srcset=""
                                width="100" height="100">
                        </div>
                        <div class="product_name col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Name</p>
                            <p class="mt-2">{!! $orders->product->product_name !!}</p>
                        </div>
                        <div class="product_price col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Price</p>
                            <p class="mt-2">{{ $orders->product->product_price }}</p>
                        </div>
                        <div class="product_quantity col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Quantity</p>
                            <p class="mt-2">{{ $orders->order->quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-between mt-3">
            <div class="col-lg-5 col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">Shipping Address</h3>
                    </div>
                    <div class="card-body ">
                        <h6 class="card-subtitle mb-2 ">{{ $delivery_address->user->name }}</h6>
                        <p class="card-text">{{ $delivery_address->address }}</p>
                        <p class="card-text"> {{ $delivery_address->province }}, {{ $delivery_address->city }},
                            {{ $delivery_address->area }} </p>
                        <p class="card-text">(+977) {{ $delivery_address->user->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-primary">Total Amount</h3>
                    </div>
                    <div class="card-body ">

                        <div class="d-flex justify-content-between">
                            <p class="card-text">Subtotal</p>
                            <p class="card-text">{{ $orders->product->product_price * $orders->order->quantity }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Delivery Charge</p>
                            <p class="card-text">{{ $orders->product->product_delivery_charge }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Discount</p>
                            <p class="card-text">{{ $orders->discount }}</p>
                        </div>

                        <div class="vertical-line mb-2 mt-1"></div>
                        @if (@$orders->payment_status !== 'Verified')
                            <div class="d-flex justify-content-between">
                                <p class="card-text">Total</p>
                                <p class="card-text">NPR
                                    {{ ($orders->product->product_price + $orders->delivery_charge - $orders->discount) * $orders->order->quantity }}
                                </p>
                                
                            </div>
                        @else
                            <div class="d-flex justify-content-between">
                                <p class="card-text">Total</p>
                                <p class="card-text">NPR
                                    {{ ($orders->product->product_price + $orders->delivery_charge - $orders->discount) * $orders->order->quantity }}
                                </p>
                            </div>
                        @endif


                        <h5 class="mb-2 mt-2 ">Payment Method: <p class=" p-2 badge bg-success">
                                {{ $orders->payment_method }}</p>
                        </h5>
                        @if (@$orders->payment_status !== 'Verified')
                            <form action="{{ route('esewa_payment') }}" method="post">
                                @csrf

                                <input type="hidden" name="payment_id" value="{{ $orders->id }}">
                                <input type="hidden" name="phone" id=""
                                    value="{{ $delivery_address->user->phone }}">
                                <input type="hidden" name="address" id=""
                                    value="{{ $delivery_address->address }}">
                                <input type="hidden" name="city" id="" value="{{ $delivery_address->city }}">
                                <input type="hidden" name="province" id=""
                                    value="{{ $delivery_address->province }}">
                                <input type="hidden" name="country" id=""
                                    value="{{ $delivery_address->country }}">
                                <input type="hidden" name="district" id="" value="{{ $delivery_address->area }}">
                                <input type="hidden" name="area" id="" value="{{ $delivery_address->area }}">
                                <input type="hidden" name="total_amount" id=""
                                    value="{{ ($orders->product->product_price + $orders->product->product_delivery_charge - $orders->product->discount)*$orders->order->quantity }}">
                                <input type="hidden" name="order_id" id="" value="{{ $orders->order_id }}">
                                <input type ="hidden" name="product_id[]" id=""
                                    value="{{ $orders->product->id }}">
                                <input type="hidden" name="payment_method" id="" value="Esewa">
                                <button type="submit" class="btn btn-primary bg-primary   rounded mt-2"> Pay
                                    Now</button>
                            </form>
                        @else
                            <p class="mb-2 mt-2 badge bg-success p-2">Payment Status:
                                {{ $orders->payment_status }}/Paid </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
