<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets')}}/images/iconlibrary.png">
    <title>Library System</title>
    
    <!-- page css -->

    <link href="{{asset('assets')}}/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="{{asset('assets')}}/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets')}}/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets')}}/dist/css/style.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/dist/css/override.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('assets')}}/dist/css/pages/dashboard1.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
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
    @yield('content')
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets')}}/node_modules/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets')}}/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets')}}/node_modules/toast-master/js/jquery.toast.js"></script>
    
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    @if ($msg = session('showalert'))
    <script>
      $(document).ready(function () {
        $.toast.notify('{!!$msg[1]!!}','{{$msg[0]}}');
      });
   </script>
    @endif
</body>

</html>