@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit  Employee data') }}</div>
                <div class="card-body">
                    <h4> <a href="{{ url('company')}}" class="btn btn-outline-dark">Go To table</a></h4>
                    <form method="POST" action="{{ url('employee/'.$employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $employee->id }}" id=" id">
                        <div class="form-group row">
                            <label for="company_id" class="col-md-4 col-form-label text-md-right">{{ __('company_id') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="value_id">
                                    @foreach($value as $values)
                                    <option value="{{$values->id}}">{{$values->name}}
                                    <option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class=" form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('first_name') {{ 'please enter name' }} @enderror</p>
                            </div>
                        </div>

                        <div class=" form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $employee->last_name }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('last_name') {{ 'please enter name' }} @enderror</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $employee->email }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('email') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('contact') }}</label>
                            <div class="col-md-6">
                                <input id="contact" type="number" class="form-control" name="contact" value="{{ $employee->contact }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('contact') {{ 'please enter WebSite' }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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