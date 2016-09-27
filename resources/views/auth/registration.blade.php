<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register Yourself</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('css/blue.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('sample') }}"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- Display Messages -->
    @if(session('message'))
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
    @endif
    @if( session('warning'))
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('warning') }}
    @endif


    {!! Form::open(array('url' => route('doregister'), 'method' => 'POST', 'id' => 'signup', 'data-toggle' => 'validator' )) !!}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group has-feedback">
        {{ Form::text('name',null,array('class'=>'form-control', 'maxlength' => '30', 'placeholder' => 'Full Name', 'required')) }}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group has-feedback">
        {{ Form::email('email', null, array('class' => 'form-control', 'id' => 'email', 'data-error' => 'Email is mandatory',
            'placeholder' => 'Email', 'required')) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group has-feedback">
        {{ Form::password('password', array('class' => 'form-control', 'id' => 'Password', 'data-minlength' => '6', 
            'data-error' => 'Password is mandatory', 'placeholder'=>'Password', 'required' )) }}
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group has-feedback">
        {{ Form::password('cpassword', array('class' => 'form-control', 'id' => 'cpassword', 'data-match' => '#Password',
            'data-match-error' => 'Password does not match', 'placeholder' => 'Confirm Password', 'required' )) }}
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <div class="help-block with-errors"></div>
    </div>

    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    By clicking on Register, you agree with our <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a>.
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
    </div>
    {!! Form::close() !!}

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{ url('login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{ url('js/icheck.min.js') }}"></script>
<!-- Bootstrap Validator -->
<script src="{{ url('js/validator.js') }}"></script>
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