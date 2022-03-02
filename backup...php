@extends('layouts.app')

@section('content')
<!-- <table class="table custom-table-dark"> -->
<!-- <table class="table table-dark"> -->
<div class="container">

    @include('project.flash-message')
    <table class="table table-striped table-bordered table-hover">
        <a href="{{ url('company/create')}}" class="btn btn-outline-dark"> Add Company</a>
        <a href="{{ url('employee/create')}}" class="btn btn-outline-dark"> Add Employee</a>
        <a href="{{ url('employee')}}" class="btn btn-lg btn-outline-success float-right">Employee list</a>
        <br><br>
        <h1>Company Details</h1>
        <thead class="thead-dark">
            <tr>
                <th></th>
                <th> id </th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Website</th>
                <th>Logo</th>
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
            <td>{{$val['id']}}</td>
            <td>{{$val['name']}}</td>
            <td>{{$val['email']}}</td>
            <td><a href="{{$val['website']}}">{{$val['website']}}</a></td>

            <td>
                <img src="{{ asset('upload/logo/'.$val['logo']) }}" width="72px" height="50px" alt="no..image">
            </td>
            <td>
                <a href="{{ url('company/'.$val['id'])}}" class="btn btn-sm btn btn-outline-info">Show</a>
            </td>
            <td>
                <a href="{{ url('company/'.$val['id'].'/edit ')}}" class="btn btn-sm btn btn-outline-primary">Edit</a>
            </td>
            <td>
                <form action="{{ url('company/'.$val['id'])}}" method="POST">
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



@extends('layouts.app')

@section('content')

<div class="container">

    @include('project.flash-message')
    {!! $dataTable->table()!!}
    @endsection


    @push('js')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    {!! $dataTable->scripts() !!}
    @endpush

</div>