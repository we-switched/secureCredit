@extends('layouts.newapp')

@section('title', 'Personal Loan')

@section('content')


<section class="section section bg-soft pb-5 overflow-hidden z-2">
    <div class="container z-2">
    <br>
    <div class="alert alert-secondary shadow-soft text-center" role="alert"><h4>
        For faster processing you can submit your documents online. (Recommended)<br>
        or You can also send the same via mail at <a href="mailto:documents@securecredit.in">documents@securecredit.in</a><br>
        or submit to our executive at your door step
    </h4></div>
    
    <form method="POST" action="{{url('/personal_loan_second_form')}}" enctype="multipart/form-data" style="color: white">
        @csrf
        
        <div class="form-check">
            <label for="photo" class="custom-file-label">Upload your passport size photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine custom-file-input @error('photo') is-invalid @enderror" id="photo" name="photo" value="{{ old('photo') }}">
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>

        <div class="form-check">
            @if($employmenttype == "Salaried")
                <label for="pdfpayslip_1" class="custom-file-label">Upload your latest 3 months payslip (in pdf)</label>
            @elseif($employmenttype == "Self Employed")
                <label for="pdfpayslip_1"  class="custom-file-label">Upload your last 3 months ITR (in pdf)</label>
            @endif
            <br>
            <br>
            <br>
            <div class="row">
            <input type="file" accept=".pdf" class="col-sm-4 form-control-file custom-mine @error('pdfpayslip_1') is-invalid @enderror" id="pdfpayslip_1" name="pdfpayslip_1" value="{{ old('pdfpayslip_1') }}">
            <input type="file" accept=".pdf" class="col-sm-4 form-control-file custom-mine @error('pdfpayslip_2') is-invalid @enderror" id="pdfpayslip_2" name="pdfpayslip_2" value="{{ old('pdfpayslip_2') }}">
            <input type="file" accept=".pdf" class="col-sm-4 form-control-file custom-mine @error('pdfpayslip_3') is-invalid @enderror" id="pdfpayslip_3" name="pdfpayslip_3" value="{{ old('pdfpayslip_3') }}">
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
        </div><br>
        
        <div class="form-check">
            <label class="custom-file-label" for="photoaadharfront">Upload your Aadhar card's front side photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photoaadharfront') is-invalid @enderror" id="photoaadharfront" name="photoaadharfront" value="{{ old('photoaadharfront') }}">
            @error('photoaadharfront')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        
        <div class="form-check">
            <label class="custom-file-label" for="photoaadharback">Upload your Aadhar card's back side photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photoaadharback') is-invalid @enderror" id="photoaadharback" name="photoaadharback" value="{{ old('photoaadharback') }}">
            @error('photoaadharback')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        
        <div class="form-check">
            <label class="custom-file-label" for="photopan">Upload your PAN card's front side photo</label>
            <input type="file" accept=".png,.jpg,.jpeg" class="form-control-file custom-mine @error('photopan') is-invalid @enderror" id="photopan" name="photopan" value="{{ old('photopan') }}">
            @error('photopan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        
        <div class="form-check">
            <label class="custom-file-label" for="pdfbank">Upload your latest 3 months bank statements till date (in pdf)</label>
            <input type="file" accept=".pdf" class="form-control-file custom-mine @error('pdfbank') is-invalid @enderror" id="pdfbank" name="pdfbank" value="{{ old('pdfbank') }}">
            @error('pdfbank')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
        
        <div class="form-check">
            <label class="custom-file-label" for="rentalagreement">Upload your rental agreement, if any (in pdf)</label>
            <input type="file" accept=".png,.jpg,.jpeg,.pdf" class="form-control-file custom-mine @error('rentalagreement') is-invalid @enderror" id="rentalagreement" name="rentalagreement" value="{{ old('rentalagreement') }}">
            @error('rentalagreement')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>
    
        <div class="form-check">
            <label class="custom-file-label" for="electricitybill">Upload your latest month electricity bill (in pdf)</label>
            <input type="file" accept=".png,.jpg,.jpeg,.pdf" class="form-control-file custom-mine @error('electricitybill') is-invalid @enderror" id="electricitybill" name="electricitybill" value="{{ old('electricitybill') }}">
            @error('electricitybill')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div><br>

        <center><button type="submit" class="btn btn-primary">Submit</button></center>
        
    </form>

</div>
</section>

@endsection