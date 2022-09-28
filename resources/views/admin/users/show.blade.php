@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Users') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Users') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Test</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th width="25%">{{ __('Id') }}</th>
                                        <td width="75%">{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Name') }}</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Email') }}</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ __('Roles') }}</th>
                                        <td>
                                            @foreach($user->roles as $key => $role)
                                                <span class="badge badge-warning">{{ $role->title }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @can('user_edit')
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-2">
                            {{ __('Edit') }}
                        </a>
                    @endcan
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
