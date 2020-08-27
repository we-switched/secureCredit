<!--

=========================================================
* Neumorphism UI - v1.0.0
=========================================================

* Product Page: https://themesberg.com/product/ui-kits/neumorphism-ui
* Copyright 2020 Themesberg MIT LICENSE (https://www.themesberg.com/licensing#mit)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="120x120" href="./assets/img/brand/logo.svg">
<link rel="icon" type="image/png" sizes="32x32" href="./assets/img/brand/logo.svg">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/img/brand/logo.svg">
<link rel="manifest" href="./assets/img/brand/logo.svg">
<link rel="mask-icon" href="./assets/img/brand/logo.svg" color="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<!-- Fontawesome -->
<link type="text/css" href="{{ asset('vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

<!-- Pixel CSS -->
<link type="text/css" href="{{ asset('css/neumorphism.css') }}" rel="stylesheet">

<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body>
    <header class="header-global">
    <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-transparent navbar-theme-primary">
        <div class="container position-relative">
            <a class="navbar-brand shadow-soft rounded border border-light">
                <img class="navbar-brand-dark" src="{{ asset('/assets/img/brand/logo.svg') }}" alt="Logo light">
                <img class="navbar-brand-light" src="{{ asset('/assets/img/brand/logo.svg')}}" alt="Logo dark">
            </a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="./index.html" class="navbar-brand shadow-soft py-2 px-3 rounded border border-light">
                                <img src="./assets/img/brand/logo.svg" alt="Themesberg logo">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <a href="#navbar_global" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" title="close" aria-label="Toggle navigation"></a>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-auto">

                    <li class="nav-item">
                        <a href="{{url('/welcome#products')}}" class="nav-link">
                            <span class="nav-link-inner-text">Products and Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/info#about_us')}}" class="nav-link">
                            <span class="nav-link-inner-text">Why choose us ?</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/welcome#contact_us')}}" class="nav-link">
                            <span class="nav-link-inner-text">Contact Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-target="#partner_with_us_info" class="nav-link" data-toggle="modal">
                            <span class="nav-link-inner-text">Partner with us</span>
                        </a>
                    </li>
                </ul>
                
            </div>
            <div class="d-flex align-items-center">
                <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>

<div class="modal shadow-soft fade show" id="partner_with_us_info" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="partner_with_us" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="partner_with_us">Partner with Us</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:oldlace;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">   
        <p>Call us : +91 93538 61327</p>
        <p>Mail us : <a href="mailto:partner_support@securecredit.in?subject=Partner with Us">partner_support@securecredit.in</a></p>
          <div class="alert alert-info">Please attach your CV & all the relevant documents with the mail.<br>Become a Partner and make extra money without any investment</div>
      </div>
      <div class="modal-footer">
        <div class="col text-center">
          <a class="btn-2 apply-btn w-button" data-dismiss="modal">Close</a>
        </div>
      </div>
    </div>
  </div>
</div>



@yield('content')


    <footer class="d-flex pb-5 pt-6 pt-md-7 border-top border-light bg-primary">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                <h5>Quick Links</h5>
                <ul class="footer-links list-unstyled mt-2">
                    <li class="mb-1"><a class="p-2" target="_blank" href="{{url('/info#about_us')}}">About Us</a></li>
                    <li class="mb-1"><a class="p-2" target="_blank" href="{{url('/info#privacy_policy')}}">Privacy Policy</a></li>
                    <li class="mb-1"><a class="p-2" target="_blank" href="{{url('/info#legal')}}">Legal</a></li>
                    <li><a class="p-2" target="_blank" href="https://angel.co/company/secure-credit">Career</a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                
                <p> No:143, Maruthi towers,
                    7A cross road, HSR layout,
                    Bangalore 560102
                    
                    <br>All Rights Reserved ©2020</p>
                <p>
                    +91 9353861327, +91 9353861327
                </p>
                <p>
                    contact@securecredit.in
                </p>
                <div class="d-flex justify-content-center mb-5 mb-lg-0">
                    <div class="p-2 bd-highlight"> <a href="https://twitter.com/SecureCredit1" target="_blank" class="btn btn-icon-only btn-pill btn-primary">
                            <span aria-hidden="true" class="fab fa-twitter"></span>
                        </a></div>
                    <div class="p-2 bd-highlight"><a href="https://www.facebook.com/securecreditsocial/" target="_blank" class="btn btn-icon-only btn-pill btn-primary">
                            <span aria-hidden="true" class="fab fa-facebook"></span>
                        </a></div>
                    <div class="p-2 bd-highlight">  <a href="https://www.linkedin.com/company/securecredit/about/" target="_blank" class="btn btn-icon-only btn-pill btn-primary">
                            <span aria-hidden="true" class="fab fa-linkedin"></span>
                        </a></div>

                        <div class="p-2 bd-highlight">   <a href="https://www.instagram.com/secure_credit/" target="_blank" class="btn btn-icon-only btn-pill btn-primary">
                                <span aria-hidden="true" class="fab fa-instagram"></span>
                            </a></div>

                </div>
                   
                  
         
            </div>
            
        </div>
        <hr class="my-5">
        <div class="row">
            <div class="col">
            <div class="d-flex text-center justify-content-center align-items-center" role="contentinfo">
                <p class="font-weight-normal font-small mb-0">Handcrafted by <a href="https://www.weswitched.studio">We Switched Studio</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5ef71693a8f8390c2ce5a109" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="js/webflow.js" type="text/javascript"></script>
<!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->

    <!-- Core -->
<script src="./vendor/jquery/dist/jquery.min.js"></script>
<script src="./vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="./vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="./vendor/headroom.js/dist/headroom.min.js"></script>

<!-- Vendor JS -->
<script src="./vendor/onscreen/dist/on-screen.umd.min.js"></script>
<script src="./vendor/nouislider/distribute/nouislider.min.js"></script>
<script src="./vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="./vendor/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="./vendor/jarallax/dist/jarallax.min.js"></script>
<script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>
<script src="./vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
<script src="./vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="./vendor/prismjs/prism.js"></script>

<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Neumorphism JS -->
<script src="./assets/js/neumorphism.js"></script>
@tawk
</body>

</html>
