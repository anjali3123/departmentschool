@extends('layouts.authui')

@section('content')

<!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('assets')}}/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="{{route('login.verify')}}" method="POST">
                        @csrf
                        <h3 class="text-center m-b-20">Login In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" value="{{old('username')}}" placeholder="username"> </div>
                                @if ($errors->has('username'))
                                    <div class="error-msg">{{ $errors->first('username') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" placeholder="Password" id="inp-user-password"> </div>
                                {{-- <button type="button" onclick="visibility('inp-user-password',1)" class="btn btn-sm btn-purple text-white"><i id="eyeSlash1" class="fas fa-eye-slash"></i></button> --}}
                                @if ($errors->has('password'))
                                    <div class="error-msg">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="ms-auto">
                                        <a href="#" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot password</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Login</button>
                            </div>
                            <div class="form-group text-center">
                                {{-- <div class="col-xs-12 p-b-20">
                                    <a href="{{ route ('register') }}" class="btn btn-primary" title="SignUp">SignUp</a>
                                </div> --}}
                            
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    


    <script>
        function visibility(fieldId, iconId) {

var field = document.getElementById(fieldId);

if (field.type === 'password') {
    field.type = "text";
    $('#eyeSlash' + iconId).removeClass('fa fa-eye-slash');

    $('#eyeSlash' + iconId).addClass('fa fa-eye');
    //adding fa-eye-slash class
    // $('#'.iconId).show();
    // $('#'.iconId).hide();
} else {
    field.type = "password";
    $('#eyeSlash' + iconId).removeClass('fa-eye');

    $('#eyeSlash' + iconId).addClass('fa-eye-slash');
    //adding fa-eye class
    // $('#'.iconId).hide();
    // $('#'.iconId).show();
}
}
      </script>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
@endsection
