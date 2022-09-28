@extends('layouts.admin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-capitalize">{{ __('Users') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item active text-capitalize">{{ __('Create') }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @livewire('admin.users.create')
    </div>
</section>
@endsection

@prepend('styles')
{{-- <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2/css/select2.min.css"> --}}
{{-- <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> --}}
<link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
@endprepend

@prepend('scripts')
{{-- <script src="https://adminlte.io/themes/v3/plugins/select2/js/select2.full.min.js"></script> --}}
<script src="https://adminlte.io/themes/v3/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
@endprepend
