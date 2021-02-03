<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @if(!is_null($favicon = Admin::favicon()))
        <link rel="shortcut icon" href="{{$favicon}}">
    @endif

    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">
    <link rel="stylesheet" href="{{ admin_asset('asset/css/login.css')}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
</head>
<body class="hold-transition login-page" @if(config('admin.login_background_image'))style="background: url({{config('admin.login_background_image')}}) no-repeat;background-size: cover;"@endif>
<div class="login-box">
    <div class="login-logo">
        <a href="{{ admin_url('/') }}"><b>{{config('admin.name')}}</b></a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">{{ trans('admin.register') }}</p>
        <br>
        <form action="{{ admin_url('auth/register') }}" method="post">
        <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

            @if($errors->has('username'))
                @foreach($errors->get('username') as $message)
                    <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                @endforeach
            @endif

            <input type="text" class="form-control" placeholder="{{ trans('admin.username') }}" name="username" value="{{ old('username') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        
        <div class="row">
            <div class="col-xs-3">
           
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-danger btn-block btn-flat">{{ trans('admin.register') }}</button>
            </div>
            <!-- /.col -->
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12">
                <h5 class="pull-right">Đã có tài khoản? <a href="{{ route('admin.login') }}" class="">Đăng nhập</a></h5>
            </div>
        </div>
        </form>

    </div>
</div>

<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>
<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{ admin_asset("vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>

</body>
</html>
