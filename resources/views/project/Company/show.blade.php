@extends('layouts.app')

@section('content')

<div class="continer">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="cerd-hearde">
                    <h4>
                        View Company data
                        <a href="{{ url('company')}}" class="btn btn-lg btn-outline-danger float-right">Back</a>
                        <hr>
                    </h4>
                </div>
                <div class="cardbody">
                    <label>Company Name</label>
                    <h5>{{ $compani->name }}</h5>

                    <label>E-MAil</label>
                    <h5>{{ $compani->email }}</h5>

                    <label>Web-Site</label>
                    <h5>{{ $compani->website }}</h5>

                    <label>Logo</label>
                    <br>
                    <img src="{{ asset('upload/logo/'.$compani->logo) }}" width="72px" height="50px" alt="no..image">
                </div>

            </div>

        </div>

    </div>
</div>

@endsection