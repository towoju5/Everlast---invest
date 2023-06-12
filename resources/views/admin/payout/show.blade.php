@extends('adminlte::page')

@section('title', 'Deposit Details')

@section('content_header')
    <h1>{{ __('Deposit Details') }}</h1>
@stop
@php($item = $withdrawal)
@section('content')
    <div class="container">
        @include('error')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table">
                                <tbody>
                                    {!! show_table($item) !!}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
