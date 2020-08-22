@extends('layouts.app')

@section('title', 'Business Loan')

@section('content')

<div class="container" style="margin-top: 20px">
    <form method="POST" action="{{ url('/business_loan_form/'.$loan->id) }}" style="color: whitesmoke">
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
                <option value="Not Called" {{ $loan->status == "Not Called" ? 'selected' : '' }}>Not Called</option>
                <option value="Not Doable" {{ $loan->status == "Not Doable" ? 'selected' : '' }}>Not Doable</option>
                <option value="Not Eligible" {{ $loan->status == "Not Eligible" ? 'selected' : '' }}>Not Eligible</option>
                <option value="Not Reachable" {{ $loan->status == "Not Reachable" ? 'selected' : '' }}>Not Reachable</option>
                <option value="Not Interested" {{ $loan->status == "Not Interested" ? 'selected' : '' }}>Not Interested</option>
                <option value="Wrong no." {{ $loan->status == "Wrong no." ? 'selected' : '' }}>Wrong no.</option>
                <option value="Ringing" {{ $loan->status == "Ringing" ? 'selected' : '' }}>Ringing</option>
                <option value="Follow Up" {{ $loan->status == "Follow Up" ? 'selected' : '' }}>Follow Up</option>
                <option value="Meeting" {{ $loan->status == "Meeting" ? 'selected' : '' }}>Meeting</option>
                <option value="DOC Pickup" {{ $loan->status == "DOC Pickup" ? 'selected' : '' }}>DOC Pickup</option>
                <option value="Login" {{ $loan->status == "Login" ? 'selected' : '' }}>Login</option>
                <option value="Rejected" {{ $loan->status == "Rejected" ? 'selected' : '' }}>Rejected</option>
                <option value="Sanctioned" {{ $loan->status == "Sanctioned" ? 'selected' : '' }}>Sanctioned</option>
                <option value="Disbursed" {{ $loan->status == "Disbursed" ? 'selected' : '' }}>Disbursed</option>
                <option value="Repeated Lead" {{ $loan->status == "Repeated Lead" ? 'selected' : '' }}>Repeated Lead</option>
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
            <label for="officeaddress">Office Address</label>
            <textarea class="form-control custom-mine @error('officeaddress') is-invalid @enderror" id="officeaddress" placeholder="Enter your office address" name="officeaddress" value="{{ old('officeaddress') }}" required>{{Request::old('officeaddress', $loan->officeaddress)}}</textarea>
            @error('officeaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearsinbusiness">No. of years in business</label>
            <input type="number" min="0" class="form-control custom-mine @error('yearsinbusiness') is-invalid @enderror" id="yearsinbusiness" placeholder="Enter no. of years in business" name="yearsinbusiness" value="{{ old('yearsinbusiness', $loan->yearsinbusiness) }}" required>
            @error('yearsinbusiness')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearsinblr">No. of years in Bengaluru</label>
            <input type="number" min="0" class="form-control custom-mine @error('yearsinblr') is-invalid @enderror" id="yearsinblr" placeholder="Enter no. of years in Bengaluru" name="yearsinblr" value="{{ old('yearsinblr', $loan->yearsinblr) }}" required>
            @error('yearsinblr')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="yearsinpresentaddress">No. of years in present address</label>
            <input type="number" min="0" class="form-control custom-mine @error('yearsinpresentaddress') is-invalid @enderror" id="yearsinpresentaddress" placeholder="Enter no. of years in present address" name="yearsinpresentaddress" value="{{ old('yearsinpresentaddress', $loan->yearsinpresentaddress) }}" required>
            @error('yearsinpresentaddress')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>

        <div class="form-group">
            <label>Type of residence</label>
            <div class="form-check" required>
                <input class="form-check-input" type="radio" name="residence" id="rented" value="Rented" {{ old('residence', $loan->residence == "Rented") ? 'checked' : '' }}>
                <label class="form-check-label" for="rented">Rented</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="residence" id="owned" value="Owned" {{ old('residence', $loan->residence == "Owned") ? 'Owned' : '' }}>
                <label class="form-check-label" for="owned">Owned</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="residence" id="parentsowned" value="Parents Owned" {{ old('residence', $loan->residence) == "Parents Owned" ? 'Parents Owned' : '' }}>
                <label class="form-check-label" for="parentsowned">Parents Owned</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="residence" id="other" value="Other" {{ old('residence', $loan->residence == "Other") ? 'checked' : '' }}>
                <label class="form-check-label" for="other">Other</label>
            </div>
        </div>

        <div class="form-group">
            <label>Any existing loans</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="existingloans" id="existingloansyes" value="Yes" {{ old('existingloans', $loan->existingloans) == "Yes" ? 'checked' : '' }}>
                <label class="form-check-label" for="existingloansyes">Yes</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="existingloans" id="existingloansno" value="No" {{ old('existingloans', $loan->existingloans) == "No" ? 'checked' : '' }}>
                <label class="form-check-label" for="existingloansno">No</label>
            </div>
        </div>

        <div class="form-group">
            <label for="turnover">Last year's turnover as per ITR</label>
            <input type="number" min="0" class="form-control custom-mine @error('turnover') is-invalid @enderror" id="turnover" placeholder="Enter last year's turnover as per ITR" name="turnover" value="{{ old('turnover', $loan->turnover) }}" required>
            @error('turnover')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="profit">Last year's net profit as per ITR</label>
            <input type="number" min="0" class="form-control custom-mine @error('profit') is-invalid @enderror" id="profit" placeholder="Enter last year's net profit as per ITR" name="profit" value="{{ old('profit', $loan->profit) }}" required>
            @error('profit')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>

        <div class="form-group">
            <label>Marital Status</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="maritalstatus" id="married" value="Married" {{ old('maritalstatus', $loan->maritalstatus) == "Married" ? 'checked' : '' }}>
                <label class="form-check-label" for="married">Married</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="maritalstatus" id="single" value="Single" {{ old('maritalstatus', $loan->maritalstatus) == "Single" ? 'checked' : '' }}>
                <label class="form-check-label" for="single">Single</label>
            </div>
        </div>

        <div class="form-group">
            <label>Type of Company</label>
                <select class="custom-select custom-mine" name="company" required>
                <option value="">Choose ...</option>
                <option value="Private Ltd." {{ old('company', $loan->company) == "Private Ltd." ? 'selected' : '' }}>Private Ltd.</option>
                <option value="Proprietorship" {{ old('company', $loan->company) == "Proprietorship" ? 'selected' : '' }}>Proprietorship</option>
                <option value="Partnership" {{ old('company', $loan->company) == "Partnership" ? 'selected' : '' }}>Partnership</option>
                <option value="LLC" {{ old('company', $loan->company) == "LLC" ? 'selected' : '' }}>LLC</option>
                <option value="LLP" {{ old('company', $loan->company) == "LLP" ? 'selected' : '' }}>LLP</option>
            </select>
        </div>

        <center><button type="submit" class="btn btn-primary">Submit</button></center>

    </form>
</div>

@endsection