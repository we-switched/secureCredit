@extends('layouts.app')

@section('title', 'Home Loan')

@section('content')

<div class="container" style="margin-top: 20px">
    <form method="POST" action="{{ url('/home_loan_form/'.$loan->id) }}" style="color: whitesmoke">
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
            <label for="email">Email address</label>
            <input type="email" class="form-control custom-mine @error('email') is-invalid @enderror" id="email" placeholder="Enter your email address" name="email" value="{{ old('email', $loan->email) }}" required>
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
                <input class="form-check-input" type="radio" name="topup" value="No" id="topupno" {{ old('topup', $loan->topup) == "No" ? 'checked' : '' }} required>
                <label class="form-check-label" for="topupno">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="topup" value="Yes" id="topupyes" {{ old('topup', $loan->topup) == "Yes" ? 'checked' : '' }} required>
                <label class="form-check-label" for="topupyes">Yes</label>
            </div>
        </div>

        <div class="form-group">
            <label>Have you availed moratorium offered by RBI ?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="moratorium" value="No" id="moratoriumno" {{ old('moratorium', $loan->moratorium) == "No" ? 'checked' : '' }} required>
                <label class="form-check-label" for="moratoriumno">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="moratorium" value="Yes" id="moratoriumyes" {{ old('moratorium', $loan->moratorium) == "Yes" ? 'checked' : '' }} required>
                <label class="form-check-label" for="moratoriumyes">Yes</label>
            </div>
        </div>
        
        @if (auth()->user()->role === "Admin")
        <div class="form-group">
            <label>Telecaller</label>
            <select class="custom-select custom-mine" name="telecaller">
                <option value="">Choose ... </option>
                @foreach($telecallers as $telecaller)
                    <option value="{{ $telecaller->name }}" {{ old('telecaller', $loan->telecaller) == $telecaller->name ? 'selected' : '' }}>{{ $telecaller->name }}</option>
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
            <select class="custom-select custom-mine" name="city" required onchange="show_katha()">
                <option value="">Choose ...</option>
                <option value="Ahmedabad" {{ old('city', $loan->city) == "Ahmedabad" ? 'selected' : '' }}>Ahmedabad</option>
                <option value="Bangalore" id="bangalore" {{ old('city', $loan->city) == "Bangalore" ? 'selected' : '' }}>Bangalore</option>
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
            
        <div class="form-group">
            <label>Type of home loan</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="typeofhomeloan" value="Ready to move in house purchase" id="ready" {{ old('typeofhomeloan', $loan->typeofhomeloan) == "Ready to move in house purchase" ? 'checked' : '' }} required>
                <label class="form-check-label" for="ready">Ready to move in house purchase</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="typeofhomeloan" value="Flat" id="flat" {{ old('typeofhomeloan', $loan->typeofhomeloan) == "Flat" ? 'checked' : '' }} required>
                <label class="form-check-label" for="flat">Flat purchase</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="typeofhomeloan" value="Home construction" id="home" {{ old('typeofhomeloan', $loan->typeofhomeloan) == "Home construction" ? 'checked' : '' }} required>
                <label class="form-check-label" for="home">Home construction loan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="typeofhomeloan" value="Plot purchase" id="plot" {{ old('typeofhomeloan', $loan->typeofhomeloan) == "Plot purchase" ? 'checked' : '' }} required>
                <label class="form-check-label" for="plot">Plot purchase loan</label>
            </div>
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
        
        <div class="form-group">
            <label for="loanamount">Loan amount</label>
            <input type="number" min="0" class="form-control custom-mine @error('loanamount') is-invalid @enderror" id="loanamount" placeholder="Enter required loan amount" name="loanamount" value="{{ old('loanamount', $loan->loanamount) }}" required>
            @error('loanamount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
            
        <div class="form-group">
            <label for="marketvalue">Market Value of the property</label>
            <input type="number" min="0" class="form-control custom-mine @error('marketvalue') is-invalid @enderror" id="marketvalue" placeholder="Enter the property's market value" name="marketvalue" value="{{ old('marketvalue', $loan->marketvalue) }}" required>
            @error('marketvalue')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="governmentvalue">Govt. Value of the property</label>
            <input type="number" min="0" class="form-control custom-mine @error('governmentvalue') is-invalid @enderror" id="governmentvalue" placeholder="Enter the property's govt. value" name="governmentvalue" value="{{ old('governmentvalue', $loan->governmentvalue) }}" required>
            @error('governmentvalue')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group" id="katha" style="display: none">
            <label>Katha of property</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="katha" value="A" id="kathaA" {{ old('katha', $loan->katha) == "A" ? 'checked' : '' }}>
                <label class="form-check-label" for="kathaA">A Katha</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="katha" value="B" id="kathaB" {{ old('katha', $loan->katha) == "B" ? 'checked' : '' }}>
                <label class="form-check-label" for="kathaB">B Katha</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="katha" value="E" id="kathaE" {{ old('katha', $loan->katha) == "E" ? 'checked' : '' }}>
                <label class="form-check-label" for="kathaE">E Katha</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="katha" value="Other" id="kathaOther" {{ old('katha', $loan->katha) == "Other" ? 'checked' : '' }}>
                <label class="form-check-label" for="kathaOther">Other</label>
            </div>
        </div>

        <center><button type="submit" class="btn btn-primary">Submit</button></center>

    </form>

</div>

<script>
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

    if(document.getElementById("bangalore").selected) {
        document.getElementById("katha").style.display = "block";
        document.getElementById("kathaA").setAttribute("required", "true");
    }
    else {
        document.getElementById("katha").style.display = "none";
        document.getElementById("kathaA").removeAttribute("required");
    }

</script>

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
    
@endsection