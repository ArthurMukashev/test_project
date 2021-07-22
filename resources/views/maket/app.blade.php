<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.css">
    <title>@yield('title')</title>
</head>
<body>
@include('inc.header')
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.js"></script>
<script src="js/jquery.mask.js"></script>
@yield('content')
</body>
</html>
