@extends('layouts.main')

@section('content')

<style>
</style>
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
                     <h4 class="text-themecolor">Dashboard</h4>
                 </div>
             </div>
             <!-- ============================================================== -->
             <!-- End Bread crumb and right sidebar toggle -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- Info box -->
             <!-- ============================================================== -->
             <!-- Row -->
             <div class="row">
      <div class="col-12">
            <div class="card adi-card">
                <div class="card-body">
                        <div class="row">
                            
                            {{-- <div class="col-md-3">
                                <div class="adi-form-group">
                                    <label>Department</label>
                                   
                                    <select name="departmentid" id="dash-filter-branch" onchange="getdashboarddata()" class="form-control adi-select2">
                                        <option value="">All Department</option>
                                        @foreach ($department as $key)
                                        <option value="{{$key->id}}" {{(old('departmentid') == $key->id)?'selected':''}}>{{$key->name}}</option>
                                        @endforeach
                                      </select>
                                      @if ($errors->has('departmentid'))
                                        <div class="form-control-feedback">{{ $errors->first('departmentid') }}</div>
                                      @endif
                                
                                    </select>
                                  </div>
                            </div> --}}
                            {{-- @else
                                <input type="hidden" name="branchid" value="{{auth()->user()->branchid}}">
                            @endif --}}
                            
                <div class="col-md-2">
                <div class="adi-form-group">
                
                </div>
                </div>
                  </div>
                   
                </div>
            </div>
            </div>
      </div>
      <!--row -->
      <div class="row" id="dashboard_data">
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body" >
                   
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="fas fa-user"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0" id="users" >-</h3>
                            <h5 class="text-muted m-b-0">Total No. of Librarians</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body" >
                   
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="fas fa-user"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0" id="enable_users" >-</h3>
                            <h5 class="text-muted m-b-0">Total No. of Enabled Librarians</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-info"><i class="fas fa-graduation-cap"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0" id="student">-</h3>
                            <h5 class="text-muted m-b-0">Total No. of Students</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="fas fa-book"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0" id="book">-</h3>
                            <h5 class="text-muted m-b-0">Total No. of Books</h5></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-row">
                        <div class="round align-self-center round-success"><i class="fas fa-address-book"></i></div>
                        <div class="m-l-10 align-self-center">
                            <h3 class="m-b-0" id="issue_book">-</h3>
                            <h5 class="text-muted m-b-0">Total No. of Issue Books</h5></div>
                    </div>
                </div>
            </div>
        </div>
                 
             </div>
             <!-- ============================================================== -->
             <!-- Total Leads -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- End Page Content -->
             <!-- ============================================================== -->
             <!-- ============================================================== -->
             <!-- Right sidebar -->
             <!-- ============================================================== -->
             <!-- .right-sidebar -->
             <div class="right-sidebar">
                 <div class="slimscrollright">
                     <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                     <div class="r-panel-body">
                         <ul id="themecolors" class="m-t-20">
                             <li><b>With Light sidebar</b></li>
                             <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme">1</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                             <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                             <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme working">7</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                             <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                         </ul>
                         <ul class="m-t-20 chatonline">
                             <li><b>Chat option</b></li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                             </li>
                             <li>
                                 <a href="javascript:void(0)"><img src="{{asset('assets')}}/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
             <!-- ============================================================== -->
             <!-- End Right sidebar -->
             <!-- ============================================================== -->
         </div>
         <!-- ============================================================== -->
         <!-- End Container fluid  -->
         <!-- ============================================================== -->
     </div>
     <!-- ============================================================== -->
     <!-- End Page wrapper  -->



<script>
    
    function getdashboarddata() {
        var id = $("#dashboard_data").val();
        // $.loader.on();
       $.ajax({
          method: "Post",
          url: '{{route("dashboard.getdashboarddata")}}',
          data: {id:id},
          success: function (data) {
             $("#users").text(data.users);
             $("#enable_users").text(data.enable_users);
             $("#student").text(data.student);
             $("#book").text(data.book);
             $("#issue_book").text(data.issue_book);
            // $.loader.off()
          },
       });
    }
 </script>
 <script>
    $(document).ready(function () {
       getdashboarddata();
    });
 </script>
@endsection


