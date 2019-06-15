<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
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
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
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

</head>

<body id="body">

<!-- Header Start -->
@include("Frontend.includes.header")

<!-- Slider Start -->
<section class="page-title bg-2" style="height: 400px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h1 style="padding-top: 100px">Drop Us A Note</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img src="{{asset($categoryImage)}}" alt="" style="width: 100%">
            </div>
            <div class="col-md-10">
                @foreach($subcategories as $subcategory)
                    <br>
                    <p style="background-color: #474453;padding-left: 10px;color: white;">
                        {{$subcategory->translation->name}}
                    </p>
                    <table class="table table-hover table-condensed " style="font-size: 15px">
                        @foreach($subcategory->venom as $item)
                            <tr>
                                <td style="width: 20%">
                                    <a href="{{asset('/venom/'.$item->id)}}">{{$item->code}}</a>
                                </td>
                                <td style="width: 80%">
                                    <a href="{{asset('/venom/'.$item->id)}}">{{$item->translation->name}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</section>
<style>
    .table td, .table th{
        padding: 0;
    }
</style>
<!-- footer Start -->
@include('Frontend.includes.footer')

<!--
Essential Scripts
=====================================-->

<!-- <script src="js/jquery.counterup.js"></script> -->

<!-- Main jQuery -->

<script src="https://code.jquery.com/jquery-git.min.js"></script>
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
