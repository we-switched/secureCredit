@extends('layouts.app')

@section('title', 'Secure Credit')

@section('content')

<div data-animation="slide" data-duration="500" data-infinite="1" class="slider-2 section-dark w-slider">
  <div class="w-slider-mask">
    <div class="w-slide">
      <div class="hero2-dark personal_loan_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
          <h1 class="h1-jumbo slider-heading">Personal Loan</h1><a href="{{ url('/personal_loan_form') }}" style="text-decoration: none; color: whitesmoke" class="w-button slider-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-slide">
      <div class="hero2-dark business_loan_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
            <h1 class="h1-jumbo slider-heading">Business Loan</h1><a href="{{ url('/business_loan_form') }}" class="btn-mbl w-button slider-button" style="text-decoration: none; color: whitesmoke">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-slide">
      <div class="hero2-dark home_loan_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
            <h1 class="h1-jumbo slider-heading">Home Loan</h1><a href="{{ url('/home_loan_form') }}" style="text-decoration: none; color: whitesmoke" class="btn-mbl w-button slider-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-slide">
      <div class="hero2-dark top-up_loan_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
            <h1 class="h1-jumbo slider-heading">Top-Up Loan</h1><a href="{{ url('/topup_loan_form') }}" style="text-decoration: none; color: whitesmoke" class="btn-mbl w-button slider-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-slide">
      <div class="hero2-dark pos_based_loan_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
            <h1 class="h1-jumbo slider-heading">POS Based Loan</h1><a href="{{ url('/pos_based_loan_form') }}" style="text-decoration: none; color: whitesmoke" class="btn-mbl w-button slider-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-slide">
      <div class="hero2-dark savings_account_offer">
        <div class="wrap w50-center">
          <div class="hero2-text-wrap">
            <h1 class="h1-jumbo slider-heading">Savings Account</h1><a href="#{{ url('/savings_account_form') }}" style="text-decoration: none; color: whitesmoke" class="btn-mbl w-button slider-button">Apply Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="left-arrow w-slider-arrow-left">
      <div class="w-icon-slider-left"></div>
    </div>
    <div class="w-slider-arrow-right">
      <div class="icon w-icon-slider-right"></div>
    </div>
    <div class="w-slider-nav w-round"></div>
  </div>
  <div class="section-dark">
    <div class="wrap w50-80">
      <div class="headline-6-col">
        <h2>Our Process</h2>
      </div>
      <div class="content2-items">
        <div class="_3-col">
          <div class="content2-number-wrapper">
            <div class="content2-jumbonumber">01</div>
            <div class="decoline decoline-dark"></div>
            <h3>Information collection</h3>
            <p class="text-14 text-14-60">Collection of information from the customer's end. (Trust us, we'll keep it confidential)</p>
          </div>
        </div>
        <div class="_3-col">
          <div class="content2-number-wrapper">
            <div class="content2-jumbonumber">02</div>
            <div class="decoline decoline-dark"></div>
            <h3>Browsing for best plans</h3>
            <p class="text-14 text-14-60">We'll look for the best plans that suit your requirement.</p>
          </div>
        </div>
        <div class="_3-col">
          <div class="content2-number-wrapper">
            <div class="content2-jumbonumber">03</div>
            <div class="decoline decoline-dark"></div>
            <h3>Filter and choose</h3>
            <p class="text-14 text-14-60">We'll present to you the best fit plans and let you choose.</p>
          </div>
        </div>
        <div class="_3-col _3-col-last">
          <div class="content2-number-wrapper">
            <div class="content2-jumbonumber">04</div>
            <div class="decoline decoline-dark"></div>
            <h3>Get your loan</h3>
            <p class="text-14 text-14-60">Voila! You get your loan sanctioned within the shortest possible time!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-dark text-center">
    <div class="wrap w50">
      <div class="headline-6-col">
        <div class="tagline">Let us help you</div>
        <h2  id="products">Our Services</h2>
      </div>
      <div class="team2-people-row">
        
        <a href="{{url('/personal_loan_first_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-personal-loan"></div>
              <h3 class="team2-profilename">Personal Loan</h3>
            </div>
          </div>
        </div>
        </a>

        <a href="{{url('/business_loan_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-business-loan"></div>
              <h3 class="team2-profilename">Business Loan</h3>
            </div>
          </div>
        </div>
        </a>

        <a href="{{url('/home_loan_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col _4-col-last">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-home-loan"></div>
              <h3 class="team2-profilename">Home Loan</h3>
            </div>
          </div>
        </div>
        </a>

      </div>
      
      <div class="team2-people-row">
      
        <a href="{{url('/loan_against_property_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-loan-against-property"></div>
              <h3 class="team2-profilename">Loan against Property</h3>
            </div>
          </div>
        </div>
        </a>

        <a href="{{url('/pos_based_loan_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-pos-based-loan"></div>
              <h3 class="team2-profilename">POS Based<br>Loan</h3>
            </div>
          </div>
        </div>
        </a>

        <a href="{{url('/credit_card_balance_transfer_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col _4-col-last">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-credit-card-balance-transfer"></div>
              <h3 class="team2-profilename">Credit Card Balance Transfer</h3>
            </div>
          </div>
        </div>
        </a>

      </div>

      <div class="team2-people-row">

        <a href="{{url('/fixed_deposit_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-fixed-deposit"></div>
              <h3 class="team2-profilename">Fixed Deposit</h3>
            </div>
          </div>
        </div>
        </a>

        <a href="{{url('/current_account_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-current-account"></div>
              <h3 class="team2-profilename">Current Account</h3>
             </div>
          </div>
        </div>
        </a>

        <a href="{{url('/savings_account_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col _4-col-last">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-savings-account"></div>
              <h3 class="team2-profilename">Savings Account</h3>
            </div>
          </div>
        </div>
        </a>

      </div>

      <div class="team2-people-row">

        <a href="{{url('/insurance_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-insurance"></div>
              <h3 class="team2-profilename">Insurance</h3>
            </div>
          </div>
        </div>
        </a>
        
        <a href="{{url('/mutual_funds_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
            <div class="team2-profile-card team2-profile-card-dark">
                <div class="team2-profilecard-wrapper">
                    <div class="profile-pic-mutual-funds"></div>
                    <h3 class="team2-profilename">Mutual Funds</h3>
                </div>
            </div>
        </div>
        </a>
            
        <a href="{{url('/demat_account_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col _4-col-last">
            <div class="team2-profile-card team2-profile-card-dark">
                <div class="team2-profilecard-wrapper">
                    <div class="profile-pic-demat-account"></div>
              <h3 class="team2-profilename">Demat Account</h3>
            </div>
          </div>
        </div>
        </a>
        
    </div>
    
    <div class="team2-people-row">
        
        <a href="{{url('/invoice_discounting_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
            <div class="team2-profile-card team2-profile-card-dark">
                <div class="team2-profilecard-wrapper">
                    <div class="profile-pic-invoice-discounting"></div>
                    <h3 class="team2-profilename">Invoice Discounting</h3>
                </div>
            </div>
        </div>
        </a>
    
        <a href="{{url('/lease_rental_discounting_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
            <div class="team2-profile-card team2-profile-card-dark">
                <div class="team2-profilecard-wrapper">
                    <div class="profile-pic-lease-rental-discounting"></div>
                    <h3 class="team2-profilename">Lease Rental Discounting</h3>
                </div>
            </div>
        </div>
        </a>      
        
        <a href="{{url('/topup_loan_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col _4-col-last">
            <div class="team2-profile-card team2-profile-card-dark">
                <div class="team2-profilecard-wrapper">
                    <div class="profile-pic-top-up-loan"></div>
                    <h3 class="team2-profilename">Top-Up<br> Loan</h3>
                </div>
            </div>
        </div>
        </a>
    
    </div>
            
      <a href="{{url('/instant_loan_form')}}" style="text-decoration: none; color: whitesmoke">
        <div class="_4-col">
          <div class="team2-profile-card team2-profile-card-dark">
            <div class="team2-profilecard-wrapper">
              <div class="profile-pic-instant-loan"></div>
              <h3 class="team2-profilename">Instant Loan</h3>
            </div>
          </div>
        </div>
      </a>
    
    <div class="_4-col">
      <div class="team2-profile-card team2-profile-card-dark">
        <div class="team2-profilecard-wrapper">
          <div class="profile-pic-buy-sell-property"></div>
          <h3 class="team2-profilename" style="font-size:22px;">Buy & Sell Property</h3>
          <div class="btn-warning btn-xs coming-soon">Coming Soon</div>
        </div>
        <br>
          <p style="margin-top:-20px;"></p>
      </div>
    </div>

    </div>
  </div>

  <div class="section-dark">
    <div class="wrap w50-start">
      <div class="_6-col">
        <div class="content5-headline-wrapper">
          <h1 class="h1-jumbo">Why Choose Us?</h1>
        </div>
      </div>
      <div class="_6-col _6-col-last">
        <div class="content5-description">
          <p class="text-16 text-16-60 text-center">
            To ease your process of fetching a loan, we are at your service! Allow us to help you and we'll surely help you all we can.<br><br>
            Our process is quick and effective, no long queues. Taking a loan won't frighten you anymore because we assure you a healthy loan delivery.<br><br>
            Our processing charges are minimal because we know it takes a lot to earn money. A little sum to get a loan of your desired amount is what we are here for.<br><br>
            We won't vanish right after we meet, we'll be at your service 24x7 and so, there'd be no compromises. Our services are premium and customer friendly.</p>
        </div>
      </div>
    </div>
  </div>

  <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
  <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }
  </script>
@endsection