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
                      <h4 class="text-themecolor">Add Librarian</h4>
                  </div>
                  <div class="col-md-7 align-self-center text-end">
                      <div class="d-flex justify-content-end align-items-center">
                          <ol class="breadcrumb justify-content-end">
                              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                              <li class="breadcrumb-item"><a href="{{route('librarian.index')}}">Librarian</a></li>
                              <li class="breadcrumb-item active">Add</li>
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
                          <h5 class="card-title">Librarian Details</h5>
                        </div>
                          <div class="card-body">
                              <form class="form-control-line" action="{{route('librarian.add')}}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('name')?'has-danger':''}}">
                                      <label class="form-control-label">Name <span class="input-mandatory">*</span></label>
                                      <input type="text" name="name" value="{{old('name')}}" class="form-control"placeholder="Name">
                                      @if ($errors->has('name'))
                                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('username')?'has-danger':''}}">
                                      <label class="form-control-label">Username <span class="input-mandatory">*</span></label>
                                      <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="Username">
                                      @if ($errors->has('username'))
                                        <div class="form-control-feedback">{{ $errors->first('username') }}</div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('password')?'has-danger':''}}">
                                      <label class="form-control-label">Password <span class="input-mandatory">*</span></label>
                                        <input type="password" name="password" id="inp-user-password" class="form-control" placeholder="Password">
                                      @if ($errors->has('password'))
                                        <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                                      @endif
                                  </div> 
                                  </div>
                                    <div class="col-md-4">
                                      <div class="form-group {{$errors->has('phoneno')?'has-danger':''}}">
                                        <label class="form-control-label">Phone No <span class="input-mandatory">*</span></label>
                                        <input type="text" name="phoneno" value="{{old('phoneno')}}" class="form-control digit-only" placeholder="Phone No">
                                        @if ($errors->has('phoneno'))
                                          <div class="form-control-feedback">{{ $errors->first('phoneno') }}</div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group {{$errors->has('email')?'has-danger':''}}">
                                        <label class="form-control-label">Email Address <span class="input-mandatory">*</span></label>
                                        <input type="text" name="email" value="{{old('email')}}" class="form-control"placeholder="Email Address ">
                                        @if ($errors->has('email'))
                                          <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                      </div>
                                    </div>
                                    
                                      <div class="col-md-4">
                                        <div class="form-group {{$errors->has('departmentid')?'has-danger':''}}">
                                          <label class="form-control-label">Department <span class="input-mandatory">*</span></label>
                                          <select name="departmentid" class="form-control adi-select2">
                                            <option value="">Select One</option>
                                            @foreach ($department as $key)
                                            <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                                            @endforeach
                                          </select>
                                          @if ($errors->has('departmentid'))
                                            <div class="form-control-feedback">{{ $errors->first('departmentid') }}</div>
                                          @endif
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{$errors->has('status')?'has-danger':''}}">
                                          <label class="form-control-label">Status <span class="input-mandatory">*</span></label>
                                          <select name="status" class="form-control adi-select2">
                                            {{-- <option value="">Select One</option> --}}
                                            <option value="1" {{(old('status') == '1')?'selected':''}}>Enable</option>
                                            <option value="0" {{(old('status') == '0')?'selected':''}}>Disable</option>
                                          </select>
                                          @if ($errors->has('status'))
                                            <div class="form-control-feedback">{{ $errors->first('status') }}</div>
                                          @endif
                                      </div> 
                                      </div>
                                  </div>
                                <hr>
                                <button type="submit" class="btn btn-info text-white">save</button>
                                <a href="{{route('librarian.index')}}" class="btn btn-secondary">Cancel</a>
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