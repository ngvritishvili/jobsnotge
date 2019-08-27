@extends ('layouts.layout2')
@section('content')
<head>


</head>
<body>
{{--<form method="post" action="{{ route('search') }}">--}}
{{--    @csrf--}}
{{--<div>--}}
{{--    <input type="text" name="search">--}}

{{--</div>--}}
{{--</form>--}}
<div id="app">
<go-search></go-search>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
<script src="js/app.js"></script>
</body>
@endsection
