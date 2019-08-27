@extends('layouts.layout2')
@section('content')
    <div id="company-register">
        <div class="container mt-5 p-0">
            <div class="row">
                <div class="col-md-4">
                    <h2>Get Started With Us</h2>
                    <p>Tired of receiving irrelevant job applications? Need a stong and professional workers? Register
                        and enjoy your exerience</p>
                </div>
                <div class="col-md-8">
                    <img src="/img/undraw_resu.png" alt="">
                </div>

            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="container text-center">
                <div class="cc-card">
                    <h3>Register A Company</h3>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="text" name="NewCompanyName" placeholder="Company Name" required>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="newCompanyAuthor" placeholder="Name & Surname" required>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="newCompanyAuthorPos" placeholder="Position in Company" required>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="newCompanyEmail" placeholder="Email Address" required>
                        </div>
                        <div class="col-md-8">
                            <input type="text" name="newCompanyPhone" placeholder="Phone Number" required>
                        </div>
                        <div class="col-md-8">
                            <input type="file" name="photo">
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit">Register</button>
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
