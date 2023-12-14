@extends('layouts.main')
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-end">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb justify-content-end">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                    {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</button> --}}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Profile Details</h5>
                  </div>
                    <div class="card-body">
                        <form class="form-control-line" action="{{route('user.update')}}" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group {{$errors->has('name')?'has-danger':''}}">
                                <label class="form-control-label"> Name <span class="input-mandatory">*</span></label>
                                <input type="text" name="name" value="{{old('name',$user->name)}}" placeholder="First Name" class="form-control">
                                @if ($errors->has('name'))
                                  <span class="text-danger">{{ $errors->first('name') }}</span>
                                  @endif
                            </div> 
                            </div>
                            <div class="col-md-4">
                              <div class="form-group {{$errors->has('username')?'has-danger':''}}">
                                <label class="form-control-label">Username</label>
                                <input type="text" value="{{$user->username}}" readonly class="form-control">
                                @if ($errors->has('username'))
                                  <div class="form-control-feedback">{{ $errors->first('username') }}</div>
                                @endif
                            </div> 
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group {{$errors->has('email')?'has-danger':''}}">
                                <label class="form-control-label">Email <span class="input-mandatory">*</span></label>
                                <input type="text" name="email" value="{{old('email',$user->email)}}" placeholder="Email Address" class="form-control">
                                @if ($errors->has('email'))
                                  <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div> 
                            </div>
                            <div class="col-md-4">
                              <div class="form-group {{$errors->has('phoneno')?'has-danger':''}}">
                                <label class="form-control-label">Phone No</label>
                                <input type="text" name="phoneno" value="{{old('phoneno',$user->phoneno)}}" placeholder="Phone No" class="form-control digit-only">
                                @if ($errors->has('phoneno'))
                                  <div class="form-control-feedback">{{ $errors->first('phoneno') }}</div>
                                @endif
                            </div> 
                            </div>
                          </div>
                         
                          <hr>
                          <button type="submit" class="btn btn-info text-white">Save</button>
                          <a href="{{route('dashboard')}}" class="btn btn-secondary">Cancel</a>
                      </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>




@endsection