@extends('frontend.layouts.main')

@section('content')
    <!-- Single Product Start -->
    <div class="container-fluid">
        <div class="container mt-2">
            <div class="row g-4 mb-5">
                <div class="col-lg-12 col-xl-12">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded">
                                <a href="#">
                                    <img src="{{ asset($product->product_image) }}" class="img-fluid rounded w-100"
                                        alt="Image" style="object-fit: contain">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{ $product->product_name }}</h4>
                            <p class="mb-3">Category: {{ $product->category->category_name }}</p>
                            <h5 class="fw-bold mb-3">NPR {{ $product->product_price }}</h5>
                            <p class="mb-4">{!! $product->product_description !!}</p>

                        </div>
                        <form action="{{ route('add_to_cart', $product->id) }}" method="POST">
                            @csrf
                            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn border border-secondary rounded px-3 text-primary mb-3">
                                <i class="fa fa-shopping-cart me-2 text-primary"></i> Add to
                                cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h1 class="fw-bold mb-0">Related products</h1>

            <div class="vesitable">
                <div class="owl-carousel vegetable-carousel justify-content-center">
                    @foreach ($related_product as $similar_product)
                        <div class="border border-primary rounded position-relative vesitable-item">
                            <div class="vesitable-img">
                                <img src="{{ asset($similar_product->product_image) }}" class="img-fluid w-100 rounded-top"
                                    alt="">
                            </div>
                            <div class="text-white bg-primary px-3 py-1 rounded position-absolute"
                                style="top: 10px; right: 10px;">{{ $similar_product->category->category_name }}</div>
                            <div class="p-4 pb-0 rounded-bottom">
                                <h4>{{ $similar_product->product_name }}</h4>
                                <p>{!! \Illuminate\Support\Str::limit($similar_product->product_description, 50) !!}</p>
                                <p class="text-dark fs-5 fw-bold">NPR {{ $similar_product->product_price }}</p>
                                <div class="d-flex justify-content-center flex-lg-wrap">
                                    <a href="{{ route('cart', $similar_product->id) }}"
                                        class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                    <a href="{{ route('shop_detail', $similar_product->id) }}"
                                        class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                            class="fa fa-eye me-2 text-primary"></i>View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
        <!-- Single Product End -->
    @endsection
