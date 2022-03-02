@extends('layouts.app')

@section('content')
<div class="container">
    @include('project.flash-message')
    <table class="table table-striped table-bordered table-hover">
        <a href="{{ url('company/create')}}" class="btn btn-outline-dark"> Add Company </a>
        <a href="{{ url('employee/create')}}" class="btn btn-outline-dark"> Add Employee </a>
        <a href="{{ url('company')}}" class="btn btn-lg btn-outline-success float-right">Company List</a>
        <br><br>
        <thead class="thead-dark">
            <h1>Employee Details</h1>
            <tr>
                <th></th>
                <th>Company</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>E-mail</th>
                <th>Contact</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        @foreach($value as $val)
        <tr>
            <th scope="col">
                <label class="control control--checkbox">
                    <input type="checkbox" class="js-check-all" />
                    <div class="control__indicator"></div>
                </label>
            </th>
            <td>{{$val->ShowCompany->name}}</td>
            <td>{{$val['first_name']}}</td>
            <td>{{$val['last_name']}}</td>
            <td>{{$val['email']}}</td>
            <td>{{$val['contact']}}</td>
            <td>
                <a href="{{ url('employee/'.$val['id'])}}" class="btn btn-sm btn btn-outline-info">Show</a>
            </td>
            <td>
                <a href="{{ url('employee/'.$val['id'].'/edit ')}}" class="btn btn-sm btn btn-outline-primary">Edit</a>
            </td>
            <td>
                <form action="{{ url('employee/'.$val['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn btn-outline-danger">Delete</button>
                </form>
            </td>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="">
        {!! $value->links() !!}
    </div>
    @endsection
</div>