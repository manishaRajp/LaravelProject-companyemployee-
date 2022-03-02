@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit data') }}</div>
                <div class="card-body">
                    <h4> <a href="{{ url('company')}}" class="btn btn-outline-dark">Go To table</a></h4>
                    <form method="POST" action="{{ url('company/'.$compani->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $compani->id }}" id=" id">
                        <div class=" form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $compani->name }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('name') {{ 'please enter name' }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $compani->email }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('email') {{ $message }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Web-site" class="col-md-4 col-form-label text-md-right">{{ __('Web-site') }}</label>

                            <div class="col-md-6">
                                <input id="Web-site" type="text" class="form-control" name="website" value="{{ $compani->website }}">
                                <p style="font-size:15px; font-family:courier;" class="text-danger">@error('website') {{ 'please enter WebSite' }} @enderror</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-6">
                                <input id="logo" type="File" class="form-control" name="logo" value="">
                                <img src=" {{ asset('upload/logo/'.$compani->logo) }}" width="72px" height="50px" alt="no..image">
                                <p style="font-size:15px; font-family:courier;" class=" text-danger">@error('logo') {{ 'select image/logo please' }} @enderror</p>
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