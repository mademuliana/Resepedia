<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resepedia</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="icon" href="{{url('images/demo/resepedia_logo.png')}}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <meta name="token" id="token" value="{{ csrf_token() }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    
    <div id="app"></div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>