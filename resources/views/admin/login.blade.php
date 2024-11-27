@extends('adminlte::auth.login')
{{-- Setup Custom Preloader Content --}}

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop

{{-- Setup Custom Footer Content --}}

@section('footer')
    <div class="row">
        <div class="col-md-6">
            <p class="text-sm">
                <strong>Version</strong> 1.0.0
            </p>
        </div>
        <div class="col-md-6 text-right">
            <p class="text-sm">
                <strong>Developed by</strong> <a href="www.icaromoura.com" target="_blank">Ícaro Moura</a>
            </p>
        </div>
    </div>
@stop
