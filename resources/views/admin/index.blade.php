<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Admin::title() }} @if($header) | {{ $header }}@endif</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if(!is_null($favicon = Admin::favicon()))
    <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    {!! Admin::css() !!}
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">

    <script src="{{ Admin::jQuery() }}"></script>
    {!! Admin::headerJs() !!}

    <style>
        #tbl_buy_histories td, #tbl_buy_histories th, #tbl_buy_histories {
            border-color: gray !important;
        }
        #tbl_buy_histories tbody td {
            padding: 1px;
        }
        #tbl_buy_histories input {
            border: 1px solid white !important;
        }
        #tbl_buy_histories .btn-success {
            margin-top: 7px !important;
            background-color: white;
            border-color: white;
            color: #008d4c;
        }
        #tbl_buy_histories .btn-success:hover {
            background-color: #008d4c;
            border-color: #008d4c;
            color: white;
        }
    </style>
</head>

<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">

@if($alert = config('admin.top_alert'))
    <div style="text-align: center;padding: 5px;font-size: 12px;background-color: #ffffd5;color: #ff0000;">
        {!! $alert !!}
    </div>
@endif

<div class="wrapper">

    @include('admin::partials.header')

    @include('admin::partials.sidebar')

    <div class="content-wrapper" id="pjax-container">
        {!! Admin::style() !!}
        <div id="app">
        @yield('content')
        </div>
        {!! Admin::script() !!}
        {!! Admin::html() !!}
    </div>
</div>

<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
    LA.user = @json($_user_);
</script>

{!! Admin::js() !!}

</body>
</html>
