@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Company_Register') }}</div>
                <div class="card-body">
                    <h4> <a href="{{ url('company')}}" class="btn btn-outline-dark">Go to table</a></h4>
                    <form method="POST" action="{{ url('company') }}" enctype="multipart/form-data">
                        @csrf
                        
                      
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Enter Company Name" autocomplete=" name">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('name') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Enter Company Email" autocomplete="email">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('email') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('WebSite') }}</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" value="{{ old('website') }}" name="website" placeholder="Enter Company website" autocomplete="website">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('website') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-6">
                                <input id="logo" type="File" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" name="logo">
                                <p style="font-size:15px; font-family:courier;" class=" text-danger">@error('logo') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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