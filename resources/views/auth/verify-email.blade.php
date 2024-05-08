@extends('frontend.layouts.main')

@section('content')
    <div class="container col-4 h-100 py-5">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                <!-- Forgot Password -->
                <div class="card">

                    <div class="card-body">
                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>
                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" action="{{ route('verification.send') }}" method="POST">
                            @csrf

                            <button class="btn btn-primary d-grid w-100">Send Verification Email</button>
                        </form>
                        <div class="text-center">
                            <a href="{{ route('logout') }}" class="d-flex align-items-center justify-content-center">
                                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
