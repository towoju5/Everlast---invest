@extends('adminlte::page')

@section('title', 'Deposit Details')

@section('content_header')
    <h1>{{ __('Deposit Details') }}</h1>
@stop
@php($item = $deposit)
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
                                    <tr>
                                        <th>Currency</th>
                                        <td>{{ $deposit->currency }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>{{ $item->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Customer Email</th>
                                        <td>{{ $item->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-primary">Successful</span>
                                            @elseif($item->status == 0)
                                                <span class="badge badge-secondary">Pending</span>
                                            @elseif($item->status == 3)
                                                <span class="badge badge-danger">Failed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Evidence of payment</th>
                                        <td>
                                            @if (empty($item->proof_of_pay))
                                                Evidence not yet uploaded
                                            @else
                                                <a href="{{ $item->proof_of_pay }}" target="_blank">
                                                    <img src="{{ $item->proof_of_pay }}" max-width="300px" max-height="300px"
                                                        alt="proof of payment">
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Date Created</th>
                                        <td>{{ showDateTime($item->created_at) }}</td>
                                    </tr>
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
