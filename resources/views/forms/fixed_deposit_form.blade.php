@extends('layouts.newapp')

@section('title', 'Fixed Deposit')

@section('content')
<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Fixed Deposit</span></h1>
        </div>
    <form method="POST" action="{{url('/fixed_deposit_form')}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control custom-mine @error('name') is-invalid @enderror" id="name" placeholder="Enter your name (as per PAN card)" name="name" value="{{ old('name') }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control custom-mine @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone No.</label>
            <input type="tel" pattern="[6789][0-9]{9}" size="10" class="form-control custom-mine @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone no." name="phone" value="{{ old('phone') }}" required>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>City</label>
            <div class="input-group">
                <select class="custom-select custom-mine selectpicker form-control" name="city" required>
                    <option value="">Choose ...</option>
                    <option value="Ahmedabad" {{ old('city') == 'Ahmedabad' ? 'selected' : '' }}>Ahmedabad</option>
                    <option value="Bangalore" {{ old('city') == 'Bangalore' ? 'selected' : '' }}>Bangalore</option>
                    <option value="Chennai" {{ old('city') == 'Chennai' ? 'selected' : '' }}>Chennai</option>
                    <option value="Coimbatore" {{ old('city') == 'Coimbatore' ? 'selected' : '' }}>Coimbatore</option>
                    <option value="Delhi" {{ old('city') == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                    <option value="Delhi NCR" {{ old('city') == 'Delhi NCR' ? 'selected' : '' }}>Delhi NCR</option>
                    <option value="Hyderabad" {{ old('city') == 'Hyderabad' ? 'selected' : '' }}>Hyderabad</option>
                    <option value="Indore" {{ old('city') == 'Indore' ? 'selected' : '' }}>Indore</option>
                    <option value="Kochi" {{ old('city') == 'Kochi' ? 'selected' : '' }}>Kochi</option>
                    <option value="Mumbai" {{ old('city') == 'Mumbai' ? 'selected' : '' }}>Mumbai</option>
                    <option value="Mysore" {{ old('city') == 'Mysore' ? 'selected' : '' }}>Mysore</option>
                    <option value="Noida" {{ old('city') == 'Noida' ? 'selected' : '' }}>Noida</option>
                    <option value="Pune" {{ old('city') == 'Pune' ? 'selected' : '' }}>Pune</option>
                    <option value="Trivandrum" {{ old('city') == 'Trivandrum' ? 'selected' : '' }}>Trivandrum</option>
                    <option value="Vizag" {{ old('city') == 'Vizag' ? 'selected' : '' }}>Vizag</option>
                </select>
            </div>
        </div>

        <br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="proceed" name="proceed" required>
            <label for="proceed" class="form-check-label"><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank"><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
        </div>
        
        <center><button type="submit" class="btn btn-primary">Submit</button></center>

    </form>

    <hr style="background-color:white;">

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav menu mr-auto">
            <li class="nav-item">
                <h4><a class="nav-link menu-btn" href="#about">Overview <span class="sr-only">(current)</span></a></h4>
            </li>
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            Transfer extra savings from your savings account to a fixed deposit and Increase your money’s worth passively. Our partners exclusive fixed deposits program offer the industry leading rates of return with returns of up to <b>16% per annum*</b><br><br>
            Features & Benefits:<br>
            <ul>
                <li>Flexible tenure.
                <li>Competitive interest rates paid to your savings account. (8.1% - 16% p.a.*)
                <li>Multiple fixed deposit schemes.
                <li>Flexible interest payable (monthly, quarterly, half yearly, annually or at maturity).
                <li>Convenient deposit booking through mobile banking
            </ul>
            Related products<br>
            <ul>
                <li><a href="{{ url('/savings_account_form') }}"><b>Savings account</b></a> with 8% p.a.*returns
                <li><a href="{{ url('/current_account_form') }}"><b>Current account</b></a> with 2% p.a.*returns
            </ul>
        </div>
    </div>
    <small>*(Subject to change as per financial institution’s discretion from time to time)</small>

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

</section>

@endsection