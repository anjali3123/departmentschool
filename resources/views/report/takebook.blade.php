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

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Reports</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row" >
                        <h4 class="card-title col-md-8">Take Book Report</h4>
                        <div class="text-end col-md-4" >
                            @if (!$errors->has('from_date'))
                            @if ($list->count() > 0)
                            <a href="{{route('report.takebookexport',$requ)}}" class="btn btn-info text-white">Export</a>
                            {{-- <button type="button" class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#add-guidelines-modal" data-whatever="@mdo"><i class="fa fa-plus-circle"></i>  Add</button> --}}
                            @endif
                            @endif
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                        <div class="w-100">
                            <div id="contactreport">
                                <div class="card">
                                    <a class="card-header">
                                        <button type="button" class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                            <h5 class="mb-0"><b>Search</b></h5>
                                        </button>
                                    </a>
                                    <div id="collapse1" class="collapse" aria-labelledby="contactreport" data-parent="#contactreport">
                                          <div class="row">
                                            <div class="col-12">
                                                        <form class="form-control-line" id="search_form" action ="{{route('report.takebook')}}" method="get">
                                                            <div class="row">
                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="form-label">From Date</label>
                                                                    <input type="date" class="form-control" name="from_date" id="date" value="{{old('from_date',empty($requ['from_date'])?'':$requ['from_date'])}}"  />
                                                                    {{-- <input type="text" name="from_date" value="{{old('from_date',empty($requ['from_date'])?'':$requ['from_date'])}}" class="form-control adi-data-picker" placeholder="MM/DD/YYYY"> --}}

                                                                </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label class="form-label">To Date</label>
                                                                        <input type="date" class="form-control" name="to_date" id="date" value="{{old('to_date',empty($requ['to_date'])?'':$requ['to_date'])}}"  />
                                                                        {{-- <input type="text" name="to_date" value="{{old('to_date',empty($requ['from_date'])?'':$requ['to_date'])}}" class="form-control adi-data-picker" placeholder="MM/DD/YYYY"> --}}
                                                                    </div>
                                                              </div>
                                                              </div>
                                                              <div class="col-md-4">
                                                                <div class="form-group">
                                                                  <label class="form-control-label">Student <span class="input-mandatory">*</span></label>
                                                                    @php
                                                                          $requ['studentid'] = empty($requ['studentid'])?'':$requ['studentid'];
                                                                      @endphp
                                                                  <select name="studentid"   class="form-control adi-modal-select2">
                                                                    <option value="">All Student</option>
                                                                    @foreach ($student as $key)
                                                                    <option value="{{$key->id}}" {{($requ['studentid']== $key->id)?'selected':''}}>{{$key->fname}} {{$key->lname}}</option>
                                                                    @endforeach
                                                                </select>
                                                                  {{-- <span class="text-danger error-msg studentid"></span>                                               --}}
                                                              </div>
                                                            </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                  <div class="form-group ">
                                                                      <label class="form-control-label">Book</label>
                                                                      @php
                                                                          $requ['bookid'] = empty($requ['bookid'])?'':$requ['bookid'];
                                                                      @endphp
                                                                      <select name="bookid" class="form-control adi-select2">
                                                                        <option value="">All Book</option>
                                                                        @foreach ($book as $key)
                                                                        <option value="{{$key->id}}" {{($requ['bookid']== $key->id)?'selected':''}}>{{$key->name}}</option>
                                                                        @endforeach
                                                                      </select>

                                                                  </div>
                                                                </div>


                                                            </div>
                                                            <hr>
                                                            <button type="submit" class="btn btn-info text-white">Search</button>
                                                            <a href="{{route('report.takebook')}}" class="btn btn-primary text-white">Reset</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                         </div>
                                        </div>
                                    </div>
                                    @if (!$errors->has('from_date'))
                                   @if ($list->count() > 0)
                        <div class="table-responsive">
                            <table id="report-contact-list"
                                class="display nowrap table table-hover table-striped border"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>

                                        <th>Created At</th>
                                        <th>Student </th>
                                        <th>Book</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Return Date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($list as $lists)
                                     <tr>
                                        {{-- <td>{{ date("d-m-Y",strtotime($lists->created_at)) }}</td> --}}
                                        <td>{{ viewdate($lists->created_at) }}</td>
                                        <td>{{ empty($lists->student->fname)?'' : $lists->student->fname }} {{ empty($lists->student->lname)?'':$lists->student->lname }}</td>
                                        <td>{{ $lists->book->name }}</td>
                                        <td>{{ ($lists->status == 0)?'Isuue':'Return'}}</td>
                                        <td>{{ date("d-m-Y",strtotime($lists->to_date)) }}</td>
                                        <td>{{ empty($lists->return_date)?'': date("d-m-Y",strtotime($lists->return_date))}}</td>
                                       </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {!! $list->onEachSide(5)->links() !!}
                            {{-- {!! $list->onEachSide(5)->links() !!} --}}
                            {{-- {!! $list->links() !!} --}}
                        </div>

                        @else

                        <div class="alert adi-alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>No data found</strong>
                        </div>
                        @endif

                        @endif
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
@if (request()->all())
<script>
    $(document).ready(function(){
        $('#collapse1').collapse('show');
    });
</script>
@endif

@endsection
