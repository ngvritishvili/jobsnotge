@extends ('layouts.layout2')
@section ('content')
    <div class="jng-jobs">
        <div class="container p-0">
            <div class="row">
                <div class="col-md-4">
                    <h2>Finding Job Made Easier</h2>
                </div>
                <div class="col-md-8">
                    <img src="/img/image2.png" alt="">
                </div>
            </div>
            <div class="jobs-end mt-5">
                <div class="row">
{{--                    <div class="col-md-6">--}}
{{--                        <input type="text" class="search-keywords" placeholder="Search Keywords">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3">--}}
{{--                        <button class="category"><i class="fal fa-sliders-h mr-3"></i>Any Category</button>--}}
{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}
{{--                        <button class="search-jobs">Search Jobs</button>--}}
{{--                    </div>--}}

                </div>
            </div>
            <div class="latest-jobs">
                <h2>Jobs</h2>
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

                @foreach($jobResult as $one)
                    <div class="row jobs">
                        <div class="col-md-4">
                            <p><a href="{{ route('job.show', $one->id) }}">{{$one->job_title}}</a></p>
                        </div>
                        <div class="col-md-2">
                            <p class="blue">{{$one->company_name}}</p>
                        </div>
                        <div class="col-md-2">
                            <p>{{$one->type}}</p>
                        </div>
                        <div class="col-md-2">
                            <p>{{$one->salary}}</p>
                        </div>
                        @if(auth()->user()->cv == null)
                            <div class="col-md-2 mt-2">
                                <button class="apply" style="background-color:lightgray;" disabled >Apply</button>
                            </div>
                        @else
                            {{Form::open(['method' => 'post', 'route' => ['apply'] ])}}
                            @csrf
                            <div class="col-md-2 mt-2">
                                <button onclick="window.location='{{ route('apply') }}'" class="apply">Apply
                                </button>
                                <input name="company_id" hidden value="{{ $one->company_id }}">
                                <input name="job_title" hidden value="{{ $one->job_title }}">

                            </div>
                            {{  Form::close()  }}
                        @endif

                    </div>

                @endforeach

                {{ $jobResult->links() }}


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
    </div>
@endsection
