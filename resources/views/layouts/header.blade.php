<div class="container-fluid">
    <div class="jng-header">
        <div class="row">
            <div  class="col-md-2 mt-4 text-center">
                <img src="/img/Ellipse.png" alt="">

            </div>
            <div class="col-md-5">
                <ul class="nav justify-content mt-3">
                    <li class="nav-item">
                        <a class="nav-link" href="http://127.0.0.1:8000">Home</a>
                    </li>

                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}">Profile</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('job.index') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('testPage') }}">Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobsearch') }}">jobsearch</a>
                    </li>

                </ul>
            </div>

            <div class="col-md-5 mt-3">
                <ul class="nav justify-content-end">
                    <!-- Authentication Links -->
                    @guest
                        <li class="m-3">
                            <button type="button" data-toggle="modal" data-target="#exampleModal"
                            >{{ __('Sing In') }}
                            </button>

                            <!-- Modal -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="pop-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="pop-body mt-5">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" autocomplete="email"
                                                       placeholder="Email Address" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror

                                            </div>
                                            <div class="pop-body">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required autocomplete="current-password"
                                                       placeholder="Password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="pop-footer text-center">
                                                <div class="row">
                                                    <div class="col-md-12 mt-5">
                                                        <button type="submit"
                                                                class="btn btn-secondary"> {{ __('Sing In') }}
                                                        </button>
                                                        <p>
                                                            @if (Route::has('password.request'))
                                                                <a class="forget-password"
                                                                   href="{{ route('password.request') }}">
                                                                    {{ __('Forgot Password?') }}
                                                                </a>
                                                            @endif
                                                        </p>
                                                        <p>Or</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button onclick="window.location='{{ route('register') }}'"
                                                                type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Register
                                                        </button>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            </form>

                        </li>
                        @if (Route::has('register'))
                            <li class="m-3">
                                <button type="button"
                                        onclick="window.location='{{ route('register') }}'">{{ __('Register') }}</button>
                            </li>
                        @endif

                    @else

                        <div class="dropdown">

                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Logout') }}
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @foreach(auth()->user()->company as $oneCompany)
                                    <button class="dropdown-item"
                                            onclick="window.location='{{ route('company.show', $oneCompany->id) }}'">
                                        {{ $oneCompany->name }}
                                    </button>
                                @endforeach
                                    <button class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </button>
                                {{--                                <a class="dropdown-item" href="#">Action</a>--}}
                                {{--                                <a class="dropdown-item" href="#">Another action</a>--}}
                                {{--                                <a class="dropdown-item" href="#">Something else here</a>--}}
                            </div>

                            {{--                        @foreach(auth()->user()->company as $oneCompany)--}}
                            {{--                            <li>--}}
                            {{--                                <button class="dropdown-item"--}}
                            {{--                                        onclick="window.location='{{ route('company.show', $oneCompany->id) }}'">--}}
                            {{--                                    {{ $oneCompany->name }}--}}
                            {{--                                </button>--}}
                            {{--                            </li>--}}
                            {{--                        @endforeach--}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>

                    @endguest
                </ul>
            </div>
        </div>
        <hr>
    </div>
</div>

