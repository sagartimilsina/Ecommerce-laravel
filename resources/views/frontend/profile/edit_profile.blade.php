@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        @include('notify::components.notify')
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
            <a class="breadcrumb-item" href="{{ route('user_dashboard') }}">Profile</a>
            <span class="breadcrumb-item active  text-primary" aria-current="page">Edit Profile</span>
        </nav>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-6">
                            <h3 class="text-primary m-2">Edit Profile</h3>
                        </div>
                        <div class="col-md-6 text-end">
                            <a class="btn btn-primary btn-sm" href="{{ route('account_details') }}">Edit Account
                                Credentials</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user_profile.update', ['id' => Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ Auth::user()->name }}">
                                <div class="text-danger p-2">{{ $errors->first('name') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-sm-12">
                                <label for="dob">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control"
                                    value="{{ Auth::user()->dob }}">
                                <div class="text-danger p-2">{{ $errors->first('dob') }}</div>
                            </div>
                            <div class="form-group col-lg-4  col-sm-12">
                                <label for="" class="form-label">Gender</label>
                                <select class="form-select form-control " name="gender" id="">
                                    <option selected @disabled(true)>Select one</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Others</option>
                                </select>
                                <div class="text-danger p-2">{{ $errors->first('gender') }}</div>


                            </div>


                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="profile">Upload Your Photo</label>
                                <input type="file" name="profile" id="profile" class="form-control"
                                    value="{{ Auth::user()->profile }}">
                                <div class="text-danger p-2">{{ $errors->first('profile') }}</div>

                                <div class="img m-1 mb-2">
                                    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt=""
                                        width="100" height="100" class="img-fluid rounded">
                                </div>
                            </div>
                            @if (Auth::user()->email !== null)
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="dob">Phone</label>
                                    <input type="number" name="phone" id="phone" class="form-control"
                                        value="{{ Auth::user()->phone }}" placeholder="Enter Your Phone">
                                    <div class="text-danger p-2">{{ $errors->first('phone') }}</div>
                                </div>
                            @else
                                <div class="form-group col-lg-6 col-sm-12">
                                    <label for="dob">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ Auth::user()->email }}" placeholder="Enter Your Email">
                                    <div class="text-danger p-2">{{ $errors->first('email') }}</div>
                                </div>
                            @endif
                        </div>

                        {{-- <div class="form-group col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ Auth::user()->email }}">
                            <div class="text-danger p-2">{{ $errors->first('email') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <div class="text-danger p-2">{{ $errors->first('password') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            <div class="text-danger p-2">{{ $errors->first('confirm_password') }}</div>
                        </div> --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary   rounded mt-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
