@php
    use Illuminate\Support\Facades\Auth;
@endphp
@extends('frontend.layouts.main')
@section('content')
    <style>
        .vertical-line {
            width: 3px;
            /* Width of the line */
            height: auto;
            /* Height of the line */
            background-color: rgb(129, 196, 8);
            /* Color of the line */
        }

        .border-line {
            border: #0dcaf0 solid 2px !important;
        }
    </style>
    <main>
        <div class="container">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>

                <span class="breadcrumb-item active text-primary" aria-current="page"> My Order Lists</span>
            </nav>
            <h2 class="text-primary m-3">My Order Lists</h2>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-orders"
                        type="button" role="tab" aria-controls="all-orders" aria-selected="true">
                        All
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="to-pay-tab" data-bs-toggle="tab" data-bs-target="#to-pay" type="button"
                        role="tab" aria-controls="to-pay" aria-selected="false">
                        To Pay
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" type="button"
                        role="tab" aria-controls="paid" aria-selected="false">
                        Paid
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="all-tab">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-dark">

                                <tr>
                                   
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Items Image</th>
                                    <th>Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Amount</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($allOrders as $order)
                                    <tr class="table-primary">
                                       
                                        <td>{{ $order->order->id }}</td>
                                        <td>{{ $order->order->date }}</td>
                                        <td><img src="{{ asset($order->product->product_image) }}" alt=""
                                                width="50" height="50">
                                        </td>
                                        <td>{{ $order->order->quantity }}</td>
                                        <td>{{$order->product->product_price }}</td>
                                        @if ($order->payment_staus == 'Verified')
                                            <td>{{ $order->payment_amount }}</td>
                                        @else
                                            <td>{{ $order->product->product_price * $order->order->quantity }}</td>
                                        @endif
                                        <td>
                                            @if (@$order->order->order_status == 'Delivered')
                                                <p class="badge bg-info p-3">{{ $order->order->order_status }}</p>
                                            @elseif(@$order->order->order_status == 'Cancelled')
                                                <p class="badge bg-danger p-3">{{ $order->order->order_status }}</p>
                                            @else
                                                <p class="badge bg-warning p-3">{{ $order->order->order_status }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if (@$order->payment_status == 'Verified')
                                                <p class="badge bg-info p-3">{{ $order->payment_status }}</p>
                                            @elseif(@$order->payment_status == 'Failed')
                                                <p class="badge bg-danger p-3">{{ $order->payment_status }}</p>
                                            @else
                                            @endif
                                        </td>
                                        <td><a href="{{ route('user_orders_details', $order->order_id) }}"
                                                class="btn btn-primary">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $allOrders->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="to-pay" role="tabpanel" aria-labelledby="to-pay-tab">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-dark">

                                <tr>
                                   
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Amount</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($unpaidOrders as $order)
                                    <tr class="table-primary">
                                       
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order->date }}</td>
                                        <td><img src="{{ asset($order->product->product_image) }}" alt=""
                                                width="50" height="50">
                                        </td>
                                        <td>{{ $order->order->quantity }}</td>
                                        <td>{{$order->product->product_price }}</td>
                                        @if ($order->payment_staus == 'Verified')
                                            <td>{{ $order->payment_amount }}</td>
                                        @else
                                            <td>{{ $order->product->product_price * $order->order->quantity }}</td>
                                        @endif
                                        <td>
                                            @if (@$order->order->order_status == 'delivered')
                                                <p class="badge bg-info p-3">{{ $order->order->order_status }}</p>
                                            @elseif(@$order->order->order_status == 'cancelled')
                                                <p class="badge bg-danger p-3">{{ $order->order->order_status }}</p>
                                            @else
                                                <p class="badge bg-warning p-3">{{ $order->order->order_status }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if (@$order->payment_status == 'Verified')
                                                <p class="badge bg-info p-3">{{ $order->payment_status }}</p>
                                            @elseif(@$order->payment_status == 'Failed')
                                                <p class="badge bg-danger p-3">{{ $order->payment_status }}</p>
                                            @else
                                            @endif
                                        </td>
                                        <td><a href="{{ route('user_orders_details', $order->order_id) }}"
                                                class="btn btn-primary">Manage</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $unpaidOrders->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-borderless table-primary align-middle">
                            <thead class="table-dark">

                                <tr>
                                   
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Amount</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($paidOrders as $order)
                                    <tr class="table-primary">
                                       
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order->date }}</td>
                                        <td><img src="{{ asset($order->product->product_image) }}" alt=""
                                                width="50" height="50">
                                        </td>
                                        <td>{{ $order->order->quantity }}</td>
                                        <td>{{$order->product->product_price }}</td>
                                        @if ($order->payment_staus == 'Verified')
                                            <td>{{ $order->payment_amount }}</td>
                                        @else
                                            <td>{{ $order->product->product_price * $order->order->quantity }}</td>
                                        @endif
                                        <td>
                                            @if (@$order->order->order_status == 'Delivered')
                                                <p class="badge bg-info p-3">{{ $order->order->order_status }}</p>
                                            @elseif(@$order->order->order_status == 'Cancelled')
                                                <p class="badge bg-danger p-3">{{ $order->order->order_status }}</p>
                                            @else
                                                <p class="badge bg-warning p-3">{{ $order->order->order_status }}</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if (@$order->payment_status == 'Verified')
                                                <p class="badge bg-info p-3">{{ $order->payment_status }}</p>
                                            @elseif(@$order->payment_status == 'Failed')
                                                <p class="badge bg-danger p-3">{{ $order->payment_status }}</p>
                                            @else
                                            @endif
                                        </td>
                                        <td><a href="{{ route('user_orders_details', $order->order_id) }}"
                                                class="btn btn-primary">Manage</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $paidOrders->links() }}
                    </div>

                </div>
            </div>

        </div>

        </div>
    </main>
@endsection
