@extends('layouts.newapp')

@section('title', 'Instant Loan')

@section('content')

<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Instant Loan</span></h1>
        </div>
    <form method="POST" action="{{ url('/instant_loan_form') }}">
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

        <div class="form-group">
            <label for="presentaddress">Present Address</label>
            <textarea class="form-control custom-mine @error('presentaddress') is-invalid @enderror" id="presentaddress" placeholder="Enter your present address" name="presentaddress" value="{{ old('presentaddress') }}" required>{{ Request::old('presentaddress')}}</textarea>
            @error('presentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>    
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same" name="same" onclick="permanent(this.form)">
            <label class="form-check-label" for="same">Check this if your present and permanent address are same.</label>
        </div><br>

        <script language="JavaScript">
            function permanent(p) {
                if(p.same.checked == true)
                    p.permanentaddress.value = p.presentaddress.value;
                else
                    p.permanentaddress.value = "";
            }
        </script>
        
        <div class="form-group">
            <label for="permanentaddress">Permanent Address</label>
            <textarea class="form-control custom-mine @error('permanentaddress') is-invalid @enderror" id="permanentaddress" placeholder="Enter your permanent address" name="permanentaddress" value="{{ old('permanentaddress') }}" required>{{ Request::old('permanentaddress')}}</textarea>
            @error('permanentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>    
            @enderror
        </div>

        <p>Do you have Aadhar linked Mobile No. ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="aadharmobileno" name="aadharmobile" value="No" {{ old('aadharmobile') == "No" ? 'checked' : '' }} required>
            <label class="form-check-label" for="aadharmobileno">No</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="aadharmobileyes" name="aadharmobile" value="Yes" {{ old('aadharmobile') == "Yes" ? 'checked' : '' }} required>
            <label class="form-check-label" for="aadharmobileyes">Yes</label>
        </div><br>

        <div class="form-group">
            <label for="netincome">Monthly Income</label>
            <input type="number" min="0" class="form-control custom-mine @error('netincome') is-invalid @enderror" id="netincome" placeholder="Enter your net monthly income" name="netincome" value="{{ old('netincome') }}" required>
            @error('netincome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="loanamount">Required Loan Amount</label>
            <input type="number" min="0" class="form-control custom-mine @error('loanamount') is-invalid @enderror" id="loanamount" placeholder="Enter required loan amount" name="loanamount" value="{{ old('loanamount') }}" required>
            @error('loanamount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <p>Do you have internet banking access for your savings account ?</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="bankingaccessno" name="bankingaccess" value="No" {{ old('bankingaccess') == "No" ? 'checked' : '' }} required>
            <label class="form-check-label" for="bankingaccessno">No</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" id="bankingaccessyes" name="bankingaccess" value="Yes" {{ old('bankingaccess') == "Yes" ? 'checked' : '' }} required>
            <label class="form-check-label" for="bankingaccessyes">Yes</label>
        </div><br>

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
            <li class="nav-item">
                <h4><a class="nav-link menu-btn" href="#contact">Eligibility</a></h4>
            </li>
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            Instant Loan upto 2 lakhs with rate of interest starting from 12.5% per ANNUM.<br>Approval & Disbursal in 15 minutes through e-KYC.
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            <ul>
                <li>Age 19 years above 
                <li>Current address proof Aadhar is mandatory
                <li>Minimum salary : 12k
                <li>Mobile number should be updated in Aadhar 
                <li>Should have internet banking access
            </ul>
        </div>
    </div>

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