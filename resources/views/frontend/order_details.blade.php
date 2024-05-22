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
                            <p class="mt-2">123456789</p>
                        </div>
                        <div class="img col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Image</p>
                            <img src="img/vegetable-item-5.jpg" alt="" srcset="" width="100" height="100">
                        </div>
                        <div class="product_name col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Name</p>
                            <p class="mt-2">Lorem ipsem</p>
                        </div>
                        <div class="product_price col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Price</p>
                            <p class="mt-2">2000</p>
                        </div>
                        <div class="product_quantity col-lg-2 col-md-4 col-sm-6 col-6 mt-2">
                            <p>Product Quantity</p>
                            <p class="mt-2">1</p>
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
                        <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                        <p class="card-text">Sarangkot-18, Bhakunde</p>
                        <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                        <p class="card-text">(+977) 9819113548</p>
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
                            <p class="card-text">2000</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Delivery Charge</p>
                            <p class="card-text">100</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Discount</p>
                            <p class="card-text">200</p>
                        </div>
                        <div class="vertical-line mb-2 mt-1"></div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">Total</p>
                            <p class="card-text">2000</p>
                        </div>

                        <p class="mb-2 mt-2">Payment Method: Cash, Card, Esewa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
