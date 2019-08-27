@extends ('layouts.layout2')
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section ('content')

    <div id="app" class="jng-jobs">
        <div  class="container p-0">
            <div class="row">
                <div class="col-md-4">
                    <h2>Finding Job Made Easier</h2>
                </div>
                <div class="col-md-8">
                    <img src="/img/image2.png" alt="">
                </div>
            </div>
            <job-search ></job-search>

        </div>
    </div>
    <script src="js/app.js"></script>
    <script src="js/index.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@endsection
@include('js/variableview/javaVariables')
