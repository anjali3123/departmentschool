@extends('layouts.main')

@section('content')

<!-- Page wrapper  -->
        <!-- ============================================================== -->
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
                      <h4 class="text-themecolor">Change Password</h4>
                  </div>
                  <div class="col-md-7 align-self-center text-end">
                      <div class="d-flex justify-content-end align-items-center">
                          <ol class="breadcrumb justify-content-end">
                              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                              <li class="breadcrumb-item active">Change Password</li>
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
                          <h5 class="card-title">User Change Password Details</h5>
                        </div>
                          <div class="card-body">
                              <form class="form-control-line" action="{{route('user.passwordupdate')}}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('current_password')?'has-danger':''}}">
                                      <label class="form-control-label">Current Password <span class="input-mandatory">*</span></label>
                                      <div class="with-icon">
                                        <input type="password" name="current_password" id="inp-user-current_password" placeholder="Current Password" class="form-control">
                                       
                                      </div>
                                      @if ($errors->has('current_password'))
                                        <div class="form-control-feedback">{{ $errors->first('current_password') }}</div>
                                      @endif
                                  </div> 
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('new_password')?'has-danger':''}}">
                                      <label class="form-control-label">New Password <span class="input-mandatory">*</span></label>
                                      <div class="with-icon">
                                        <input type="password" name="new_password" id="inp-user-new_password" placeholder="New Password" class="form-control">
                                        
                                      </div>
                                      @if ($errors->has('new_password'))
                                        <div class="form-control-feedback">{{ $errors->first('new_password') }}</div>
                                      @endif
                                  </div> 
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('confirm_new_password')?'has-danger':''}}">
                                      <label class="form-control-label">Confirm New Password <span class="input-mandatory">*</span></label>
                                      <div class="with-icon">
                                        <input type="password" name="confirm_new_password" id="inp-user-confirm_new_password" placeholder="Confirm New Password" class="form-control">
                                       
                                      </div>
                                      @if ($errors->has('confirm_new_password'))
                                        <div class="form-control-feedback">{{ $errors->first('confirm_new_password') }}</div>
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
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
@endsection