
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
                        <h4 class="text-themecolor">Student</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Student</li>
                            </ol>
                            {{-- <a href="{{route('student.add')}}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</a> --}}
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#add-student-modal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New</button>
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
                                <div class="row">
                                <h4 class="card-title  col-md-8">Student</h4>
                                <div class="text-end  col-md-4">
                                    <form action="{{ route('importfile') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-block btn-sm h-auto">Upload File</button>
                                        <input type="file" name="file" class="form-control">
                                      </form>
                                    {{-- <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#add-import-modal" data-whatever="@mdo">Import</button> --}}
                                </div>
                            </div>
                            </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="student-details-list"
                                        class="display nowrap table table-hover table-striped border"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Department</th>
                                                <th>Email</th> 
                                                <th>Phone No.</th> 
                                                <th>Roll no.</th> 
                                                <th>Gender</th> 
                                                <th>Address</th> 
                                                <th>Action</th>                                              
                                            </tr>                                             
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
       
        <!-- sample modal content -->
        <div id="add-roles-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
              <div class="modal-content">                
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-info">Save changes</button>
                  </div>
              </div>
          </div>
      </div>  
      <div class="modal" id="add-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content"style="width:150%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Student</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="form-add-student">
                        
                        <input type="hidden" id="add-student-id" name="id" value="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First Name <span class="input-mandatory">*</span></label>
                                    <input type="text"  value="{{old('fname')}}" name="fname" class="form-control" placeholder="First Name">
                                    <span class="text-danger error-msg fname"></span>                                      
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name <span class="input-mandatory">*</span></label>
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                    <span class="text-danger error-msg lname"></span>                                      
                                </div> 
                            </div> 
                                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Roll no. <span class="input-mandatory">*</span></label> 
                                    <input type="text" name="roll_no" class="form-control" placeholder="Roll No">
                                    <span class="text-danger error-msg roll_no"></span>
                                </div> 
                          </div>                                                                    
                          
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gender <span class="input-mandatory">*</span></label>                         
                                    <select name="gender" id="gender" class="form-control adi-modal-select2">
                                      <option value="" >Select One</option>
                                      <option value="male" {{(old('gender') == 'male')?'selected':''}}>Male</option>
                                      <option value="female" {{(old('gender') == 'female')?'selected':''}}>Female</option>                         
                                    </select>
                                    <span class="text-danger error-msg gender"></span>
                                </div> 
                            </div>  
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email <span class="input-mandatory">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                    <span class="text-danger error-msg email"></span>                                      
                                </div> 
                        </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone No. <span class="input-mandatory">*</span></label>
                                    <input type="text" name="phoneno" value="{{old('phoneno')}}" class="form-control digit-only" placeholder="Phone No">
                                    <span class="text-danger error-msg phoneno"></span>                                      
                                </div>  
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Address <span class="input-mandatory">*</span></label> 
                                <input type="text" name="address" class="form-control" placeholder="Address">
                                <span class="text-danger error-msg address"></span>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Department <span class="input-mandatory">*</span></label>                         
                                <select name="departmentid" id="departmentid" class="form-control adi-modal-select2">
                                    <option value="">Select One</option>
                                    @foreach ($department as $key)
                                    <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                                    @endforeach                         
                                </select>
                                <span class="text-danger error-msg departmentid"></span>
                            </div> 
                        </div> 
                        </div>
                </div>
                <div class="modal-footer">                                       
                    <button type="button"  onclick="addstudent()"class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                </div>
            </form>
            </div>
        </div>
      </div>  


      {{--edit--}}
      <div class="modal" id="edit-student-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:150%;">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit student</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="form-edit-student">
                        <input type="hidden" id="edit-student-id" name="id" value="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">First Name <span class="input-mandatory">*</span></label>
                                    <input type="text" id="edit-fname" value="{{old('fname')}}" name="fname" class="form-control" placeholder="First Name">
                                    <span class="text-danger error-msg fname"></span>                                      
                                </div> 
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Last Name <span class="input-mandatory">*</span></label>
                                    <input type="text" id="edit-lname" name="lname" value="{{old('lname')}}" class="form-control" placeholder="Last Name">
                                    <span class="text-danger error-msg lname"></span>                                      
                                </div> 
                            </div> 
                                   
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Roll no. <span class="input-mandatory">*</span></label> 
                                    <input type="text" id="edit-roll_no" value="{{old('roll_no')}}" name="roll_no" class="form-control" placeholder="Roll No">
                                    <span class="text-danger error-msg roll_no"></span>
                                </div> 
                          </div>                                                                    
                          
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Gender <span class="input-mandatory">*</span></label>                         
                                    <select name="gender" id="edit-gender" class="form-control adi-modal-select2">
                                      <option value="" >Select One</option>
                                      <option value="male" {{(old('gender') == 'male')?'selected':''}}>Male</option>
                                      <option value="female" {{(old('gender') == 'female')?'selected':''}}>Female</option>                         
                                    </select>
                                    <span class="text-danger error-msg gender"></span>
                                </div> 
                            </div>  
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email <span class="input-mandatory">*</span></label>
                                    <input type="text" id="edit-email" name="email" class="form-control" placeholder="Email">
                                    <span class="text-danger error-msg email"></span>                                      
                                </div> 
                        </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Phone No.<span class="input-mandatory">*</span></label>
                                    <input type="text" id="edit-phoneno" name="phoneno" value="{{old('phoneno')}}" class="form-control digit-only" placeholder="Phone No">
                                    <span class="text-danger error-msg phoneno"></span>                                      
                                </div>  
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Address <span class="input-mandatory">*</span></label> 
                                <input type="text" id="edit-address"  name="address" class="form-control" placeholder="Address">
                                <span class="text-danger error-msg address"></span>
                            </div> 
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Department <span class="input-mandatory">*</span></label> 
                                    <select name="departmentid" id="edit-departmentid" class="form-control adi-modal-select2">
                                        <option value="">Select One</option>
                                        @foreach ($department as $key)
                                        <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}} </option>
                                        @endforeach                         
                                    </select>
                                    <span class="text-danger error-msg departmentid"></span>
                                </div> 
                            </div>
                        </div>
                          </div>
                            <div class="modal-footer">                                       
                    <button type="button"  onclick="editstudent()"class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                             </div>
                 </form> 
            </div>
        </div>
      </div>  
      <script>
        function addstudent(){
            // $.loader.on()
           var fdata = $('#form-add-student').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("student.add")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#add-student-modal");
                   }else{
                      $("#add-student-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-add-student')[0].reset();
                   }
                }else{
                   $("#add-student-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-add-student')[0].reset();
                   $('#student-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });
       }
    </script>
    <script>
        $(document).ready(function () {         
          var table = $('#student-details-list').DataTable({         
          processing: true,
          serverSide: true,
          responsive: false,
        
          ajax: "{{ route('student.list') }}",
          columns: [
          { data: 'DT_RowIndex', name: 'id'},
          { data: 'fname', name: 'fname'},
          { data: 'lname', name: 'lname'},
          { data: 'departmentid', name: 'departmentid'}, 
          { data: 'email', name: 'email'}, 
          { data: 'phoneno', name: 'phoneno'}, 
          { data: 'roll_no', name: 'roll_no'}, 
          { data: 'gender', name: 'gender'}, 
          { data: 'address', name: 'address'}, 
          {data: 'action', name: 'action', orderable: false},              
          ],
        //   order: [[1, 'desc']]
          });
        });
    </script>
    <script>

        function edit(cid){
            $.ajax({
                method : "get",
                url : '{{route("student.get")}}',
                data :{id:cid},
                success :function(data){
                    $('#edit-student-id').val(data.id);
                    $('#edit-fname').val(data.fname);
                    $('#edit-lname').val(data.lname);
                    $('#edit-departmentid').val(data.departmentid).trigger('change');
                    $('#edit-email').val(data.email);
                    $('#edit-phoneno').val(data.phoneno);
                    $('#edit-roll_no').val(data.roll_no);
                    $('#edit-gender').val(data.gender).trigger('change');
                    $('#edit-address').val(data.address);
                    $("#edit-student-modal").modal('show');
                },
            });
        }
    </script>
    
    <script>
    function editstudent() {
        var fdata = $('#form-edit-student').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("student.edit")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#edit-student-modal");
                   }else{
                      $("#edit-student-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-edit-student')[0].reset();
                   }
                }else{
                   $("#edit-student-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-edit-student')[0].reset();
                   $('#student-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });
        }
    </script>
    {{-- <script>
        function changestatus(bid) {
      Swal.fire({
         title: 'Are you sure you want to change the status of this department?',
         showDenyButton: false,
         showCancelButton: true,
         confirmButtonText: 'Okay',
      }).then((result) => {
         if (result.isConfirmed) {
        $.loader.on();
            $.ajax({
               method: "post",
               url: '{{route("department.status")}}',
               data: {id:bid},
               success: function (data) {
                  if (data.error == 1) {
                     $.toast.notify(data.msg,'danger');
                  }else{
                     $.toast.notify(data.msg,'success');
                     $('#student-details-list').DataTable().draw();
                  }
                  $.loader.off();
               },
            });
         } else if (result.isDenied) {
          
         }
      });
   }
    </script> --}}
     <script>
        function departdeleted(bid) {
      Swal.fire({
         title: 'Are you sure you want to delete this?',
         showDenyButton: false,
         showCancelButton: true,
         confirmButtonText: 'Okay',
      }).then((result) => {
         if (result.isConfirmed) {
        // $.loader.on();
            $.ajax({
               method: "post",
               url: '{{route("student.delete")}}',
               data: {id:bid},
               success: function (data) {
                  if (data.error == 1) {
                     $.toast.notify(data.msg,'danger');
                  }else{
                     $.toast.notify(data.msg,'success');
                     $('#student-details-list').DataTable().draw();
                  }
                //   $.loader.off();
               },
            });
         } else if (result.isDenied) {
          
         }
      });
   }
    </script>
    
 @endsection