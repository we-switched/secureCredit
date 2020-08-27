@extends('layouts.newapp')

@section('title', 'Business Loan')

@section('content')


<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Business Loan</span></h1>
        </div>
    <form class="well form-horizontal" method="POST" action="{{url('/business_loan_form')}}">
    @csrf
    
    <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="text" class="form-control custom-mine @error('name') is-invalid @enderror" id="name" placeholder="Enter your name (as per PAN card)" name="name" value="{{ old('name') }}" required></div>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="email" class="col-md-4 control-label">Email address</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="email" class="form-control custom-mine @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" ></div>
                </div> 
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Phone No.</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="tel" pattern="[6789][0-9]{9}" size="10" class="form-control custom-mine @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone no." name="phone" value="{{ old('phone') }}" required></div>
                </div>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Is it a Top-Up Loan ?</label>
                <div class="form-check form-check-inline">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topup" value="No" id="topupno" {{ old('topup') == "No" ? 'checked' : '' }} required>
                        <label class="control-label form-check-label" for="topupno">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topup" value="Yes" id="topupyes" {{ old('topup') == "Yes" ? 'checked' : '' }} required>
                        <label class="control-label form-check-label" for="topupyes">Yes</label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Have you availed moratorium offered by RBI ?</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium') == "No" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="moratoriumno">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium') == "Yes" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="moratoriumyes">Yes</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-8 inputGroupContainer">
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
            </div>
 
            <div class="form-group">
                <label for="presentaddress" class="col-md-4 control-label">Present Address</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><textarea class="form-control custom-mine @error('presentaddress') is-invalid @enderror" id="presentaddress" placeholder="Enter your present address" name="presentaddress" value="{{ old('presentaddress') }}" required>{{ Request::old('presentaddress')}}</textarea></div>
                </div>
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
                <label for="permanentaddress" class="col-md-4 control-label">Permanent Address</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><textarea class="form-control custom-mine @error('permanentaddress') is-invalid @enderror" id="permanentaddress" placeholder="Enter your permanent address" name="permanentaddress" value="{{ old('permanentaddress') }}" required>{{ Request::old('permanentaddress')}}</textarea></div>
                </div>
                @error('permanentaddress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>    
                @enderror
            </div>

            <div class="form-group">
                <label for="officeaddress" class="col-md-4 control-label">Office Address</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><textarea class="form-control custom-mine @error('officeaddress') is-invalid @enderror" id="officeaddress" placeholder="Enter your office address" name="officeaddress" value="{{ old('officeaddress') }}" required>{{Request::old('officeaddress')}}</textarea></div>
                </div>
                @error('officeaddress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">
                <label for="yearsinbusiness" class="col-md-8 control-label">No. of years in business</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('yearsinbusiness') is-invalid @enderror" id="yearsinbusiness" placeholder="Enter no. of years in business" name="yearsinbusiness" value="{{ old('yearsinbusiness') }}" required></div>
                </div>
                @error('yearsinbusiness')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="yearsincity" class="col-md-8 control-label">No. of years in current city</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('yearsincity') is-invalid @enderror" id="yearsincity" placeholder="Enter no. of years in current city" name="yearsincity" value="{{ old('yearsincity') }}" required></div>
                </div>
                @error('yearsincity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="yearsinpresentaddress" class="col-md-8 control-label">No. of years in present address</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('yearsinpresentaddress') is-invalid @enderror" id="yearsinpresentaddress" placeholder="Enter no. of years in present address" name="yearsinpresentaddress" value="{{ old('yearsinpresentaddress') }}" required></div>
                </div>
                @error('yearsinpresentaddress')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label>Type of residence</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="residence" id="rented" value="Rented" {{ old('residence') == "Rented" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="rented">Rented</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="residence" id="owned" value="Owned" {{ old('residence') == "Owned" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="owned">Owned</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-inline" type="radio" name="residence" id="parentsowned" value="Parents Owned" {{ old('residence') == "Parents Owned" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="parentsowned">Parents Owned</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-inline" type="radio" name="residence" id="other" value="other" {{ old('residence') == "Other" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="other">Other</label>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label">Company</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <select class="custom-select custom-mine selectpicker form-control" name="company" required>
                        <option selected>Choose ...</option>
                        <option value="Private Ltd." {{ old('company') == 'Private Ltd.' ? 'selected' : '' }}>Private Ltd.</option>
                        <option value="Proprietorship" {{ old('company') == 'Proprietorship' ? 'selected' : '' }}>Proprietorship</option>
                        <option value="Partnership" {{ old('company') == 'Partnership' ? 'selected' : '' }}>Partnership</option>
                        <option value="LLC" {{ old('company') == 'LLC' ? 'selected' : '' }}>LLC</option>
                        <option value="LLP" {{ old('company') == 'LLP' ? 'selected' : '' }}>LLP</option>
                    </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Any existing loans</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="existingloans" id="existingloansyes" value="Yes" {{ old('existingloans') == "Yes" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="existingloansyes">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="existingloans" id="existingloansno" value="No" {{ old('existingloans') == "No" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="existingloansno">No</label>
                </div>
            </div>

            <div class="form-group">
                <label>Marital Status</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalstatus" id="married" value="Married" {{ old('maritalstatus') == "Married" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="married">Married</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="maritalstatus" id="single" value="Single" {{ old('maritalstatus') == "Single" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="single">Single</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="profit" class="col-md-4 control-label">Net profit</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('profit') is-invalid @enderror" id="profit" placeholder="Enter last year's net profit as per ITR" name="profit" value="{{ old('profit') }}" required></div>
                </div>
                @error('profit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="turnover" class="col-md-4 control-label">Gross turnover</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('turnover') is-invalid @enderror" id="turnover" placeholder="Enter last year's turnover as per ITR" name="turnover" value="{{ old('turnover') }}" required></div>
                </div>
                @error('turnover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

    </div>

    <br>
    <div class="form-check square-check">
        <input type="checkbox" class="form-check-input" id="proceed" name="proceed" required>
        <label for="proceed" class="form-check-label""><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank" style="text-decoration: none; color: whitesmoke"><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
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
            <li class="nav-item">
              <h4><a class="nav-link menu-btn" href="#misc">Eligibility</a></h4>
            </li>
          </ul>
        </div>
    </nav>

    <div class="menu-content about" style="color:black;">
        <div class="jumbotron">
            Business Loans being unsecured loans do not require any collateral from the applicant. Applicant does not require providing any asset like car or house to avail business loan.<br>
            Each business is unique & has specific requirements. The small business loan is safest & easiest option to appropriately finance the business objectives. Banks & financial institutions offer tailor made loans based on nature, scope & goal of the requirements.
            <br><br><b>Types of Business Loans</b><br>
            There are several type of business investments available in the market that can be considered as a business loan.<br>
            Here’s a list of some common types of Business Loan:<br>
            <h6><a href="{{ url('/business_loan_form') }}"><b>Loans for Self-employed Entrepreneurs</b></a></h6>
            Business loan are offered by various banks & financial institutions across the country are customized & customer centric with a minimum interest rate for Business or MSME loans starting from 14.99% and onwards.<br>
            <h6><a href="{{ url('/invoice_discounting_form') }}"><b>Invoice discounting</b></a></h6>
            Invoice discounting is probably the simplest form of invoice finance. As with all types of invoice finance, with invoice discounting you sell unpaid invoices to a lender and they give you a cash advance that’s a percentage of the invoice’s value. Once your customer has paid the invoice, the lender pays you the remaining balance minus their fee.
            <h6><a href="{{ url('/pos_based_loan_form') }}"><b>POS/Card swiping machine based loan</b></a></h6>
            POS based loans are offered to business which accepts credit/ debit card payments or online sales. Avail loans against card swipes of up to 300% of your monthly sales via POS machines. These collateral free loans are disbursed within 3 to 7 days. Minimum monthly sales via POS machines or online sales should be more than ₹50,000.
            <h6><a href="{{ url('/lease_rental_discounting_form') }}"><b>Lease rental discounting</b></a></h6>
            Lease Rental Discounting is a type of loans provided by financial institutions by using rental receipts as collateral. The financial institutions will examine long-term cash flow and provide the loan based on the exact amount. This loan is then payable by the rents promised.
            <h6><a href="{{ url('/invoice_discounting_form') }}"><b>Working Capital Loan</b></a></h6>
            A working capital loan is a loan that is taken to finance a company's everyday operations. These loans are not used to buy long-term assets or investments and are, instead, used to provide the working capital that covers a company's short-term operational needs.
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            Checking your eligibility is a crucial step before applying for a loan. This will help you find out which loans you qualify for. If you apply for a loan you don’t qualify for, the lender will usually reject your loan application. A rejected loan application can adversely impact your credit rating.
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Bank/NBFC</th>
                            <th scope="col">Interest Rate (per annum)</th>
                            <th scope="col">Loan Amount</th>
                            <th scope="col">Processing Fees</th>
                            <th scope="col">Pre-closure Charges</th>
                            <th scope="col">Locking Period</th>
                            <th scope="col">Loan Tenure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>HDFC Bank</th>
                            <td>15.65% to 21.20% per annum</td>
                            <td>Rs.50,000 to Rs. 50 lakhs</td>
                            <td>Up to 2.5% of the loan amount (subject to a minimum fee of ₹2,359 & maximum fee of ₹88,500)</td>
                            <td>07-24 Months - 4% of the outstanding principal<br>
                                25-36 Months - 3% of the outstanding principal<br>
                                >36 Months - 2% of outstanding principal</td>
                            <td>6 months</td>
                            <td>12 months to 48 months</td>
                        </tr>
                        <tr>
                            <th>Fullerton India</th>
                            <td>17% to 21% per annum</td>
                            <td>Rs.1 lakh to Rs. 50 lakh</td>
                            <td>Up to 6.5% of the borrowed loan amount</td>
                            <td>07-17 Months - 7% of the outstanding principal<br>
                                18-23 Months - 5% of the outstanding principal<br>
                                24-35 Months - 3% of the outstanding principal<br>
                                >36 Months - NIL</td>
                            <td>6 months</td>
                            <td>12 months to 48 months</td>
                        </tr>
                        <tr>
                            <th>Tata Capital</th>
                            <td>19% per annum onwards</td>
                            <td>Rs.5 lakh to Rs. 50 lakhs</td>
                            <td>Up to 2.75% of the loan amount</td>
                            <td>As per the lender’s terms and conditions</td>
                            <td>9 months</td>
                            <td>12 months to 36 months</td>
                        </tr>
                        <tr>
                            <th>ICICI Bank</th>
                            <td>16.49% per annum onwards</td>
                            <td>Rs. 1 lakh to Rs. 40 lakh</td>
                            <td>Up to 2% of the loan amount</td>
                            <td>5% of the outstanding principal</td>
                            <td>6 months</td>
                            <td>12 months to 36 months</td>
                        </tr>
                        <tr>
                            <th>IDFC Bank</th>
                            <td>15% per annum onwards</td>
                            <td>Rs. 3 lakhs to Rs. 75 lakhs</td>
                            <td>Up to 2% of the loan amount</td>
                            <td>4 - 5% of the outstanding principal</td>
                            <td>6 months</td>
                            <td>6 months to 36 months</td>
                        </tr>
                        <tr>
                            <th>Lending Kart</th>
                            <td>12% per annum onwards</td>
                            <td>Rs. 1 lakh to Rs. 1 crore</td>
                            <td>Up to 2% of the loan amount</td>
                            <td>Nil foreclosure charges</td>
                            <td>1 months</td>
                            <td>1 month to 36 months</td>
                        </tr>
                        <tr>
                            <th>Kotak Bank</th>
                            <td>16% per annum onwards</td>
                            <td>Rs. 3 lakhs to Rs. 75 lakhs</td>
                            <td>Up to 2% of the loan amount</td>
                            <td>6% of the outstanding principal</td>
                            <td>12 months</td>
                            <td>24 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>IndusInd Bank</th>
                            <td>14% per annum onwards</td>
                            <td>Rs. 1 lakh to Rs. 50 lakhs</td>
                            <td>Up to 2.50% of the loan amount</td>
                            <td>4 - 5% of the outstanding principal</td>
                            <td>12 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <small>**(Subject to change as per Bank’s discretion from time to time)<br>
                ** Goods and Services tax (GST) will be charged extra as per the applicable rates, on all the charges and fees (wherever GST is applicable)                
            </small>                
        </div>
    </div>
    <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
            Each bank has specific requirements, criteria and eligibility factors. Mentioned below is the list of common banks document requirements, upon different banks the document list may vary.
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <head>
                        <tr>
                            <th scope="col">KYC Documents</th>
                            <td scope="col">Valid identity/Address/Date of Birth/Signature Proof</td>
                        </tr>
                        <tr>
                            <th scope="col">Business Continuity Proof</th>
                            <td scope="col">Proprietary Concern: Bank statement in firm name along with any of the document as mentioned in Business Continuity Proof.<br>Partnership: Deed and PAN card of Firm<br>Company: MOA/AOA/Certificate of Incorporation/PAN Card</td>
                        </tr>
                        <tr>
                            <th scope="col">Constitutional Documents</th>
                            <td scope="col">Flexible tenure up to 36 months</td>
                        </tr>
                        <tr>
                            <th scope="col">Ownership proof</th>
                            <td scope="col">Copy of Sales Deed/EC/Govt. Leased Deed/Latest Property tax receipt/Water bill along with Latest paid Electricity bill</td>
                        </tr>
                        <tr>
                            <th scope="col">Banking</th>
                            <td scope="col">Latest 12 months bank statements of all CA/SA/CC/OD account. All Documents should be self-attested</td>
                        </tr>
                        <tr>
                            <th scope="col">Financials</th>
                            <td scope="col">Copy of Latest 3 years ITR along with Computation and Acknowledgement<br>3 years financials with full schedules & audit report (Form 3CD & 3CB).<br>Details of all running loans</td>
                        </tr>
                    </thead>
                </table>
            </div>
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

</div>
</section>
@endsection
