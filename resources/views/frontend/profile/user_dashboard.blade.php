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
            <div class="d-flex g-4  ">
                <div class="profile-lists col-lg-3">
                    <div class="profile-sidebar">
                        <h1 class="text-primary mb-3 fs-5">Hello, Sagar Timislina</h1>
                        <ul class="list-group">
                            <li class="text-primary ">Manage My Orders</li>
                            <div class="mx-3 mb-3">

                                <li>My Orders</li>
                                <li>My Returns</li>
                                <li>My Cancellations</li>
                            </div>
                        </ul>
                        <ul class="list-group">
                            <li class="text-primary "> My Wishlist</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-lg-4 m-2 shadow">
                        <h5 class="card-title card-header">Personal Profile</h5>
                        <div class="card-body ">
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="" width="100"
                                height="100">
                            <p class="card-text mt-2 mb-1">Sagar Timislina</p>
                            <p class="card-text mb-1">timilsinasagar03@gmail.com</p>
                            <a href="#" class="btn btn-primary  border border-secondary rounded mt-2">Edit Profile</a>
                        </div>
                    </div>
                    <div class="card col-lg-7 m-2 shadow">
                        <h5 class="card-title mb-2 card-header">Address </h5>
                        <div class="d-flex justify-content-between">
                            <div class="card-body">
                                <p class="card-text text-muted mb-2">Default Delivery Address</p>
                                <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                                <p class="card-text">Sarangkot-18, Bhakunde</p>
                                <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                                <p class="card-text">(+977) 9819113548</p>
                                <a href="#" class="btn btn-primary  border border-secondary rounded mt-2">Edit
                                    Delivery Address</a>
                            </div>
                            <div class="vertical-line"></div>
                            <div class="card-body">
                                <p class="card-text text-muted mb-2">Default Billing Address</p>
                                <h6 class="card-subtitle mb-2 ">Sagar Timislina</h6>
                                <p class="card-text">Sarangkot-18, Bhakunde</p>
                                <p class="card-text"> Gandaki Province - Pokhara - Baidam Area </p>
                                <p class="card-text">(+977) 9819113548</p>
                                <a href="#" class="btn btn-primary  border border-secondary rounded mt-2">Edit Billing
                                    Address</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
