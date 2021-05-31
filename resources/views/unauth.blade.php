<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">

    <title>Covid Test</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="container text-center">
        <h3 class="" style="margin-top:40%;">You Dont Have Access To This Page</h3>
        {{--  <a href="{{ route('unauth.back') }}" class="btn btn-secondary mb-3"><i class="fa fa-fw fa-arrow-left"></i>Back</a>  --}}
    </div>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>
