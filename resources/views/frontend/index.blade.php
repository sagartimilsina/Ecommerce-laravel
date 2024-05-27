@extends('frontend.layouts.main')
@section('content')
    <!-- Hero Start -->
    <div class="container-fluid ">
        <div class="container">
            <div class="row g-5 align-items-center">

                <div class="col-lg-12">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="/img/electric.jpg" class="img-fluid w-100 vh-100 bg-secondary rounded"
                                    alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Electic Accessories</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="img/colthes.jpg" class="img-fluid w-100 vh-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Clothes </a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->



    <!-- Lorem Shop Start-->
    <div class="container-fluid fruite py-5">
        <div class="container ">
            <div class="tab-class text-center">
                <div class="row ">
                    <div class="col-lg-2 text-start text-nowrap">
                        <h1>Our Products</h1>
                    </div>
                    <div class="col-lg-10 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded active" data-bs-toggle="pill" href="#tab-0">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1 text-nowrap">All Products</span>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded" data-bs-toggle="pill"
                                        href="#tab-{{ $category->id }}">
                                        <span
                                            class="text-dark w-100 px-3 pt-1 pb-1 text-nowrap">{{ $category->category_name }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div id="tab-0" class="tab-pane fade show active p-0">
                            <div class="row g-4">
                                @foreach ($products as $product)
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="{{ asset($product->product_image) }}"
                                                    class="img-fluid w-100 rounded-top" alt="{{ $product->product_name }}">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">{{ $product->product_name }}</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>{{ $product->product_name }}</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">${{ $product->product_price }}
                                                    </p>
                                                </div>
                                                <p class="">{!! Str::limit($product->product_description, 50) !!}</p>
                                                <div class="d-block flex-lg-wrap mt-3">
                                                    <form action="{{ route('add_to_cart', $product->id) }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <input type="hidden" name="quantity" value="1">
                                                        <button type="submit"
                                                            class="btn border border-secondary rounded px-3 text-primary mb-3">
                                                            <i class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                            cart
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('shop_detail', $product->id) }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        

                        @foreach ($categories as $category)
                            <div id="tab-{{ $category->id }}" class="tab-pane fade p-0">
                                <div class="row g-4">
                                    @foreach ($category->products as $product)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{ asset($product->product_image) }}"
                                                        class="img-fluid w-100 rounded-top"
                                                        alt="{{ $product->product_name }}">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px;">{{ $product->product_name }}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <div class="d-flex justify-content-between">
                                                        <h4>{{ $product->product_name }}</h4>
                                                        <p class="text-dark fs-5 fw-bold mb-1">
                                                            ${{ $product->product_price }}</p>
                                                    </div>
                                                    <p class="">{!! Str::limit($product->product_description, 50) !!}</p>
                                                    <div class="d-block flex-lg-wrap mt-3">
                                                        <form action="{{ route('add_to_cart', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <button type="submit"
                                                                class="btn border border-secondary rounded px-3 text-primary mb-3">
                                                                <i class="fa fa-shopping-cart me-2 text-primary"></i> Add
                                                                to cart
                                                            </button>
                                                        </form>
                                                        <a href="{{ route('shop_detail', $product->id) }}"
                                                            class="btn border border-secondary rounded px-3 text-primary"><i
                                                                class="fa fa-eye me-2 text-primary"></i>View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    @endsection
