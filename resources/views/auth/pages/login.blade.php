<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">

        <title>Covid Test</title>

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
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

        <div class="account-pages">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 offset-md-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="p-2 text-center">
                                    <h4 class="text-muted mt-4">Login</h4>
                                </div>

                                <div class="p-2">
                                    @if (session('error'))
                                        <div class="alert alert-danger text-dark">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="form-horizontal m-t-20" action="{{ route('filter_login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input class="form-control" type="text"  required="" placeholder="Username" name="username">
                                            <input type="hidden" name="login_as" value="admin">
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="password" required="" placeholder="Password" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="mybutton" onclick="change()"> <label class="custom-control-label pt-1" for="mybutton">Lihat Password</label>
                                            </div>
                                        </div>


                                        <div class="form-group text-center row m-t-20">
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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

        <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
    function change()
    {
    var x = document.getElementById('password').type;
    if (x == 'password')
    {
        document.getElementById('password').type = 'text';
        document.getElementById('mybutton').innerHTML;
    }
    else
    {
        document.getElementById('password').type = 'password';
        document.getElementById('mybutton').innerHTML;
    }
    }
</script>

    </body>
</html>
