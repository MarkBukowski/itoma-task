@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('companies.update', $company) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" name="name" value="{{$company->name}}">
            </div>
            <div class="form-group">
                <label>Company email</label>
                <input type="email" class="form-control" name="email" value="{{$company->email}}">
            </div>
            <div class="form-group">
                <label>Company website</label>
                <input type="text" class="form-control" name="website" value="{{$company->website}}">
            </div>
            <div class="form-group">
                <label>Company logo</label>
                <input class="form-control-file form-control" type="file" name="file" value="{{$company->logo_file_path}}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{route('companies.index')}}">Cancel</a>
        </form>
    </div>
@endsection
