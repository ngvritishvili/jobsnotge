@extends('layouts.layout2')
@section('content')
    <div id="person-register">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Get Started With Us</h2>
                    <p>Are you stuggling with finding perfect jobs online? Register and enjoy your experience</p>
                </div>
                <div class="col-md-8">
                    <img src="/img/undraw.png" alt="">
                </div>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="container text-center">
                    <div class="cc-card">
                        <h3>Register To Find a Job</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" placeholder="Name & Surname" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="Email Adress" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{--                        <div class="col-md-8">--}}
                            {{--                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">--}}
                            {{--                        </div>--}}
                            <div class="col-md-8">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Password" required>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" placeholder="Repeat Password" required
                                       autocomplete="new-password">
                            </div>
{{--                            <div class="col-md-6">--}}
{{--                                <input type="file" class="form-control"--}}
{{--                                       name="profile_picture">--}}

{{--                            </div>--}}
                            <div class="col-md-8 register-upload-cv">
                                <input type="file" class="form-control"
                                       name="userCV" required>
                                <p>Upload CV</p>
                            </div>                            <div class="col-md-12 text-center">
                                <button>Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="touch mt-5">
                <div class="row mt-5">
                    <div class="col-md-6">
                        <p>Enter Your Email</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <button>Get In Touch</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
