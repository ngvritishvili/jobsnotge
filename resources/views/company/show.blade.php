@extends ('layouts.layout2')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<div id="app"></div>
@section('content')
    <script src="{{ asset('js/app.js') }}"></script>
@can('show', $company)

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="company-profile">
        <div class="container">
            <form action="{{ route('company.update', $company->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                {{ method_field('patch') }}
                <div class="company-image">
                    <img src="/img/company_img/{{ $company->company_photo }}" alt="">
                </div>
                <div class="row">
                    <div class="col-md-12 text-center company-upload mt-2">
                        <input name="company_profile_picture" class="" type="file">
                        <input name="company_id" hidden value="{{ $company->id }}">
                    </div>
                </div>


                <div class="company-information text-center">
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('alert', 'Email Already Exists') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-md-5">
                            <p>Company Name</p>
                        </div>
                        <div class="col-md-2">
                            <input name="companyName" placeholder="{{$company->name}}" id="inputactivename"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>Email Address:</p>
                        </div>
                        <div class="col-md-2">
                            <input name="companyEmail" placeholder="{{ $company->company_email }}"
                                   id="inputactiveemail"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>Phone Number:</p>
                        </div>
                        <div class="col-md-2">
                            <input name="companyPhone" placeholder="{{ $company->company_phone }}"
                                   id="inputactivephone"
                                   readonly>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-5">
                            <p>CV:</p>
                        </div>
{{--                        <div class="col-md-1">--}}
{{--                            <button class="cv-button">View CV</button>--}}
{{--                        </div>--}}
                    </div>
                </div>


                <div class="company-edit mt-4">
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
                            {{Form::open(['method' => 'get', 'route' => ['job.create'] ])}}
                            <button onclick="window.location='{{ route('job.create') }}'">
                                Post A Job Offer
                            </button>
                            <input name="company_id" hidden value="{{ $company->id }}">
                            {{  Form::close()  }}

                        </div>
                    </div>
                </div>
            </form>


        </div>
        <hr>
    </div>


@endcan



@endsection
