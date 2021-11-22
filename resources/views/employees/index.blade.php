@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-block mt-2">Employee list</h5>
                        <a class="btn btn-primary float-right" href="{{route('employees.create')}}">Add new employee</a>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>
                                        <a href="mailto:{{$employee->email}}">{{$employee->email}}</a>
                                    </td>
                                    <td>+{{$employee->phone}}</td>
                                    <td>{{ $employee->employeeCompany->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="POST" action="{{route('employees.destroy', $employee)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-primary" type="submit">Delete</button>
                                            </form>
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-secondary ml-2">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
