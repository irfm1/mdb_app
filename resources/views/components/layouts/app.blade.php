{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <title>{{ $title ?? 'Meu Projeto' }}</title>--}}
{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
{{--    @livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--{{ $slot }}--}}
{{--@livewireScripts--}}
{{--</body>--}}
{{--</html>--}}
@extends('adminlte::page')
{{-- Setup Custom Preloader Content --}}

@section('preloader')
    <i class="fas fa-4x fa-spin fa-spinner text-secondary"></i>
    <h4 class="mt-4 text-dark">Loading</h4>
@stop

@section('content')
{{--    give a top margin of 5--}}
    <div class="mt-5">
        {{ $slot }}
    </div>
@stop

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
