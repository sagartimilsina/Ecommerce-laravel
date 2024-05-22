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
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">
                        All
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">
                        To Pay
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
                        type="button" role="tab" aria-controls="messages" aria-selected="false">
                        To Recieve
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active mt-2" id="home" role="tabpanel" aria-labelledby="home-tab">

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
                                    <td><img src="img/vegetable-item-1.jpg" alt="" width="50" height="50">
                                    </td>
                                    <td>1000</td>
                                    <td class="text-success">Delivered/Pending</td>
                                    <td><a href="{{ route('user_orders_details') }}" class="btn btn-primary">Manage</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane mt-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                                    <td><img src="img/vegetable-item-1.jpg" alt="" width="50" height="50">
                                    </td>
                                    <td>1000</td>
                                    <td class="text-danger">Payment Pending</td>
                                    <td><a href="{{ route('user_orders_details') }}" class="btn btn-primary">Manage</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane mt-2" id="messages" role="tabpanel" aria-labelledby="messages-tab">
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
                                    <td><img src="img/vegetable-item-1.jpg" alt="" width="50" height="50">
                                    </td>
                                    <td>1000</td>
                                    <td class="text-success">Delivered</td>
                                    <td><a href="{{ route('user_orders_details') }}" class="btn btn-primary">Manage</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>

        </div>
    </main>
@endsection
