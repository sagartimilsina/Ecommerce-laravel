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
                    @if (@$editpermanentaddress)
                        <form action="{{ route('update_permanent_address', $editpermanentaddress->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" id=""
                                            value="{{ @Auth::user()->permanent_address->country }}"
                                            placeholder="Enter your country">

                                    </div>
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province/State</label>
                                        <input type="text" class="form-control" name="province"
                                            value="{{ @Auth::user()->permanent_address->province }}" id=""
                                            placeholder="Enter your province">
                                    </div>
                                    @error('province')
                                        {{ $message }}
                                    @enderror

                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="district" class="form-label">District</label>
                                        <input type="text" class="form-control" name="district"
                                            value="{{ @Auth::user()->permanent_address->district }}" id=""
                                            placeholder="Enter your district">
                                    </div>
                                    @error('district')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ @Auth::user()->permanent_address->city }}" placeholder="Enter Your city">
                                    <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="area">Area</label>
                                    <input type="text" name="area" id="area" class="form-control"
                                        value="{{ @Auth::user()->permanent_address->area }}" placeholder="Enter Your area">
                                    <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ @Auth::user()->permanent_address->address }}"
                                        placeholder="Enter Your address">
                                    <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded mt-2">Update</button>
                            </div>
                        </form>
                    @else
                        <form action="{{ route('create_permanent_address') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" id=""
                                            value="{{ old('country') }}" placeholder="Enter your country">

                                    </div>
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province/State</label>
                                        <input type="text" class="form-control" name="province"
                                            value="{{ old('province') }}" id=""
                                            placeholder="Enter your province">
                                    </div>
                                    @error('province')
                                        {{ $message }}
                                    @enderror

                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="district" class="form-label">District</label>
                                        <input type="text" class="form-control" name="district"
                                            value="{{ old('district') }}" id=""
                                            placeholder="Enter your district">
                                    </div>
                                    @error('district')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ old('city') }}" placeholder="Enter Your city">
                                    <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="area">Area</label>
                                    <input type="text" name="area" id="area" class="form-control"
                                        value="{{ old('area') }}" placeholder="Enter Your area">
                                    <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ old('address') }}" placeholder="Enter Your address">
                                    <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded mt-2">Create</button>
                            </div>
                        </form>
                    @endif




                </div>
                <div class="card-body">
                    <div class="">
                        <h5 class="text-primary badge bg-primary text-white  p-2 m-2 mx-0">Current Address</h5>

                    </div>
                    @if ($edittemporaryaddress)
                        <form action="{{ route('update_temporary_address', $edittemporaryaddress->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" id=""
                                                value="{{ @Auth::user()->temporary_address->country }}"
                                                placeholder="Enter your country">

                                        </div>
                                        @error('country')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label for="province" class="form-label">Province/State</label>
                                            <input type="text" class="form-control" name="province"
                                                value="{{ @Auth::user()->temporary_address->province }}" id=""
                                                placeholder="Enter your province">
                                        </div>
                                        @error('province')
                                            {{ $message }}
                                        @enderror

                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label for="district" class="form-label">District</label>
                                            <input type="text" class="form-control" name="district"
                                                value="{{ @Auth::user()->temporary_address->district }}" id=""
                                                placeholder="Enter your district">
                                        </div>
                                        @error('district')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            value="{{ @Auth::user()->temporary_address->city }}"
                                            placeholder="Enter Your city">
                                        <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <label for="area">Area</label>
                                        <input type="text" name="area" id="area" class="form-control"
                                            value="{{ @Auth::user()->temporary_address->area }}"
                                            placeholder="Enter Your area">
                                        <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            value="{{ @Auth::user()->temporary_address->address }}"
                                            placeholder="Enter Your address">
                                        <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary rounded mt-2">Update</button>
                                </div>
                            </div>
                        </form>
                </div>
            @else
                <form action="{{ route('create_temporary_address') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" id=""
                                    value="{{ old('country') }}" placeholder="Enter your country">

                            </div>
                            @error('country')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="province" class="form-label">Province/State</label>
                                <input type="text" class="form-control" name="province"
                                    value="{{ old('province') }}" id="" placeholder="Enter your province">
                            </div>
                            @error('province')
                                {{ $message }}
                            @enderror

                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" name="district"
                                    value="{{ old('district') }}" id="" placeholder="Enter your district">
                            </div>
                            @error('district')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" class="form-control"
                                value="{{ old('city') }}" placeholder="Enter Your city">
                            <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="area">Area</label>
                            <input type="text" name="area" id="area" class="form-control"
                                value="{{ old('area') }}" placeholder="Enter Your area">
                            <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                value="{{ old('address') }}" placeholder="Enter Your address">
                            <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary rounded mt-2">Create</button>
                    </div>
                </form>
                @endif
                <div class="card-body">
                    <div class="">
                        <h5 class="text-primary badge bg-primary text-white  p-2 m-2 mx-0">Delivery Address</h5>

                    </div>
                    @if($editdeliveryaddress)
                    <form action="{{ route('update_delivery_address', $editdeliveryaddress->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" name="country" id=""
                                            value="{{ @Auth::user()->delivery->country }}"
                                            placeholder="Enter your country">

                                    </div>
                                    @error('country')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="province" class="form-label">Province/State</label>
                                        <input type="text" class="form-control" name="province"
                                            value="{{ @Auth::user()->delivery->province }}" id=""
                                            placeholder="Enter your province">
                                    </div>
                                    @error('province')
                                        {{ $message }}
                                    @enderror

                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="mb-3">
                                        <label for="district" class="form-label">District</label>
                                        <input type="text" class="form-control" name="district"
                                            value="{{ @Auth::user()->delivery->district }}" id=""
                                            placeholder="Enter your district">
                                    </div>
                                    @error('district')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ @Auth::user()->delivery->city }}"
                                        placeholder="Enter Your city">
                                    <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="area">Area</label>
                                    <input type="text" name="area" id="area" class="form-control"
                                        value="{{ @Auth::user()->delivery->area }}"
                                        placeholder="Enter Your area">
                                    <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                                </div>
                                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ @Auth::user()->delivery->address }}"
                                        placeholder="Enter Your address">
                                    <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded mt-2">Update</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('create_delivery_address') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country" id=""
                                        value="{{ old('country') }}" placeholder="Enter your country">
    
                                </div>
                                @error('country')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="province" class="form-label">Province/State</label>
                                    <input type="text" class="form-control" name="province"
                                        value="{{ old('province') }}" id="" placeholder="Enter your province">
                                </div>
                                @error('province')
                                    {{ $message }}
                                @enderror
    
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="mb-3">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control" name="district"
                                        value="{{ old('district') }}" id="" placeholder="Enter your district">
                                </div>
                                @error('district')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="city">City</label>
                                <input type="text" name="city" id="city" class="form-control"
                                    value="{{ old('city') }}" placeholder="Enter Your city">
                                <div class="text-danger p-2">{{ $errors->first('city') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="area">Area</label>
                                <input type="text" name="area" id="area" class="form-control"
                                    value="{{ old('area') }}" placeholder="Enter Your area">
                                <div class="text-danger p-2">{{ $errors->first('area') }}</div>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ old('address') }}" placeholder="Enter Your address">
                                <div class="text-danger p-2">{{ $errors->first('address') }}</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded mt-2">Create</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
