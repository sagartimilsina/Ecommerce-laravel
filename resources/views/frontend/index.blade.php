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
                                <a class="d-flex m-2 py-2 bg-light rounded active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1  text-nowrap ">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1  text-nowrap">Electronic Accessories</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1  text-nowrap">Groceries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1  text-nowrap">Men Fashion</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded" data-bs-toggle="pill" href="#tab-5">
                                    <span class="text-dark w-100 px-3 pt-1 pb-1  text-nowrap">Women Fashion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 col-xl-3">
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img">
                                                <img src="img/fruite-item-2.jpg" class="img-fluid w-100 rounded-top"
                                                    alt="">
                                            </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                                style="top: 10px; left: 10px;">Lorem</div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                <div class="d-flex justify-content-between">
                                                    <h4>Lorem</h4>
                                                    <p class="text-dark fs-5 fw-bold mb-1">$4.99 / kg</p>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                    incididunt</p>

                                                <div class="d-block  flex-lg-wrap">
                                                    <a href="{{ route('cart') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary mb-3"><i
                                                            class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                                        cart</a>
                                                    <a href="{{ route('shop_detail') }}"
                                                        class="btn border border-secondary rounded px-3 text-primary"><i
                                                            class="fa fa-eye me-2 text-primary"></i>View
                                                        Details</a>

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
    <!-- Lorem Shop End-->
    <div class="container-fluid vesitable ">
        <div class="container ">
            <h1 class="mb-0">Just for you</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <div class="border border-primary rounded position-relative vesitable-item ">
                    <div class="vesitable-img">
                        <img src="/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">

                        <div class="d-flex justify-content-between">
                            <h4>Bell Papper</h4>
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-block text-center">

                            <a href="{{ route('cart') }}"
                                class="btn border border-secondary rounded mb-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                            <a href="{{ route('shop_detail') }}"
                                class="btn border border-secondary rounded text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View Details</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item ">
                    <div class="vesitable-img">
                        <img src="/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">

                        <div class="d-flex justify-content-between">
                            <h4>Bell Papper</h4>
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-block text-center">

                            <a href="{{ route('cart') }}"
                                class="btn border border-secondary rounded mb-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                            <a href="{{ route('shop_detail') }}"
                                class="btn border border-secondary rounded text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View Details</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item ">
                    <div class="vesitable-img">
                        <img src="/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">

                        <div class="d-flex justify-content-between">
                            <h4>Bell Papper</h4>
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-block text-center">

                            <a href="{{ route('cart') }}"
                                class="btn border border-secondary rounded mb-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                            <a href="{{ route('shop_detail') }}"
                                class="btn border border-secondary rounded text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View Details</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item ">
                    <div class="vesitable-img">
                        <img src="/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">

                        <div class="d-flex justify-content-between">
                            <h4>Bell Papper</h4>
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-block text-center">

                            <a href="{{ route('cart') }}"
                                class="btn border border-secondary rounded mb-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                            <a href="{{ route('shop_detail') }}"
                                class="btn border border-secondary rounded text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View Details</a>
                        </div>
                    </div>
                </div>
                <div class="border border-primary rounded position-relative vesitable-item ">
                    <div class="vesitable-img">
                        <img src="/img/vegetable-item-4.jpg" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                        style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">

                        <div class="d-flex justify-content-between">
                            <h4>Bell Papper</h4>
                            <p class="text-dark fs-5 fw-bold mb-0">$7.99 / kg</p>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                        <div class="d-block text-center">

                            <a href="{{ route('cart') }}"
                                class="btn border border-secondary rounded mb-3 text-primary"><i
                                    class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                            <a href="{{ route('shop_detail') }}"
                                class="btn border border-secondary rounded text-primary"><i
                                    class="fa fa-eye me-2 text-primary"></i>View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vesitable Shop End -->
@endsection
