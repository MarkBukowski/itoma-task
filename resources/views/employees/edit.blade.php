@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('employees.update', $employee) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>{{ __('index.employee.name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ $employee->name }}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.email') }}</label>
                <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.phone') }}</label>
                <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.company') }}</label>
                <select class="form-control" name="company_id" id="">
                    <option value="{{ $employee->employeeCompany->id }}">{{ $employee->employeeCompany->name }}</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->employeeCompany->id }}">{{ $company->employeeCompany->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">{{ __('index.submit') }}</button>
            <a class="btn btn-secondary" href="{{route('employees.index')}}">{{ __('index.cancel') }}</a>
        </form>
    </div>
@endsection
