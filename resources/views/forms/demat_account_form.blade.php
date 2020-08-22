@extends('layouts.newapp')

@section('title', 'Demat Account')

@section('content')

<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
        <div class="mt-6 mb-5">
            <h1 class="font-weight-light">Apply for <span class="font-weight-bold">Demat Account</span></h1>
        </div>
    <form method="POST" action="{{url('/demat_account_form')}}">
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
                
        <p><b>Employment Status</b></p>
        <select class="custom-select custom-mine" name="employmenttype" required>
            <option value="">Choose ...</option>
            <option value="Salaried" {{ old('employmenttype') == 'Salaried' ? 'selected' : '' }}>Salaried</option>
            <option value="Self Employed Professional" {{ old('employmenttype') == 'Self Employed Professional' ? 'selected' : '' }}>Self Employed Professional</option>
            <option value="Self Employed Business" {{ old('employmenttype') == 'Self Employed Business' ? 'selected' : '' }}>Self Employed Business</option>
        </select><br><br>

        <div class="form-group">
            <label for="netincome">Annual Income</label>
            <input type="number" min="0" class="form-control custom-mine @error('netincome') is-invalid @enderror" id="netincome" placeholder="Enter your annual income" name="netincome" value="{{ old('netincome') }}" required>
            @error('netincome')
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

        <br>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="proceed" name="proceed" required>
            <label for="proceed" class="form-check-label"><small>By submitting, you agree to the <a href="{{ url('/info#privacy_policy') }}" target="blank"><b>Terms and Conditions</b></a> of Secure Credit & its representatives to contact you.</small></label>
        </div>
        
        <center><button type="submit" class="btn btn-primary">Submit</button></center>

    </form>

    <hr style="background-color:white;">

    <div class="jumbotron text-center">
        Kindly, please fill the above mentioned form. Our advisor will contact you soon to schedule your free advisory Session.
    </div>
    
</section>

@endsection