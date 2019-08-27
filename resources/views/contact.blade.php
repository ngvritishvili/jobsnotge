@extends ('layouts.layout2')
@section ('content')
    <div id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img src="/img/123.png" alt="">
                </div>
            </div>
        </div>
        <div class="container-fluid contact-background text-center">
            <div class="row bg-users">
                <div class="col-md-12">
                    <h2>Contact Us</h2>

                </div>
            </div>
            <div class="container text-center mt-5">
                <div class="col-md-3"></div>
                {{--<div class="col-md-8">--}}
                <div class="contact-main">
                    <h2>We’d Love To Hear From You</h2>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form action="{{ route('contact')}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-md-12 p-2 mt-5">
                            <input name="name" type="text" placeholder="Name & Surname" class="form-control">
                        </div>

                        {{--<div class="row">--}}
                        <div class="col-md-12 p-2">
                            <input name="email"  type="text" placeholder="Email Address" class="form-control">
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-12 p-2">
                            <input name="company-name" type="text" placeholder="Company Name (Optional)" class="form-control">
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-12 p-1">
                            <textarea name="message" placeholder="Message" class="form-control"></textarea>
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-12 text-center p-4">
                            <button type="submit">Submit</button>
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <img src="/img/paper-plane.png" alt="">
                        </div>
                        {{--</div>--}}
                    </div>
                    </form>
                </div>
                {{--</div>--}}
            </div>
            <div class="container">
                <div class="faq text-center">
                    <h2 class="text-center mt-5">FAQ</h2>
                    <div class="row mt-5">
                        <div class="col-md-2"></div>
                        <div class="col-md-9">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    How do I post a job offering?
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button"
                                            style="border: unset;">
                                        <p style="font-size: 10px;">When you register as an individual, you also
                                            create copany page, where you have a button "Post a Job Offering"</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-2"></div>
                        <div class="col-md-9">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    How do I upload my CV?
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" style="border: unset;">
                                        <p style="font-size: 10px;">You register in the website, and on the profile page
                                            you
                                            have the button "upload
                                            CV"</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-2"></div>
                        <div class="col-md-9">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Do I have to pay any fee?
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" style="border: unset;">
                                        <p style="font-size: 10px;"> No, the services of the website are completely
                                            free</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                        {{--<div class="row">--}}
                        <div class="col-md-2"></div>
                        <div class="col-md-9">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Can i place a banner on your site?
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" style="border: unset;">
                                        <p style="font-size: 10px;">yes, you can</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection


{{--<div class="col-md-1">--}}
{{--<img src="/img/phone-call.png" alt="">--}}
{{--</div>--}}
{{--<div class="col-md-1">--}}
{{--<img src="/img/smartphone.png" alt="">--}}
{{--</div>--}}


{{--<div class="container  mt-5">--}}
{{--<div class="row">--}}
{{--<div style="display:block;" class="inputs">--}}
{{--<h2>We'd Love To Hear From You</h2>--}}
{{--<input type="hidden" name="to" value="sales">--}}
{{--<input name="name" class="form-control" placeholder="Name">--}}
{{--<input name="email" class="form-control" placeholder="Email">--}}
{{--<input name="phone" class="form-control" placeholder="Phone">--}}
{{--<textarea rows="5" name="message" class="form-control-message" placeholder="Message"></textarea>--}}
{{--</div>--}}
{{--<div class="col-12 inputs">--}}

{{--<div class="input-group mb-3">--}}
{{--<input type="text" class="form-control font-weight-bold ml-3" placeholder="Email Address"--}}
{{--aria-label="Password"--}}
{{--aria-describedby="basic-addon1">--}}
{{--</div>--}}
{{--<div class="input-group mb-3">--}}
{{--<input type="text" class="form-control font-weight-bold ml-3"--}}
{{--placeholder="Company Name(optional)"--}}
{{--aria-label="Password"--}}
{{--aria-describedby="basic-addon1">--}}
{{--</div>--}}
{{--<div class="input-group">--}}
{{--<textarea name="message" class="form-control-message" placeholder="Message"--}}
{{--rows="10"></textarea>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}


{{--<div class="col-md-8 mt-5">--}}
{{--<div class="input-group mb-3">--}}
{{--<input type="text" class="form-control font-weight-bold ml-3" placeholder="Name & Surname"--}}
{{--aria-label="Email Address"--}}
{{--aria-describedby="basic-addon1">--}}
{{--</div>--}}
{{--</div>--}}

