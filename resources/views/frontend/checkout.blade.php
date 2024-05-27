@extends('frontend.layouts.main')

@section('content')
    <!-- Checkout Page Start -->
    <div class="container-fluid py-2">
        <div class="container ">
            <h1 class="mb-4">Billing details</h1>
            <form action="{{ route('esewa_payment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="selectedItems[]" value="{{ json_encode($selectedItems) }}">

                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="row g-5">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item">
                                    <label class="form-label my-3">Name<sup>*</sup></label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name"
                                        value="{{ Auth::user()->name }}" @disabled(true)>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item">
                                    <label class="form-label my-3">Email<sup>*</sup></label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                        value="{{ Auth::user()->email }}" @disabled(true)>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                @if (Auth::user()->phone)
                                    <div class="form-item">
                                        <label class="form-label my-3">Phone<sup>*</sup></label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Enter your phone" value="{{ Auth::user()->phone }}">

                                    </div>
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Phone<sup>*</sup></label>
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Enter your phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                @if (@$user_details->delivery->country)
                                    <div class="form-item">
                                        <label class="form-label my-3">Country<sup>*</sup></label>
                                        <input type="text" name="country" class="form-control"
                                            placeholder="Enter your country" value="{{ $user_details->delivery->country }}">
                                    </div>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Country<sup>*</sup></label>
                                        <input type="text" name="country" class="form-control"
                                            placeholder="Enter your country" value="{{ old('country') }}">
                                    </div>
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif

                            </div>
                            <div class="col-md-12 col-lg-6">

                                @if (@$user_details->delivery->province)
                                    <div class="form-item">
                                        <label class="form-label my-3">Province<sup>*</sup></label>
                                        <input type="text" name="province" class="form-control"
                                            placeholder="Enter your province"
                                            value="{{ $user_details->delivery->province }}">
                                    </div>
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Province<sup>*</sup></label>
                                        <input type="text" name="province" class="form-control"
                                            placeholder="Enter your province" value="{{ old('province') }}">
                                    </div>
                                    @error('province')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                @if (@$user_details->delivery->district)
                                    <div class="form-item">
                                        <label class="form-label my-3">District<sup>*</sup></label>
                                        <input type="text" name="district" class="form-control"
                                            placeholder="Enter your district"
                                            value="{{ $user_details->delivery->district }}">
                                    </div>
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">District<sup>*</sup></label>
                                        <input type="text" name="district" class="form-control"
                                            placeholder="Enter your district">

                                    </div>

                                    @error('district')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-6">
                                @if (@$user_details->delivery->city)
                                    <div class="form-item">
                                        <label class="form-label my-3">Town/City<sup>*</sup></label>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Enter your city" value="{{ $user_details->delivery->city }}">
                                    </div>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Town/City<sup>*</sup></label>
                                        <input type="text" name="city" class="form-control"
                                            placeholder="Enter your city" value="{{ old('city') }}">
                                    </div>
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 col-lg-6">
                                @if (@$user_details->delivery->address)
                                    <div class="form-item">
                                        <label class="form-label my-3">Address <sup>*</sup></label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter your address"
                                            value="{{ $user_details->delivery->address }}">
                                    </div>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Address <sup>*</sup></label>
                                        <input type="text" class="form-control" name="address"
                                            placeholder="Enter your address" value="{{ old('address') }}">
                                    </div>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-6">
                                @if (@$user_details->delivery->area)
                                    <div class="form-item">
                                        <label class="form-label my-3">Delivery Area <sup>*</sup></label>
                                        <input type="text" class="form-control" name="area"
                                            placeholder="Enter your delivery area"
                                            value="{{ $user_details->delivery->area }}">
                                    </div>
                                    @error('area')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @else
                                    <div class="form-item">
                                        <label class="form-label my-3">Delivery Area <sup>*</sup></label>
                                        <input type="text" class="form-control" name="area"
                                            placeholder="Enter your delivery area" value="{{ old('area') }}">
                                    </div>
                                    @error('area')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                @endif
                            </div>

                        </div>

                    </div>

                    <div class="col-md-12 col-lg-12 col-xl-5">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Products</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp

                                    @foreach ($carts as $cartItem)
                                        @php
                                            $itemTotal = $cartItem->product->product_price * $cartItem->quantity;
                                            $total += $itemTotal;
                                        @endphp
                                        <tr>
                                            <th scope="row">
                                                <div class="d-flex align-items-center mt-2">
                                                    <img src="{{ $cartItem->product->product_image }}"
                                                        class="img-fluid rounded-circle"
                                                        style="width: 90px; height: 90px;" alt="">
                                                </div>
                                            </th>
                                            <td class="py-5">{{ $cartItem->product->product_name }}</td>
                                            <td class="py-5">NPR {{ $cartItem->product->product_price }}</td>
                                            <td class="py-5">{{ $cartItem->quantity }}</td>
                                            <td class="py-5">NPR
                                                {{ $cartItem->product->product_price * $cartItem->quantity }}</td>

                                        </tr>
                                        <input type="hidden" name="product_ids[]" value="{{ $cartItem->product->id }}">
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-end my-3">
                                    <label class="form-check-label" for="Paypal-1">Total:- NPR
                                        {{ $total }}</label>
                                </div>
                                <input type="hidden" name="total_amount" value="{{ $total }}">
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                            <div class="col-12">
                                <div class="form-check text-start my-3">
                                    <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1"
                                        name="payment_method" value="Esewa" required>
                                    <label class="form-check-label" for="Paypal-1">Payment via Esewa</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">

                            <button type="submit"
                                class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                                Order</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
