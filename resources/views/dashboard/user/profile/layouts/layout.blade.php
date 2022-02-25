<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>USER DASHBOARD</title>

   
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            {{-- top navleft --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            {{-- top navtopright --}}
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="https://vinfastauto.com/themes/porto/img/logo-header.svg" style="background-color: white" alt="Vinfast Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">VINFAST</span>
            </a>
            {{--Left SideBar Content --}}
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                    <div class="image ml-3">
                        <img src="/image/testava.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info ">    
                        <a href="#" class="d-block" style="font-size: 22px;" id="fullnameUserLayout"></a>                           
                    </div>
                </div>

                

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('user.home')}}" class="nav-link"><i class="fas fa-home-alt mr-3"></i>HOME</a>
                        </li> 

                        <li class="nav-item">
                            <a href="{{route('user.profile.settings')}}" class="nav-link"><i class="fas fa-user mr-3"></i>PROFILE SETTING</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link"><i class="fas fa-shopping-cart mr-3"></i>ORDER HISTORY</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link"><i class="fas fa-paper-plane mr-3"></i>BOOK APPOINTMENT</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fas fa-sign-out mr-3"></i>Logout</a>
                            <form action="{{ route('user.logout') }}" id="logout-form" class="d-none"
                                method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>

            </div>

        </aside>

        <div>
            @yield('content')
        </div>
        {{--Right SideBar Content --}}
        <aside class="control-sidebar control-sidebar-dark">

            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>


        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>

            <strong>Copyright &copy; 2022 <a href="{{route('user.home')}}">VINFAST</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/profile/setting.js"></script>
    @stack('scriptsProfileSettings')
</body>

</html>
