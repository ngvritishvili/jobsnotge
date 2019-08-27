@extends ('layouts.layout2')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<div id="app"></div>
@section ('content')
    <div id="job-description">
        <div class="container">
            <div class="row">

                <div class="col-md-9">
                    <h2>{{ $jobOffer->job_title }}</h2>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                </div>
                <div class="col-md-3 mt-5">
                    <img src="/img/czd.png" alt="">
                </div>
            </div>
            <hr>
            <div class="row mt-5 font-weight-bold">
                <div class="col-md-3">
                    <p>Ends: {{ $jobOffer->job_date->format('Y-m-d') }}
                        <br> Time Left: {{ $jobOffer->job_date->diffForHumans() }}

                    </p>
                    <p>Location: <a href="">Tbilisi, Georgia</a></p>
                    <p>Experience: <a href="">{{ $jobOffer->experience }}</a></p>
                </div>
                <div class="col-md-6">
                    <p>Type: <a href="">{{ $jobOffer->type }}</a></p>
                    <p>Salary: <a href="">{{ $jobOffer->salary }}  {{ $jobOffer->currency }}</a></p>
                    <p>Keywords: <a href="">{{ $jobOffer->keyword }}</a></p>
                </div>
                <div class="col-md-2">
                    @if(auth()->guest())
                        <button onclick="Login()">Apply</button>
                    @elseif(!auth()->guest() && auth()->user()->cv == null)
                        <button onclick="cvWarn()">Apply</button>
                    @else
                        {{Form::open(['method' => 'post', 'route' => ['applyFromInside'] ])}}
                        @csrf
                        <button onclick="window.location='{{ route('applyFromInside') }}'">Apply
                        </button>

                        <input name="company_id" hidden value="{{ $jobOffer->company_id }}">
                        <input name="job_title" hidden value="{{ $jobOffer->job_title }}">

                        {{  Form::close()  }}
                    @endif

                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <p><font color="#38ACB3"><a href="" style="font-size: 20px;">ContractZero</a></font> is a
                        full-service software agency,
                        specializing in mobile and web development for
                        European and Northern-American clients. Based in the Vera district in Tbilisi, we serve
                        long-term clients in The US, England and The Netherlands. With a focus on blockchain and other
                        innovative technologies, we also work on cutting edge projects with leading experts such as
                        professors at the prestigious MIT and Yale universities, as well as national government
                        agencies. The opportunity: <font color="#38ACB3"><a href="" style="font-size: 20px;">Technical
                                Lead</a></font></p>
                    <p>We are in need of a senior full-stack developer that wants to assume the position of technical
                        lead, by doing the following:</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-5">
                    <ul>
                        <li>
                            <p>Taking responsibility over the development process of our products</p>
                        </li>
                        <li>
                            <p>Assisting in the scoping and determining the architecture of new products</p>
                        </li>
                        <li>
                            <p>Determining and implementing standards for building and testing products</p>
                        </li>
                        <li>
                            <p>Building on our web and mobile applications</p>
                        </li>
                    </ul>
                    <p class="mt-5">We use the following tech stack:</p>
                </div>
                <div class="col-md-12 mt-5">
                    <ul>
                        <li>
                            <p>Languages: Javascript, PHP, html, css</p>
                        </li>
                        <li>
                            <p>Frameworks: Laravel, NodeJS, React, ReactNative, Angular</p>
                        </li>
                        <li>
                            <p>Database: MySQL, PostgreSQL</p>
                        </li>
                        <li>
                            <p>Server: Ubuntu, AWS serverless</p>
                        </li>
                        <li>
                            <p>Our tech stack is continuously evolving, in order to stay ahead of the competition.</p>
                        </li>
                    </ul>
                    <p class="mt-5">Requirements:</p>
                </div>
                <div class="col-md-12 mt-5">
                    <ul>
                        <li>
                            <p>Senior level developer, either through multiple years of experience and/or a relevant
                                degree</p>
                        </li>
                        <li>
                            <p>Great understanding with either Javascript or PHP</p>
                        </li>
                        <li>
                            <p>Familiarity with Laravel, NodeJS, Symfony or React</p>
                        </li>
                        <li>
                            <p>Solid understanding of OOP and application architecture</p>
                        </li>
                        <li>
                            <p>Eager to grow fast together with the company</p>
                        </li>
                        <li>
                            <p>Ability to easily learn new concepts</p>
                        </li>
                        <li>
                            <p>Ability to both work independent and as a team player</p>
                        </li>
                    </ul>
                    <p class="mt-5">Expectations::</p>
                </div>
                <div class="col-md-12 mt-5">
                    <ul>
                        <li>
                            <p>Leading by example: as technical lead, you set the pace for the rest of the team.</p>
                        </li>
                        <li>
                            <p>Team player: as technical lead, you will be working closely with the rest of the team. We
                                are looking for people that build bridges and empower others.</p>
                        </li>
                        <li>
                            <p>Growth oriented: we are looking for someone that never stops challenging themselves.</p>
                        </li>
                    </ul>
                    <p class="mt-5">Benefits::</p>
                </div>
                <div class="col-md-12 mt-5">
                    <p><font color="#38ACB3"><a href="" style="font-size: 20px;">ContractZero</a></font> is
                        ambitious, and as technical lead you will play an important role in realizing these ambitions.
                        In order to help you do this, we offer a generous compensation package, including a competitive
                        salary, good secondary benefits as well as a stake in the company </p>
                </div>
                <div class="col-md-12">
                    <ul>
                        <li>
                            <p>Competitive salary, based on your skills and responsibilities, starting from $2500 to
                                $3500 per month</p>
                        </li>
                        <li>
                            <p>Equity in the company through a free options program</p>
                        </li>
                        <li>
                            <p>Good work environment, with friendly co-workers, a modern office and space to develop
                                yourself</p>
                        </li>
                        <li>
                            <p>24 vacation days, health insurance and much more</p>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 mt-5">
                    <p>Interested Candidates Please Click on the Button</p>
                </div>
                <div class="col-md-4 mt-5">
                    <button>Apply</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function cvWarn() {
            alert("Please Upload Your CV!");
        }
        function Login() {
            alert("Please Login First");
        }
    </script>

@endsection
