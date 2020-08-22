@extends('layouts.newapp')

@section('title', 'Credit Card Balance Transfer')

@section('content')

<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Credit Card Balance Transfer</span></h1>
        </div>
    <form method="POST" action="{{url('/credit_card_balance_transfer_form')}}">
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
            <p><b>Have you availed moratorium offered by RBI ?</b></p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium') == "No" ? 'checked' : '' }} required>
                <label class="form-check-label" for="moratoriumno">No</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium') == "Yes" ? 'checked' : '' }} required>
                <label class="form-check-label" for="moratoriumyes">Yes</label>
            </div><br>
        </div>
        
        <div class="form-group">
            <p><b>Type of employment</b></p>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="employmenttype" value="Salaried" id="salaried" {{ old('employmenttype') == "Salaried" ? 'checked' : '' }} required onclick="check()">
                <label class="form-check-label" for="salaried">Salaried</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="employmenttype" value="Self Employed" id="selfemployed" {{ old('employmenttype') == "Self Employed" ? 'checked' : '' }} required onclick="check()">
                <label class="form-check-label" for="selfemployed">Self Employed</label>
            </div><br>
        </div>

        <div class="form-group" id="modeofsalary" style="display: none">
            <label>Salary mode of salary</label>
            <div class="input-group">
                <select class="custom-select custom-mine selectpicker form-control" name="modeofsalary" id="id_modeofsalary">
                    <option value="">Choose ...</option>
                    <optgroup label="Mode">
                        <option value="Cash" {{ old('modeofsalary') == "Cash" ? 'selected' : '' }}>Cash</option>
                        <option value="Cheque" {{ old('modeofsalary') == "Cheque" ? 'selected' : '' }}>Cheque</option>
                    </optgroup>
                    <optgroup label="Bank">
                        <option value="HDFC Bank" {{ old('modeofsalary') == "HDFC Bank" ? 'selected' : '' }}>HDFC Bank</option>
                        <option value="ICICI Bank" {{ old('modeofsalary') == "ICICI Bank" ? 'selected' : '' }}>ICICI Bank</option>
                        <option value="Kotak Mahindra" {{ old('modeofsalary') == "Kotak Mahindra" ? 'selected' : '' }}>Kotak Mahindra</option>
                        <option value="IndusInd Bank" {{ old('modeofsalary') == "IndusInd Bank" ? 'selected' : '' }}>IndusInd Bank</option>
                        <option value="RBL Bank" {{ old('modeofsalary') == "RBL Bank" ? 'selected' : '' }}>RBL Bank</option>
                        <option value="Federal Bank" {{ old('modeofsalary') == "Federal Bank" ? 'selected' : '' }}>Federal Bank</option>
                        <option value="South Indian Bank" {{ old('modeofsalary') == "South Indian Bank" ? 'selected' : '' }}>South Indian Bank</option>
                        <option value="Axis Bank" {{ old('modeofsalary') == "Axis Bank" ? 'selected' : '' }}>Axis Bank</option>
                        <option value="SBI" {{ old('modeofsalary') == "SBI" ? 'selected' : '' }}>SBI</option>
                        <option value="Canara Bank" {{ old('modeofsalary') == "Canara Bank" ? 'selected' : '' }}>Canara Bank</option>
                        <option value="Syndicate Bank" {{ old('modeofsalary') == "Syndicate Bank" ? 'selected' : '' }}>Syndicate Bank</option>
                        <option value="PNB" {{ old('modeofsalary') == "PNB" ? 'selected' : '' }}>PNB</option>
                        <option value="Union Bank of India" {{ old('modeofsalary') == "Union Bank of India" ? 'selected' : '' }}>Union Bank of India</option>
                        <option value="IDFC First Bank" {{ old('modeofsalary') == "IDFC First Bank" ? 'selected' : '' }}>IDFC First Bank</option>
                        <option value="Karnataka Bank" {{ old('modeofsalary') == "Karnataka Bank" ? 'selected' : '' }}>Karnataka Bank</option>
                        <option value="Karur Vysya Bank" {{ old('modeofsalary') == "Karur Vysya Bank" ? 'selected' : '' }}>Karur Vysya Bank</option>
                        <option value="Citi Bank" {{ old('modeofsalary') == "Citi Bank" ? 'selected' : '' }}>Citi Bank</option>
                        <option value="Standard Chartered" {{ old('modeofsalary') == "Standard Chartered" ? 'selected' : '' }}>Standard Chartered</option>
                        <option value="Dena Bank" {{ old('modeofsalary') == "Dena Bank" ? 'selected' : '' }}>Dena Bank</option>
                        <option value="Yes Bank" {{ old('modeofsalary') == "Yes Bank" ? 'selected' : '' }}>Yes Bank</option>
                        <option value="DBS Bank" {{ old('modeofsalary') == "DBS Bank" ? 'selected' : '' }}>DBS Bank</option>
                        <option value="HSBC Banking Corp." {{ old('modeofsalary') == "HSBC Banking Corp." ? 'selected' : '' }}>HSBC Banking Corp.</option>
                        <option value="Bank of Baroda" {{ old('modeofsalary') == "Bank of Baroda" ? 'selected' : '' }}>Bank of Baroda</option>
                        <option value="Indian Bank" {{ old('modeofsalary') == "Indian Bank" ? 'selected' : '' }}>Indian Bank</option>
                    </optgroup>
                </select>
            </div>
        </div>

        <div class="form-group" id="netsalary" style="display: none">
            <label for="netsalary">Net monthly salary</label>
            <input type="number" min="0" id="id_netsalary" class="form-control custom-mine @error('netsalary') is-invalid @enderror" placeholder="Enter net take home salary" name="netsalary" value="{{ old('netsalary') }}">
            @error('netsalary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="profit" style="display: none">
            <label for="profit">Net profit</label>
            <input type="number" min="0" id="id_profit" class="form-control custom-mine @error('profit') is-invalid @enderror" placeholder="Enter net proft as per last year ITR" name="profit" value="{{ old('profit') }}">
            @error('profit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group" id="turnover" style="display: none">
            <label for="turnover">Gross turnover</label>
            <input type="number" min="0" id="id_turnover" class="form-control custom-mine @error('turnover') is-invalid @enderror" placeholder="Enter gross turnover as per last year ITR" name="turnover" value="{{ old('turnover') }}">
            @error('turnover')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="noofcards">No. of cards</label>
            <input type="number" min="0" class="form-control custom-mine @error('noofcards') is-invalid @enderror" id="noofcards" placeholder="Enter total no. of cards owned by you" name="noofcards" value="{{ old('noofcards') }}" required>
            @error('noofcards')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="totalcreditlimit">Total Credit Limit on all cards</label>
            <input type="number" min="0" class="form-control custom-mine @error('totalcreditlimit') is-invalid @enderror" id="totalcreditlimit" placeholder="Enter total credit limit on all cards" name="totalcreditlimit" value="{{ old('totalcreditlimit') }}" required>
            @error('totalcreditlimit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="currentoutstanding">Current Outstanding on all cards</label>
            <input type="number" min="0" class="form-control custom-mine @error('currentoutstanding') is-invalid @enderror" id="currentoutstanding" placeholder="Enter current outstanding on all cards" name="currentoutstanding" value="{{ old('currentoutstanding') }}" required>
            @error('currentoutstanding')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="loanamount">Loan amount</label>
            <input type="number" min="0" class="form-control custom-mine @error('loanamount') is-invalid @enderror" id="loanamount" placeholder="Enter required loan amount" name="loanamount" value="{{ old('loanamount') }}" required>
            @error('loanamount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <p>Any delay in payment in last three months</p>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delayinpayment" id="delayinpaymentyes" value="Yes" {{ old('delayinpayment') == "Yes" ? 'checked' : '' }}>
            <label class="form-check-label" for="delayinpaymentyes">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="delayinpayment" id="delayinpaymentno" value="No" {{ old('delayinpayment') == "No" ? 'checked' : '' }}>
            <label class="form-check-label" for="delayinpaymentno">No</label>
        </div><br>

        <br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="proceed" name="proceed" required>
            <label for="proceed" class="form-check-label"><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank" style="text-decoration: none; color: whitesmoke"><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
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
                <h4><a class="nav-link menu-btn" href="#contact">Offers & Schemes</a></h4>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link menu-btn" href="#misc">Eligibility</a>
            </li> --}}
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            Credit card is a medium that allows customer to make purchases and pay for them later. Consistent repayment will lead to maintain a good credit score. But sometimes dealing the credit card will be a burden and repayment becomes difficult.  In such circumstances, balance transfer can be a remedy to manage the credit card debt.
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            The benefits that a borrower gets by making a credit card balance transfer are:<br><br>
            Transfer multiple credit card<br>
            It helps in transferring all existing credit card debts to a single account. Now the borrower can convert & payback all credit card debts from one place.<br><br>
            Better interest rates<br>
            Balance transfer credit cards helps in getting lower interest rate when compared to credit card charges. Interest rates on credit cards are about 3.5% per month while the interest rate on a balance transfer is usually around 1.8% per month.<br><br>
            Maintain Credit Score<br>
            Brought down interest will make it simpler for the cardholders to make payment and hence stabilize their credit score. They can even improve it with timely payments.<br><br>
            Quick and Easy<br>
            Comparing with personal loan credit card balance transfer is quick and transferred directly.  
        </div>
    </div>
    {{-- <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
        </div>
    </div> --}}
    <script>
        function check() {
            if(document.getElementById("salaried").checked) {
                document.getElementById("modeofsalary").style.display = "block";
                document.getElementById("netsalary").style.display = "block";
                document.getElementById("id_modeofsalary").setAttribute("required", "true");
                document.getElementById("id_netsalary").setAttribute("required", "true");
                document.getElementById("profit").style.display = "none";
                document.getElementById("turnover").style.display = "none";
                document.getElementById("id_profit").removeAttribute("required");
                document.getElementById("id_turnover").removeAttribute("required");

            }
            else if(document.getElementById("selfemployed").checked) {
                document.getElementById("modeofsalary").style.display = "none";
                document.getElementById("netsalary").style.display = "none";
                document.getElementById("id_modeofsalary").removeAttribute("required");
                document.getElementById("id_netsalary").removeAttribute("required");
                document.getElementById("profit").style.display = "block";
                document.getElementById("turnover").style.display = "block";
                document.getElementById("id_profit").setAttribute("required", "true");
                document.getElementById("id_turnover").setAttribute("required", "true");
            }
        }
    </script>
    
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