@extends ('layouts.layout2')
@section('content')
    <div class="jobs-offering">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-5">
                    <h2>Job Offering</h2>
                    <p>Post A Job Offering And Find Right Person For The Job</p>
                </div>
                <div class="col-md-8 text-right">
                    <img src="/img/undraw_people_search_wctu.png" alt="">
                </div>
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
        <div class="container-fluid">
            <div class="row text-center mt-5">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="post" action="{{ route('job.store') }}">
                        @csrf
                    <div class="offering-main">
                        <h2 class="mt-4">Job Offering</h2>
                        <div class="row">
                            <input name="company_id" hidden value="{{ $company_id  }}">
                            <div class="col-md-12 p-2 mt-5">
                                <input name="job_title" type="text" placeholder="Job Title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <input name="job_date" type="date" placeholder="Date">
                            </div>
                        </div>
                        <div class="row">
                            <select name="type" class="form-control">
                                <option selected="selected" disabled>Choose Type</option>
                                <option value="Full-time">Full-time</option>
                                <option value="Half-time">Half-time</option>
                                <option value="Free-time">Free-time</option>

                            </select>

{{--                            <div class="col-md-12 p-2">--}}
{{--                                <input  type="text" name="type" placeholder="Type">--}}
{{--                            </div>--}}
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <input name="experience" type="text" placeholder="Experience">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <input name="salary" type="text" placeholder="Salary">
                                <select name="currency">
                                    <option   value="&#36;">&dollar;</option>
                                    <option   value="&euro;">&euro;</option>
                                    <option   value="&pound;">&pound;</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <input name="keyword" type="text" placeholder="Keywords">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 p-2">
                                <textarea name="description" type="text" cols="100" rows="8"  placeholder="Description"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center p-4">
                                <button type="submit">Add job</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
