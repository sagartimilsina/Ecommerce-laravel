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
                                                    href="javascript:void(0);">Pending Orders List</a></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="card mt-4">
                                <h3 class="card-title fs-4 m-3 mb-1 text-primary">Pending Orders</h3>
                                <a href="{{ route('pending_order') }}" class=" "><button
                                        class="btn btn-primary m-3 mb-1">Back</button></a>
                                <div class="card-body">



                                    <table class="table table-striped table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Total Amount</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pending_orders as $order)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $order->date }}</td>
                                                    <td>{{ $order->product->product_name }}</td>
                                                    <td>{{ $order->quantity }}</td>

                                                    <td>{{ $order->user->phone }}</td>
                                                    <td>{{ $order->user->delivery->address }}</td>
                                                    <td>NPR {{ $order->payment->payment_amount }}</td>
                                                    <td>
                                                        @if($order->order_status == 'Delivered')
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
                                                    <td class="text-center">
                                                        <a href="#" class="btn-sm btn btn-primary mx-1"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#sociallinkModalEdit_{{ $order->id }}">
                                                            <i class="fa fa-edit px-1"></i>Edit
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="sociallinkModalEdit_{{ $order->id }}" tabindex="-1"
                                                            sociallink="dialog"
                                                            aria-labelledby="sociallinkModalLabel_{{ $order->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog  modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                                            Change the Order Status
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"> <i
                                                                                class="fa fa-times fs-5 text-danger"
                                                                                aria-hidden="true "></i></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form
                                                                            action="{{ route('orders_status.update', $order->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('put')
                                                                            <div class="input-group mb-3">
                                                                                <select class="form-select"
                                                                                    name="order_status"
                                                                                    id="inputGroupSelect02">
                                                                                    <option value="pending" selected
                                                                                        disabled>Select
                                                                                        one</option>
                                                                                    <option value="Delivered"
                                                                                        {{ $order->order_status == 'Delivered' ? 'selected' : '' }}>
                                                                                        Delivered</option>
                                                                                    <option value="Cancelled"
                                                                                        {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>
                                                                                        Cancelled</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit"
                                                                                    class="btn btn-info bg-info">Submit</button>
                                                                                <button type="button"
                                                                                    class="btn btn-danger bg-danger"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- @if ($status === 'Delivered')
                                                                    
                                                                <form action="{{ route('order.destroy', $order->id) }}" method="post" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-sm delete btn-flat" onclick="return confirm('Are you sure to delete ')">
                                                                        <i class='fa fa-trash'></i> Delete
                                                                    </button>
                                                                </form>
                                                                @endif --}}
                                                    </td>
                                                </tr>
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
