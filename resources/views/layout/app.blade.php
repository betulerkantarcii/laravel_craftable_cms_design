<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="images/icons.svg" type="image/x-icon" />

        <title>ART B</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ mix('css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/all.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/animate.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/jquery.mmenu.all.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/owl.carousel.min.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/style.css') }}" rel="stylesheet"/>
    <link href="{{ mix('css/jssocials/jssocials.css') }}" type="text/css" rel="stylesheet"  />
    <link href="{{ mix('css/jssocials/jssocials-theme-flat.css') }}" type="text/css" rel="stylesheet" />
    @yield('styles')
  

</head>

<body style="background-color:#E8E5E5">

@include('partials.header')

@yield('content')





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.mmenu.all.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/scriptler.js"></script>
<script src="{{ mix('js/jssocials/jssocials.min.js') }}" type="text/javascript"></script>
</body>

</html>
