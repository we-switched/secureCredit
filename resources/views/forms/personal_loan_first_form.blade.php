@extends('layouts.newapp')

@section('title', 'Personal Loan')

@section('content')

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif



<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Personal Loan</span></h1>
        </div>
    <form method="POST" action="{{ url('/personal_loan_first_form') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">

                <div class="form-group">

                    <label for="name" class="col-md-4">Name</label>
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
                            <input class="form-check-input" type="radio" id="topupno" name="topup" value="No" {{ old('topup') == "No" ? 'checked' : '' }} required>
                            <label class="form-check-label control-label" for="topupno">No</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="topupyes" name="topup" value="Yes" {{ old('topup') == "Yes" ? 'checked' : '' }} required>
                            <label class="form-check-label control-label" for="topupyes">Yes</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Have you availed moratorium offered by RBI ?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium') == "No" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="moratoriumno">No</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium') == "Yes" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="moratoriumyes">Yes</label>
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
                    <label>Type of residence</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="residence" id="rented" value="Rented" {{ old('residence') == "Rented" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="rented">Rented</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="residence" id="owned" value="Owned" {{ old('residence') == "Owned" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="owned">Owned</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input form-check-inline" type="radio" name="residence" id="parentsowned" value="Parents Owned" {{ old('residence') == "Parents Owned" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="parentsowned">Parents Owned</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input form-check-inline" type="radio" name="residence" id="other" value="Other" {{ old('residence') == "Other" ? 'checked' : '' }} required>
                        <label class="form-check-label control-label" for="other">Other</label>
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
                    <label class="form-check-label control-label" for="same">Check this if your present and permanent address are same.</label>
                </div><br>

                <script language="JavaScript">
                    function permanent(p) {
                        if(p.same.checked == true) {
                            p.permanentaddress.value = p.presentaddress.value;
                        }
                        else
                            p.permanentaddress.value = "";
                    }
                </script>

                <div class="form-group">
                    <label for="permanentaddress" class="col-md-4 control-label">Permanent Address</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><textarea class="form-control custom-mine @error('permanentaddress') is-invalid @enderror" id="permanentaddress" placeholder="Enter your permanent address" name="permanentaddress" value="{{ old('permanentaddress') }}" required>{{ Request::old('presentaddress')}}</textarea></div>
                    </div>
                    @error('permanentaddress')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="aadhar" class="col-md-4 control-label">Aadhar number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" pattern="[0-9]{12}" class="form-control custom-mine @error('aadhar') is-invalid @enderror" id="aadhar" placeholder="Enter your aadhar number" name="aadhar" value="{{ old('aadhar') }}" required></div>
                    </div>
                    @error('aadhar')
                    <span class="invalid-feedback" role="alert">
                        <strong>Please enter valid Aadhar number</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="pan" class="col-md-4 control-label">PAN number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" pattern="[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}" class="form-control custom-mine @error('pan') is-invalid @enderror" id="pan" placeholder="Enter your PAN number" name="pan" value="{{ old('pan') }}" required></div>
                    </div>
                    @error('pan')
                    <span class="invalid-feedback" role="alert">
                        <strong>Please enter valid PAN number</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="yearsinpresentaddress" class="col-md-8 control-label">No. of years in current residence</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('yearsinpresentaddress') is-invalid @enderror" id="yearsinpresentaddress" placeholder="Enter no. of years in residing in present address" name="yearsinpresentaddress" value="{{ old('yearsinpresentaddress') }}" required></div>
                    </div>
                    @error('yearsinpresentaddress')
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

               

              

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="rent" class="col-md-8 control-label">If rented, monthly payable rent</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('rent') is-invalid @enderror" id="rent" placeholder="Enter monthly payable rent" name="rent" value="{{ old('rent') }}"></div>
                    </div>
                    @error('rent')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="qualification" class="col-md-4 control-label">Qualification</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('qualification') is-invalid @enderror" id="qualification" placeholder="Enter your qualification" name="qualification" value="{{ old('qualification') }}" required></div>
                    </div>
                    @error('qualification')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="uniname" class="col-md-4 control-label">University's Name</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('uniname') is-invalid @enderror" id="uniname" placeholder="Enter your university's name" name="uniname" value="{{ old('uniname') }}" required></div>
                    </div>
                    @error('uniname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="yearofpassing" class="col-md-4 control-label">Year of passing</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" class="form-control custom-mine @error('yearofpassing') is-invalid @enderror" min="0" id="yearofpassing" placeholder="Enter your year of passing" name="yearofpassing" value="{{ old('yearofpassing') }}" required></div>
                    </div>
                    @error('yearofpassing')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Marital Status</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maritalstatus"  id="married" value="Married" {{ old('maritalstatus') == "Married" ? 'checked' : '' }} required>
                            <label class="form-check-label control-label" for="married">Married</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="maritalstatus" id="single" value="Single" {{ old('maritalstatus') == "Single" ? 'checked' : '' }} required>
                            <label class="form-check-label control-label" for="single">Single</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Any existing loans</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="existingloans" id="existingloansyes" value="Yes" {{ old('existingloans') == "Yes" ? 'checked' : '' }} required onclick="show_emi()">
                            <label class="form-check-label control-label" for="existingloansyes">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="existingloans" id="existingloansno" value="No" {{ old('existingloans') == "No" ? 'checked' : '' }} required onclick="show_emi()">
                            <label class="form-check-label control-label" for="existingloansno">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group" id="id_emi" style="display: none">
                    <label for="emi" class="col-md-8 control-label">If any existing loan/credit card, monthly EMI payable</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" class="form-control custom-mine @error('emi') is-invalid @enderror" id="emi" placeholder="Enter monthly EMI payable" name="emi" value="{{ old('emi') }}"></div>
                    </div>
                    @error('emi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reference1" class="col-md-8 control-label">Reference #1 Friend's name & Contact number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('reference1') is-invalid @enderror" id="reference1" placeholder="Enter your friend's name & contact number" name="reference1" value="{{ old('reference1') }}" required></div>
                    </div>
                    @error('reference1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="reference2" class="col-md-8 control-label">Reference #2 Friend's name & Contact number</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('reference2') is-invalid @enderror" id="reference2" placeholder="Enter your friend's name & contact number" name="reference2" value="{{ old('reference2') }}" required></div>
                    </div>
                    @error('reference2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <p><b>Type of employment</b></p>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="employmenttype" value="Salaried" id="salaried" {{ old('employmenttype') == "Salaried" ? 'checked' : '' }} required onclick="check()">
                            <label class="form-check-label control-label" for="salaried">Salaried</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="employmenttype" value="Self Employed" id="selfemployed" {{ old('employmenttype') == "Self Employed" ? 'checked' : '' }} required onclick="check()">
                            <label class="form-check-label control-label" for="selfemployed">Self Employed</label>
                        </div><br>
                    </div>
                </div>
                        
                <div class="form-group" id="id_profit" style="display: none">
                    <label for="profit" class="col-md-4 control-label">Net profit</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" id="profit" min="0" class="form-control custom-mine @error('profit') is-invalid @enderror" placeholder="Enter net proft as per last year ITR" name="profit" value="{{ old('profit') }}"></div>
                    </div>
                    @error('profit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group" id="id_turnover" style="display: none">
                    <label for="turnover" class="col-md-4 control-label">Gross turnover</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" id="turnover" class="form-control custom-mine @error('turnover') is-invalid @enderror" placeholder="Enter gross turnover as per last year ITR" name="turnover" value="{{ old('turnover') }}"></div>
                    </div>
                    @error('turnover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group" id="id_modeofsalary" style="display: none">
                    <label class="col-md-4 control-label">Mode of salary</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <select class="custom-select custom-mine selectpicker form-control" name="modeofsalary" id="modeofsalary" onchange="checkBank();">
                                <option value="">Choose ...</option>
                                <optgroup label="Mode">
                                    <option value="Cash" {{ old('modeofsalary') == "Cash" ? 'selected' : '' }}>Cash</option>
                                    <option value="Cheque" {{ old('modeofsalary') == "Cheque" ? 'selected' : '' }}>Cheque</option>
                                    <option value="Bank">Bank Transfer</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="id_bankSelection" style="display: none">
                    <label class="col-md-4 control-label">Select Salary Bank</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group">
                            <select class="custom-select custom-mine selectpicker form-control" name="bankmode" id="bankmode" onchange="aval();">
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
                                    <option value="Other">Other...</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group" id="id_otherBank" style="display: none">
                    <label for="company" class="col-md-8 control-label">If Other Bank,Please mention here:</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('company') is-invalid @enderror" id="otherbank" placeholder="Enter Bank's name" name="otherbank" value="{{ old('modeofsalary') }}"></div>
                    </div>
                    <!-- @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror -->
                </div>
                
                <div class="form-group" id="id_netsalary" style="display: none">
                    <label for="netsalary" class="col-md-4 control-label">Net monthly salary</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" id="netsalary" class="form-control custom-mine @error('netsalary') is-invalid @enderror" placeholder="Enter net take home salary" name="netsalary" value="{{ old('netsalary') }}"></div>
                    </div>
                    @error('netsalary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="form-group" id="id_company" style="display: none">
                    <label for="company" class="col-md-8 control-label">Company's name as per payslip</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('company') is-invalid @enderror" id="company" placeholder="Enter company's name" name="company" value="{{ old('company') }}"></div>
                    </div>
                    @error('company')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="id_officeemail" style="display: none">
                    <label for="officeemail" class="col-md-8 control-label">Office Email Address</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="email" class="form-control custom-mine @error('officeemail') is-invalid @enderror" id="officeemail" placeholder="Enter your office email address" name="officeemail" value="{{ old('officeemail') }}"></div>
                    </div>
                    @error('officeemail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="officeaddress" class="col-md-4 control-label">Office Address</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><textarea class="form-control custom-mine @error('officeaddress') is-invalid @enderror" id="officeaddress" placeholder="Enter your office address" name="officeaddress" value="{{ old('officeaddress') }}" required>{{ Request::old('officeaddress')}}</textarea></div>
                    </div>
                    @error('officeaddress')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="id_designation" style="display: none">
                    <label for="designation" class="col-md-4 control-label">Designation</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('designation') is-invalid @enderror" id="designation" placeholder="Enter your designation" name="designation" value="{{ old('designation') }}"></div>
                    </div>
                    @error('designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="id_department" style="display: none">
                    <label for="department" class="col-md-4 control-label">Department</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('department') is-invalid @enderror" id="department" placeholder="Enter your department" name="department" value="{{ old('department') }}"></div>
                    </div>
                    @error('department')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="id_yearsincompany" style="display: none">
                    <label for="yearsincompany" class="col-md-8 control-label">No. of years in current company</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('yearsincompany') is-invalid @enderror" id="yearsincompany" placeholder="Enter no. of years in current company" name="yearsincompany" value="{{ old('yearsincompany') }}"></div>
                    </div>
                    @error('yearsincompany')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group" id="id_workexperience" style="display: none">
                    <label for="workexperience" class="col-md-8 control-label">Total work experience</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="number" min="0" step="0.01" class="form-control custom-mine @error('workexperience') is-invalid @enderror" id="workexperience" placeholder="Enter no. of years of work experience" name="workexperience" value="{{ old('workexperience') }}"></div>
                    </div>
                    @error('workexperience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label for="mothersname" class="col-md-4 control-label">Mother's name</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="text" class="form-control custom-mine @error('mothersname') is-invalid @enderror" id="mothersname" placeholder="Enter your mother's name" name="mothersname" value="{{ old('mothersname') }}" required></div>
                    </div>
                    @error('mothersname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dob" class="col-md-4 control-label">Date of birth</label>
                    <div class="col-md-8 inputGroupContainer">
                        <div class="input-group"><input type="date" class="form-control custom-mine @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') }}" required></div>
                    </div>
                    @error('dob')
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
                    <label>Tenure</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tenure" id="12" value="12" {{ old('tenure') == "12" ? 'checked' : '' }} required>
                        <label class="col-md-4 control-label form-check-label" for="12">12 months</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tenure" id="24" value="24" {{ old('tenure') == "24" ? 'checked' : '' }} required>
                        <label class="col-md-4 control-label form-check-label" for="24">24 months</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tenure" id="36" value="36" {{ old('tenure') == "36" ? 'checked' : '' }} required>
                        <label class="col-md-4 control-label form-check-label" for="36">36 months</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tenure" id="48" value="48" {{ old('tenure') == "48" ? 'checked' : '' }} required>
                        <label class="col-md-4 control-label form-check-label" for="48">48 months</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tenure" id="other" value="Other" {{ old('tenure') == "Other" ? 'checked' : '' }} required>
                        <label class="col-md-4 control-label form-check-label" for="other">Other</label>
                    </div>
                </div>
                
            </div>
        </div>
              
        <br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="proceed" name="proceed" required>
            <label class="form-check-label" for="proceed"><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank" style="text-decoration: none;"><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
        </div>

        <center><button type="submit" class="btn btn-primary">Proceed</button></center>
 
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
            A personal loan is money borrowed for any urgent cash requirement, It can be taken for any general purposes like education, reconstruction of property/home renovation, a wedding expense, vacation etc. Most of the financial institutions offer Personal Loan up to Rs. 40 lakhs for salaried customers. Normally, it can be repaid over a period of 12 months to 60 months. 
            Banks typically have capped the monthly payment (EMI) on your loan to about approximately 60% – 70% of your monthly take home income. However, a customer cannot take a personal loan for any kind of bad investment or expense which is not approved by the banks or by the law.            
            If you are looking for some money to close your credit cards due opt for <a href="{{ url('/credit_card_balance_transfer_form') }}"><b>credit card balance transfer</b></a> option for fast & minimal processing
        </div>
    </div>
    <div class="menu-content contact" style="color: black;">
        <div class="jumbotron">
            Checking your eligibility is a crucial step before applying for a loan. This will help you find out which loans you qualify for. If you apply for a loan you don’t qualify for, the lender will usually reject your loan application. A rejected loan application can adversely impact your credit rating.<br>
            <div class="table-responsive">
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Bank/NBFC</th>
                            <th scope="col">Interest Rate (per annum)</th>
                            <th scope="col">Loan Amount</th>
                            <th scope="col">Processing Fees</th>
                            <th scope="col">Part Payment</th>
                            <th scope="col">Pre-closure Charges</th>
                            <th scope="col">Locking Period</th>
                            <th scope="col">Loan Tenure</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>HDFC Bank</th>
                            <td>10.99% to 20.00%</td>
                            <td>Rs. 50,000 to Rs. 40 lakhs</td>
                            <td>Up to 2.50% of the loan amount subject to a minimum of ₹1,999/- & Maximum of ₹25000/-</td>
                            <td>Up to 25% of Principal Outstanding allowed</td>
                            <td>13-24 Months - 4% of Principal outstanding plus GST<br>
                                25-36 Months - 3% of Principal outstanding plus GST<br>
                                37-48 Months - 2% of Principal outstanding plus GST<br>
                                After 48 months - NIL</td>
                            <td>12 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>Fullerton Bank</th>
                            <td>12% to 25%</td>
                            <td>Rs. 65,000 to Rs. 20 lakhs</td>
                            <td>3% - 6% of the loan amount plus GST</td>
                            <td>Not available</td>
                            <td>7-17 Months - 7% of Principal outstanding plus GST<br>
                                18-23 months - 5% of Principal outstanding plus GST<br>
                                24-35 months - 3% of Principal outstanding plus GST<br>
                                After 36 months - NIL</td>
                            <td>12 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>IDFC First Bank</th>
                            <td>11.69% - 15.00% (Top up rates starts from 11.50%)</td>
                            <td>Rs. 1 lakh to Rs. 20 lakhs</td>
                            <td>Up to 2.0% of the loan amount</td>
                            <td>Up to 40% of loan amount every year</td>
                            <td>3% on your principal outstanding plus GST</td>
                            <td>3 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>ICICI Bank</th>
                            <td>11.50% to 16.75%</td>
                            <td>Rs. 50,000 to Rs. 25 lakhs</td>
                            <td>Up to 2.25% per annum of loan amount plus GST</td>
                            <td>Not available</td>
                            <td>5% per annum of principal outstanding plus GST</td>
                            <td>6 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>Tata Capital</th>
                            <td>11.75% to 19.00%</td>
                            <td>Rs. 75,000 to Rs. 20 lakhs</td>
                            <td>From ₹999/- Up to 2.0% of the loan amount and applicable Service Tax</td>
                            <td>Up to 25% of the principal outstanding (2% of the amount paid + GST)<br>
                                *Maximum of 50% of the principal outstanding permissible</td>
                            <td>6-12 months - 4% of principal outstanding plus GST<br>
                                After 12 months - NIL<br>
                                Top Up - 5% of the principal outstanding</td>
                            <td>6 months</td>
                            <td>12 months to 72 months</td>
                        </tr>
                        <tr>
                            <th>Axis Bank</th>
                            <td>12.00% to 24.00%</td>
                            <td>Rs. 50,000 to Rs. 15 lakhs</td>
                            <td>Upto 2% of the loan amount plus GST</td>
                            <td>NIL</td>
                            <td>NIL</td>
                            <td>6 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>Bajaj Finserv</th>
                            <td>12.00% to 16.00%</td>
                            <td>Rs. 1 lakh to Rs. 15 lakhs</td>
                            <td>Up to 3.99% of the loan amount</td>
                            <td>Should be more than 1 EMI (2% + applicable taxes on part-payment amount paid)</td>
                            <td>4% plus applicable taxes on principal outstanding</td>
                            <td>1 month</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>Kotak Mahindra Bank</th>
                            <td>11.00% to 24.00%</td>
                            <td>Rs. 1 lakh to Rs. 30 lakhs</td>
                            <td>Up to 2.5% of the loan amount + GST and other applicable statutory levies</td>
                            <td>Not available</td>
                            <td>5% of the outstanding amount + GST on principal outstanding</td>
                            <td>12 months</td>
                            <td>12 months to 48 months</td>
                        </tr>
                        <tr>
                            <th>IndusInd Bank</th>
                            <td>11.49% to 20.00%</td>
                            <td>Rs. 1 lakh to Rs. 20 lakhs</td>
                            <td>Up to 2.50% of the loan amount plus tax</td>
                            <td>Not available</td>
                            <td>4% of the principal outstanding</td>
                            <td>Salaried:<br> 12 months<br><br>Self Employed:<br> 6 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>IIFL</th>
                            <td>12.99% to 20.00%</td>
                            <td>Rs. 1 lakh to Rs. 20 lakhs</td>
                            <td>Upto 2% of the loan amount plus GST</td>
                            <td>Not available</td>
                            <td>Up to 4% of the Principal Outstanding<br>After 12 Months - NIL</td>
                            <td>6 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>RBL Bank</th>
                            <td>14.00% to 20.00%</td>
                            <td>Rs. 1 lakh to Rs. 20 lakhs</td>
                            <td>1.5% of the loan amount (Non Refundable fee of Rs 7500 Upfront, Rest at the time of disbursal)</td>
                            <td>Not available</td>
                            <td>13-18 months - 4% of principal outstanding plus GST After 12 Months - 3% of principal outstanding plus GST</td>
                            <td>12 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                        <tr>
                            <th>Incred</th>
                            <td>11.49% to 20.00%</td>
                            <td>Rs. 50,000 to Rs. 7.5 lakhs</td>
                            <td>Starting at 1% plus GST</td>
                            <td>Not available</td>
                            <td>After 6 months subject to payment of standard pre-closure charges applicable</td>
                            <td>6 months</td>
                            <td>12 months to 60 months</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <small>
                **(Subject to change as per Bank’s discretion from time to time)<br>
                ** Goods and Services tax (GST) will be charged extra as per the applicable rates, on all the charges and fees (wherever GST is applicable)
            </small>                
        </div>
    </div>
    <div class="menu-content misc" style="color: black;">
        <div class="jumbotron">
            The eligibility criteria to get an online personal loan approval for salaried and self-employed individuals are based on some factors.<br>
            The following are the factors that influence your eligibility:
            <ul>
                <li>Monthly or annual income
                <li>Company or organisation you work for
                <li>Type of residence – own house or rented house
                <li>Area or city in which you live
                <li>Credit rating or credit history
                <li>Current debt-to-income ratio
            </ul>
            <h5>Documents Required for Personal Loan</h5>
            <b>For Salaried Individuals</b><br>
            <ul>
                <li>Identity & Age Proof
                <li>PAN Card
                <li>Residence proof - Passport driving licence, Voter ID, post paid/landline bill, utility bills (electricity/water/gas)
                <li>Bank statements for the last 3 months (preferably your salary account)
                <li>Salary Slips of last 3 months
                <li>Form 16 or Income Tax Returns of last 3 years
            </ul>
            <table class="table table-bordered table-dark">
                <head>
                    <tr>
                        <th scope="col">Employment Type</th>
                        <td scope="col">Salaried</td>
                    </tr>
                    <tr>
                        <th scope="col">Age</th>
                        <td scope="col">21 years – 60 years</td>
                    </tr>
                    <tr>
                        <th scope="col">Minimum Net Income (Monthly)</th>
                        <td scope="col">₹25,000</td>
                    </tr>
                    <tr>
                        <th scope="col">Work Experience</th>
                        <td scope="col">Employed at current company for at least 6/12 months</td>
                    </tr>
                </thead>
            </table>
            <b>For Self-Employed professionals</b><br>
            <ul>
                <li>Identity & Age Proof
                <li>PAN Card
                <li>Residence proof - Passport driving licence, Voter ID, post paid/landline bill, utility bills (electricity/water/gas)
                <li>Bank statements for the last 12 months 
                <li>Last 3 years Income Tax Returns with computation of Income
                <li>Last 3 years CA Certified / Audited Balance Sheet and Profit & Loss Account
            </ul>
            <table class="table table-bordered table-dark">
                <head>
                    <tr>
                        <th scope="col">Employment Type</th>
                        <td scope="col">Self-Employed</td>
                    </tr>
                    <tr>
                        <th scope="col">Age</th>
                        <td scope="col">21 years – 68 years</td>
                    </tr>
                    <tr>
                        <th scope="col">Gross Annual Income</th>
                        <td scope="col">₹5,00,000</td>
                    </tr>
                    <tr>
                        <th scope="col">Business Stability</th>
                        <td scope="col">Business tenure of at least 3 years (continuous) ITR of last 3 years</td>
                    </tr>
                </thead>
            </table>
            <small>**Business Turnover, Operation History, Business existence, credit score and profitability criteria are defined by the respective bank and NBFC.</small>
        </div>
    </div>

    <script>
        if(document.getElementById("salaried").checked) {
            document.getElementById("id_modeofsalary").style.display = "block";
            document.getElementById("id_netsalary").style.display = "block";
            document.getElementById("id_company").style.display = "block";
            document.getElementById("id_officeemail").style.display = "block";
            document.getElementById("id_designation").style.display = "block";
            document.getElementById("id_department").style.display = "block";
            document.getElementById("id_yearsincompany").style.display = "block";
            document.getElementById("id_workexperience").style.display = "block";
            document.getElementById("modeofsalary").setAttribute("required", "true");
            document.getElementById("netsalary").setAttribute("required", "true");
            document.getElementById("company").setAttribute("required", "true");
            document.getElementById("officeemail").setAttribute("required", "true");
            document.getElementById("designation").setAttribute("required", "true");
            document.getElementById("yearsincompany").setAttribute("required", "true");
            document.getElementById("workexperience").setAttribute("required", "true");
            document.getElementById("id_profit").style.display = "none";
            document.getElementById("id_turnover").style.display = "none";
            document.getElementById("profit").removeAttribute("required");
            document.getElementById("turnover").removeAttribute("required");
        }
        else if(document.getElementById("selfemployed").checked) {
            document.getElementById("id_modeofsalary").style.display = "none";
            document.getElementById("id_netsalary").style.display = "none";
            document.getElementById("id_company").style.display = "none";
            document.getElementById("id_officeemail").style.display = "none";
            document.getElementById("id_designation").style.display = "none";
            document.getElementById("id_department").style.display = "none";
            document.getElementById("id_yearsincompany").style.display = "none";
            document.getElementById("id_workexperience").style.display = "none";
            document.getElementById("modeofsalary").removeAttribute("required");
            document.getElementById("netsalary").removeAttribute("required");
            document.getElementById("company").removeAttribute("required");
            document.getElementById("officeemail").removeAttribute("required");
            document.getElementById("designation").removeAttribute("required");
            document.getElementById("yearsincompany").removeAttribute("required");
            document.getElementById("workexperience").removeAttribute("required");
            document.getElementById("id_profit").style.display = "block";
            document.getElementById("id_turnover").style.display = "block";
            document.getElementById("profit").setAttribute("required", "true");
            document.getElementById("turnover").setAttribute("required", "true");
        }
        if(document.getElementById("existingloansyes").checked) {
            document.getElementById("id_emi").style.display = "block";
            document.getElementById("emi").setAttribute("required", "true");
        }
        else {
            document.getElementById("id_emi").style.display = "none";
            document.getElementById("emi").removeAttribute("required");
        }

    </script>
    <script>
        function check() {
            if(document.getElementById("salaried").checked) {
                document.getElementById("id_modeofsalary").style.display = "block";
                document.getElementById("id_netsalary").style.display = "block";
                document.getElementById("id_company").style.display = "block";
                document.getElementById("id_officeemail").style.display = "block";
                document.getElementById("id_designation").style.display = "block";
                document.getElementById("id_department").style.display = "block";
                document.getElementById("id_yearsincompany").style.display = "block";
                document.getElementById("id_workexperience").style.display = "block";
                document.getElementById("modeofsalary").setAttribute("required", "true");
                document.getElementById("netsalary").setAttribute("required", "true");
                document.getElementById("company").setAttribute("required", "true");
                document.getElementById("officeemail").setAttribute("required", "true");
                document.getElementById("designation").setAttribute("required", "true");
                document.getElementById("yearsincompany").setAttribute("required", "true");
                document.getElementById("workexperience").setAttribute("required", "true");
                document.getElementById("id_profit").style.display = "none";
                document.getElementById("id_turnover").style.display = "none";
                document.getElementById("profit").removeAttribute("required");
                document.getElementById("turnover").removeAttribute("required");
            }
            else if(document.getElementById("selfemployed").checked) {
                document.getElementById("id_modeofsalary").style.display = "none";
                document.getElementById("id_netsalary").style.display = "none";
                document.getElementById("id_company").style.display = "none";
                document.getElementById("id_officeemail").style.display = "none";
                document.getElementById("id_designation").style.display = "none";
                document.getElementById("id_department").style.display = "none";
                document.getElementById("id_yearsincompany").style.display = "none";
                document.getElementById("id_workexperience").style.display = "none";
                document.getElementById("modeofsalary").removeAttribute("required");
                document.getElementById("netsalary").removeAttribute("required");
                document.getElementById("company").removeAttribute("required");
                document.getElementById("officeemail").removeAttribute("required");
                document.getElementById("designation").removeAttribute("required");
                document.getElementById("yearsincompany").removeAttribute("required");
                document.getElementById("workexperience").removeAttribute("required");
                document.getElementById("id_profit").style.display = "block";
                document.getElementById("id_turnover").style.display = "block";
                document.getElementById("profit").setAttribute("required", "true");
                document.getElementById("turnover").setAttribute("required", "true");
            }
        }
        
        function show_emi() {
            if(document.getElementById("existingloansyes").checked) {
                document.getElementById("id_emi").style.display = "block";
                document.getElementById("emi").setAttribute("required", "true");
            }
            else {
                document.getElementById("id_emi").style.display = "none";
                document.getElementById("emi").removeAttribute("required");
            }
        }
    </script>

    <script>
        window.onload = function () {
        var selectBox = document.getElementById("modeofsalary");
        selectBox.addEventListener('change', checkBank);
        function checkBank() {
            if(this.value == "Bank"){
                document.getElementById("id_bankSelection").style.display = "block";
            }
        }

        var selectnew = document.getElementById("bankmode");
        selectnew.addEventListener('change', aval);
        function aval() {
            if(this.value == "Other"){
                document.getElementById("id_otherBank").style.display = "block";
            }
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

</div>

@endsection
