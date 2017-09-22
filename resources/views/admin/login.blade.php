<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('css/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('css/admin/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('css/admin/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css/admin/custom.css') }}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">

                @if(isset($msg))
                    {{ $msg }}

                @endif

                {!! Form::open(array('action' => 'Auth\LoginAdminController@login', 'method' => 'POST', 'role' => 'form')) !!}

                {!! csrf_field() !!}

                <form>
                    <h1>Login Form</h1>
                    <div>
                        @foreach($errors->all() as $error)
                            <span class="help-block">
                                <strong> {{ $error }} </strong>
                            </span>
                        @endforeach

                        {{--{!! Form::text('email', NULL, array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Input your email!')) !!}--}}
                        <input type="text" class="form-control" name="email" placeholder="Email" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" name="password" placeholder="Password" required="" />
                    </div>
                    <div>
                        <input type="submit" class="btn btn-default submit" value="Log in">
                        {{--<a class="reset_pass" href="#">Lost your password?</a>--}}
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        {{--<p class="change_link">New to site?--}}
                            {{--<a href="#signup" class="to_register"> Create Account </a>--}}
                        {{--</p>--}}

                        {{--<div class="clearfix"></div>--}}
                        {{--<br />--}}

                        <div>
                            {{--<h1><i class="fa fa-paw"></i> Lowids</h1>--}}
                            <p>©2017 All Rights Reserved. Lowids by PT Generasi Muda Gigih</p>
                        </div>
                    </div>
                </form>

                {!! Form::close() !!}

            </section>
        </div>
    </div>
</div>
</body>
</html>
