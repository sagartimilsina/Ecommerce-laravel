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
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" width="100"
                                height="100">
                            <p class="card-text mt-2 mb-1">Sagar Timislina</p>
                            <p class="card-text mb-1">timilsinasagar03@gmail.com</p>
                            <p class="card-text mb-1">(+977) 9819113548</p>
                            <a href="{{ route('user_profile.edit', ['id' => Auth::user()->id]) }}"
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
                                <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                                <p class="card-text">Sarangkot-18, Bhakunde</p>
                                <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                                <p class="card-text">(+977) 9819113548</p>
                                {{-- <a href="{{ route('address_update') }}"
                                    class="btn btn-primary  border border-secondary rounded mt-2">Edit
                                    Permanent Address</a> --}}
                            </div>
                            <div class="card-body col-lg-4 col-12 p-4 col-md-6">
                                <p class="card-text text-muted mb-2">Temporary Address</p>
                                <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                                <p class="card-text">Sarangkot-18, Bhakunde</p>
                                <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                                <p class="card-text">(+977) 9819113548</p>
                                {{-- <a href="{{ route('address_update') }}"
                                    class="btn btn-primary  border border-secondary rounded mt-2">Edit Temporary
                                    Address</a> --}}
                            </div>
                            <div class="card-body col-lg-4 col-12 p-4 col-md-6">
                                <p class="card-text text-muted mb-2">Delivery Address</p>
                                <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                                <p class="card-text">Sarangkot-18, Bhakunde</p>
                                <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                                <p class="card-text">(+977) 9819113548</p>
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
        <div class="container py-3">
            <h1 class="text-primary mb-3 fs-5">Recent Orders</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-borderless table-primary align-middle">
                    <thead class="table-dark">

                        <tr>
                            <th>SN</th>
                            <th>Order No</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="table-primary">
                            <td scope="row">1</td>
                            <td>46465</td>
                            <td>2024/5/22</td>
                            <td><img src="img/vegetable-item-1.jpg" alt="" width="50" height="50"></td>
                            <td>1000</td>
                            <td class="text-success">Delivered</td>
                            <td><a href="" class="btn btn-primary">Manage</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
@endsection
