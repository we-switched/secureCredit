@extends('layouts.app')

@section('title', 'Secure Credit')

@section('content')

<h3 class="text-center" style="color: white">Loan against Property Applicants <a href="{{url('/loan_against_property_export')}}" style="text-decoration: none; color: whitesmoke"><i class="fa fa-download" aria-hidden="true"></i></a></h3>

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
                    <th scope="col">Top-Up</th>
                    <th scope="col">Moratorium availed</th>
                    <th scope="col">Agent</th>
                    <th scope="col">Telecaller</th>
                    <th scope="col">Status</th>
                    <th scope="col">City</th>
                    <th scope="col">Employment Type</th>
                    <th scope="col">Mode of Salary</th>
                    <th scope="col">Net Salary</th>
                    <th scope="col">Net Profit</th>
                    <th scope="col">Turnover</th>
                    <th scope="col">Loan Amount</th>
                    <th scope="col">Market Value</th>
                    <th scope="col">Government Value</th>
                    <th scope="col">Katha</th>
                    <th scope="col">Type of Property</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $person)
                    <tr>
                        @if (auth()->user()->role == "Admin" || auth()->user()->role == "Telecaller")
                        <td>
                            <a href="{{url('/loan_against_property_form/'.$person->id)}}"><i class="fa fa-pencil-square-o float-left" style="color: whitesmoke; size: 10px; margin-top:2px;" aria-hidden="true"></i></a>
                            <form method="POST" action="{{ url('/loan_against_property/'.$person->id) }}"> @method('DELETE') @csrf <button type="submit" style="background:none; margin-left:2px;"><i class="fa fa-trash float-right" style="color: whitesmoke; size:10px;" aria-hidden="true"></i></button></form>
                        </td>
                        @endif
                        <td>{{$person->name}}</td>
                        <td><a href="mailto:{{$person->email}}">{{$person->email}}</a></td>
                        <td>{{$person->phone}}</td>
                        <td>{{$person->topup}}</td>
                        <td>{{$person->moratorium}}</td>
                        <td>{{$person->agent}}</td>
                        <td>{{$person->telecaller}}</td>
                        <td>{{$person->status}}</td>
                        <td>{{$person->city}}</td>
                        <td>{{$person->employmenttype}}</td>
                        <td>{{$person->modeofsalary}}</td>
                        <td>{{$person->netsalary}}</td>
                        <td>{{$person->profit}}</td>
                        <td>{{$person->turnover}}</td>
                        <td>{{$person->loanamount}}</td>
                        <td>{{$person->marketvalue}}</td>
                        <td>{{$person->governmentvalue}}</td>
                        <td>{{$person->katha}}</td>
                        <td>{{$person->typeofproperty}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h3 class="text-center" style="color: white">No Applications yet!</h3>
    @endif
</div>

@endsection