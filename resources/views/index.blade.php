@extends ('layouts.layout2')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="app"></div>
@section ('content')
    <div id="jng">
        <div  class="container">
            <div class="jng-header">
                <div class="row">
                    <div class="col-md-4">
                        <h2>English Speaking Jobs In Georgia</h2>
                        <p>We can help you with that!</p>


                        <button onclick="parent.location=('{{ route('job.index') }}')">Search a Job</button>
                        <button onclick="parent.location=('{{ route('contact') }}')" class="contact-us">Contact Us</button>
                    </div>
                    <div class="col-md-8 text-right">
                        <img src="/img/undraw_interview_rmcf.png" alt="">
                    </div>
                </div>
{{--                <form action="{{ route('search') }}" method="post">--}}
{{--                    @csrf--}}
{{--                <div class="header-end">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <input name="jobSearch" type="text" class="search-keywords" placeholder="Search Keywords">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            --}}{{--<input type="text" class="category" placeholder="Any Category">--}}
{{--                            <button class="category"><i class="fal fa-sliders-h mr-3"></i>Any Category</button>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3">--}}
{{--                            <button class="search-jobs">Search Jobs</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                </form>--}}
            </div>
            <div class="latest-jobs">
                <h2>Latest/VIP Jobs</h2>
                <div class="row mt-5 jobs-list">
                    <div class="col-md-4">
                        <p>Job title</p>
                    </div>
                    <div class="col-md-2">
                        <p>by</p>
                    </div>
                    <div class="col-md-2">
                        <p>Type</p>
                    </div>
                    <div class="col-md-2">
                        <p>Salary</p>
                    </div>
                </div>
                @foreach($vipCompanies as $oneVip)
                <div class="row jobs">
                    <div class="col-md-4">
                        <a href="{{ route('jobShow', ($oneVip->id)) }}"><p>{{ $oneVip->job_title }}</p></a>
                    </div>
                    <div class="col-md-2">
                        <p class="blue">{{ $oneVip->company_name }}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{ $oneVip->type }}</p>
                    </div>
                    <div class="col-md-2">
                        <p>{{ $oneVip->salary }}</p>
                    </div>

                    <form action="{{ route('applyFromInside'), $oneVip->company_id }}" method="post">
                        @csrf
                        <input name="company_id" value="{{ $oneVip->company_id }}"  hidden>
                    <div class="col-md-2 mt-2">
                        <button  class="apply">Apply</button>
                    </div>
                    </form>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-md-12 all-job">
                        <a href="{{ route('job.index') }}">See All Jobs <i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 try-more">
                <img src="/img/road.png" alt="">
            </div>
            <div class="row dream-job mt-5">
                <div class="col-md-6">
                    <p>Enter Your Email</p>
                </div>
                <div class="col-md-6 text-center">
                    <button>Get In Touch</button>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--<div class="row">--}}
{{--<div class="dream-email">--}}
{{--<div class="col-md-6 ">--}}
{{--<p>Enter Your Email</p>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-md-6">--}}
{{--<button>dasdass</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
