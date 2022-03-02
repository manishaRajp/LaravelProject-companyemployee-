@extends('layouts.app')

@section('content')
<!-- <table class="table custom-table-dark"> -->
<!-- <table class="table table-dark"> -->
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <a href="{{ url('company/create')}}" class="btn btn-outline-dark"> Add Company</a>
        <a href="{{ url('employee/create')}}" class="btn btn-outline-dark"> Add Employee</a>
        <a href="{{ url('employee')}}" class="btn btn-lg btn-outline-success float-right">Employee list</a>
        <br><br>
        <h1>Company Details</h1>

        @include('project.flash-message')

        {!! $dataTable->table()!!}

        @push('js')
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        {!! $dataTable->scripts() !!}
        @endpush
        @endsection
</div>