@extends('layouts.app')

@section('title', 'Manage Telecallers')

@section('content')


<h3 class="text-center" style="color: white">Telecallers</h3>

<div class="container">
    @if ($telecallers->count() > 0)
    <table class="table table-bordered table-dark" style="margin: 30px;">
        <thead>
            <tr>
                <th scope="col" style="width: 4em">Action</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone No.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($telecallers as $telecaller)
                <tr>
                    <td>
                        <a href="{{url('/telecallers/'.$telecaller->id)}}"><i class="fa fa-pencil-square-o float-left" style="color: whitesmoke; size: 10px; margin-top:2px;" aria-hidden="true"></i></a>
                        <form method="POST" action="{{url('/telecallers/'.$telecaller->id)}}"> @method('DELETE') @csrf <button type="submit" style="background:none; margin-left:2px;"><i class="fa fa-trash float-right" style="color: whitesmoke; size:10px;" aria-hidden="true"></i></button></form>
                    </td>
                    <td>{{$telecaller->name}}</td>
                    <td>{{$telecaller->email}}</td>
                    <td>{{$telecaller->phone}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h3 class="text-center" style="color: white">No Telecallers added!</h3>
    @endif
</div>

<div>
    @error('firstname')
        <div class="error">{{ $error }}</div>
    @enderror
</div>

<div class="container" style="margin-top: 3em">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border border-dark" style="background-color: rgba(0,0,0,0.1)">
                <div class="card-header border border-dark" style="color: whitesmoke">{{ __('Add a Telecaller') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/telecallers')}}" style="color: whitesmoke">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No.') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection