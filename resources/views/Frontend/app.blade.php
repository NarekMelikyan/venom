<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="description" content="Aviato E-Commerce Template">

    <meta name="author" content="Themefisher.com">

    <title>Airspace | Creative Agency Bootstrap template</title>

    <!-- Mobile Specific Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    {{--<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />--}}
    <!-- bootstrap.min css -->
{{--    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <!-- Ionic Icon Css -->
    <link rel="stylesheet" href="{{asset('/Ionicons/css/ionicons.min.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('/animate.css')}}">
    <!-- Magnify Popup -->
    <link rel="stylesheet" href="{{asset('/magnific-popup/dist/magnific-popup.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('/slick-carousel/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/slick-carousel/slick/slick-theme.css')}}">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

</head>

<body id="body">

<!-- Header Start -->
@include("Frontend.includes.header")

<!-- Slider Start -->
@include('Frontend.includes.slider')

<!-- Wrapper Start -->
<section class="about section" id="aboutSection">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-12">
                <div class="block">
                    <div class="section-title">
                        <h2>About Us</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id </p>
                </div>
            </div><!-- .col-md-7 close -->
            <div class="col-md-5 col-sm-12">
                <div class="block">
                    <img src="images/wrapper-img.png" alt="Img">
                </div>
            </div><!-- .col-md-5 close -->
        </div>
    </div>
</section>

<section class="call-to-action bg-1 section-sm overly">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2>We design delightful digital experiences.</h2>
                    <p>Read more about what we do and our philosophy of design. Judge for yourself The work and results <br> we’ve achieved for other clients, and meet our highly experienced Team who just love to design.</p>
                    <a class="btn btn-main btn-solid-border" href="#" >Tell Us Your Story</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- footer Start -->
@include('Frontend.includes.footer')

<!--
Essential Scripts
=====================================-->

<!-- <script src="js/jquery.counterup.js"></script> -->

<!-- Main jQuery -->

{{--<script src="https://code.jquery.com/jquery-git.min.js"></script>--}}
<!-- Bootstrap 3.1 -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<!-- Owl Carousel -->
<script src="{{asset('/slick-carousel/slick/slick.min.js')}}"></script>
<!--  -->
<script src="{{asset('/magnific-popup/dist/jquery.magnific-popup.min.js')}}"></script>
<!-- Mixit Up JS -->
<script src="{{asset('/mixitup/dist/mixitup.min.js')}}"></script>
<!-- <script src="plugins/count-down/jquery.lwtCountdown-1.0.js"></script> -->
<script src="{{asset('/SyoTimer/build/jquery.syotimer.min.js')}}"></script>


<!-- Form Validator -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>



<!-- Google Map -->
<script src="{{asset('/js/map.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

<script src="{{asset('/js/script.js')}}"></script>




</body>
</html>
