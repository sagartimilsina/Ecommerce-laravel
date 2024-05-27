@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\DeliveryAddress;
@endphp

@extends('frontend.layouts.main')

@section('content')
    <style>
        .vertical-line {
            width: 3px;
            height: auto;
            background-color: rgb(129, 196, 8);
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
                        @foreach ($items as $item)
                            <tr class="table-primary">
                                <td>{{ $item->order->id }}</td>
                                <td>{{ $item->order->date }}</td>
                                <td>
                                    <img src="{{ asset($item->product->product_image) }}" alt="" width="50"
                                        height="50">
                                </td>
                                <td>{{ $item->order->quantity }}</td>
                                <td>NPR {{ $item->product->product_price }}</td>
                                <td>NPR {{ $item->product->product_price * $item->order->quantity }}</td>
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
                                <td>
                                    @php
                                        $delivery_address = DeliveryAddress::where(
                                            'user_id',
                                            Auth::user()->id,
                                        )->first();
                                    @endphp
                                    @if (@$item->payment_status !== 'Verified')
                                        <form action="{{ route('esewa_payment') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <input type="hidden" name="phone"
                                                value="{{ $delivery_address->user->phone }}">
                                            <input type="hidden" name="address" value="{{ $delivery_address->address }}">
                                            <input type="hidden" name="city" value="{{ $delivery_address->city }}">
                                            <input type="hidden" name="province"
                                                value="{{ $delivery_address->province }}">
                                            <input type="hidden" name="country" value="{{ $delivery_address->country }}">
                                            <input type="hidden" name="district"
                                                value="{{ $delivery_address->district }}">
                                            <input type="hidden" name="area" value="{{ $delivery_address->area }}">
                                            <input type="hidden" name="total_amount"
                                                value="{{ ($item->product->product_price + $item->product->product_delivery_charge - $item->product->discount) * $item->order->quantity }}">
                                            <input type="hidden" name="order_id" value="{{ $item->order->id }}">
                                            <input type="hidden" name="product_id[]" value="{{ $item->product->id }}">
                                            <input type="hidden" name="payment_method" value="Esewa">
                                            <button type="submit" class="btn btn-primary bg-primary rounded mt-2">Pay
                                                Now</button>
                                        </form>
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
