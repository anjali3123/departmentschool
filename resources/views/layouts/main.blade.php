<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/images/iconlibrary.png">
    <title>Library Management</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{asset('assets')}}/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets')}}/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/node_modules/select2/dist/css/select2.min.css">
    <link href="{{asset('assets')}}/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css" rel="stylesheet">
    <link href="{{asset('assets')}}/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    {{-- <link href="{{asset('assets')}}/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"> --}}
    <link href="{{asset('assets')}}/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('assets')}}/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('assets')}}/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/dist/css/pages/timeline-vertical-horizontal.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets')}}/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('assets')}}/dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="{{asset('assets')}}/dist/css/override.css" rel="stylesheet">
    <script src="{{asset('assets')}}/node_modules/jquery/dist/jquery.min.js"></script>


</head>

<body class="skin-default-dark fixed-layout">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            {{-- <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p> --}}
            <img src="{{asset('assets')}}/images/Infinity-loader.gif" alt="homepage" class="dark-logo" />
        </div>

    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{asset('assets')}}/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            {{-- <img src="{{asset('assets')}}/images/Zulucare-logo.png" alt="homepage" class="light-logo" /> --}}
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="{{asset('assets')}}/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->
                         </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li> --}}
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            {{-- <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i> --}}
                                {{-- <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div> --}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle text-white"><i class="fa fa-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle text-white"><i class="ti-calendar"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-info btn-circle text-white"><i class="ti-settings"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item dropdown"> --}}
                            {{-- <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i> --}}
                                {{-- <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div> --}}
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-end animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="{{asset('assets')}}/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="{{asset('assets')}}/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="{{asset('assets')}}/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="{{asset('assets')}}/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown mega-dropdown">
                            <div class="dropdown-menu animated bounceInDown">
                                <ul class="mega-dropdown-menu row">
                                    <li class="col-lg-3 col-xlg-2 m-b-30">
                                        <h4 class="m-b-20">CAROUSEL</h4>
                                        <!-- CAROUSEL -->
                                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <div class="container"> <img class="d-block img-fluid" src="{{asset('assets')}}/images/big/img1.jpg" alt="First slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{asset('assets')}}/images/big/img2.jpg" alt="Second slide"></div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="container"><img class="d-block img-fluid" src="{{asset('assets')}}/images/big/img3.jpg" alt="Third slide"></div>
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                        </div>
                                        <!-- End CAROUSEL -->
                                    </li>
                                    <li class="col-lg-3 m-b-30">
                                        <h4 class="m-b-20">ACCORDION</h4>
                                         <!-- Accordian -->
                                        <div class="accordion" id="accordionExample">
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingOne">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            Collapsible Group Item #1
                                                        </button>
                                                    </h5>
                                                </div>

                                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingTwo">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                                            Collapsible Group Item #2
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card m-b-0">
                                                <div class="card-header bg-white p-0" id="headingThree">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                                            aria-controls="collapseThree">
                                                            Collapsible Group Item #3
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        Anim pariatur cliche reprehenderit, enim eiusmod high.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-lg-3  m-b-30">
                                        <h4 class="m-b-20">CONTACT US</h4>
                                        <!-- Contact -->
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name"> </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Enter email"> </div>
                                            <div class="form-group">
                                                <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-info text-white">Submit</button>
                                        </form>
                                    </li>
                                    <li class="col-lg-3 col-xlg-4 m-b-30">
                                        <h4 class="m-b-20">List style</h4>
                                        <!-- List style -->
                                        <ul class="list-style-none">
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>
                                            <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle">
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        {{-- <div><img src="{{asset('assets')}}/images/users/5.jpg" alt="user-img" class="img-circle"></div> --}}
                        <span class="circle round" id="user-profile-init-text" style=" font-size: 26px;
                        line-height: 55px;
                        width: 53px;
                        height: 53px;
                        font-weight: 600;
                        text-transform: uppercase;
                        margin-left: 82px;
                        text-align: center;
                        border-radius: 100%;
                        background: #01c0c8;"></span>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}} <span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="{{route('user.profile')}}" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <a href="{{route('user.changepassword')}}" class="dropdown-item"><i class="ti-settings"></i> Change Password</a>
                                {{-- <a href="#" class="dropdown-item"><i class="fas fa-sliders-h"></i> Theme</a> --}}
                                <div class="dropdown-divider"></div>
                                <a href="{{route('logout')}}" class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">---  Menu</li>
						<li>
                            <a class="waves-effect waves-dark" href="{{route('dashboard')}}" aria-expanded="false">
                                <i class="icon-speedometer"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        {{-- @if (auth()->user()->roleid == 1) --}}
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('department.index')}}" aria-expanded="false">
                                <i class="fas fa-sitemap"></i>
                                <span class="hide-menu">Department</span>
                            </a>
                        </li>
                        {{-- @endif --}}
                        {{-- @if (auth()->user()->roleid == 1 OR auth()->user()->roleid == 2) --}}
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('librarian.index')}}" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="hide-menu">Librarian</span>
                            </a>
                        </li>
						<li>
                            <a class="waves-effect waves-dark" href="{{route('student.index')}}" aria-expanded="false">
                                <i class="fas fa-graduation-cap"></i>
                                <span class="hide-menu">Student</span>
                            </a>
                        </li>
                        {{-- @endif --}}

                        <li>
                            <a class="waves-effect waves-dark" href="{{route('book.index')}}" aria-expanded="false">
                                <i class="fas fa-book"></i>
                                <span class="hide-menu">Book</span>
                            </a>
                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{route('takebook.index')}}" aria-expanded="false">
                                <i class="icon-handbag"></i>
                                <span class="hide-menu">Take Book</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="{{route('file.index')}}" aria-expanded="false">
                                <i class="icon-handbag"></i>
                                <span class="hide-menu">File</span>
                            </a>
                        </li>

						<li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-copy"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('report.takebook')}}">Take Book Reports</a></li>
                                {{-- <li><a href="#">Payment Report</a></li>
                                <li><a href="#">Appointment Reports</a></li>
                                <li><a href="#">User Activity Report</a></li> --}}

                            </ul>
                        </li>


                        {{-- <li class="nav-small-cap">--- Settings</li> --}}

                        {{-- <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Access Settings</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">User Groups</a></li>
                                <li><a href="#">User Roles</a></li>
                                <li><a href="#">Module</a></li>
                                <li><a href="#">Permission</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="fas fa-archive"></i>
                            <span class="hide-menu">Archived Files</span>
                        </a>
                        </li> --}}

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        @yield('content')
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © {{date("Y")}} by ZuluCare
            {{-- <a href="https://www.wrappixel.com/">WrapPixel</a> --}}
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <script>
        function printErrorMsg (msg,el) {
            $.each( msg, function( key, value ) {
            // console.log(key)
              $(el).find('.'+key+'').text(value);
            })
        }
        function getInitOfName(t) {
           let a = t.split(' ');
           return a[0].charAt(0)+(a[1] || '').charAt(0);
        }
        function imagePreview(e,p) {
            var output = document.querySelector(p);
            output.src = URL.createObjectURL(e.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src)
            }
        }
    </script>
    @if ($msg = session('showalert'))
    <script>
      $(document).ready(function () {
        $.toast.notify('{!!$msg[1]!!}','{{$msg[0]}}');
        // $.toast.notify('{{$msg[1]}}','{{$msg[0]}}');
      });
   </script>
    @endif
    <script>
    $(document).ready(function() {
        $('.adi-select2').select2();
        $('.adi-modal-select2').mselect2();
        $('body').on('click','.show-image-popup',function () {
            $.imagepopup(this);
        });
        $(".colorpicker").asColorPicker({
            readonly: true,
            color: {
                alphaConvert: false,
            }
        });
    });
    </script>
    <script>
        $(document).ready(function () {
            $('.adi-datatime-picker').bootstrapMaterialDatePicker({ format: 'MM/DD/YYYY HH:mm', clearButton:true, clearButton:true });
            $('.adi-data-picker').bootstrapMaterialDatePicker({ format: 'MM/DD/YYYY' , time: false, date: true, clearButton:true });
            $('.adi-time-picker').bootstrapMaterialDatePicker({ format: 'HH:mm', time: true, date: false, clearButton:true });


            // jQuery('.adi-data-picker').datepicker({
        // autoclose: true,
        // todayHighlight: true
        // });
        // jQuery('.adi-datatime-picker').datepicker({
        // autoclose: true,
        // todayHighlight: true
        // });

        // $(".adi-data-picker").inputmask("99/99/9999");
        // $(".adi-datatime-picker").inputmask("99/99/9999 99:99");
        // $(".adi-time-picker").inputmask("99:99");

        })
    </script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
 </script>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets')}}/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('assets')}}/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="{{asset('assets')}}/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="{{asset('assets')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets')}}/dist/js/custom.min.js"></script>
    <script src="{{asset('assets')}}/dist/js/appct.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets')}}/node_modules/moment/moment.js"></script>
    <script src="{{asset('assets')}}/node_modules/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>

    <!--morris JavaScript -->
    <script src="{{asset('assets')}}/node_modules/raphael/raphael-min.js"></script>
    <script src="{{asset('assets')}}/node_modules/morrisjs/morris.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('assets')}}/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <!-- jQuery peity -->
    <script src="{{asset('assets')}}/node_modules/peity/jquery.peity.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/peity/jquery.peity.init.js"></script>


    <script src="{{asset('assets')}}/node_modules/select2/dist/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.20/dist/sweetalert2.all.min.js" integrity="sha256-6DBhCk8kLxWN6B/oKVfvB0ieNTCY2r0rlFlkAjLmrsM=" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets')}}/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('assets')}}/node_modules/jquery-asColor/dist/jquery-asColor.js"></script>
    <script src="{{asset('assets')}}/node_modules/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="{{asset('assets')}}/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('assets')}}/node_modules/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="{{asset('assets')}}/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>


    <script src="{{asset('assets')}}/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#user-profile-init-text").html(getInitOfName('{{auth()->user()->name}}'));
        })
    </script>

</body>

</html>
