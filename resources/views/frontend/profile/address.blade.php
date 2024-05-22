@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        @include('notify::components.notify')
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
            <a class="breadcrumb-item" href="{{ route('user_dashboard') }}">Profile</a>
            <span class="breadcrumb-item active  text-primary" aria-current="page">Edit Address</span>
        </nav>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Edit Address</h3>
                </div>
                <div class="card-body">
                    <div class="">
                        <h5 class="text-primary badge bg-primary text-white  p-2 m-2 mx-0">Permanent Address</h5>
                    </div>
                    <form action="{{ route('user_profile.update', ['id' => Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Country</label>
                                    <select class="form-select form-select" name="country" id="">
                                        <option selected @disabled(true)>Select one Country</option>
                                        <option value="1">Nepal</option>
                                        <option value="2">America</option>
                                        <option value="3">India</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Province/State</label>
                                    <select class="form-select form-select" name="province" id="">
                                        <option selected @disabled(true)>Select one Province</option>
                                        <option value="1">Koshi Province</option>
                                        <option value="2">Madesh Province</option>
                                        <option value="3">Bagamati Province</option>
                                        <option value="4">Gandaki Province</option>
                                        <option value="5">Lumbini Province</option>
                                        <option value="6">Karnali Province</option>
                                        <option value="7">Sudur Paschim Province</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">District</label>
                                    <select class="form-select form-select" name="district" id="">
                                        <option selected @disabled(true)>Select one district</option>
                                        <option value="1">Kathmandu</option>
                                        <option value="2">Kaski</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    value="{{ Auth::user()->city }}" placeholder="Enter Your city">
                                <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Area</label>
                                <input type="text" name="area" id="area" class="form-control"
                                    value="{{ Auth::user()->area }}" placeholder="Enter Your area">
                                <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ Auth::user()->address }}" placeholder="Enter Your address">
                                <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                            </div>

                        </div>


                        {{-- <div class="form-group">
                            <button type="submit" class="btn btn-primary   rounded mt-2">Update</button>
                        </div> --}}
                    </form>
                </div>
                <div class="card-body">
                    <div class="">
                        <h5 class="text-primary badge bg-primary text-white  p-2 m-2 mx-0">Current Address</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" checked />
                            <label class="form-check-label" for=""> Same as the Permanent Address </label>
                        </div>
                    </div>
                    <form action="{{ route('user_profile.update', ['id' => Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Country</label>
                                    <select class="form-select form-select" name="country" id="">
                                        <option selected @disabled(true)>Select one Country</option>
                                        <option value="1">Nepal</option>
                                        <option value="2">America</option>
                                        <option value="3">India</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Province/State</label>
                                    <select class="form-select form-select" name="province" id="">
                                        <option selected @disabled(true)>Select one Province</option>
                                        <option value="1">Koshi Province</option>
                                        <option value="2">Madesh Province</option>
                                        <option value="3">Bagamati Province</option>
                                        <option value="4">Gandaki Province</option>
                                        <option value="5">Lumbini Province</option>
                                        <option value="6">Karnali Province</option>
                                        <option value="7">Sudur Paschim Province</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">District</label>
                                    <select class="form-select form-select" name="district" id="">
                                        <option selected @disabled(true)>Select one district</option>
                                        <option value="1">Kathmandu</option>
                                        <option value="2">Kaski</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    value="{{ Auth::user()->city }}" placeholder="Enter Your city">
                                <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Area</label>
                                <input type="text" name="area" id="area" class="form-control"
                                    value="{{ Auth::user()->area }}" placeholder="Enter Your area">
                                <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ Auth::user()->address }}" placeholder="Enter Your address">
                                <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                            </div>

                        </div>


                        {{-- <div class="form-group">
                            <button type="submit" class="btn btn-primary   rounded mt-2">Update</button>
                        </div> --}}
                    </form>
                </div>
                <div class="card-body">
                    <div class="">
                        <h5 class="text-primary badge bg-primary text-white  p-2 m-2 mx-0">Delivery Address</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="" checked />
                            <label class="form-check-label" for=""> Same as the Permanent Address </label>
                        </div>
                    </div>
                    <form action="{{ route('user_profile.update', ['id' => Auth::user()->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Country</label>
                                    <select class="form-select form-select" name="country" id="">
                                        <option selected @disabled(true)>Select one Country</option>
                                        <option value="1">Nepal</option>
                                        <option value="2">America</option>
                                        <option value="3">India</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Province/State</label>
                                    <select class="form-select form-select" name="province" id="">
                                        <option selected @disabled(true)>Select one Province</option>
                                        <option value="1">Koshi Province</option>
                                        <option value="2">Madesh Province</option>
                                        <option value="3">Bagamati Province</option>
                                        <option value="4">Gandaki Province</option>
                                        <option value="5">Lumbini Province</option>
                                        <option value="6">Karnali Province</option>
                                        <option value="7">Sudur Paschim Province</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">District</label>
                                    <select class="form-select form-select" name="district" id="">
                                        <option selected @disabled(true)>Select one district</option>
                                        <option value="1">Kathmandu</option>
                                        <option value="2">Kaski</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">City</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    value="{{ Auth::user()->city }}" placeholder="Enter Your city">
                                <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Area</label>
                                <input type="text" name="area" id="area" class="form-control"
                                    value="{{ Auth::user()->area }}" placeholder="Enter Your area">
                                <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ Auth::user()->address }}" placeholder="Enter Your address">
                                <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                            </div>

                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary   rounded mt-2">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
