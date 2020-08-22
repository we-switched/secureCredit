@extends('layouts.app')

@section('title', 'Insurance')

@section('content')

<div class="container" style="margin-top: 20px">
    <form method="POST" action="{{ url('/insurance_form/'.$loan->id) }}" style="color: whitesmoke">
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
            <label>Type of Insurance</label>
            <select class="custom-select custom-mine" name="type" id="type" required>
                <option value="">Choose ...</option>
                <option value="Health Insurance" {{ old('type', $loan->type) == "Health Insurance" ? 'selected' : '' }}>Health Insurance</option>
                <option value="Life Insurance" {{ old('type', $loan->type) == "Life Insurance" ? 'selected' : '' }}>Life Insurance</option>
                <option value="Car Insurance" {{ old('type', $loan->type) == "Car Insurance" ? 'selected' : '' }}>Car Insurance</option>
                <option value="Two-Wheeler Insurance" {{ old('type', $loan->type) == "Two-Wheeler Insurance" ? 'selected' : '' }}>Two-Wheeler Insurance</option>
                <option value="Travel Insurance" {{ old('type', $loan->type) == "Travel Insurance" ? 'selected' : '' }}>Travel Insurance</option>
                <option value="Commercial Insurance" {{ old('type', $loan->type) == "Commercial Insurance" ? 'selected' : '' }}>Commercial Insurance</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Employment Status</label>
            <select class="custom-select custom-mine" name="employmenttype" required>
                <option value="">Choose ...</option>
                <option value="Salaried" {{ old('employmenttype', $loan->employmenttype) == "Salaried" ? 'selected' : '' }}>Salaried</option>
                <option value="Self Employed Professional" {{ old('employmenttype', $loan->employmenttype) == "Self Employed Professional" ? 'selected' : '' }}>Self Employed Professional</option>
                <option value="Self Employed Business" {{ old('employmenttype', $loan->employmenttype) == "Self Employed Business" ? 'selected' : '' }}>Self Employed Business</option>
            </select>
        </div>

        <div class="form-group">
            <label for="netincome">Annual Income</label>
            <input type="number" min="0" class="form-control custom-mine @error('netincome') is-invalid @enderror" id="netincome" placeholder="Enter your annual income" name="netincome" value="{{ old('netincome', $loan->netincome) }}" required>
            @error('netincome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        
        <center><button type="submit" class="btn btn-primary">Submit</button></center>

    </form>
</div>

@endsection