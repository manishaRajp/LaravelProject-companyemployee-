@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee_Register') }}</div>
                <div class="card-body">
                    <h4> <a href="{{ url('company')}}" class="btn btn-outline-dark">Go to table</a></h4>
                    <form method="POST" action="{{ url('employee') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="value_id" class="col-md-4 col-form-label text-md-right">{{ __('company_id') }}</label>
                            <div class="col-md-6">
                                <select class="form-control @error('value_id') is-invalid @enderror" id=" value" name="value_id">
                                    <p style="font-size:15px; font-family:courier;" class="text-danger">@error('value_id') {{ $message }} @enderror</p>
                                    <option value="">please select</option>
                                    @foreach($value as $values)
                                    <option value="{{$values->id}}">{{$values->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" name="first_name" autocomplete="first_name">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('first_name') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" name="last_name" autocomplete="last_name">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('last_name') {{ $message }} @enderror</p>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adress') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" autocomplete="email">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('email') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" autocomplete="contact">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('contact') {{ $message }} @enderror</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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