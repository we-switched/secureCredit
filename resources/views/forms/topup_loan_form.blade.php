@extends('layouts.newapp')

@section('title', 'Savings Account')

@section('content')

<section class="section section bg-soft pb-5 overflow-hidden z-2">
  <div class="container z-2">
      <div class="mt-6 mb-5">
          <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Top-up Loan</span></h1>
      </div>
    
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ url('/personal_loan_first_form') }}"><button class="btn btn-primary" type="button">Personal Loan Top-Up </button></a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('/business_loan_form') }}"><button class="btn btn-primary" type="button">Business Loan Top-Up </button></a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('/home_loan_form') }}"><button class="btn btn-primary" type="button">Home Loan Top-Up</button></a>
        </div>
        <div class="col-md-3">
          <a href="{{ url('/loan_against_property_form') }}"><button class="btn btn-primary" type="button">Mortgage Loan Top-Up </button></a>
        </div>
      </div>
    </div>
    <br>
    <br>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav menu mr-auto">
            <li class="nav-item">
              <h4><a class="nav-link menu-btn" href="#about">Overview <span class="sr-only">(current)</span></a></h4>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link menu-btn" href="#contact">Features & Benefits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-btn" href="#misc">Related Products</a>
            </li> --}}
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            <b>Top-up loan</b> or <b>Balance transfer</b> is the loan one takes over and above an already existing loan. The existing loan could either be a home loan, a personal loan, or any other form of loan. Timely payments on the existing loan favor your chances of getting a top-up loan.<br>
            It is an add-on facility offered by lenders to their existing customer of all kind of loans like <a href="{{ url('/personal_loan_first_form') }}"><b>Personal loans</b></a>, <a href="{{ url('/business_loan_form') }}"><b>Business loans</b></a>, <a href="{{ url('/home_loan_form') }}"><b>Home loans</b></a>, <a href="{{ url('/loan_against_property_form') }}"><b>Loan against property</b></a>, <a href="{{ url('/credit_card_balance_transfer_form') }}"><b>credit card</b></a>, etc.<br><br>

            <h5>Benefits of Top up loan</h5>
            <ul>
                <li><b>Lower interest rates:</b><br>
                        The most common benefit on loan top up is reduced interest rate; it leads to lower EMI and hence more monthly savings.
                <li><b>Maintain Credit Score</b><br>
                        Brought down interest will make it simpler for the cardholders to make payment and hence stabilize their credit score. They can even improve it with timely payments.
                <li><b>Transfer multiple accounts</b><br>
                        It helps in transferring all existing similar loans to a single account. Now the borrower can convert & payback all credit card debts from one place.
            </ul>
        </div>
    </div>
    {{-- <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            <ul>
                <li>Up to 8% per annum*returns on savings account.
                <li>Daily interest credit
                <li>No maintenance charges
                <li>Instant account opening
                <li>Lowest daily balance savings account
                <li>Digital savings app on-the-go
            </ul>
        </div>
    </div>
    <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
            <ul>
                <li>Savings account with 8% p.a.*returns
                <li><a href="{{ url('/current_account_form') }}" style="text-decoration: none; color: black">Current account with 2% p.a.*returns
                <li><a href="{{ url('/fixed_deposit_form') }}" style="text-decoration: none; color: black">Fixed deposits with 2% p.a.*returns</a>
            </ul>
        </div>
    </div>
 --}}
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
        var $content = $('.menu-content');
    
        function showContent(type) {
          $content.hide().filter('.' + type).show();
        }
    
        $('.menu').on('click', '.menu-btn', function(e) {
          showContent(e.currentTarget.hash.slice(1));
          e.preventDefault();
        }); 
    
        // show 'about' content only on page load (if you want)
        showContent('about');
    </script>
    <small>*(Subject to change as per financial institution’s discretion from time to time)</small>
  </section>

@endsection