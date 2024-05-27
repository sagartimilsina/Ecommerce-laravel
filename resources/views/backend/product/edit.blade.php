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
                                        <h4 class="page-title text-left">Product Management</h4>
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}">Home</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product
                                                    Lists</a>
                                            </li>
                                            <li class="breadcrumb-item active text-primary"><a
                                                    href="javascript:void(0);">Product
                                                    Edit</a></li>

                                        </ol>
                                    </div>
                                    <div class="col-sm-6 text-end">
                                        <div class="float-right d-none d-md-block">
                                            <div class="">
                                                <a href="{{ route('products.index') }}" data-toggle="modal"
                                                    class="btn btn-primary btn-sm btn-flat">
                                                    <i class="fa-solid fa-arrow-left px-1"></i>View</a>
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
                                                    <div class="col-xxl">
                                                        <div class="card mb-4">
                                                            <div class="card-body">
                                                                <form action="{{ route('products.update', $product->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" name="product_image_old"
                                                                        value="{{ $product->product_image }}">
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label for=""
                                                                                class="form-label text-primary">Category<span
                                                                                    class="text-danger">*</span></label>
                                                                            <select class="form-select form-select"
                                                                                name="category_id" id="">
                                                                                <option disabled>Select one Category
                                                                                </option>
                                                                                @foreach ($categories as $category)
                                                                                    <option value="{{ $category->id }}"
                                                                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                                                        {{ $category->category_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <div class="text-danger m-2">
                                                                                @error('category_id')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label class="form-label text-primary"
                                                                                for="">Product Name<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="product_name"
                                                                                class="form-control" id="product_name"
                                                                                placeholder="Enter your Product name"
                                                                                value="{{ old('product_name', $product->product_name) }}" />
                                                                            <div class="text-danger m-2">
                                                                                @error('product_name')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-2">
                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label for="form-label"
                                                                                class="text-primary">Image: <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="file" class="form-control"
                                                                                name="product_image" placeholder="image"
                                                                                onchange="previewFile(this)">
                                                                            <div class="text-danger m-2">
                                                                                @error('product_image')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                            <div class="d-flex justify-content-between">
                                                                                <div>
                                                                                    <img src="{{ asset($product->product_image) }}"
                                                                                        alt="" width="120px"
                                                                                        height="120px">
                                                                                </div>
                                                                                <div id="anotherDisplaySelectedImage"></div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label class="text-primary form-label"
                                                                                for="">Product Price:<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="product_price"
                                                                                class="form-control m-0" id="product_price"
                                                                                placeholder="Enter your Product price"
                                                                                value="{{ old('product_price', $product->product_price) }}" />
                                                                            <div class="text-danger m-2">
                                                                                @error('product_price')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label class="form-label text-primary"
                                                                                for="image-category">Product Quantity:<span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="product_quantity"
                                                                                class="form-control" id="product_quantity"
                                                                                placeholder="Enter your Product quantity"
                                                                                value="{{ old('product_quantity', $product->product_quantity) }}" />
                                                                            <div class="text-danger m-2">
                                                                                @error('product_quantity')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-12">
                                                                            <label class="form-label text-primary"
                                                                                for="image-category">Product
                                                                                Discount:</label>
                                                                            <input type="text" name="product_discount"
                                                                                class="form-control" id="product_discount"
                                                                                placeholder="Enter your Product discount"
                                                                                value="{{ old('product_discount', $product->product_discount) }}" />
                                                                            <div class="text-danger m-2">
                                                                                @error('product_discount')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="parent page "
                                                                            class="form-label text-primary">Product
                                                                            Description:</label>
                                                                        <textarea id="editor" class="form-control" name="product_description" placeholder="Enter description">{{ old('product_description', $product->product_description) }}</textarea>
                                                                        <div class="text-danger m-2">
                                                                            @error('product_description')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <button type="submit"
                                                                            class="btn btn-md btn-primary bg-primary"
                                                                            >Update</button>
                                                                    </div>
                                                                </form>

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
    </div>
    <script>
        function previewFile(input) {
            var preview = document.getElementById('anotherDisplaySelectedImage');
            preview.innerHTML = ''; // Clear previous preview

            var file = input.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Selected Image';
                img.className = 'mx-auto my-2';
                img.style.maxWidth = '200px';
                img.style.maxHeight = '200px';
                preview.appendChild(img);
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
