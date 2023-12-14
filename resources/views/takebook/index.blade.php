
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
                        <h4 class="text-themecolor">Take Book</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Take Book</li>
                            </ol>
                            {{-- <a href="{{route('branch.add')}}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</a> --}}
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#add-takebook-modal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New</button>
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
                                <h4 class="card-title">Take Book</h4>
                        </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="takebook-details-list"
                                        class="display nowrap table table-hover table-striped border"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>  
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Book</th>
                                                <th>Due Date</th>
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
      <div class="modal" id="add-takebook-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 119%">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Take Book </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="form-add-takebook">
                        {{-- <input type="hidden" name="takebookid" value="{{$id}}"> --}}
                        <input type="hidden" id="add-takebook-id" name="id" value="">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label">Student <span class="input-mandatory">*</span></label>
                              <select name="studentid"  class="form-control adi-modal-select2">
                                <option value="">Select One</option>
                                @foreach ($student as $key)
                                <option value="{{$key->id}}" {{(old('studentid') == $key->id)?'selected':''}}>{{$key->fname}} {{$key->lname}}</option>
                                @endforeach                         
                            </select>
                              <span class="text-danger error-msg studentid"></span>                                              
                          </div> 
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Book <span class="input-mandatory">*</span></label> 
                          <select name="bookid"  class="form-control adi-modal-select2">
                            <option value="">Select One</option>
                            @foreach ($book as $key)
                            <option value="{{$key->id}}" {{(old('bookid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                            @endforeach                         
                        </select>
                          <span class="text-danger error-msg bookid"></span>
                      </div> 
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label">Due Date<span class="input-mandatory">*</span></label>
                        <input type="date" class="form-control" name="to_date" id="date" placeholder="" />
                        <span class="text-danger error-msg to_date"></span>                                           
                    </div> 
                </div>
               
                </div>
                </div>
                <div class="modal-footer">                                       
                    <button type="button"  onclick="addbtakebook()"class="btn btn-info text-white">Take Book</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                </div>
            </form>
            </div>
        </div>
      </div>  

      <div class="modal" id="edit-takebook-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 119%" >
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Edit Take book</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    
                    <form action="post" id="form-takebook-branch">
                        <input type="hidden" id="edit-takebook-id" name="id" value="">
                        @csrf
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-control-label">Student <span class="input-mandatory">*</span></label>
                                <select name="studentid" id="edit-studentid"  class="form-control adi-modal-select2">
                                  <option value="">Select One</option>
                                  @foreach ($student as $key)
                                  <option value="{{$key->id}}" {{(old('studentid') == $key->id)?'selected':''}}>{{$key->fname}} {{$key->lname}}</option>
                                  @endforeach                         
                              </select>
                                <span class="text-danger error-msg studentid"></span>                                              
                            </div> 
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">Book <span class="input-mandatory">*</span></label> 
                            <select name="bookid" id="edit-bookid" class="form-control adi-modal-select2">
                              <option value="">Select One</option>
                              @foreach ($book as $key)
                              <option value="{{$key->id}}" {{(old('bookid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                              @endforeach                         
                          </select>
                            <span class="text-danger error-msg bookid"></span>
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Due Date<span class="input-mandatory">*</span></label>
                          <input type="date" class="form-control" id="edit-to_date" name="to_date" id="date" placeholder="" />
                          <span class="text-danger error-msg to_date"></span>                                           
                      </div> 
                  </div>
                  </div>   
                </div>
                            <div class="modal-footer">                                       
                    <button type="button"  onclick="edittakebook()"class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                             </div>
                 </form> 
            </div>
        </div>
      </div>  


      <div class="modal" id="view-takebook-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 119%" >
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">view Take book</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    
                    <form action="post" id="form-takebook-branch">
                        <input type="hidden" id="view-takebook-id" name="id" value="">
                        @csrf
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="form-control-label">Student</label>
                                  <input type="text" id="view-studentid"  name="studentid" class="form-control" placeholder="studentid" readonly>
                              </select>
                                                              
                            </div> 
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                            <label class="form-control-label">Book</label> 
                            <input type="text" id="view-bookid" name="bookid" class="form-control" placeholder="bookid" readonly>
                           
                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-control-label">Due Date</label>
                          <input type="date" class="form-control" id="view-to_date" name="to_date" id="date" placeholder="" readonly/>
                                                      
                      </div> 
                  </div>
                  <div class="modal-footer">                                       
                   
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                             </div>
                  </div>   
                </div>

                 </form> 
            </div>
        </div>
      </div> 









      <script>
        function addbtakebook(){
            // $.loader.on()
           var fdata = $('#form-add-takebook').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("takebook.add")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#add-takebook-modal");
                   }else{
                      $("#add-takebook-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-add-takebook')[0].reset();
                   }
                }else{
                   $("#add-takebook-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-add-takebook')[0].reset();
                   $('#takebook-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });

       }
    </script>
   <script>
        $(document).ready(function () {         
          var table = $('#takebook-details-list').DataTable({         
          processing: true,
          serverSide: true,
          responsive: false,
        
          ajax: "{{ route('takebook.list') }}",
          columns: [
          { data: 'DT_RowIndex', name: 'id'},
          { data: 'studentid', name: 'studentid'},
          { data: 'bookid', name: 'bookid'}, 
          { data: 'to_date', name: 'to_date'}, 
          { data: 'status', name: 'status'}, 
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
                url : '{{route("takebook.get")}}',
                data :{id:cid},
                success :function(data){
                    $('#edit-takebook-id').val(data.id);
                    $('#edit-studentid').val(data.studentid).trigger('change');
                    $('#edit-bookid').val(data.bookid).trigger('change');
                    $('#edit-to_date').val(data.to_date);
                    $('#edit-status').val(data.status).trigger('change');
                    $("#edit-takebook-modal").modal('show');
                },
            });
        }
    </script>
    <script>
      function view(cid){
          $.ajax({
              method : "get",
              url : '{{route("takebook.get")}}',
              data :{id:cid},
              success :function(data){
                  $('#view-takebook-id').val(data.id);
                  // $('#view-studentid'+select).val(data.studentid);
                  $('#view-studentid').val(data.student.fname +' '+data.student.lname+'');
                  $('#view-bookid').val(data.book.name);
                  $('#view-to_date').val(data.to_date);
                  $('#view-status').val(data.status);
                  $("#view-takebook-modal").modal('show');
              },
          });
      }
  </script>
    <script>
    function edittakebook() {
        var fdata = $('#form-takebook-branch').serialize();
          $.ajax({
             method: "POST",
             url: '{{route("takebook.edit")}}',
             data: fdata,
             success: function (data) {
                if (data.error == 1) {
                   if (data.vderror == 1) {
                    printErrorMsg(data.errors,"#edit-takebook-modal");
                   }else{
                      $("#edit-takebook-modal").modal('hide');
                      $.toast.notify(data.msg,'danger');
                      $('#form-edit-takebook')[0].reset();
                   }
                }else{
                   $("#edit-takebook-modal").modal('hide');
                   $.toast.notify(data.msg,'success');
                   $('#form-edit-takebook')[0].reset();
                   $('#takebook-details-list').DataTable().draw();
                }
                // $.loader.off()
             },
          });
          function printErrorMsg (msg) {
            $.each( msg, function( key, value ) {
            // console.log(key)
              $('.'+key+'').text(value);
            })
        }
        }
    </script>
    <script>
        function changestatus(bid) {
      Swal.fire({
         title: 'Are you sure you want to change the status of this Take book?',
         showDenyButton: false,
         showCancelButton: true,
         confirmButtonText: 'Okay',
      }).then((result) => {
         if (result.isConfirmed) {
        // $.loader.on();
            $.ajax({
               method: "post",
               url: '{{route("takebook.status")}}',
               data: {id:bid},
               success: function (data) {
                  if (data.error == 1) {
                     $.toast.notify(data.msg,'danger');
                  }else{
                     $.toast.notify(data.msg,'success');
                     $('#takebook-details-list').DataTable().draw();
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
       function disable()
      {
      var className = document.getElementById('#btn_red');
      document.getElementsByClassName('btn btn-sm btn-green text-white')[0].disabled=true;
      }
    </script>
    
    
 @endsection