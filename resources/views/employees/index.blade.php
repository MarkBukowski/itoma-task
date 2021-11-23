@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-block mt-2">{{ __('index.employee.list') }}</h5>
                        <a class="btn btn-primary float-right" href="{{route('employees.create')}}">{{ __('index.employee.create') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl" class="table">
                            <thead>
                            <tr>
                                <th>{{ __('index.name') }}</th>
                                <th>{{ __('index.email') }}</th>
                                <th>{{ __('index.phone') }}</th>
                                <th>{{ __('index.company') }}</th>
                                <th>{{ __('index.actions') }}</th>
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
                                                <button class="btn btn-sm btn-primary" type="submit">{{ __('index.delete') }}</button>
                                            </form>
                                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-secondary ml-2">{{ __('index.edit') }}</a>
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
