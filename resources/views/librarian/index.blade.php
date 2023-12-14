
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
                        <h4 class="text-themecolor">Librarian</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Librarian</li>
                            </ol>
                            <a href="{{route('librarian.create')}}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</a>
                            {{-- <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#add-branch-modal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New</button> --}}
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
                                <h4 class="card-title">Librarian</h4>
                        </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="branch-details-list"
                                        class="display nowrap table table-hover table-striped border"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>  
                                                <th>Department</th>  
                                                <th>Phone No.</th>  
                                                <th>Status</th>  
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
      <div class="modal" id="add-branch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 119%">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Librarian </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="form-add-branch">
                        {{-- <input type="hidden" name="branchid" value="{{$id}}"> --}}
                        <input type="hidden" id="add-branch-id" name="id" value="">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label">Name <span class="input-mandatory">*</span></label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                              <span class="text-danger error-msg name"></span>                                              
                          </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Username <span class="input-mandatory">*</span></label> 
                          <input type="text" name="username" class="form-control" placeholder="Username">
                          <span class="text-danger error-msg username"></span>
                      </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Email<span class="input-mandatory">*</span></label> 
                          <input type="email" name="email" class="form-control" placeholder="Email">
                          <span class="text-danger error-msg email"></span>
                      </div> 
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Password<span class="input-mandatory">*</span></label> 
                          <input type="password" name="password" class="form-control" placeholder="Password">
                          <span class="text-danger error-msg password"></span>
                      </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Phone No.<span class="input-mandatory">*</span></label>
                            <input type="text"  name="phoneno" value="{{old('phoneno')}}" class="form-control digit-only" placeholder="Phone No">
                            <span class="text-danger error-msg phoneno"></span>                                      
                        </div>  
                  </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Department <span class="input-mandatory">*</span></label> 
                            <select name="departmentid" class="form-control adi-modal-select2">
                                <option value="">Select One</option>
                                @foreach ($department as $key)
                                <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                                @endforeach                         
                            </select>
                            <span class="text-danger error-msg departmentid"></span>
                        </div> 
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Status <span class="input-mandatory">*</span></label>                         
                          <select name="status" id="status" class="form-control adi-modal-select2">
                            <option value="1" {{(old('status') == '1')?'selected':''}}>Enable</option>
                            <option value="0" {{(old('status') == '0')?'selected':''}}>Disable</option>                         
                          </select>
                          <span class="text-danger error-msg status"></span>
                      </div> 
                    </div>
                </div>
                </div>
                <div class="modal-footer">                                       
                    <button type="button"  onclick="addbranch()"class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                </div>
            </form>
            </div>
        </div>
      </div>  

      <div class="modal" id="edit-branch-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 119%" >
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Librarian</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    
                    <form action="post" id="form-edit-branch">
                        <input type="hidden" id="edit-branch-id" name="id" value="">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label"> Name <span class="input-mandatory">*</span></label> </label> 
                              <input type="text" id="edit-name"name="name" class="form-control" placeholder="Name">
                              <span class="text-danger error-msg name"></span>                                        
                          </div> 
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">username <span class="input-mandatory">*</span></label> </label>
                            <input type="text" id="edit-username" name="username" class="form-control" placeholder="username">
                            <span class="text-danger error-msg username"></span>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Email<span class="input-mandatory">*</span></label> 
                          <input type="email" id="edit-email" name="email" class="form-control" placeholder="Email">
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
                            <label class="form-control-label">Department <span class="input-mandatory">*</span></label> 
                            <select name="departmentid" id="edit-departmentid" class="form-control adi-modal-select2">
                                <option value="">Select One</option>
                                @foreach ($department as $key)
                                <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                                @endforeach                         
                            </select>
                            <span class="text-danger error-msg departmentid"></span>
                        </div> 
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label">Status <span class="input-mandatory">*</span></label>
                            <select name="status" id="edit-status" class="form-control adi-modal-select2">
                            
                              <option value="1" {{(old('status') == '1')?'selected':''}}>Enable</option>
                              <option value="0" {{(old('status') == '0')?'selected':''}}>Disable</option>
                            </select>
                            <span class="text-danger error-msg status"></span>
                        </div>
                        </div>
                    </div>
                          </div>
                            <div class="modal-footer">                                       
                    <button type="button"  onclick="editbranch()"class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                             </div>
                 </form> 
            </div>
        </div>
      </div>  
      {{-- <script>
        function addbranch(){
            // $.loader.on()
           var fdata = $('#form-add-branch').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("librarian.add")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#add-branch-modal");
                   }else{
                      $("#add-branch-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-add-branch')[0].reset();
                   }
                }else{
                   $("#add-branch-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-add-branch')[0].reset();
                   $('#branch-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });
          

       }
    </script> --}}
    <script>
        $(document).ready(function () {         
          var table = $('#branch-details-list').DataTable({         
          processing: true,
          serverSide: true,
          responsive: false,
        
          ajax: "{{ route('librarian.list') }}",
          columns: [
          { data: 'DT_RowIndex', name: 'id'},
          { data: 'name', name: 'name'},
          { data: 'username', name: 'username'}, 
          { data: 'email', name: 'email'}, 
          { data: 'departmentid', name: 'departmentid'}, 
          { data: 'phoneno', name: 'phoneno'}, 
          { data: 'status', name: 'status'}, 
          {data: 'action', name: 'action', orderable: false},              
          ],
        //   order: [[1, 'desc']]
          });
        });
    </script>
    {{-- <script>

        function edit(cid){
            $.ajax({
                method : "get",
                url : '{{route("librarian.get")}}',
                data :{id:cid},
                success :function(data){
                    $('#edit-branch-id').val(data.id);
                    $('#edit-name').val(data.name);
                    $('#edit-username').val(data.username);
                    $('#edit-email').val(data.email);
                    $('#edit-phoneno').val(data.phoneno);
                    $('#edit-departmentid').val(data.departmentid).trigger('change');
                    $('#edit-status').val(data.status).trigger('change');
                    $("#edit-branch-modal").modal('show');
                },
            });
        }
    </script> --}}
    
    {{-- <script>
    function editbranch() {
        var fdata = $('#form-edit-branch').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("librarian.edit")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#edit-branch-modal");
                   }else{
                      $("#edit-branch-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-edit-branch')[0].reset();
                   }
                }else{
                   $("#edit-branch-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-edit-branch')[0].reset();
                   $('#branch-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });
          
        }
    </script> --}}
    <script>
        function changestatus(bid) {
      Swal.fire({
         title: 'Are you sure you want to change the status of this librarian?',
         showDenyButton: false,
         showCancelButton: true,
         confirmButtonText: 'Okay',
      }).then((result) => {
         if (result.isConfirmed) {
        // $.loader.on();
            $.ajax({
               method: "post",
               url: '{{route("librarian.status")}}',
               data: {id:bid},
               success: function (data) {
                  if (data.error == 1) {
                     $.toast.notify(data.msg,'danger');
                  }else{
                     $.toast.notify(data.msg,'success');
                     $('#branch-details-list').DataTable().draw();
                  }
                //   $.loader.off();
               },
            });
         } else if (result.isDenied) {
          
         }
      });
   }
    </script>
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
               url: '{{route("librarian.delete")}}',
               data: {id:bid},
               success: function (data) {
                  if (data.error == 1) {
                     $.toast.notify(data.msg,'danger');
                  }else{
                     $.toast.notify(data.msg,'success');
                     $('#branch-details-list').DataTable().draw();
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