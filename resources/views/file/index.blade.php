
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
                        <h4 class="text-themecolor">Book</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-end">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb justify-content-end">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">Book</li>
                            </ol>
                            {{-- <a href="{{route('branch.add')}}" class="btn btn-info d-none d-lg-block m-l-15 text-white"><i class="fa fa-plus-circle"></i> Create New</a> --}}
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white" data-bs-toggle="modal" data-bs-target="#add-file-modal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New</button>
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
                                <h4 class="card-title">Book</h4>
                        </div>
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table id="file-details-list"
                                        class="display nowrap table table-hover table-striped border"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th>#</th>
                                                <th>Book Name</th>
                                                <th>Author</th>
                                                <th>Book Stock</th>
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
      <div class="modal" id="add-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Add Book</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true"></span></button>
                </div>
                <div class="modal-body">
                    <form action="post" id="form-add-file">
                        {{-- <input type="hidden" name="branchid" value="{{$id}}"> --}}
                        <input type="hidden" id="add-file-id" name="id" value="">
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label">Name <span class="input-mandatory">*</span></label>
                              <input type="text" name="name" class="form-control" placeholder="Name">
                              <span class="text-danger error-msg name"></span>
                              
                                                                          
                          </div> 
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label">Upload File <span class="input-mandatory">*</span></label>
                              <input type="file"  class="form-control valid-filesize" data-size="10240" id="add-opninon-sheetname" name="filename[]" multiple >
                              <span class="text-danger error-msg filename"></span>
                          </div> 
                        </div>
                </div>
                <div class="modal-footer">                                       
                    <button type="button" id="add-file-submit"  class="btn btn-info text-white">Save</button>
                    <button type="button" class="btn btn-secondary"data-bs-dismiss="modal">Close</button>                                     
                </div>
            </form>
            </div>
        </div>
      </div>  


{{--stock view modal--}}
<script>
        $(document).ready(function () {         
            $("#add-file-submit").click(function(){
                var fdata = $('#form-add-file').serialize();
              
                $.ajax({
                    method: "post",
                    url: '{{route("file.add")}}',
                    data: new FormData($("#form-add-file")[0]),
                                        cache: false,
                    contentType: false,
                    enctype: 'multipart/form-data',
                    processData: false,
                    success: function (data) {
                        if (data.error == 1) {
                             printErrorMsg(data.errors,"#add-file-modal");
                            // laravelvalidtionerrors(data.errors,"#add-opinion-modal");
                            if (data.vderror == 1) {
                        }else{
                            $("#add-file-modal").modal('hide');
                            $.toast.notify(data.msg,'danger');
                            
                            $('#form-add-file')[0].reset();
                        }
                    }else{
                        $("#add-file-modal").modal('hide');
                        $.toast.notify(data.msg,'success');
                        
                        $('#form-add-file')[0].reset();
                        $('#file-details-list').DataTable().draw();
                    }

                },
                
            });
        });
    });
    </script>
    
      
    {{-- <script>
        $(document).ready(function () {         
          var table = $('#branch-details-list').DataTable({         
          processing: true,
          serverSide: true,
          responsive: false,
        
          ajax: "{{ route('book.list') }}",
          columns: [
          { data: 'DT_RowIndex', name: 'id'},
          { data: 'name', name: 'name'},
          { data: 'author', name: 'author'}, 
          { data: 'stock', name: 'stock'}, 
          {data: 'action', name: 'action', orderable: false},              
          ],
        //   order: [[1, 'desc']]
          });
        });
    </script> --}}

  
 @endsection