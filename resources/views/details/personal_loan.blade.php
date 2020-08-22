@extends('layouts.app')

@section('title', 'Secure Credit')

@section('content')

<h3 class="text-center" style="color: white">Personal Loan Applicants <a href="{{url('/personal_loan_export')}}" style="text-decoration: none; color: whitesmoke"><i class="fa fa-download" aria-hidden="true"></i></a></h3>

<div class="container">
    @if ($applicants->count() > 0)
    <div class="table-responsive">
    <table class="table table-bordered table-dark" style="margin: 30px;">
        <thead>
            <tr>
                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Telecaller")
                <th scope="col">Action</th>
                @endif
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No.</th>
                <th scope="col">Profile Photo</th>
                <th scope="col">Top-Up</th>
                <th scope="col">Moratorium availed</th>
                <th scope="col">Agent</th>
                <th scope="col">Telecaller</th>
                <th scope="col">Status</th>
                <th scope="col">City</th>
                <th scope="col">Aadhar No.</th>
                <th scope="col">Aadhar Card (front)</th>
                <th scope="col">Aadhar Card (back)</th>
                <th scope="col">PAN Card No.</th>
                <th scope="col">PAN Card</th>
                <th scope="col">Residence Type</th>
                <th scope="col">Present Address</th>
                <th scope="col">Permanent Address</th>
                <th scope="col">Office Address</th>
                <th scope="col">Years in current city</th>
                <th scope="col">Years in Present Address</th>
                <th scope="col">Rent (if any)</th>
                <th scope="col">Qualification</th>
                <th scope="col">University</th>
                <th scope="col">Year of Passing</th>
                <th scope="col">Marital Status</th>
                <th scope="col">Existing Loans</th>
                <th scope="col">EMI</th>
                <th scope="col">Reference #1</th>
                <th scope="col">Reference #2</th>
                <th scope="col">Type of Employment</th>
                <th scope="col">Profit</th>
                <th scope="col">Turnover</th>
                <th scope="col">Mode of Salary</th>
                <th scope="col">Net salary</th>
                <th scope="col">Company</th>
                <th scope="col">Office Email Address</th>
                <th scope="col">Designation</th>
                <th scope="col">Department</th>
                <th scope="col">No. of years in Company</th>
                <th scope="col">Work Experience</th>
                <th scope="col">Payslip No. 1</th>
                <th scope="col">Payslip No. 2</th>
                <th scope="col">Payslip No. 3</th>
                <th scope="col">Mother's Name</th>
                <th scope="col">Loan Amount required</th>
                <th scope="col">Tenure</th>
                <th scope="col">DOB</th>
                <th scope="col">Bank Statement</th>
                <th scope="col">Rental Agreement</th>
                <th scope="col">Electricity Bill</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $person)
            <tr>
                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Telecaller")
                <td>
                    <a href="{{url('/personal_loan_form/'.$person->id)}}"><i class="fa fa-pencil-square-o float-left" style="color: whitesmoke; size: 10px; margin-top:2px;" aria-hidden="true"></i></a>
                    <form method="POST" action="{{ url('/personal_loan/'.$person->id) }}"> @method('DELETE') @csrf <button type="submit" style="background:none; margin-left:2px;"><i class="fa fa-trash float-right" style="color: whitesmoke; size:10px;" aria-hidden="true"></i></button></form>
                </td>
                @endif
                <td>{{$person->name}}</td>
                <td><a href="mailto:{{$person->email}}">{{$person->email}}</a></td>
                <td>{{$person->phone}}</td>
                <td><a href="/storage/photos/{{$person->photo}}" target="_blank"><img src="/storage/photos/{{$person->photo}}"></a></td>
                <td>{{$person->topup}}</td>
                <td>{{$person->moratorium}}</td>
                <td>{{$person->agent}}</td>
                <td>{{$person->telecaller}}</td>
                <td>{{$person->status}}</td>
                <td>{{$person->city}}</td>
                <td>{{$person->aadhar}}</td>
                <td><a href="/storage/photos/{{$person->photoaadharfront}}" target="_blank"><img src="/storage/photos/{{$person->photoaadharfront}}"></a></td>
                <td><a href="/storage/photos/{{$person->photoaadharback}}" target="_blank"><img src="/storage/photos/{{$person->photoaadharback}}"></a></td>
                <td>{{$person->pan}}</td>
                <td><a href="/storage/photos/{{$person->photopan}}" target="_blank"><img src="/storage/photos/{{$person->photopan}}"></a></td>
                <td>{{$person->residence}}</td>
                <td>{{$person->presentaddress}}</td>
                <td>{{$person->permanentaddress}}</td>
                <td>{{$person->officeaddress}}</td>
                <td>{{$person->yearsincity}}</td>
                <td>{{$person->yearsinpresentaddress}}</td>
                <td>{{$person->rent}}</td>
                <td>{{$person->qualification}}</td>
                <td>{{$person->uniname}}</td>
                <td>{{$person->yearofpassing}}</td>
                <td>{{$person->maritalstatus}}</td>
                <td>{{$person->existingloans}}</td>
                <td>{{$person->emi}}</td>
                <td>{{$person->reference1}}</td>
                <td>{{$person->reference2}}</td>
                <td>{{$person->employmenttype}}</td>
                <td>{{$person->profit}}</td>
                <td>{{$person->turnover}}</td>
                <td>{{$person->modeofsalary}}</td>
                <td>{{$person->netsalary}}</td>
                <td>{{$person->company}}</td>
                <td>{{$person->officeemail}}</td>
                <td>{{$person->designation}}</td>
                <td>{{$person->department}}</td>
                <td>{{$person->yearsincompany}}</td>
                <td>{{$person->workexperience}}</td>
                <td>
                    <a href="/storage/docs/{{$person->pdfpayslip_1}}" target="_blank" class="btn btn-outline-primary btn-xs">Show</a>
                </td>
                <td>
                    <a href="/storage/docs/{{$person->pdfpayslip_2}}" target="_blank" class="btn btn-outline-primary btn-xs">Show</a>
                </td>
                <td>
                    <a href="/storage/docs/{{$person->pdfpayslip_3}}" target="_blank" class="btn btn-outline-primary btn-xs">Show</a>
                </td>
                <td>{{$person->mothersname}}</td>
                <td>{{$person->loanamount}}</td>
                <td>{{$person->tenure}}</td>
                <td>{{$person->dob}}</td>
                <td>
                    <a href="/storage/docs/{{$person->pdfbank}}" target="_blank" class="btn btn-outline-primary">Show</a>
                </td>
                <td>
                    <a href="/storage/docs/{{$person->rentalagreement}}" target="_blank" class="btn btn-outline-primary">Show</a>
                </td>
                <td>
                    <a href="/storage/docs/{{$person->electricitybill}}" target="_blank" class="btn btn-outline-primary">Show</a>
                </td>
            @endforeach
        </tbody>
    </table>
    </div>
    @else
        <h3 class="text-center" style="color: white">No Applications yet!</h3>
    @endif
</div>

@endsection