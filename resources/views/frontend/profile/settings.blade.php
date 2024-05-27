@extends('frontend.layouts.main')

@section('content')
    <div class="container">
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="{{ route('index') }}">Home</a>
            <a class="breadcrumb-item" href="{{ route('user_dashboard') }}">Profile</a>
            <a class="breadcrumb-item" href="{{ route('user_profile.edit') }}">Profile Edit</a>
            <span class="breadcrumb-item active text-primary" aria-current="page">Edit Account Credentials</span>
        </nav>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-primary">Edit Account Credentials</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('user_credentials_update', auth()->user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', auth()->user()->name) }}">
                            <div class="text-danger p-2">{{ $errors->first('name') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', auth()->user()->email) }}">
                            <div class="text-danger p-2">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                value="{{ old('phone', auth()->user()->phone) }}">
                            <div class="text-danger p-2">{{ $errors->first('phone') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                            <div class="text-danger p-2">{{ $errors->first('current_password') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <div class="text-danger p-2">{{ $errors->first('password') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                            <div class="text-danger p-2">{{ $errors->first('password_confirmation') }}</div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
