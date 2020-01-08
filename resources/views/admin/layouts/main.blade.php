<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.madebytilde.com/elephant-v1.4.0/theme-1/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Feb 2018 11:21:07 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="{{ asset('admin-panel/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-panel/css/elephant.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-panel/css/application.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-panel/css/contacts.min.css') }}">
  </head>
  <body class="layout layout-header-fixed">
    <div class="layout-header">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <a href="{{ route('admin.home') }}" class="oneji-logo">
            <img class="navbar-brand-logo" src="{{ asset('admin-panel/img/oneji-logo.svg') }}" alt="OneJI">
          </a>
         
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
          </button>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="{{ asset('admin-panel/img/0180441436.jpg') }}" alt="User photo">
            </span>
          </button>
        </div>
        <div class="navbar-toggleable">
          <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
            </button>
            <ul class="nav navbar-nav navbar-right">
              <li class="visible-xs-block">
                <h4 class="navbar-text text-center">Welcome to Admin panel</h4>
              </li>
              <li class="dropdown hidden-xs">
                <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                  <img class="circle" width="36" height="36" src="{{ asset('admin-panel/img/0180441436.jpg') }}" alt="User photo">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                  </li>
                </ul>
              </li>
              <li class="visible-xs-block">
                {{-- <a href="login-1.html">
                  <span class="icon icon-power-off icon-lg icon-fw"></span>
                  Sign out
                </a> --}}
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="icon icon-power-off icon-lg icon-fw"></span>
                    Sign out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
            </ul>
            <div class="title-bar">
              <h1 class="title-bar-title">
                <span class="d-ib">Portfolio Admin Panel</span>
              </h1>
              <p class="title-bar-description">
                <small>You can personalize your portfolio here.</small>
              </p>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav level-1">
                <li class="sidenav-heading">Menu</li>
                <li class="sidenav-item">
                    <a href="{{ route('site.resume') }}">
                        <span class="sidenav-icon icon icon-home"></span>
                        <span class="sidenav-label">Visit the web-site</span>
                    </a>
                </li>
                <li class="sidenav-item">
                  <a href="{{ route('admin.about') }}">
                    <span class="sidenav-icon icon icon-user"></span>
                    <span class="sidenav-label">About</span>
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="{{ route('admin.education') }}">
                    <span class="sidenav-icon icon icon-book"></span>
                    <span class="sidenav-label">Education</span>
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="{{ route('admin.experience') }}">
                    <span class="sidenav-icon icon icon-briefcase"></span>
                    <span class="sidenav-label">Experience</span>
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="{{ route('admin.contact') }}">
                    <span class="sidenav-icon icon icon-comment"></span>
                    <span class="sidenav-label">Contact messages</span>
                  </a>
                </li>
                <li class="sidenav-item">
                  <a href="{{ route('admin.portfolio') }}">
                    <span class="sidenav-icon icon icon-archive"></span>
                    <span class="sidenav-label">Portfolio</span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="layout-content">
        <div class="layout-content-body">
            @yield('content')
        </div>
      </div>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="copyright">{{ now()->year }}</small>
        </div>
      </div>
    </div>
    <script src="{{ asset('admin-panel/js/vendor.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/elephant.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/application.min.js') }}"></script>
    <script src="{{ asset('admin-panel/js/demo.min.js') }}"></script>
    @yield('scripts')
  </body>
</html>