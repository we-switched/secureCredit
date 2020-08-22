@extends('layouts.app')

@section('title', 'Personal Loan')

@section('content')

<div class="container" style="margin-top: 20px">
    <form method="POST" action="{{ url('/personal_loan_form/'.$loan->id) }}" enctype="multipart/form-data" style="color: whitesmoke">
    @method('PUT')
        @csrf
       
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control custom-mine @error('name') is-invalid @enderror" id="name" placeholder="Enter your name (as per PAN card)" name="name" value="{{ old('name', $loan->name) }}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Upload your passport size photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('pdfbank', $loan->photo) }}">
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Personal email address</label>
            <input type="email" class="form-control custom-mine @error('email') is-invalid @enderror" id="email" placeholder="Enter your personal email address" name="email" value="{{ old('email', $loan->email) }}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="phone">Phone No.</label>
            <input type="tel" pattern="[6789][0-9]{9}" size="10" class="form-control custom-mine @error('phone') is-invalid @enderror" id="phone" placeholder="Enter your phone no." name="phone" value="{{ old('phone', $loan->phone) }}" required>
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label>Is it a Top-Up Loan ?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="topup" value="No" {{ old('topup', $loan->topup) == "No" ? 'checked' : '' }}>
                <label class="form-check-label" for="topupno">No</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="topup" value="Yes" {{ old('topup', $loan->topup) == "Yes" ? 'checked' : '' }}>
                <label class="form-check-label" for="topupyes">Yes</label>
            </div>
        </div>

        <div class="form-group">
            <label>Have you availed moratorium offered by RBI ?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium', $loan->moratorium) == "No" ? 'checked' : '' }}>
                <label class="form-check-label" for="moratoriumno">No</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium', $loan->moratorium) == "Yes" ? 'checked' : '' }}>
                <label class="form-check-label" for="moratoriumyes">Yes</label>
            </div>
        </div>

        @if (auth()->user()->role === "Admin")
        <div class="form-group">
            <label>Telecaller</label>
            <select class="custom-select custom-mine" name="telecaller" required>
                <option value="">Choose ... </option>
                @foreach($telecallers as $telecaller)
                    <option value="{{ $telecaller->name }}" {{ (old('telecaller', $loan->telecaller) == $telecaller->name) ? 'selected' : '' }}>{{ $telecaller->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="form-group">
            <label>Status</label>
            <select class="custom-select custom-mine" name="status" required>
                <option value="">Choose ...</option>
                <option value="Not Called" {{ old('status', $loan->status) == "Not Called" ? 'selected' : '' }}>Not Called</option>
                <option value="Not Doable" {{ old('status', $loan->status) == "Not Doable" ? 'selected' : '' }}>Not Doable</option>
                <option value="Not Eligible" {{ old('status', $loan->status) == "Not Eligible" ? 'selected' : '' }}>Not Eligible</option>
                <option value="Not Reachable" {{ old('status', $loan->status) == "Not Reachable" ? 'selected' : '' }}>Not Reachable</option>
                <option value="Not Interested" {{ old('status', $loan->status) == "Not Interested" ? 'selected' : '' }}>Not Interested</option>
                <option value="Wrong no." {{ old('status', $loan->status) == "Wrong no." ? 'selected' : '' }}>Wrong no.</option>
                <option value="Ringing" {{ old('status', $loan->status) == "Ringing" ? 'selected' : '' }}>Ringing</option>
                <option value="Follow Up" {{ old('status', $loan->status) == "Follow Up" ? 'selected' : '' }}>Follow Up</option>
                <option value="Meeting" {{ old('status', $loan->status) == "Meeting" ? 'selected' : '' }}>Meeting</option>
                <option value="DOC Pickup" {{ old('status', $loan->status) == "DOC Pickup" ? 'selected' : '' }}>DOC Pickup</option>
                <option value="Login" {{ old('status', $loan->status) == "Login" ? 'selected' : '' }}>Login</option>
                <option value="Rejected" {{ old('status', $loan->status) == "Rejected" ? 'selected' : '' }}>Rejected</option>
                <option value="Sanctioned" {{ old('status', $loan->status) == "Sanctioned" ? 'selected' : '' }}>Sanctioned</option>
                <option value="Disbursed" {{ old('status', $loan->status) == "Disbursed" ? 'selected' : '' }}>Disbursed</option>
                <option value="Repeated Lead" {{ old('status', $loan->status) == "Repeated Lead" ? 'selected' : '' }}>Repeated Lead</option>
            </select>
        </div>

        <div class="form-group">
            <label>Select City</label>
            <select class="custom-select custom-mine" name="city" required>
                <option value="">Choose ...</option>
                <option value="Ahmedabad" {{ old('city', $loan->city) == "Ahmedabad" ? 'selected' : '' }}>Ahmedabad</option>
                <option value="Bangalore" {{ old('city', $loan->city) == "Bangalore" ? 'selected' : '' }}>Bangalore</option>
                <option value="Chennai" {{ old('city', $loan->city) == "Chennai" ? 'selected' : '' }}>Chennai</option>
                <option value="Coimbatore" {{ old('city', $loan->city) == "Coimbatore" ? 'selected' : '' }}>Coimbatore</option>
                <option value="Delhi" {{ old('city', $loan->city) == "Delhi" ? 'selected' : '' }}>Delhi</option>
                <option value="Delhi NCR" {{ old('city', $loan->city) == "Delhi NCR" ? 'selected' : '' }}>Delhi NCR</option>
                <option value="Hyderabad" {{ old('city', $loan->city) == "Hyderabad" ? 'selected' : '' }}>Hyderabad</option>
                <option value="Indore" {{ old('city', $loan->city) == "Indore" ? 'selected' : '' }}>Indore</option>
                <option value="Kochi" {{ old('city', $loan->city) == "Kochi" ? 'selected' : '' }}>Kochi</option>
                <option value="Mumbai" {{ old('city', $loan->city) == "Mumbai" ? 'selected' : '' }}>Mumbai</option>
                <option value="Mysore" {{ old('city', $loan->city) == "Mysore" ? 'selected' : '' }}>Mysore</option>
                <option value="Noida" {{ old('city', $loan->city) == "Noida" ? 'selected' : '' }}>Noida</option>
                <option value="Pune" {{ old('city', $loan->city) == "Pune" ? 'selected' : '' }}>Pune</option>
                <option value="Trivandrum" {{ old('city', $loan->city) == "Trivandrum" ? 'selected' : '' }}>Trivandrum</option>
                <option value="Vizag" {{ old('city', $loan->city) == "Vizag" ? 'selected' : '' }}>Vizag</option>
            </select>
        </div>

        <label> Type of residence </label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="residence" id="rented" value="Rented" {{ old('residence', $loan->residence) == "Rented" ? 'checked' : '' }} required>
            <label class="form-check-label" for="rented">Rented</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="residence" id="owned" value="Owned" {{ old('residence', $loan->residence) == "Owned" ? 'checked' : '' }} required>
            <label class="form-check-label" for="owned">Owned</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="residence" id="parentsowned" value="Parents Owned" {{ old('residence', $loan->residence) == "Parents Owned" ? 'checked' : '' }} required>
            <label class="form-check-label" for="parentsowned">Parents Owned</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="residence" id="other" value="Other" {{ old('residence', $loan->residence) == "Other" ? 'checked' : '' }} required>
            <label class="form-check-label" for="other">Other</label>
        </div> <br>
        
        <div class="form-group">
            <label for="presentaddress">Present Address</label>
            <textarea class="form-control custom-mine @error('presentaddress') is-invalid @enderror" id="presentaddress" placeholder="Enter your present address" name="presentaddress" value="{{ old('presentaddress') }}" required>{{ Request::old('presentaddress', $loan->presentaddress)}}</textarea>
            @error('presentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>    
            @enderror
        </div>

        <div class="form-group">
            <label for="permanentaddress">Permanent Address</label>
            <textarea class="form-control custom-mine @error('permanentaddress') is-invalid @enderror" id="permanentaddress" placeholder="Enter your permanent address" name="permanentaddress" value="{{ old('permanentaddress') }}" required>{{Request::old('permanentaddress', $loan->permanentaddress)}}</textarea>
            @error('permanentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="aadhar">Aadhar number</label>
            <input type="text" class="form-control custom-mine @error('aadhar') is-invalid @enderror" id="aadhar" placeholder="Enter your aadhar number" name="aadhar" value="{{ old('aadhar', $loan->aadhar) }}" required>
            @error('aadhar')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pan">PAN number</label>
            <input type="text" class="form-control custom-mine @error('pan') is-invalid @enderror" id="pan" placeholder="Enter your PAN number" name="pan" value="{{ old('pan', $loan->pan) }}" required>
            @error('pan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearsincity">No. of years in current city</label>
            <input type="number" min="0" class="form-control custom-mine @error('yearsincity') is-invalid @enderror" id="yearsincity" placeholder="Enter no. of years in Bengaluru" name="yearsincity" value="{{ old('yearsincity', $loan->yearsincity) }}" required>
            @error('yearsincity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearsinpresentaddress">No. of years in current residence</label>
            <input type="text" class="form-control custom-mine @error('yearsinpresentaddress') is-invalid @enderror" id="yearsinpresentaddress" placeholder="Enter no. of years in residing in present address" name="yearsinpresentaddress" value="{{ old('yearsinpresentaddress', $loan->yearsinpresentaddress) }}" required>
            @error('yearsinpresentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="rent">If rented, monthly payable rent</label>
            <input type="number" min="0" class="form-control custom-mine @error('rent') is-invalid @enderror" id="rent" placeholder="Enter no. of years in Bengaluru" name="rent" value="{{ old('rent', $loan->rent) }}" required>
            @error('rent')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="qualification">Qualification</label>
            <input type="text" class="form-control custom-mine @error('qualification') is-invalid @enderror" id="qualification" placeholder="Enter your qualification" name="qualification" value="{{ old('qualification', $loan->qualification) }}" required>
            @error('qualification')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="uniname">University's Name</label>
            <input type="text" class="form-control custom-mine @error('uniname') is-invalid @enderror" id="uniname" placeholder="Enter your university's name" name="uniname" value="{{ old('uniname', $loan->uniname) }}" required>
            @error('uniname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearofpassing">Year of passing</label>
            <input type="text" class="form-control custom-mine @error('yearofpassing') is-invalid @enderror" id="yearofpassing" placeholder="Enter your year of passing" name="yearofpassing" value="{{ old('yearofpassing', $loan->yearofpassing) }}" required>
            @error('yearofpassing')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label>Marital Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="maritalstatus" id="married" value="Married" {{ old('maritalstatus', $loan->maritalstatus) == "Married" ? 'checked' : '' }} required>
            <label class="form-check-label" for="married">Married</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="maritalstatus" id="single" value="Single" {{ old('maritalstatus', $loan->maritalstatus) == "Single" ? 'checked' : '' }} required>
            <label class="form-check-label" for="single">Single</label>
        </div><br>

        <label>Any existing loans</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="existingloans" id="yes" value="Yes" {{ old('existingloans', $loan->existingloans) == "Yes" ? 'checked' : '' }} required onclick="show_emi()">
            <label class="form-check-label" for="yes">Yes</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="existingloans" id="no" value="No" {{ old('existingloans', $loan->existingloans) == "No" ? 'checked' : '' }} required onclick="show_emi()">
            <label class="form-check-label" for="no">No</label>
        </div><br>

        <div class="form-group" id="id_emi" style="display: none">
            <label for="emi">If any existing loan/credit card, monthly EMI payable</label>
            <input type="text" class="form-control custom-mine @error('emi') is-invalid @enderror" id="emi" placeholder="Enter monthly EMI payable" name="emi" value="{{ old('emi', $loan->emi) }}" required>
            @error('emi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="reference1">Reference #1 Friend's name & Contact number</label>
            <input type="text" class="form-control custom-mine @error('reference1') is-invalid @enderror" id="reference1" placeholder="Enter your friend's name & contact number" name="reference1" value="{{ old('reference1', $loan->reference1) }}" required>
            @error('reference1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="reference2">Reference #2 Friend's name & Contact number</label>
            <input type="text" class="form-control custom-mine @error('reference2') is-invalid @enderror" id="reference2" placeholder="Enter your friend's name & contact number" name="reference2" value="{{ old('reference2', $loan->reference2) }}" required>
            @error('reference2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Type of employment</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="employmenttype" value="Salaried" id="salaried" {{ old('employmenttype', $loan->employmenttype) == "Salaried" ? 'checked' : '' }} required onclick="check()">
                <label class="form-check-label" for="salaried">Salaried</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="employmenttype" value="Self Employed" id="selfemployed" {{ old('employmenttype', $loan->employmenttype) == "Self Employed" ? 'checked' : '' }} required onclick="check()">
                <label class="form-check-label" for="selfemployed">Self Employed</label>
            </div>
        </div>

        <div class="form-group" id="modeofsalary" style="display: none">
            <label for="id_modeofsalary">Mode of salary</label>
            <select class="custom-select custom-mine" name="modeofsalary" id="id_modeofsalary">
                <option value="">Choose ...</option>
                <optgroup label="Mode">
                    <option value="Cash" {{ old('modeofsalary', $loan->modeofsalary) == "Cash" ? 'selected' : '' }}>Cash</option>
                    <option value="Cheque" {{ old('modeofsalary', $loan->modeofsalary) == "Cheque" ? 'selected' : '' }}>Cheque</option>
                </optgroup>
                <optgroup label="Bank">
                    <option value="HDFC Bank" {{ old('modeofsalary', $loan->modeofsalary) == "HDFC Bank" ? 'selected' : '' }}>HDFC Bank</option>
                    <option value="ICICI Bank" {{ old('modeofsalary', $loan->modeofsalary) == "ICICI Bank" ? 'selected' : '' }}>ICICI Bank</option>
                    <option value="Kotak Mahindra" {{ old('modeofsalary', $loan->modeofsalary) == "Kotak Mahindra" ? 'selected' : '' }}>Kotak Mahindra</option>
                    <option value="IndusInd Bank" {{ old('modeofsalary', $loan->modeofsalary) == "IndusInd Bank" ? 'selected' : '' }}>IndusInd Bank</option>
                    <option value="RBL Bank" {{ old('modeofsalary', $loan->modeofsalary) == "RBL Bank" ? 'selected' : '' }}>RBL Bank</option>
                    <option value="Federal Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Federal Bank" ? 'selected' : '' }}>Federal Bank</option>
                    <option value="South Indian Bank" {{ old('modeofsalary', $loan->modeofsalary) == "South Indian Bank" ? 'selected' : '' }}>South Indian Bank</option>
                    <option value="Axis Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Axis Bank" ? 'selected' : '' }}>Axis Bank</option>
                    <option value="SBI" {{ old('modeofsalary', $loan->modeofsalary) == "SBI" ? 'selected' : '' }}>SBI</option>
                    <option value="Canara Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Canara Bank" ? 'selected' : '' }}>Canara Bank</option>
                    <option value="Syndicate Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Syndicate Bank" ? 'selected' : '' }}>Syndicate Bank</option>
                    <option value="PNB" {{ old('modeofsalary', $loan->modeofsalary) == "PNB" ? 'selected' : '' }}>PNB</option>
                    <option value="Union Bank of India" {{ old('modeofsalary', $loan->modeofsalary) == "Union Bank of India" ? 'selected' : '' }}>Union Bank of India</option>
                    <option value="IDFC First Bank" {{ old('modeofsalary', $loan->modeofsalary) == "IDFC First Bank" ? 'selected' : '' }}>IDFC First Bank</option>
                    <option value="Karnataka Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Karnataka Bank" ? 'selected' : '' }}>Karnataka Bank</option>
                    <option value="Karur Vysya Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Karur Vysya Bank" ? 'selected' : '' }}>Karur Vysya Bank</option>
                    <option value="Citi Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Citi Bank" ? 'selected' : '' }}>Citi Bank</option>
                    <option value="Standard Chartered" {{ old('modeofsalary', $loan->modeofsalary) == "Standard Chartered" ? 'selected' : '' }}>Standard Chartered</option>
                    <option value="Dena Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Dena Bank" ? 'selected' : '' }}>Dena Bank</option>
                    <option value="Yes Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Yes Bank" ? 'selected' : '' }}>Yes Bank</option>
                    <option value="DBS Bank" {{ old('modeofsalary', $loan->modeofsalary) == "DBS Bank" ? 'selected' : '' }}>DBS Bank</option>
                    <option value="HSBC Banking Corp." {{ old('modeofsalary', $loan->modeofsalary) == "HSBC Banking Corp." ? 'selected' : '' }}>HSBC Banking Corp.</option>
                    <option value="Bank of Baroda" {{ old('modeofsalary', $loan->modeofsalary) == "Bank of Baroda" ? 'selected' : '' }}>Bank of Baroda</option>
                    <option value="Indian Bank" {{ old('modeofsalary', $loan->modeofsalary) == "Indian Bank" ? 'selected' : '' }}>Indian Bank</option>
                </optgroup>
            </select>
        </div>
                
        <div class="form-group" id="netsalary" style="display: none">
            <label for="netsalary">Net monthly salary</label>
            <input type="number" min="0" id="id_netsalary" class="form-control custom-mine @error('netsalary') is-invalid @enderror" placeholder="Enter net take home salary" name="netsalary" value="{{ old('netsalary', $loan->netsalary) }}">
            @error('netsalary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="profit" style="display: none">
            <label for="profit">Net profit</label>
            <input type="number" id="id_profit" min="0" class="form-control custom-mine @error('profit') is-invalid @enderror" placeholder="Enter net proft as per last year ITR" name="profit" value="{{ old('profit', $loan->profit) }}">
            @error('profit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group" id="turnover" style="display: none">
            <label for="turnover">Gross turnover</label>
            <input type="number" min="0" id="id_turnover" class="form-control custom-mine @error('turnover') is-invalid @enderror" placeholder="Enter gross turnover as per last year ITR" name="turnover" value="{{ old('turnover', $loan->turnover) }}">
            @error('turnover')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group" id="id_company" style="display: none">
            <label for="company">Company's name as per payslip</label>
            <input type="text" class="form-control custom-mine @error('company') is-invalid @enderror" id="company" placeholder="Enter company's name" name="company" value="{{ old('company', $loan->company) }}">
            @error('company')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="id_officeemail" style="display: none">
            <label for="officeemail">Office email address</label>
            <input type="email" class="form-control custom-mine @error('officeemail') is-invalid @enderror" id="officeemail" placeholder="Enter your office email address" name="officeemail" value="{{ old('officeemail', $loan->officeemail) }}">
            @error('officeemail')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="officeaddress">Office Address</label>
            <textarea class="form-control custom-mine @error('officeaddress') is-invalid @enderror" id="officeaddress" placeholder="Enter your office address" name="officeaddress" value="{{ old('officeaddress') }}" required>{{Request::old('officeaddress', $loan->officeaddress)}}</textarea>
            @error('officeaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group" id="id_designation" style="display: none">
            <label for="designation">Designation</label>
            <input type="text" class="form-control custom-mine @error('designation') is-invalid @enderror" id="designation" placeholder="Enter your designation" name="designation" value="{{ old('designation', $loan->designation) }}">
            @error('designation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group" id="id_department" style="display: none">
            <label for="department">Department</label>
            <input type="text" class="form-control custom-mine @error('department') is-invalid @enderror" id="department" placeholder="Enter your department" name="department" value="{{ old('department', $loan->department) }}">
            @error('department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <div class="form-group">
            @if($employmenttype == "Salaried")
                <label>Upload your latest 3 months payslip (in pdf)</label>
            @elseif($employmenttype == "Self Employed")
                <label>Upload your last 3 months ITR (in pdf)</label>
            @endif
            <input type="file" accept=".pdf" class="form-control-file custom-mine @error('pdfpayslip_1') is-invalid @enderror" id="pdfpayslip_1" name="pdfpayslip_1" value="{{ old('pdfpayslip_1', $loan->pdfpayslip_1) }}">
            <input type="file" accept=".pdf" class="form-control-file custom-mine @error('pdfpayslip_2') is-invalid @enderror" id="pdfpayslip_2" name="pdfpayslip_2" value="{{ old('pdfpayslip_2', $loan->pdfpayslip_2) }}">
            <input type="file" accept=".pdf" class="form-control-file custom-mine @error('pdfpayslip_3') is-invalid @enderror" id="pdfpayslip_3" name="pdfpayslip_3" value="{{ old('pdfpayslip_3', $loan->pdfpayslip_3) }}">
            @error('pdfpayslip_1')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('pdfpayslip_2')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            @error('pdfpayslip_3')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
                    
        <div class="form-group" id="id_yearsincompany" style="display: none">
            <label for="yearsincompany">No. of years in current company</label>
            <input type="number" min="0" class="form-control custom-mine @error('yearsincompany') is-invalid @enderror" id="yearsincompany" placeholder="Enter no. of years in current company" name="yearsincompany" value="{{ old('yearsincompany', $loan->yearsincompany) }}">
            @error('yearsincompany')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="id_workexperience" style="display: none">
            <label for="workexperience">Total work experience</label>
            <input type="number" min="0" class="form-control custom-mine @error('workexperience') is-invalid @enderror" id="workexperience" placeholder="Enter no. of years of work experience" name="workexperience" value="{{ old('workexperience', $loan->workexperience) }}">
            @error('workexperience')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="mothersname">Mother's name</label>
            <input type="text" class="form-control custom-mine @error('mothersname') is-invalid @enderror" id="mothersname" placeholder="Enter your mother's name" name="mothersname" value="{{ old('mothersname', $loan->mothersname) }}" required>
            @error('mothersname')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="loanamount">Loan amount</label>
            <input type="number" min="0" class="form-control custom-mine @error('loanamount') is-invalid @enderror" id="loanamount" placeholder="Enter required loan amount" name="loanamount" value="{{ old('loanamount', $loan->loanamount) }}" required>
            @error('loanamount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <label>Tenure</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tenure" id="12" value="12" {{ old('tenure', $loan->tenure) == "12" ? 'checked' : '' }} required>
            <label class="form-check-label" for="12">12 months</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tenure" id="24" value="24" {{ old('tenure', $loan->tenure) == "24" ? 'checked' : '' }} required>
            <label class="form-check-label" for="24">24 months</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tenure" id="36" value="36" {{ old('tenure', $loan->tenure) == "36" ? 'checked' : '' }} required>
            <label class="form-check-label" for="36">36 months</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tenure" id="48" value="48" {{ old('tenure', $loan->tenure) == "48" ? 'checked' : '' }} required>
            <label class="form-check-label" for="48">48 months</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tenure" id="other" value="Other" {{ old('tenure', $loan->tenure) == "Other" ? 'checked' : '' }} required>
            <label class="form-check-label">Other</label>
        </div><br>

        
        <div class="form-group">
            <label for="dob">Date of birth</label>
            <input type="date" class="form-control custom-mine @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob', $loan->dob) }}" required>
            @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="photoaadharfront">Upload your Aadhar card's front side photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photoaadharfront') is-invalid @enderror" id="photoaadharfront" name="photoaadharfront" value="{{ old('photoaadharfront', $loan->photoaadharfront) }}">
            @error('photoaadharfront')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            
        <div class="form-group">
            <label for="photoaadharback">Upload your Aadhar card's back side photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photoaadharback') is-invalid @enderror" id="photoaadharback" name="photoaadharback" value="{{ old('photoaadharback', $loan->photoaadharback) }}">
            @error('photoaadharback')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            
        <div class="form-group">
            <label for="photopan">Upload your PAN card's front side photo</label>
            <input type="file" class="form-control-file custom-mine @error('photopan') is-invalid @enderror" id="photopan" name="photopan" value="{{ old('photopan', $loan->photopan) }}">
            @error('photopan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pdfbank">Upload your latest 3 months bank statements till date (in pdf)</label>
            <input type="file" accept=".pdf" class="form-control-file custom-mine @error('pdfbank') is-invalid @enderror" id="pdfbank" name="pdfbank" value="{{ old('pdfbank', $loan->pdfbank) }}">
            @error('pdfbank')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
                    
        <div class="form-group">
            <label for="rentalagreement">Upload your rental agreement (in pdf)</label>
            <input type="file" accept=".png,.jpg,.jpeg,.pdf" class="form-control-file custom-mine @error('rentalagreement') is-invalid @enderror" id="rentalagreement" name="rentalagreement" value="{{ old('rentalagreement', $loan->rentalagreement) }}">
            @error('rentalagreement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
                    
        <div class="form-group">
            <label for="electricitybill">Upload your latest month electricity bill (in pdf)</label>
            <input type="file" accept=".png,.jpg,.jpeg,.pdf" class="form-control-file custom-mine @error('electricitybill') is-invalid @enderror" id="electricitybill" name="electricitybill" value="{{ old('electricitybill', $loan->electricitybill) }}">
            @error('electricitybill')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <center><button type="submit" class="btn btn-primary">Submit</button></center>
        
    </form>
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

@endsection