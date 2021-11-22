@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label>Company email</label>
                <input type="email" class="form-control" name="email" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label>Company website</label>
                <input type="text" class="form-control" name="website" value="{{old('website')}}">
            </div>
            <div class="form-group">
                <label>Company logo</label>
                <input class="form-control-file form-control" type="file" name="file" value="{{old('file')}}">
            </div>
            <button class="btn btn-primary" type="submit">Submit</button>
            <a class="btn btn-secondary" href="{{route('companies.index')}}">Cancel</a>
        </form>
    </div>
@endsection
