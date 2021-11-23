@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>{{ __('index.employee.name') }}</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.email') }}</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.phone') }}</label>
                <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.employee.company') }}</label>
                <select class="form-control" name="company_id" id="">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">{{ __('index.submit') }}</button>
            <a class="btn btn-secondary" href="{{route('employees.index')}}">{{ __('index.cancel') }}</a>
        </form>
    </div>
@endsection
