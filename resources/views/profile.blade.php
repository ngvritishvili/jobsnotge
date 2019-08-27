@extends ('layouts.layout2')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="app"></div>
@section('content')
    <div id="profile">
        <div class="container-fluid">
            <form action="{{ route('saveChanges') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="profile-image">
                    <img src="/img/profile_img/{{ auth()->user()->profile_image }}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-12 text-center profile-upload mt-2">
                        <input name="profile_picture" class="" type="file">
                    </div>
                </div>
                <div class="profile-information text-center">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('alert', 'Email Already Exists') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-5">
                            <p>Name & Surname</p>
                        </div>
                        <div class="col-md-2">
                            <input name="authName" placeholder="{{auth()->user()->name}}" id="inputactivename"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>Email Address:</p>
                        </div>
                        <div class="col-md-2">
                            <input name="authEmail" placeholder="{{ auth()->user()->email }}" id="inputactiveemail"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>Phone Number:</p>
                        </div>
                        <div class="col-md-2">
                            <input name="authPhone" placeholder="{{ auth()->user()->phone }}" id="inputactivephone"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>CV:</p>
                        </div>

                        <div class="col-md-1">
                            <input name="user_cv" class="" type="file" >
                        </div>

                    </div>
                </div>


                <div class="profile-edit mt-4">
                    <div class="row">
                        {{Form::open(['method' => 'get', 'route' => ['profile'] ])}}

                        <div class="col-md-6">
                            <button type="button" onclick="myFunction()" style="float: right">Edit</button>
                            <script>
                                function myFunction() {
                                    document.getElementById("inputactivename").readOnly = false;
                                    document.getElementById("inputactiveemail").readOnly = false;
                                    document.getElementById("inputactivephone").readOnly = false;
                                }
                            </script>
                        </div>

                        {{  Form::close()  }}


                        <div class="col-md-6">
                            <button type="submit" onclick="window.location='{{ route('saveChanges') }}'">Save</button>
                        </div>

                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 company-register text-center">
                            {{Form::open(['method' => 'get', 'route' => ['company.create'] ])}}
                            <button onclick="window.location='{{ route('company.create') }}'">
                                Register A Company
                            </button>
                            {{  Form::close()  }}

                        </div>
                    </div>
                </div>
            </form>


        </div>
        <hr>
    </div>





@endsection

