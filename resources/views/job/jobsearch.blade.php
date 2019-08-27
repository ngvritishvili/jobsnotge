@extends ('layouts.layout2')
@section ('content')
    <div id="index">
        <job-search></job-search>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
    <script src="js/index.js"></script>
    <script src="js/app.js"></script>
@endsection
@include('js/variableview/javaVariables')
