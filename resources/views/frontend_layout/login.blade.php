<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  
  <!-- FAVICON -->
  <link href="{{asset('frontend-layout/')}}img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('frontend-layout')}}/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('frontend-layout')}}/plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="{{asset('frontend-layout')}}/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="{{asset('frontend-layout')}}/plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="{{asset('frontend-layout')}}/plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{asset('frontend-layout')}}/css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
@include('layouts.app_css')

<body class="body-wrapper">


  <section class="login py-5 border-top-1">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-5 col-md-8 align-item-center">
                  <div class="border">
                      <h3 class="bg-gray p-4">Login Now</h3>
                      <fieldset class="p-4">
                            <form id="front_loginForm" action="{{url('front/checkLogin')}}" method="post">
                              @csrf
                              <input type="text" id="email" name="email" placeholder="email" class="border p-3 w-100 my-2">
                              <input type="password" id="password" name="password" placeholder="Password" class="border p-3 w-100 my-2">
                              <div class="loggedin-forgot">
                                <input type="checkbox" id="keep-me-logged-in">
                                <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                              </div>
                              <button type="submit" id="loginBtn" class="d-block py-3 px-5 bg-primary text-white border-0 rounded font-weight-bold mt-3">Log in</button>
                              <a class="mt-3 d-block  text-primary" href="#">Forget Password?</a>
                              <a class="mt-3 d-inline-block text-primary" href="{{url('front/register')}}">Register Now</a>
                            </form>
                          </fieldset>
                  </div>
              </div>
          </div>
      </div>
  </section>

<!--============================
=            Footer            =
=============================-->

<!-- JAVASCRIPTS -->
<script src="{{asset('frontend-layout')}}/plugins/jQuery/jquery.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/popper.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="{{asset('frontend-layout')}}/plugins/tether/js/tether.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/raty/jquery.raty-fa.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/slick-carousel/slick/slick.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="{{asset('frontend-layout')}}/plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="{{asset('frontend-layout')}}/plugins/google-map/gmap.js"></script>
<script src="{{asset('frontend-layout')}}/js/script.js"></script>

</body>

</html>