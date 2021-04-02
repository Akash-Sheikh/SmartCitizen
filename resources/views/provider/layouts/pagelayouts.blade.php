<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/t_icon.png" type="image/Icon">
  <!-- Vector CSS 
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/> -->
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>

  <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet"/>
  <!-- kit font-->
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 


 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
  
</head>

<body class="bg-theme bg-theme8">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="{{ route('doctor.home') }}">
       <img src="assets/images/t_icon.png" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">DOKANBARI</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MENU</li>
      <li>
        <a href="{{ route('doctor.home') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>{{ __('Dashboard') }}</span>
        </a>
      </li>

      <li>
        <a href="{{ route('doctor.profile') }}">
        <i class="zmdi zmdi-face"></i><span>{{ __('Profile') }}</span>
        </a>
      </li>

                      <?php $a = 0; ?>
                      @foreach($appo as $value)

                             @if ($value->d_email == $doctor->email && $value->status == "pending")
                             <?php $a++; ?> 
                                                                          

                             @endif    

                       @endforeach
                       
      <li>
        <a href="{{ route('doctor.doctorAppoinment') }}">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>{{ __('Appointments') }}</span>                      
        </a>
      </li>

<!--     

      <li>
        <a href="#">
          <i class="fa fa-medkit"></i> <span>{{ __('Plasma Donation') }}</span>
        </a>
      </li>
      
      <li>
        <a href="#">
          <i class="zmdi zmdi-invert-colors"></i> <span>{{ __('Blood Donation') }}</span>
        </a>
      </li>      
-->
      <li>
        <a href="#">
         <i class="fa fa-address-card"></i> <span>{{ __('About') }}</span>
        </a>
      </li>      

      <li>
        <a href="#">
         <i class="fa fa-address-book"></i> <span>{{ __('Contact') }}</span>
        </a>
      </li> 
      
      <li>
        <a href="#">
          <i class="fab fa-blogger-b"></i> <span>{{ __('Blog') }}</span>
        </a>
      </li> 
      
      <li>
        <a href="#">
         <i class="fab fa-servicestack"></i> <span>{{ __('Services') }}</span>
        </a>
      </li>      

      <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top bg-dark">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a href="{{ route('doctor.doctorAppoinment') }}" class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect">
      <i class="fa fa-bell"></i>@if ($a)  {{$a}} @endif</a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="{{$doctor->profileimage}}" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="#">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="{{$doctor->profileimage}}" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">{{ Auth::user()->name }}</h6>
            <p class="user-subtitle">{{$doctor->email}}</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="#" onclick="event.preventDefault(); document.getElementById('setting-form').submit();"><i class="icon-envelope mr-2"></i>{{ __('Inbox') }}</a>
        <form id="inbox-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
        </form> 
        </li>               
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="#" onclick="event.preventDefault(); document.getElementById('setting-form').submit();"><i class="icon-settings mr-2"></i>{{ __('Setting') }}</a>
        <form id="setting-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
        </form> 
        </li>        
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-power mr-2"></i>{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
        </form>        
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

     <!--Start Dashboard Content-->

     <main  class="py-4">
            @yield('content')
     </main>

      <!--End Dashboard Content-->
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
           © <script>document.write(new Date().getFullYear());</script> DokanBari All rights reserved
        </div>
      </div>
    </footer>
	<!--End footer-->
	
  <!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i style="padding: 8px;" class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts 
  <script src="assets/js/jquery.loading-indicator.js"></script> -->
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="assets/js/index.js"></script>


<!-- For Datetime -->
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $(function () {
            $.extend(true, $.fn.datetimepicker.defaults, {
                icons: {
                    time: 'far fa-clock',
                    date: 'far fa-calendar',
                    up: 'fas fa-arrow-up',
                    down: 'fas fa-arrow-down',
                    previous: 'fas fa-chevron-left',
                    next: 'fas fa-chevron-right',
                    today: 'far fa-calendar-check-o',
                    clear: 'far fa-trash',
                    close: 'far fa-times'
                }
            });
        });
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker1').datetimepicker({
                  format: 'YYYY-MM-DD',
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker2').datetimepicker({
                  format: 'hh:mm a',
                  ignoreReadonly: true
                });
            });

            $(function () {
                $('#datetimepicker3').datetimepicker({
                  format: 'HH:mm',
                  ignoreReadonly: true
                });
            });

            $(function () {
              var minDate = new Date();

              minDate.setDate(minDate.getDate()-5); // set days - mean previous date from current date + mean future date from current date

                $('#datetimepicker4').datetimepicker({
                  format: 'YYYY-MM-DD',
                  minDate: minDate,
                  ignoreReadonly: true
                });
            });

            $(function () {
              var minDate = new Date();
              var maxDate = new Date();

              minDate.setDate(minDate.getDate()-5); // set days - mean previous date from current date + mean future date from current date
              maxDate.setDate(maxDate.getDate()+10);
                $('#datetimepicker5').datetimepicker({
                  format: 'YYYY-MM-DD',
                  minDate: minDate,
                  maxDate: maxDate,
                  ignoreReadonly: true
                });
            });

</script>



  
</body>
</html>
