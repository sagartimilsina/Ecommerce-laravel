@extends('backend.layouts.main')

@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-4 order-0">
                            <div class="col-sm-12">
                                <div class="row align-items-center">
                                    <div class="col-sm-6">
                                        <h4 class="page-title text-left">Orders Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Cancelled Orders List</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <h3 class="card-title fs-4 m-3 mb-2 text-primary">Cancelled Orders</h3>
                                <a href="{{ route('cancel_order') }}" class=" "><button
                                        class="btn btn-primary m-3 mb-1">Back</button></a>
                                <div class="card-body">

                                    <div class="user">
                                        <div class="user-info">
                                            <div class="user-info-title text-center m-2">
                                                <h3 class="text-primary m-1">Name:- {{ $user->name }}</h3>
                                                <h3 class="text-primary m-1">Email:- {{ $user->email }}</h3>
                                                <h3 class="text-primary m-1">Phone:- {{ $user->phone }}</h3>
                                                <h3 class="text-primary m-1">Address:- {{ $user->delivery->address }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Date</th>
                                            <th>Product Name</th>

                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Quantity</th>
                                            <th>Product Price</th>
                                            <th>Total Amount</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cancelled_orders as $order)
                                            @if (@$order->payment->payment_status == 'Failed')
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->date }}</td>
                                                    <td>{{ $order->product->product_name }}</td>


                                                    <td>{{ $order->user->phone }}</td>
                                                    <td>{{ $order->user->delivery->address }}</td>
                                                    <td>{{ $order->quantity }}</td>
                                                    <td> {{ $order->product->product_price }}</td>
                                                    @if (@$order->payment->payment_status == 'Verified')
                                                        <td>{{ $order->quantity * $order->product->product_price }}
                                                        </td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                    <td>
                                                        @if ($order->order_status == 'Delivered')
                                                            <span
                                                                class="badge bg-success">{{ $order->order_status }}</span>
                                                        @elseif ($order->order_status == 'Cancelled')
                                                            <span
                                                                class="badge bg-danger">{{ $order->order_status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-warning">{{ $order->order_status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (@$order->payment->payment_status == 'Verified')
                                                            <span
                                                                class="badge bg-success">{{ $order->payment->payment_status }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger">{{ $order->payment->payment_status }}</span>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="notify">
                                @include('notify::components.notify')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
