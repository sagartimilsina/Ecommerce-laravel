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
                                                    href="javascript:void(0);">Delivered Orders List</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <h3 class="card-title fs-4 m-3 mb-2 text-primary">Delivered Orders</h3>
                                <div class="card-body">



                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($delivered_orders as $order)
                                                @if (@$order->payment->payment_status == 'Verified')
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $order->user->name }}</td>
                                                        <td>{{ $order->user->email }}</td>

                                                        <td>{{ $order->user->phone }}</td>
                                                        <td>{{ $order->user->delivery->address }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('show_all_users_delivered_orders', $order->user->id) }}">
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>
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
