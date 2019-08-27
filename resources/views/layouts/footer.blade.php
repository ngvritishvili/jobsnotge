<div id="footer">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="/img/Ellipse.png" alt="">
                <p>
                    <a href="https://www.google.com/maps/place/2+%E1%83%98%E1%83%95%E1%83%90%E1%83%9C%E1%83%94+%E1%83%97%E1%83%90%E1%83%A0%E1%83%AE%E1%83%9C%E1%83%98%E1%83%A8%E1%83%95%E1%83%98%E1%83%9A%E1%83%98%E1%83%A1+%E1%83%A5%E1%83%A3%E1%83%A9%E1%83%90,+%E1%83%97%E1%83%91%E1%83%98%E1%83%9A%E1%83%98%E1%83%A1%E1%83%98/@41.7065498,44.7832776,19.26z/data=!4m5!3m4!1s0x40440cd0558c45ed:0x2ec1698f3522b802!8m2!3d41.7068409!4d44.7841089"
                       target="_blank"><i class="far fa-map-marker-alt mr-3"></i>Adress</a></p>
                <p><a href="tel:555-555-121" target="_blank"><i class="far fa-phone-alt  mr-3"></i>Tel: 555-555-555</a>
                </p>
                <p><a href="mailto:someone@example.com?Subject=Hello%20again" target="_top"><i
                            class="far fa-envelope  mr-3"></i>Email Adress</a></p>
            </div>
            <div class="col-md-3">
                <h2>For Job Seekers</h2>
                @if(!auth()->check())
                    <p><a href="{{ route('register') }}">Create Account</a></p>
                    <p><a href="{{ route('register') }}">Post your CV</a></p>
                @else
                    <p><a href="{{ route('home') }}">Create Account</a></p>
                    <p><a href="{{ route('profile') }}" >Post your CV</a></p>
                @endif
                <p><a href="{{ route('job.index') }}">Search for a job</a></p>
            </div>
            <div class="col-md-3">
                <h2>For Companies</h2>
                @if(!auth()->check())
                <p><a href="{{ route('register') }}">Create Account</a></p>
                <p><a href="{{ route('register') }}">Post Your Job Offering</a></p>
                <p><a href="" target="_blank">CV Search</a></p>
                @else
                    <p><a href="{{ route('company.create') }}" target="_blank">Create Account</a></p>
                    <p><a href="{{ route('job.create') }}">Post Your Job Offering</a></p>
                @endif
            </div>

            <div class="col-md-2 footer-part-four">
                <h2>Home</h2>
                <p><a href="job" target="_blank">Jobs</a></p>
                <p><a href="contact" target="_blank">Contact</a></p>
                <p><a href="" target="_blank">Road map</a></p>
            </div>
        </div>
    </div>
</div>
