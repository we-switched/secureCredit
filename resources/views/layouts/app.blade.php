<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <link href="../css/main_style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="../images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="../images/webclip.png" rel="apple-touch-icon">
</head>
<body class="body">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <div class="section-dark">
    <div class="structure-cards2-topbar-wrapper">
      <div class="wrap _w-custom structure-nav">
        <div data-collapse="small" data-animation="default" data-duration="400" role="banner" class="structure-menu w-nav">
          <div class="structure-cards-menu"><a href="{{url('/')}}"><img src="../images/logo.svg" width="180" alt="Secure Credit" class="image"></a>
            <nav role="navigation" class="structure-project-menu w-nav-menu">
              <div class="structure-menu-items">
                <div class="sections-menu-headline structure-menu-mobile w-hidden-main w-hidden-medium">Menu</div>
                
                @if(Auth::guest())              
                  <a href="{{url('/welcome#products')}}" class="structure-link structure-menu-link">Products & Services</a>
                  <a href="{{url('/info#about_us')}}" class="structure-link structure-menu-link" target="blank">Why choose us ?</a>
                  <a href="{{url('/welcome#contact_us')}}" class="structure-link structure-menu-link">Contact Us</a>
                  
                  <a class="structure-link structure-menu-link" data-toggle="modal" data-target="#partner_with_us_info">Partner with Us</a>
                  <div class="modal fade" id="partner_with_us_info" data-backdrop="false" tabindex="-1" role="dialog" aria-labelledby="partner_with_us" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content" style="background-color: black">
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
                  
                @elseif(Auth::user()->role == "Admin")       
                <a id="navbarDropdown" class="structure-link structure-menu-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      Hi, {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: rgb(56, 51, 51); color: whitesmoke">
                      <a class="dropdown-item drop" href="{{ route('logout') }}"
                          style="color: whitesmoke;"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      <a class="dropdown-item drop" href="{{ url('/home') }}" style="color: whitesmoke;">{{ __('Dashboard') }}</a>
                      <a class="dropdown-item drop" href="{{ url('/telecallers') }}" style="color: whitesmoke;">Manage Telecallers</a>
                      <a class="dropdown-item drop" href="{{ url('/agents') }}" style="color: whitesmoke;">Manage Agents</a>
                  </div>
                @else
                  <a id="navbarDropdown" class="structure-link structure-menu-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                     Hi, {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color: rgb(56, 51, 51); color: whitesmoke">
                      <a class="dropdown-item drop" href="{{ route('logout') }}" 
                      style="color: whitesmoke;"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      <a class="dropdown-item drop" href="{{ url('/home') }}" style="color: whitesmoke;">{{ __('Dashboard') }}</a>
                  </div>
                @endif
              </div>
            </nav>
            <div class="structure-cards2-menu-btn w-nav-button"><img src="https://uploads-ssl.webflow.com/5e84ed4ccad8a37c12f72d9e/5e84ed4c27e30b31c40e7884_menu-icon%402x.png" width="18" class="structurenav-menu"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class='container'>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    @if(session('formfill'))
        <div class="alert alert-success">
            {{session('formfill')}}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

</div>

@yield('content')
<div class="section-dark">
  <div class="footer1 footer1-dark">
    <div class="wrap w50-start">
      <div class="_6-col">
        <div class="footer1-column-headline">
          <div class="text-16">Secure Credit</div>
        </div>
          <p class="text-14 text-14-60"><a href="https://goo.gl/maps/kiAKpqMXwHUjpRba9" target="blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-map-marker" aria-hidden="true"></i> No:143, Maruthi towers,<br>7A cross road, HSR layout,<br>Bangalore 560102</a></p>
          <p class="text-14 text-14-60">All Rights Reserved © {{date('Y')}}</p>
        </div>
        <div class="_3-col">
          <div class="footer1-column-headline">
            <div class="text-16">Quick Links</div>
          </div>
          <p class="text-14 text-14-60"><a href="{{url('/info#about_us')}}" target="blank" style="text-decoration: none; color: whitesmoke">About Us</a></p>
          <p class="text-14 text-14-60"><a href="{{url('/info#privacy_policy')}}" target="blank" style="text-decoration: none; color: whitesmoke">Privacy Policy</a></p>
          <p class="text-14 text-14-60"><a href="{{url('/info#legal')}}" target="blank" style="text-decoration: none; color: whitesmoke">Legal</a></p>
          <p class="text-14 text-14-60"><a href="https://angel.co/company/secure-credit" target="blank" style="text-decoration: none; color: whitesmoke">Career</a></p>
        </div>
        <div class="_3-col" id="contact_us">
          <div class="footer1-column-headline">
            <div class="text-16">Contact Us</div>
          </div>
          <p class="text-14 text-14-60">
            <a href="tel:9353861327" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-phone" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 15px">+91 93538 61327</span></a><br>
            <a href="tel:9656199668" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-phone" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 15px">+91 96561 99668</span></a><br>
            <a href="mailto:contact@securecredit.in" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 15px">Mail</span></a><br>
            <a href="https://www.facebook.com/securecreditsocial/" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-facebook-square" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 18px">Facebook</span><br></a>
            <a href="https://twitter.com/SecureCredit1" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-twitter-square" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 17px">Twitter</span><br></a>
            <a href="https://www.linkedin.com/company/securecredit" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-linkedin" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 18px">LinkedIn</span><br></a>
            <a href="https://www.instagram.com/secure_credit/" target="_blank" style="text-decoration: none; color: whitesmoke"><i class="fa fa-instagram" aria-hidden="true" style="font-size: 1.25em"></i><span style="margin-left: 17px">Instagram</span><br></a>
          </p>
        </div>
      </div>
    </div>
    <div class="footer1 footer1-dark">
      <div class="wrap w50-start wss">
        <p class="text-14 text-14-60 wss">Handcrafted by <a href="https://weswitched.studio/" target="_blank" style="text-decoration: none; color: whitesmoke">We Switched Studio</a></p>
      </div>
    </div>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5ef71693a8f8390c2ce5a109" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5f0597eb5b59f94722ba52ad/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
  @tawk
</body>
</html>
