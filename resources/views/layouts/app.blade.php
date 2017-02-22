<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweet-alert.css') }}" rel="stylesheet">
    @stack('css')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong class="text-primary">
                            <i class="fa fa-venus-double text-danger" aria-hidden="true"></i>
                            {{ config('app.name', 'Laravel') }}
                        </strong>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="icon-login text-success"></i>
                                    <small>
                                        <strong>
                                            เข้าสู่ระบบ
                                        </strong>
                                    </small>
                                </a>
                            </li>
                            
                        @else
                            <li>
                                <a href="{{route('injectvaccines.index')}}">
                                    <i class="icon-pin text-primary"></i>
                                    <small>
                                        <strong>
                                            ฉีดวัคซีน
                                        </strong>
                                    </small>
                                </a>
                            </li><li>
                                <a href="{{route('vaccines.index')}}">
                                    <i class="icon-chemistry text-primary"></i>
                                    <small>
                                        <strong>
                                            วัคซีน
                                        </strong>
                                    </small>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('kids.index')}}">
                                    <i class="icon-emotsmile text-primary"></i>
                                    <small>
                                        <strong>
                                            ข้อมูลเด็ก
                                        </strong>
                                    </small>
                                </a>
                            </li>

                            <li>
                                <a href="{{route('mums.index')}}">
                                    <i class="icon-user-female text-primary"></i>
                                    <small>
                                        <strong>
                                            ข้อมูลแม่
                                        </strong>    
                                    </small>    
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="{{asset('uploads/'. Auth::user()->images)}}" alt="user-img" class="img-circle" width="20">
                                        <strong>
                                            {{ Auth::user()->name }} 
                                        </strong>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('profiles')}}">
                                            <i class="icon-user text-success"></i>
                                            <small>
                                                <strong>
                                                    รูปประจำตัว
                                                </strong>
                                            </small> 
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('register') }}">
                                            <i class="icon-user-follow text-primary"></i>
                                            <small>
                                                <strong>
                                                    เพิ่มผู้ใช้งาน
                                                </strong>
                                            </small> 
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="icon-logout text-danger"></i>
                                            <small>
                                                <strong>
                                                    ออกจาระบบ
                                                </strong>
                                            </small>
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sweet-alert.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
