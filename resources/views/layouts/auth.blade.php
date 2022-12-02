<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="page-header-fixed"  style="background-image: url('https://i0.wp.com/theluxurytravelexpert.com/wp-content/uploads/2018/05/ANANTARA-PEACE-HAVEN-TANGALLE.jpg?ssl=1');background-size: cover;">

    <div style="margin-top: 10%;"></div>

    <div class="container-fluid">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>