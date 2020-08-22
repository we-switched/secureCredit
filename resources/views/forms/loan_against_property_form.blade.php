@extends('layouts.newapp')

@section('title', 'Loan against Property')

@section('content')
<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Loan Against Property</span></h1>
        </div>
    <form class="well form-horizontal" method="POST" action="{{url('/loan_against_property_form')}}">
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
                    <div class="input-group"><input type="email" class="form-control custom-mine @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required></div>
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
                        <input class="form-check-input" type="radio" id="topupno" name="topup" value="No" {{ old('topup') == "No" ? 'checked' : '' }} required>
                        <label class="control-label form-check-label" for="topupno">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="topupyes" name="topup" value="Yes" {{ old('topup') == "Yes" ? 'checked' : '' }} required>
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
                        <select class="custom-select custom-mine selectpicker form-control" name="city" id="city" required onchange="show_katha()">
                            <option value="">Choose ...</option>
                            <option value="Ahmedabad" {{ old('city') == 'Ahmedabad' ? 'selected' : '' }}>Ahmedabad</option>
                            <option value="Bangalore" id="bangalore" {{ old('city') == 'Bangalore' ? 'selected' : '' }}>Bangalore</option>
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
                <label for="loanamount" class="col-md-4 control-label">Loan amount</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('loanamount') is-invalid @enderror" id="loanamount" placeholder="Enter required loan amount" name="loanamount" value="{{ old('loanamount') }}" required></div>
                </div>
                @error('loanamount')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
        </div>

        <div class="col-md-6">

            <div class="form-group">
                <p><b>Type of employment</b></p>
                <div class="form-check form-check-inline">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="employmenttype" value="Salaried" id="salaried" {{ old('employmenttype') == "Salaried" ? 'checked' : '' }} required onclick="check()">
                        <label class="control-label form-check-label" for="salaried">Salaried</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="employmenttype" value="Self Employed" id="selfemployed" {{ old('employmenttype') == "Self Employed" ? 'checked' : '' }} required onclick="check()">
                        <label class="control-label form-check-label" for="selfemployed">Self Employed</label>
                    </div>
                </div>
            </div>

            <div class="form-group" id="modeofsalary" style="display: none">
                <label class="col-md-4 control-label">Salary mode of salary</label>
                <div class="col-md-8 inputGroupContainer">
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
            </div>
            
            <div class="form-group" id="netsalary" style="display: none">
                <label for="netsalary" class="col-md-4 control-label">Net monthly salary</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" id="id_netsalary" class="form-control custom-mine @error('netsalary') is-invalid @enderror" placeholder="Enter net take home salary" name="netsalary" value="{{ old('netsalary') }}"></div>
                </div>
                @error('netsalary')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
    
            <div class="form-group" id="profit" style="display: none">
                <label for="profit" class="col-md-4 control-label">Net profit</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" id="id_profit" min="0" class="form-control custom-mine @error('profit') is-invalid @enderror" placeholder="Enter net proft as per last year ITR" name="profit" value="{{ old('profit') }}"></div>
                </div>
                @error('profit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group" id="turnover" style="display: none">
                <label for="turnover" class="col-md-4 control-label">Gross turnover</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" id="id_turnover" class="form-control custom-mine @error('turnover') is-invalid @enderror" placeholder="Enter gross turnover as per last year ITR" name="turnover" value="{{ old('turnover') }}" required></div>
                </div>
                @error('turnover')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="marketvalue" class="col-md-8 control-label">Market Value of the property</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('marketvalue') is-invalid @enderror" id="marketvalue" placeholder="Enter the property's market value" name="marketvalue" value="{{ old('marketvalue') }}" required></div>
                </div>
                @error('marketvalue')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        
            <div class="form-group">
                <label for="governmentvalue" class="col-md-8 control-label">Govt. Value of the property</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('governmentvalue') is-invalid @enderror" id="governmentvalue" placeholder="Enter the property's govt. value" name="governmentvalue" value="{{ old('governmentvalue') }}" required></div>
                </div>            
                @error('governmentvalue')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label">Type of property</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <select class="custom-select custom-mine selectpicker form-control" name="typeofproperty" required>
                            <option value="">Choose ...</option>
                            <option value="Individual House" {{ old('typeofproperty') == 'Individual House' ? 'selected' : '' }}>Individual House</option>
                            <option value="Commercial Buildings" {{ old('typeofproperty') == 'Commercial Buildings' ? 'selected' : '' }}>Commercial Buildings</option>
                            <option value="Commercial Plots" {{ old('typeofproperty') == 'Commercial Plots' ? 'selected' : '' }}>Commercial Plots</option>
                            <option value="Flat" {{ old('typeofproperty') == 'Flat' ? 'selected' : '' }}>Flat</option>
                            <option value="Plots" {{ old('typeofproperty') == 'Plots' ? 'selected' : '' }}>Plots</option>
                            <option value="Residential Rental Income Building" {{ old('typeofproperty') == 'Residential Rental Income Building' ? 'selected' : '' }}>Residential Rental Income Building</option>
                            <option value="Other" {{ old('typeofproperty') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group" id="katha" style="display: none">
                <p><b>Katha of property</b></p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="katha" id="kathaA" value="A" {{ old('katha') == "A" ? 'checked' : '' }}>
                    <label class="col-md-2 control-label form-check-label" for="kathaA">A Katha</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="katha" id="kathaB" value="B" {{ old('katha') == "B" ? 'checked' : '' }}>
                    <label class="col-md-2 control-label form-check-label" for="kathaB">B Katha</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="katha" id="kathaE" value="E" {{ old('katha') == "E" ? 'checked' : '' }}>
                    <label class="col-md-2 control-label form-check-label" for="kathaE">E Katha</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="katha" id="kathaOther" value="Other" {{ old('katha') == "Other" ? 'checked' : '' }}>
                    <label class="col-md-2 control-label form-check-label" for="kathaOther">Other</label>
                </div>
            </div>
        
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
            A Loan Against Property (LAP) or mortgage loan is a type of secured loan that you can avail by keeping an commercial or residential property owned by the borrower as mortgage with the lender, as the lending institutions can use this as security security against loan if in case someone fails to pay back the loan lending institutions can raise the amount by selling the property<br>
            Loan Against Property (LAP) can be availed by both salaried and self employed individuals, usually its cheaper than personal loan & longer loan tenure results in much lower EMI.
            <table class="table table-bordered table-dark">
                <head>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Industrial Property</th>
                        <th scope="col">Commercial Property</th>
                        <th scope="col">Residential Property</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">FOIR</th>
                        <td>65%</td>
                        <td>65%</td>
                        <td>55% - 65%</td>
                    </tr>
                    <tr>
                        <th scope="col">Loan-to-Value (LTV)</th>
                        <td>40% - 65%</td>
                        <td>40% - 75%</td>
                        <td>40% - 75%</td>
                    </tr>
                </tbody>
            </table>
            The fixed obligation to income ratio (FOIR) is a popular parameter that lending institutes use to calculate the loan eligibility of the applicant. The financial institutions will examine the applicant’s income and the Equated Monthly Instalment (EMI) of all loans the applicant is still paying.<br>
            The loan-to-value (LTV) ratio is an assessment of lending risk that financial institutions and other lenders examine before approving a mortgage. Typically, loan assessments with high LTV ratios are considered higher risk loans. Therefore, if the mortgage is approved, the loan has a higher interest rate.            
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            Checking your eligibility is a crucial step before applying for a loan. This will help you find out which loans you qualify for. If you apply for a loan you don’t qualify for, the lender will usually reject your loan application. A rejected loan application can adversely impact your credit rating.
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Loan Providers</th>
                        <th scope="col">Interest Rates*</th>
                        <th scope="col">Processing Fees<br>(exclusive of GST)</th>
                        <th scope="col">Loan Amount</th>
                        <th scope="col">Loan Tenure</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Axis Bank</th>
                        <th>11.25% onwards<br>(floating rate)</th>
                        <td>1% of loan amount or Rs. 10,000<br>(whichever is higher)</td>
                        <th>Rs. 5 lakh onwards</th>
                        <td>upto 20 years</td>
                    </tr>
                    <tr>
                        <th>Bajaj Finserv</th>
                        <th>10.10% onwards</th>
                        <td>upto 6% of loan amount</td>
                        <th>Rs. 10 lakh - Rs 3.5 crore</th>
                        <td>upto 20 years</td>
                    </tr>
                    <tr>
                        <th>Equitas small finance bank</th>
                        <th>9.50% onwards</th>
                        <td>upto 2% of loan amount</td>
                        <th>Rs. 10 lakh - Rs. 3 crore</th>
                        <td>upto 15 years</td>
                    </tr>
                    <tr>
                        <th>ICICI Bank</th>
                        <th>9.80% onwards</th>
                        <td>1% of loan amount</td>
                        <th>Rs. 10 lakh - Rs. 5 crore</th>
                        <td>upto 15 years</td>
                    </tr>
                    <tr>
                        <th>HDFC Bank</th>
                        <td>9.40% onwards</td>
                        <td>upto 1% of loan amount<br>(* Minimum PF of Rs. 7500/-)</td>
                        <th>Rs. 5 lakh - Rs. 15 crores</th>
                        <td>upto 30 years</td>
                    </tr>
                    <tr>
                        <th>Kotak Mahindra Bank</th>
                        <th>9.75% onwards</th>
                        <td>upto 2% of loan amount</td>
                        <th>Rs. 10 lakh - Rs. 3 crores</th>
                        <td>upto 12 years</td>
                    </tr>
                    <tr>
                        <th>IDBI Bank</th>
                        <th>10.10% onwards</th>
                        <td>upto 0.5% of loan amount</td>
                        <th>upto Rs. 10 crores</th>
                        <td>upto 15 years</td>
                    </tr>
                    <tr>
                        <th>PNB Housing Bank</th>
                        <th>10.25% onwards</th>
                        <td>upto 2% of loan amount</td>
                        <th>upto 1 crore</th>
                        <td>upto 30 years</td>
                    </tr>
                    <tr>
                        <th>LIC Housing Finance</th>
                        <th>11.30% onwards</th>
                        <td>1% of loan amount</td>
                        <th>Rs. 1 lakh - Rs. 5 crores</th>
                        <td>upto 15 years</td>
                    </tr>
                    <tr>
                        <th>Tata Capital</th>
                        <th>10.50% onwards</th>
                        <td>upto 2% of loan amount</td>
                        <th>Rs. 10 lakh - Rs. 3 crores</th>
                        <td>upto 15 years</td>
                    </tr>
                </tbody>
            </table>
            <small>**(Subject to change as per Bank’s discretion from time to time)<br>
                ** Goods and Services tax (GST) will be charged extra as per the applicable rates, on all the charges and fees (wherever GST is applicable)
            </small>                
        </div>
    </div>
    <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
            The following are the factors that influence your eligibility:
            <ul>
                <li>Monthly or annual income
                <li>Credit rating or credit history
                <li>Current FOIR /debt-to-income ratio 
                <li>Credit score
                <li>Age & gender of applicant
                <li>Number of co-applicants
                <li>Co-applicants' income
                <li>Insurance of the Property
                <li>Property Documents
                <li>Value of the property
            </ul>
            <h5>Documents Required for Loan Against Property</h5>
                Comparing to other types of loan the time required for loan disbursal is higher & rate of interest is comparatively low for home loan, for faster processing the applicant and the co-applicant need to provide the following documents
            <h5>Property Documents:</h5>
            <ul>
                <li>Registered Sale Deed/ Conveyance/ Lease Deed
                <li>Latest utility bill
                <li>Past Sale Deeds Chain (each transaction in respect of this property since first allotment)
                <li>Latest House Tax Return/ Receipt
            </ul>
            <h5>For Salaried Individuals:</h5>
            <ol>
                <li>Identity & Age Proof
                <li>PAN Card
                <li>Residence proof - Passport driving licence, Voter ID, post paid/landline bill, utility bills (electricity/water/gas)
                <li>Bank statements all the bank accounts owned by the applicant for the last 12 months
                <li>Salary Slips of last 3 months
                <li>Form 16 or Income Tax Returns of last 3 years
                <li>Loan account statement for the previous 12 months if the applicant has any other ongoing loan from other banks/financial institutions
                <li>Employer Identity Card
            </ol>
            <h5>For Self-Employed professionals</h5>
            <ol>
                <li>Identity & Age Proof
                <li>PAN Card
                <li>Residence proof - Passport driving licence, Voter ID, post paid/landline bill, utility bills (electricity/water/gas)
                <li>Bank statements for the last 12 months 
                <li>Last 3 years Income Tax Returns with computation of Income
                <li>Last 3 years CA Certified / Audited Balance Sheet and Profit & Loss Account
                <li>Loan account statement for the previous 12 months if the applicant has any other ongoing loan from other banks/financial institutions
                <li>Business License Details
                <li>Business address proof
                <li>Certificate of Qualification (for Doctors/C.A. and other professionals)
            </ol>
        </div>
    </div>

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

        function show_katha() {
            if(document.getElementById("bangalore").selected) {
                document.getElementById("katha").style.display = "block";
                document.getElementById("kathaA").setAttribute("required", "true");
            }
            else {
                document.getElementById("katha").style.display = "none";
                document.getElementById("kathaA").removeAttribute("required");
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