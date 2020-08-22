@extends('layouts.newapp')

@section('title', 'Home Loan')

@section('content')
<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Hoem Loan</span></h1>
        </div>
    <form class="well form-horizontal" method="POST" action="{{url('/home_loan_form')}}">
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
                <p><b>Is it a Top-Up Loan ?</b></p>
                <div class="form-check form-check-inline">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topup" value="No" id="topupno" {{ old('topup') == "No" ? 'checked' : '' }} required>
                        <label class="control-label form-check-label" for="topupno">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topup" value="Yes" id="topupyes" {{ old('topup') == "Yes" ? 'checked' : '' }} required>
                        <label class="control-label form-check-label" for="topupyes">Yes</label>
                    </div><br>
                </div>
            </div>
        
            <div class="form-group">
                <p><b>Have you availed moratorium offered by RBI ?</b></p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium') == "No" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="moratoriumno">No</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium') == "Yes" ? 'checked' : '' }} required>
                    <label class="control-label form-check-label" for="moratoriumyes">Yes</label>
                </div><br>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-8 inputGroupContainer">
                    <div class="input-group">
                        <select class="custom-select custom-mine selectpicker form-control" name="city" required onchange="show_katha()">
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
                <p><b>Type of home loan</b></p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeofhomeloan" id="ready" value="Ready to move in house purchase" {{ old('typeofhomeloan') == "Ready to move in house purchase" ? 'checked' : '' }} required>
                    <label class="col-md-8 control-label form-check-label" for="ready">Ready to move in house purchase</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeofhomeloan" id="flat" value="Flat" {{ old('typeofhomeloan') == "Flat" ? 'checked' : '' }} required>
                    <label class="col-md-8 control-label form-check-label" for="flat">Flat purchase</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeofhomeloan" id="home" value="Home construction" {{ old('typeofhomeloan') == "Home construction" ? 'checked' : '' }} required>
                    <label class="col-md-8 control-label form-check-label" for="home">Home construction loan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="typeofhomeloan" id="plot" value="Plot purchase" {{ old('typeofhomeloan') == "Plot purchase" ? 'checked' : '' }} required>
                    <label class="col-md-8 control-label form-check-label" for="plot">Plot purchase loan</label>
                </div>
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
                    </div><br>
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
                </div><br>
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
            Home loan defines a sum of money borrowed from a financial institution for the purchase of a residence. A home loan can be availed for buying a property with home under construction or even to construct a new house.<br>
            At the time of applying a home loan adding a co-applicant will affects your home loan eligibility in a positive way as the lending institution will also be considering the co-applicant's income and credit score when determining your loan eligibility, the co-applicants need not necessarily be the co-owner of the concerned property but all the co-owners of the property are required to be the co-applicant for a loan. Co-applicant can be an immediate family member such as your spouse, your parents or even your major children.
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            Checking your eligibility is a crucial step before applying for a loan. This will help you find out which loans you qualify for. If you apply for a loan you don’t qualify for, the lender will usually reject your loan application. A rejected loan application can adversely impact your credit rating.
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Home Loan Providers</th>
                            <th scope="col">Interest Rates*</th>
                            <th scope="col">Processing Fees<br>(exclusive of GST)</th>
                            <th scope="col">Loan Amount</th>
                            <th scope="col">Loan Tenure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Axis Bank</th>
                            <th>7.75% onwards<br>(linked to RLLR)</th>
                            <td>upto 1% of loan amount<br>(min. Rs. 10,000)</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>Bajaj Finserv</th>
                            <th>8.10% onwards<br>(linked to BFL FRR)</th>
                            <td><h6>For salaried individuals:</h6><br> Up to 0.80%<br><h6>For self-employed individuals:</h6><br> Up to 1.20%</td>
                            <th>Rs. 10 lakh - Rs 3.5 crore</th>
                            <td>upto 20 years</td>
                        </tr>
                        <tr>
                            <th>Equitas small finance bank</th>
                            <th>9.50% onwards<br>{linked to MCLR}</th>
                            <td>2% of loan amount</td>
                            <th>Rs. 1 lakh - Rs. 5 crore</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>ICICI Bank</th>
                            <th>7.45% onwards</th>
                            <td>1.00% – 2.00% of loan amount or Rs. 1,500 (Rs. 2,000 for Mumbai, Delhi & Bangalore), whichever is higher</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>HDFC Bank</th>
                            <td>7.35% onwards<br>(linked to RPLR)</td>
                            <td>Up to 0.5% of loan amount or Rs. 3,000, whichever is higher</td>
                            <th>Rs. 5 lakh - Rs. 15 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>Kotak Mahindra Bank</th>
                            <th>7.35% onwards<br>(linked to MCLR)</th>
                            <td>upto 2% of loan amount</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 20 years</td>
                        </tr>
                        <tr>
                            <th>IDBI Bank</th>
                            <th>7.80% onwards<br>(linked to RLLR)</th>
                            <td>Rs. 2,500 - Rs. 5,000</td>
                            <th>upto Rs. 10 crore</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>PNB Housing Bank</th>
                            <th>8.60% onwards<br>(linked to PNBHFR)</th>
                            <td>upto 1% of loan amount</td>
                            <th>upto 1 crore</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>LIC Housing Finance</th>
                            <th>7.50% onwards<br>(linked to PLR)</th>
                            <td>as applicable</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>Tata Capital</th>
                            <th>10.50% onwards</th>
                            <td>upto 2% of loan amount</td>
                            <th>Rs. 10 lakh - Rs. 3 crores</th>
                            <td>upto 15 years</td>
                        </tr>
                        <tr>
                            <th>DHFL</th>
                            <th>9.50% onwards<br>(linked to RPLR)</th>
                            <td><h6>Salaried/Self Employed Professional:</h6><br> Rs. 2,500 – Rs. 20,000<br><h6>Self Employed Non Professional:</h6><br> Net PAT: 0.5%, Others: 1.5%</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                        <tr>
                            <th>Yes Bank</th>
                            <th>9.85% onwards<br>(linked to MCLR)</th>
                            <td>2% of loan amount or Rs. 10,000, whichever is higher</td>
                            <th>Rs. 1 lakh - Rs. 5 crores</th>
                            <td>upto 25 years</td>
                        </tr>
                        <tr>
                            <th>Tata Capital</th>
                            <th>9.25% onwards<br>(linked to RPLR)</th>
                            <td>0.5% of the loan amount</td>
                            <th>Rs. 2 lakh - Rs. 5 crores</th>
                            <td>upto 30 years</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <small>** (Subject to change as per Bank’s discretion from time to time)<br>
                ** Goods and Services tax (GST) will be charged extra as per the applicable rates, on all the charges and fees (wherever GST is applicable)<br>
                *** MCLR: Marginal Cost of funds based Lending Rate; EBLR: External Benchmark Lending Rate; RLLR: Repo Linked Lending Rate; PNBHFLR: Punjab National Bank Housing Finance Lending Rate; TBLR: Treasury Bill Benchmark Linked Lending Rate; BFLFRR: Bajaj Finance Limited Floating Reference Rate; PLR: Prime Lending Rate; RPLR: Retail Prime Lending Rate                
            </small>
            <h4>Difference between a fixed rate and floating rate home loan</h4>
            In a floating rate home loan, the interest rate changes as per the market rates over the tenure of the loan. The equated monthly instalments can increase or decrease depending on market rates of interest. The rate of interest associated with fixed rate loans will not varies during the entire tenure of the loan.    
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