@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-block mt-2">Company list</h5>
                        <a class="btn btn-primary float-right" href="{{route('companies.create')}}">Add new company</a>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl" class="table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>
                                        <a href="mailto:{{$company->email}}">{{$company->email}}</a>
                                    </td>
                                    <td>
                                        <a href="{{$company->website}}" target="_blank">{{$company->website}}</a>
                                    </td>
                                    <td>
{{--                                        Logo--}}
                                        <img src="{{ asset('storage/' . $company->logo_file_path) }}" width="100px" alt="logo">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="POST" action="{{route('companies.destroy', $company)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-primary" type="submit">Delete</button>
                                            </form>
                                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-secondary ml-2">Edit</a>
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
