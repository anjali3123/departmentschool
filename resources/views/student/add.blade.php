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
                      <h4 class="text-themecolor">Add Contact</h4>
                  </div>
                  <div class="col-md-7 align-self-center text-end">
                      <div class="d-flex justify-content-end align-items-center">
                          <ol class="breadcrumb justify-content-end">
                              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                              <li class="breadcrumb-item"><a href="{{route('student.index')}}">Student</a></li>
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
                          <h5 class="card-title">Contact Details</h5>
                        </div>
                          <div class="card-body">
                              <form class="form-control-line" action="{{route('student.store')}}" method="post">
                                @csrf
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('fname')?'has-danger':''}}">
                                      <label class="form-control-label">First Name <span class="input-mandatory">*</span></label>
                                      <input type="text" name="fname" value="{{old('fname')}}" class="form-control"placeholder="First Name">
                                      @if ($errors->has('fname'))
                                        <div class="form-control-feedback">{{ $errors->first('fname') }}</div>
                                      @endif
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group {{$errors->has('lname')?'has-danger':''}}">
                                      <label class="form-control-label">Last Name <span class="input-mandatory">*</span></label>
                                      <input type="text" name="lname" value="{{old('lname')}}" class="form-control" placeholder="last Name ">
                                      @if ($errors->has('lname'))
                                        <div class="form-control-feedback">{{ $errors->first('lname') }}</div>
                                      @endif
                                    </div>
                                  </div>
                                  {{-- @if(auth()->user()->roleid != 2 && auth()->user()->roleid != 3) --}}
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
                                  {{-- @else
                                  <input type="hidden" name="branchid" value="{{auth()->user()->branchid}}">
                                  @endif --}}
                                  
                                  
                                    <div class="col-md-4">
                                      <div class="form-group {{$errors->has('contactno')?'has-danger':''}}">
                                        <label class="form-control-label">Phone No <span class="input-mandatory">*</span></label>
                                        <input type="text" name="contactno" value="{{old('contactno')}}" class="form-control digit-only" placeholder="Phone No">
                                        @if ($errors->has('contactno'))
                                          <div class="form-control-feedback">{{ $errors->first('contactno') }}</div>
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
                                      <div class="form-group {{$errors->has('address')?'has-danger':''}}">
                                        <label class="form-control-label">Address <span class="input-mandatory">*</span></label>
                                        <input type="text" name="address" value="{{old('address')}}" class="form-control"placeholder="Address">
                                        @if ($errors->has('address'))
                                          <div class="form-control-feedback">{{ $errors->first('address') }}</div>
                                        @endif
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group {{$errors->has('collage_name')?'has-danger':''}}">
                                        <label class="form-control-label">Collage Name</label>
                                        <input type="text" name="collage_name" id="add-contact-collage_name" value="{{old('collage_name')}}" class="form-control" placeholder="Collage Name">
                                        @if ($errors->has('collage_name'))
                                          <div class="form-control-feedback">{{ $errors->first('collage_name') }}</div>
                                        @endif
                                      </div> 
                                    </div>
                                      <div class="col-md-4">
                                        <div class="form-group {{$errors->has('roll_no')?'has-danger':''}}">
                                          <label class="form-control-label">Roll No <span class="input-mandatory">*</span></label>
                                          <input type="text" name="roll_no" value="{{old('roll_no')}}" class="form-control digit-only" placeholder="Roll No">
                                          @if ($errors->has('roll_no'))
                                            <div class="form-control-feedback">{{ $errors->first('roll_no') }}</div>
                                          @endif
                                        </div>
                                      </div>
                                    <div class="col-md-4">
                                      <div class="form-group {{$errors->has('gender')?'has-danger':''}}">
                                          <label class="form-control-label">Gender <span class="input-mandatory">*</span></label>
                                          <select name="gender"  class="form-control adi-select2">
                                            <option value="">Select One</option>
                                            <option value="male" {{(old('gender') == 'male')?'selected':''}}>Male</option>
                                            <option value="female"{{(old('gender') == 'female')?'selected':''}}>Female</option>
                                            <option value="other"{{(old('gender') == 'other')?'selected':''}}>Other</option>
                                        
                                          </select>
                                          @if ($errors->has('gender'))
                                            <div class="form-control-feedback">{{ $errors->first('gender') }}</div>
                                          @endif
                                      </div>
                                    </div>
                                   
                                  </div>
                                <hr>
                                <button type="submit" class="btn btn-info text-white">save</button>
                                <a href="{{route('student.index')}}" class="btn btn-secondary">Cancel</a>
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
      {{-- <script>
$(document).ready(function () {  
$("#dg-country-select").change(function(){
        var name = $(this).val();
        $.ajax({
             method: "get",
             url: '{{route("demographic.getstate")}}',
             data: {name:name},
             success: function (data) {
              $("#dg-state-select").html(data).trigger('change');
             },
          });
      });

      $("#dg-state-select").change(function(){
        var name = $(this).val();
        $.ajax({
             method: "get",
             url: '{{route("demographic.getcity")}}',
             data: {name:name},
             success: function (data) {
              $("#dg-city-select").html(data).trigger('change');
             },
          });
      });
  });
</script> --}}
{{-- <script>
    $(document).ready(function () {         
      var name = $("#dg-country-select").val();
        $.ajax({
             method: "get",
             url: '{{route("demographic.getstate")}}',
             data: {name:name},
             success: function (data) {
              $("#dg-state-select").html(data).val();
              $('#dg-state-select :selected').text();

              var sname = $("#dg-state-select").val();
              // $.loader.on();
              $.ajax({
                  method: "get",
                  url: '{{route("demographic.getcity")}}',
                  data: {name:sname},
                  success: function (data) {
                    $("#dg-city-select").html(data);
                    $('#dg-city-select :selected').text();
                    // $.loader.off();
                  },
                });
             },
          });
    })
</script> --}}
@endsection