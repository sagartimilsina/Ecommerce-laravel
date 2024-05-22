<!-- Navbar start -->
<div class="container px-0">
    <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="{{ route('index') }}" class="navbar-brand">
            <h1 class="text-primary display-6">E-Site</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
            <div class="navbar-nav mx-auto ">
                <a href="{{ route('index') }}" class="nav-item nav-link active fs-5">Home</a>
                {{-- <a href="{{ route('about') }}" class="nav-item nav-link fs-5 ">About</a> --}}
                <a href="{{ route('shop') }}" class="nav-item nav-link fs-5">Shop</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link fs-5">Contact</a>


            </div>
            <div class="">
                <input class="form-control border-2 border-primary  rounded w-100" type="text"
                    placeholder="Search here">
            </div>

            <div class="d-flex m-3 me-0">

                <a href="{{ route('cart') }}" class="position-relative me-4 my-auto">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                    <span
                        class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                </a>

                @auth
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link " data-bs-toggle="dropdown"> <i class="fas fa-user fa-2x"></i></a>

                        <div class="dropdown-menu m-0  bg-secondary rounded-0">
                            <a class="dropdown-item" href="{{ route('user_dashboard') }}">My Profile</a>
                          

                            <a class="dropdown-item" href="{{ route('user_orders_lists') }}">My Order</a>
                            <form action="{{ route('logout') }}" method="POST">@csrf <input type="submit"
                                    class="dropdown-item" value="Logout"></form>
                            {{-- <a class="dropdown-item" href="{{route('logout')}}">Logout</a> --}}
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="btn  border  border-secondary p-0 px-3 p-2 text-primary">Login</a>
                @endguest
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
