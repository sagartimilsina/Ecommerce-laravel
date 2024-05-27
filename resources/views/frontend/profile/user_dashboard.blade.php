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
        <div class="container py-3">
            <h1 class="text-primary mb-3 fs-5">Hello, Sagar Timislina</h1>
            <div class="row">
                <div class=" col-lg-4 col-md-12 col-sm-12 ">
                    <div class="card shadow m-2">
                        <h5 class="card-title card-header">Personal Profile</h5>
                        <div class="card-body ">
                            <img src="{{ asset('uploads/profile/' . Auth::user()->profile_photo_path) }}" alt=""
                                width="100" height="100">
                            <p class="card-text mt-2 mb-1">{{ @Auth::user()->name }}</p>
                            <p class="card-text mb-1">{{ @Auth::user()->email }}</p>
                            <p class="card-text mb-1">(+977) {{ @Auth::user()->phone }}</p>
                            <a href="{{ route('user_profile.edit', ['id' => @Auth::user()->id]) }}"
                                class="btn btn-primary border border-secondary rounded mt-2">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-8  col-md-12 col-sm-12  ">
                    <div class="card shadow m-2">
                        <h5 class="card-title mb-2 card-header">Address </h5>
                        <div class="row justify-content-between">
                            <div class="card-body  col-lg-4 col-12 p-4 col-md-6">
                                <p class="card-text text-muted mb-2">Permanent Address</p>
                                <h6 class="card-subtitle mb-2 ">{{ @Auth::user()->name }}</h6>
                                <p class="card-text">{{ @Auth::user()->permanent_address->address }}</p>
                                <p class="card-text"> {{ @Auth::user()->permanent_address->province }} -
                                    {{ @Auth::user()->permanent_address->city }} -
                                    {{ @Auth::user()->permanent_address->area }} </p>
                                <p class="card-text">(+977) {{ @Auth::user()->phone }}</p>
                                {{-- <a href="{{ route('address_update') }}"
                                    class="btn btn-primary  border border-secondary rounded mt-2">Edit
                                    Permanent Address</a> --}}
                            </div>
                            <div class="card-body col-lg-4 col-12 p-4 col-md-6">
                                <p class="card-text text-muted mb-2">Temporary Address</p>
                                <h6 class="card-subtitle mb-2 ">{{ @Auth::user()->name }}</h6>
                                <p class="card-text">{{ @Auth::user()->temporary_address->address }}</p>
                                <p class="card-text"> {{ @Auth::user()->temporary_address->province }} -
                                    {{ @Auth::user()->temporary_address->city }} -
                                    {{ @Auth::user()->temporary_address->area }}</p>
                                <p class="card-text">(+977) {{ @Auth::user()->phone }}</p>
                                {{-- <a href="{{ route('address_update') }}"
                                    class="btn btn-primary  border border-secondary rounded mt-2">Edit Temporary
                                    Address</a> --}}
                            </div>
                            <div class="card-body col-lg-4 col-12 p-4 col-md-6">
                                <p class="card-text text-muted mb-2">Delivery Address</p>
                                <h6 class="card-subtitle mb-2 ">{{ @Auth::user()->name }}</h6>
                                <p class="card-text">{{ @Auth::user()->delivery->address }}</p>
                                <p class="card-text"> {{ @Auth::user()->delivery->province }} -
                                    {{ @Auth::user()->delivery->city }} - {{ @Auth::user()->delivery->area }} </p>
                                <p class="card-text">(+977) {{ @Auth::user()->phone }}</p>
                                {{-- <a href="{{ route('address_update') }}"
                                    class="btn btn-primary  border border-secondary rounded mt-2">Edit Temporary
                                    Address</a> --}}
                            </div>
                        </div>
                        <div class="m-3 mt-0 ">
                            <a href="{{ route('address_update') }}"
                                class="btn btn-primary  border border-secondary rounded mt-2">Edit Address</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
