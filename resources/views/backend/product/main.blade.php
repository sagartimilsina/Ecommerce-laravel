@extends('backend.layouts.main')
@section('title', 'Ecommerce ')
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
                                        <h4 class="page-title text-left">Product Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Product
                                                    List</a></li>

                                        </ol>
                                    </div>

                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('products.create') }}" data-toggle="modal"
                                                    class="btn btn-primary btn-sm btn-flat">
                                                    <i class="fa-solid fa-plus px-1"></i>Add</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <table id="datatable-buttons"
                                                                class="table table-striped table-bordered dt-responsive nowrap"
                                                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-priority="1">SN</th>

                                                                        <th data-priority="4">Product Name</th>
                                                                        <th data-priority="4">Category Name</th>
                                                                        <th data-priority="4">ProductImage</th>
                                                                        <th data-priority="4">Price</th>
                                                                        <th data-priority="4">Quantity</th>
                                                                        {{-- <th data-priority="4">Status</th> --}}
                                                                        <th data-priority="7">Actions</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($products as $product)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>

                                                                            <td>{{ $product->product_name }}</td>
                                                                            <td>{{ $product->category->category_name }}</td>
                                                                            <td>{{ $product->product_price }}</td>
                                                                            @if (@$product->product_image)
                                                                                <td>
                                                                                    <img height="70px" width="70px"
                                                                                        src="{{ asset($product->product_image) }}"
                                                                                        alt="" class="img-fluid">
                                                                                </td>
                                                                            @else
                                                                                <td>Images not available</td>
                                                                            @endif
                                                                            <td>{{ $product->product_quantity }}</td>
                                                                            {{-- <td>{{ $product->product_status }}</td> --}}
                                                                            <td class="text-center">
                                                                                <a href="#" class="text-primary mx-1"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#sociallinkModalEdit_{{ $product->id }}"><i
                                                                                        class="fa fa-eye "></i></a>
                                                                                <!-- Modal -->
                                                                                <div class="modal fade"
                                                                                    id="sociallinkModalEdit_{{ $product->id }}"
                                                                                    tabindex="-1" sociallink="dialog"
                                                                                    aria-labelledby="sociallinkModalLabel_{{ $product->id }}"
                                                                                    aria-hidden="true">
                                                                                    <div
                                                                                        class="modal-dialog modal-xl  modal-dialog-centered">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h5 class="modal-title"
                                                                                                    id="productModalLabel{{ $product->id }}">
                                                                                                    Product Description</h5>
                                                                                                <button type="button"
                                                                                                    class="btn-close"
                                                                                                    data-bs-dismiss="modal"><i
                                                                                                        class="fa fa-times fs-5 text-danger"
                                                                                                        aria-hidden="true"></i></button>
                                                                                            </div>
                                                                                            <div class="modal-body">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        for="product_description"
                                                                                                        class="form-label text-primary">Product
                                                                                                        Description:</label>
                                                                                                    <textarea id="editor{{ $product->id }}" class="form-control" name="product_description"
                                                                                                        placeholder="Enter description">{{ old('product_description', $product->product_description) }}</textarea>
                                                                                                    <div
                                                                                                        class="text-danger m-2">
                                                                                                        @error('product_description')
                                                                                                            {{ $message }}
                                                                                                        @enderror
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="modal-footer">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary bg-danger"
                                                                                                        data-bs-dismiss="modal">Close</button>
                                                                                                </div>
                                                                                                </form>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <a href="{{ route('products.edit', $product->id) }}"
                                                                                    class=" text-info"><i
                                                                                        class="fa fa-edit px-1"></i></a>
                                                                                <form
                                                                                    action="{{ route('products.destroy', $product->id) }}"
                                                                                    method="post" class="d-inline">
                                                                                    @csrf
                                                                                    @method('delete')
                                                                                    <button
                                                                                        class="text-danger delete btn-flat"
                                                                                        onclick="return confirm('Are you sure to delete ')"><i
                                                                                            class='fa fa-trash px-1'></i>
                                                                                    </button>

                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="py-1 px-4">
                                                            {{ $products->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach ($products as $product)
                CKEDITOR.replace('editor{{ $product->id }}', {
                    readOnly: true
                });
            @endforeach
        });
    </script>

@endsection
