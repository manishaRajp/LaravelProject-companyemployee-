@extends('layouts.app')

@section('content')

<div class="continer">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="cerd-hearde">
                    <h4>
                        View Employee data
                        <a href="{{ url('employee')}}" class="btn btn-lg btn-outline-danger float-right">Back</a>
                        <hr>
                    </h4>
                </div>
                <div class="cardbody">

                    <label>Employees Company</label>
                    <h5>{{$employee->ShowCompany->name}}</h5>


                    <label>Employees Name</label>
                    <h5>{{ $employee->first_name }}</h5>

                    <label>Employees Name</label>
                    <h5>{{ $employee->last_name }}</h5>

                    <label>Employees Email</label>
                    <h5>{{ $employee->email }}</h5>

                    <label>Employees Contact</label>
                    <h5>{{ $employee->contact  }}</h5>

                </div>

            </div>

        </div>

    </div>
</div>

@endsection