<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">

        <title>Laporan Keuangan</title>
        {{--  <meta content="{{ dataSekolah('nama') }}" name="description">
        <meta content="{{ dataSekolah('nama') }}" name="author">  --}}

        {{--  <link rel="shortcut icon" href="{{ dataSekolah('icon') }}">  --}}
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.css') }}" rel="stylesheet" type="text/css">

        <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body class="fixed-left">
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        </div>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect"><i class="mdi mdi-close"></i></button>
                <div class="left-side-logo d-block d-lg-none">
                    <div class="text-center">
                        {{--  <a href="{{ url('/') }}">
                            Covid Test
                        </a>  --}}
                    </div>
                </div>
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title">Main</li>
                            @auth('admin')
                                @include('components.navigations.admin')
                            @endauth
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">
                        <div class="topbar-left d-none d-lg-block">
                            <div class="text-center text-white">
                                <h6 class="pt-2">Laporan Keuangan</h6>
                            </div>
                        </div>
                        <nav class="navbar-custom">
                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list nav-user">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        {{--  <img src="{{ url('/assets/images/users/avatar-1.jpg') }}" alt="Profile" class="rounded-circle">  --}}
                                        <span class="d-none d-md-inline-block ml-1">
                                            @auth('admin')
                                                {{ Auth::guard('admin')->user()->name }}
                                            @endauth
                                            <i class="mdi mdi-chevron-down"></i>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted"></i> Keluar</a>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item notification-list d-none d-sm-inline-block">
                                    @auth('admin')
                                        <a href="#" class="nav-link waves-effect">Admin</a>
                                    @endauth
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Top Bar End -->
                    <div class="page-content-wrapper">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h4 class="page-title m-0">
                                                    @yield('main-title')
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <b>Isian form tidak valid:</b>
                                        <ul>
                                            @foreach($errors->all() as $key => $value)
                                            <li>{{  $value  }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @if(session('msg'))
                                        <div class="alert alert-{{ session('msg')['type'] }} text-dark">{{ session('msg')['msg'] }}</div>
                                    @endif
                                </div>
                            </div>

                            @yield('body')

                        </div>
                        <!-- container fluid -->
                    </div>
                    <!-- Page content Wrapper -->
                </div>
                <footer class="footer">Copyright &copy; {{ date('Y') }} Creafted with <i class="mdi mdi-heart text-danger"></i> .</footer>
            </div>
        </div>

        {{--  modal for detail data  --}}
        <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-detail" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-detail-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="modal-detail-body"></div>
              </div>
            </div>
        </div>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

        @yield('pages-js')

<script>
    {{--  to display modal with detail data information   --}}
    function modal_detail(target, title) {
        $('#modal-detail-title').html(title);
        $('#modal-detail-body').load(target);
        $('#modal-detail').modal('show');
    }
    function confirm_delete(target, msg) {
    swal({
        title: "Are You Sure Want To Delete?",
        text: msg,
        type: "warning",
        showCancelButton: !0,
        confirmButtonClass: "btn btn-success",
        cancelButtonClass: "btn btn-danger m-l-10",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then(function (result) {
        if(result.value){
            $.ajax({
                url: target,
                dataType: 'json',
                method: "DELETE",
                data: "_token={{ csrf_token() }}",
                success: function(data) {
                    window.location = data.data;
                },
                error: function(data) {
                    console.log(data);
                },
            });
        }

    });
}
</script>
    </body>
</html>
