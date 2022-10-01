<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href={{asset('css/bootstrap.css')}}>
 <link rel="stylesheet" href={{asset('css/style.css')}}>
    <title>@yield('title')</title>
</head>
<body>

@include('inc.nav')



@yield('content')


</body>
<script src={{asset("js/bootstrap.bundle.js")}}></script>
<script src={{asset("js/javascript.js")}}></script>
<script src={{asset("js/jquery-3.6.1.min.js")}}></script>
</html>


