@extends('frontend.layouts.main')

@section('content')
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite ">
        <div class="container ">
            <h1 class="mb-4"> Shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-md bg-light me-3"
                                    form="fruitform">
                                    <option value="volvo">Nothing</option>
                                    <option value="saab">Popularity</option>
                                    <option value="opel">Organic</option>
                                    <option value="audi">Fantastic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Apples</a>
                                                    <span>(3)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                                    <span>(2)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                                    <span>(8)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex justify-content-between fruite-name">
                                                    <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                                    <span>(5)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4 class="mb-2">Price</h4>
                                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                            min="0" max="500" value="0"
                                            oninput="amount.value=rangeInput.value">
                                        <output id="amount" name="amount" min-velue="0" max-value="500"
                                            for="rangeInput">0</output>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row g-4 justify-content-center">
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-4">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top"
                                                alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;">Fruits</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <div class="d-flex justify-content-between">
                                                <h4>Grapes</h4>
                                                <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                                            </div>

                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te
                                                incididunt</p>
                                            <div class="d-block text-center">

                                                <a href="{{ route('cart') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-shopping-cart me-2 text-primary"></i> Add to cart</a>
                                                <a href="{{ route('shop_detail') }}"
                                                    class="btn border border-secondary rounded px-3 mb-3 text-primary"><i
                                                        class="fa fa-eye me-2 text-primary"></i>View Shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->
@endsection
