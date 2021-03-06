<header class="main-header">
    <!-- Logo -->
<a href="{{ URL::route('user.dashboard') }}" class="logo hidden-xs">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
      <img style="max-width: 50px; max-height: 50px;" src="@if(isset($appSettings['crm_settings']['logo_small'])) {{asset('storage/logo/'.$appSettings['crm_settings']['logo_small'])}} @else {{ asset('images/logo-xs.png') }} @endif" alt="logo-mini">
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <img style="max-width: 230px; max-height: 50px;" src="@if(isset($appSettings['crm_settings']['logo'])) {{asset('storage/logo/'.$appSettings['crm_settings']['logo'])}} @else {{ asset('images/logo-md.png') }} @endif" alt="logo-md">
      </span>
    </a>
	
    <!-- Header Navbar: style can be found in header.less -->
   <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
    
        <!-- Site Close -->
         <!-- Notifications: style can be found in dropdown.less-->
         <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-danger"><lable class="alert-image notification_badge">0</lable></span> </a>
            <ul class="dropdown-menu">
                <!-- <li class="header notificaton_header">You have 0 recent notifications</li>
                <li>
                        <ul class="menu notification_top">
                        </ul>
                      
                </li>
                <li class="footer"><a href="{{route('user.notification_unread')}}">See All Notifications</a></li>-->
            </ul>
        </li>                                                  

<!-- User Account: style can be found in dropdown.less -->
  <li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i>
        <span class="hidden-xs">{{auth()->user()->name}}</span><i class="caret"></i>
    </a>

    <ul class="dropdown-menu">
        <!-- Menu Body -->
         <li class="user-header">
            <div class="col-xs-6 text-center">
                <a href="{{ URL::route('profile') }}">
                    <div><i class="fa fa-briefcase"></i></div>
                    Profile
                </a>
            </div>
            <div class="col-xs-6 text-center password">
                <a href="{{ URL::route('change_password') }}">
                    <div><i class="fa fa-lock"></i></div>
                   Password
                </a>
            </div>
        </li>

        <!-- Menu Footer-->
          <li class="user-footer">
            <div class="col-xs-6 text-center">
                <a href="{{ URL::route('logout') }}">
                    <div><i class="fa fa-power-off"></i></div>
                    Log out
                </a>
            </div>
            <div class="col-xs-6 text-center password">
                <a href="{{ URL::route('lockscreen') }}">
                    <div><i class="fa fa-eye-slash"></i></div>
                    Lock Screen
                </a>
            </div>
        </li>
    </ul>
</li>         
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>