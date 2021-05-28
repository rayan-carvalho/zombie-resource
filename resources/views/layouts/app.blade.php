<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <div id="app">       
        @include('layouts.header')
        
            @if( Request::segment(1) == 'login' ) 
           
                <body class="hold-transition login-page">
                    <div class="login-box">
                        <div class="login-logo">
                            <a href="../../index2.html"><b>Admin</b>LTE</a>
                        </div>
                        <div class="login-box-body">
                            <p class="login-box-msg">Sign in to start your session</p>
                            @yield('content')

                        </div>
                    </div>
                </body>
                  
            @else
            <body class="hold-transition sidebar-mini layout-fixed">   
                @include('sweetalert::alert')          
                <!-- wrapper -->
                <div class="wrapper">
                    @include('layouts.navbar')
                    @include('layouts.sidebar')
                    <!-- content-wrapper -->
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    <!-- content-wrapper -->
                </div>
                <!-- wrapper -->
                @include('layouts.footer')
            </body>
            @endif        
        
        
    </div>
    @component('layouts.scripts')
        @yield('scripts')
    @endcomponent   
</html>
