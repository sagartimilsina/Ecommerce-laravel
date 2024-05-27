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

                <span class="breadcrumb-item active text-primary" aria-current="page"> My Order</span>
            </nav>
            <h2 class="text-primary m-3">My Order</h2>
            <div class="back m-2 mx-0">
                <a href="{{ route('user_orders_lists') }}" class="btn btn-primary">Back to Order Lists</a>
            </div>


            {{-- @if (@session('success'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ $message }}</strong>
                </div>

                <script>
                    var alertList = document.querySelectorAll(".alert");
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert);
                    });
                </script>
            @endif --}}



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
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($items as $item)
                            <tr class="table-primary">
                                <td>{{ $item->order->id }}</td>
                                <td>{{ $item->order->date }}</td>
                                <td>
                                    <img src="{{ asset($item->product->product_image) }}" alt="" width="50"
                                        height="50">
                                </td>
                                <td>{{ $item->order->quantity }}</td>
                                <td>NPR{{ $item->product->product_price }}</td>
                                <td> NPR{{ $item->product->product_price * $item->order->quantity }}</td>
                                <td>
                                    @if ($item->order->order_status == 'Delivered')
                                        <p class="badge bg-info p-3">{{ $item->order->order_status }}</p>
                                    @elseif($item->order->order_status == 'Cancelled')
                                        <p class="badge bg-danger p-3">{{ $item->order->order_status }}</p>
                                    @else
                                        <p class="badge bg-warning p-3">{{ $item->order->order_status }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->payment_status == 'Verified')
                                        <p class="badge bg-info p-3">{{ $item->payment_status }}</p>
                                    @elseif($item->payment_status == 'Failed')
                                        <p class="badge bg-danger p-3">{{ $item->payment_status }}</p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach




                    </tbody>
                </table>

            </div>
        </div>


    </main>
@endsection
