@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>{{ __('index.company.name') }}</label>
                <input type="text" class="form-control" name="name" value="{{$company->name}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.company.email') }}</label>
                <input type="email" class="form-control" name="email" value="{{$company->email}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.company.website') }}</label>
                <input type="text" class="form-control" name="website" value="{{$company->website}}">
            </div>
            <div class="form-group">
                <label>{{ __('index.company.logo') }}</label>
                <input class="form-control-file form-control" type="file" name="file" value="{{$company->logo_file_path}}">
            </div>
            <button class="btn btn-primary" type="submit">{{ __('index.submit') }}</button>
            <a class="btn btn-secondary" href="{{route('companies.index')}}">{{ __('index.cancel') }}</a>
        </form>
    </div>
@endsection
