@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-inline-block mt-2">{{ __('index.company.list') }}</h5>
                        <a class="btn btn-primary float-right" href="{{route('companies.create')}}">{{ __('index.company.create') }}</a>
                    </div>
                    <div class="table-responsive">
                        <table id="tbl" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>{{ __('index.name') }}</th>
                                <th>{{ __('index.email') }}</th>
                                <th>{{ __('index.website') }}</th>
                                <th>{{ __('index.logo') }}</th>
                                <th>{{ __('index.actions') }}</th>
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
                                        <img src="{{ asset('storage/' . $company->logo_file_path) }}" width="100px" alt="logo">
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <form method="POST" action="{{route('companies.destroy', $company)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-primary" type="submit">{{ __('index.delete') }}</button>
                                            </form>
                                            <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-secondary ml-2">{{ __('index.edit') }}</a>
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
