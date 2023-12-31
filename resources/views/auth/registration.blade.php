@extends('layouts.authui')

@section('content')

<!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('assets')}}/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <h3 class="text-center m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="username" value="{{old('username')}}" placeholder="Username"> </div>
                                @if ($errors->has('username'))
                                    <div class="error-msg">{{ $errors->first('username') }}</div>
                                @endif
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" name="email" value="{{old('email')}}" placeholder="email"> </div>
                                @if ($errors->has('email'))
                                    <div class="error-msg">{{ $errors->first('email') }}</div>
                                @endif
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" placeholder="Password"> </div>
                                @if ($errors->has('password'))
                                    <div class="error-msg">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    {{-- <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                    </div>  --}}
                                    {{-- <div class="ms-auto">
                                        <a href="#" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot password</a> 
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Sign In</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
@endsection
