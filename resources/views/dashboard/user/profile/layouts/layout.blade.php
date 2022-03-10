<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Dashboard</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/profile/layout.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        .main-header {
            background-color: rgb(61, 105, 225);
            color: white;
            height: 58px !important;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-light">
            {{-- top navleft --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" style="color: white" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" style="color: white">{{ __('UserProfilesettings.Home') }}</a>
                </li>

            </ul>
            {{-- top navtopright --}}
            <ul class="navbar-nav ml-auto navright" style="align-items: center; ">
                <li class="nav-item">
                    <div class="switch mt-1">
                        <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox">
                        <label for="language-toggle"></label>
                        @if (App::getLocale() == 'vi')
                            <span class="on" id="activeLang">VN</span>
                            <span class="off" id="disableLang">EN</span>
                        @elseif(App::getLocale() == 'en')
                            <span class="on" id="activeLang">EN</span>
                            <span class="off" id="disableLang">VN</span>
                        @endif
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

            <a href="{{route('user.home_auth')}}" class="brand-link d-flex justify-content-around">
                
                <span class="brand-text font-weight-light">>>>>VINFAST<<<<</span>
            </a>
            {{-- Left SideBar Content --}}
            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-around ">
                    <div class="image ml-3 ">
                        <!-- Button trigger modal -->
                        <img src="" id="showAvatarUser" class="img-circle elevation-2 showUploadImgModal"
                            alt="User Image" style="width:4.1rem;">
                        <!-- Modal -->
                        <div class="modal fade" id="editAvatar" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title">{{ __('UserProfileSettings.Edit Avatar') }}</h2>
                                        <button type="button" class="close XCloseModal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul id="saveForm_errList_avatar"></ul>
                                        <form action="" method="POST" id="formEditAvatar" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" class="idToken" value="{{ csrf_token() }}">
                                            <input type="hidden" name="customer_id" class="customer_id" value="">
                                            <input type="hidden" name="fullname" id="fullnameIDforAva" value="">

                                            <div class="form-group">
                                                <label>{{ __('UserProfileSettings.Avatar') }}</label> <br>
                                                <input type="file" class="" name="image_upload"
                                                    id="uploadImgBtn"><br>


                                            </div>


                                            <button type="submit" id="updateAvatarBtn"
                                                class=" btn btn-primary submitButton formRound">{{ __('UserProfilesettings.UPDATE') }}</button>
                                        </form>


                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info d-flex align-items-center">
                        <a href="#" class="d-block " id="fullnameUserLayout"></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('user.home_auth')}}" class="nav-link"><i
                                    class="fas fa-home-alt mr-3"></i>{{ __('UserProfilesettings.Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.profile.settings') }}" class="nav-link"><i
                                    class="fas fa-user mr-3"></i>{{ __('UserProfilesettings.Profile Setting') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.profile.order_history')}}" class="nav-link"><i
                                    class="fas fa-shopping-cart mr-3"></i>{{ __('UserProfilesettings.Order History') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.ordertracking')}}" class="nav-link"><i class="fas fa-search mr-3"></i>{{ __('Order Tracking') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="/user/auth/CostEstimate" class="nav-link"><i
                                    class="fas fa-dollar-sign mr-3"></i>{{ __('UserProfilesettings.Cost Estimation') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('user.CustomerOrder')}}" class="nav-link"><i
                                    class="fas fa-paper-plane mr-3"></i>{{ __('UserProfilesettings.Order Car') }}</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.logout') }}" class="nav-link"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out mr-3"></i>{{ __('UserProfilesettings.Logout') }}</a>
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
        {{-- Right SideBar Content --}}
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

            <strong>Copyright &copy; 2022 <a href="{{ route('user.home') }}">VINFAST</a>.</strong> All rights
            reserved.
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="/js/profile/setting.js"></script>
    @stack('scriptOrder_HisTory')

</body>

</html>
