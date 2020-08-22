@extends('layouts.newapp')

@section('title', 'Lease Rental Discounting')

@section('content')

<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Lease Rental Discounting</span></h1>
        </div>
    <form method="POST" action="{{url('/lease_rental_discounting_form')}}">
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
        
        <p><b>Employment Status</b></p>
        <select class="custom-select custom-mine" name="employmenttype" required>
            <option value="">Choose ...</option>
            <option value="Salaried" {{ old('employmenttype') == 'Salaried' ? 'selected' : '' }}>Salaried</option>
            <option value="Self Employed Professional" {{ old('employmenttype') == 'Self Employed Professional' ? 'selected' : '' }}>Self Employed Professional</option>
            <option value="Self Employed Business" {{ old('employmenttype') == 'Self Employed Business' ? 'selected' : '' }}>Self Employed Business</option>
        </select><br><br>

        <div class="form-group">
            <label for="netincome">Annual Income</label>
            <input type="number" min="0" class="form-control custom-mine @error('netincome') is-invalid @enderror" id="netincome" placeholder="Enter your annual income" name="netincome" value="{{ old('netincome') }}" required>
            @error('netincome')
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
            <label for="proceed" class="form-check-label"><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank" ><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
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
            {{-- <li class="nav-item">
              <a class="nav-link menu-btn" href="#contact">Offers & Schemes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-btn" href="#misc">Eligibility</a>
            </li> --}}
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            There are several type of business investments available in the market that can be considered as a business loan.<br><br>
            Here’s a list of some common types of Business Loan:<br><br>
            <ul>
                <li><a href="{{ url('/business_loan_form') }}"><b>Loans for Self-employed Entrepreneurs: </b></a><br>
                Business loan are offered by various banks & financial institutions across the country are customized & customer centric with a minimum interest rate for Business or MSME loans starting from 14.99% and onwards.<br><br>
                <li><a href="{{ url('/invoice_discounting_form') }}"><b>Invoice discounting: </b></a><br>
                Invoice discounting is probably the simplest form of invoice finance. As with all types of invoice finance, with invoice discounting you sell unpaid invoices to a lender and they give you a cash advance that’s a percentage of the invoice’s value. Once your customer has paid the invoice, the lender pays you the remaining balance minus their fee.<br><br>
                <li><a href="{{ url('/pos_based_loan_form') }}"><b>POS/Card swiping machine based loan: </b></a><br>
                POS based loans are offered to business which accepts credit/ debit card payments or online sales. Avail loans against card swipes of up to 300% of your monthly sales via POS machines. These collateral free loans are disbursed within 3 to 7 days. Minimum monthly sales via POS machines or online sales should be more than ₹50,000.<br><br>
                <li><a href="{{ url('/lease_rental_discounting_form') }}"><b>Lease rental discounting: </b></a><br>
                Lease Rental Discounting is a type of loans provided by financial institutions by using rental receipts as collateral. The financial institutions will examine long-term cash flow and provide the loan based on the exact amount. This loan is then payable by the rents promised.<br><br>
                <li><a href="{{ url('/invoice_discounting_form') }}"><b>Working Capital Loan: </b></a><br>
                A working capital loan is a loan that is taken to finance a company's everyday operations. These loans are not used to buy long-term assets or investments and are, instead, used to provide the working capital that covers a company's short-term operational needs.<br><br>
            </ul>
        </div>
    </div>
    {{-- <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            <table class="table table-bordered table-dark">
                <head>
                    <tr>
                        <th scope="col">Loan</th>
                        <th scope="col">Amount	From ₹2 lakhs to ₹1 crore</th>
                    </tr>
                    <tr>
                        <th scope="col">Credit Criteria</th>
                        <th scope="col">Get funding up to 300% of monthly card settlement</th>
                    </tr>
                    <tr>
                        <th scope="col">Tenure</th>
                        <th scope="col">Flexible tenure up to 36 months</th>
                    </tr>
                    <tr>
                        <th scope="col">Disbursal</th>
                        <th scope="col">Approval and disbursal within 3-5 days</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
            The eligibility criteria to get POS based loan depend up on these factors
            <ul>
                <li>The minimum Business operational history of 1 year.
                <li>Minimum 6 months card swipe history 
                <li>Minimum monthly card transactions starting from ₹.50K
                <li>ITR for 2 years is required for higher loan amount
            </ul>            
        </div>
    </div> --}}

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