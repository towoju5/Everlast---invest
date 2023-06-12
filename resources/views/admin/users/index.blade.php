@extends('adminlte::page')

@section('title', 'Deposit Details')

@section('content_header')
    <h1>{{ __('Deposit Details') }}</h1>
@stop

@section('content')
    <div class="container">
        @include('error')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Customer</th>
                                        <th>Email</th>
                                        <th>Balance wallet</th>
                                        <th>Profit wallet</th>
                                        <th>Bonus wallet</th>
                                        <th>Date Joined</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $k => $item)
                                        <tr onclick="window.location.href='{{route('admin.user.show', $item->id)}}'" title="show User details" style="cursor: pointer">
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ format_price($item->balance) }}</td>
                                            <td>{{ format_price($item->profit) }}</td>
                                            <td>{{ format_price($item->bonus) }}</td>
                                            <td>
                                                {{ showDateTime($item->created_at) }}
                                            </td>
                                            <td>
                                                @if ($item->deleted_at == null)
                                                    <a href="{{ route('admin.user.ban', [$item->id, 'ban']) }}">
                                                        <button class="btn btn-sm btn-danger">Ban</button>
                                                    </a>
                                                @elseif ($item->deleted_at != null)
                                                    <a href="{{ route('admin.user.ban', [$item->id, 'unban']) }}">
                                                        <button class="btn btn-sm btn-primary">Unban</button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="odd">
                                            <td colspan="5">
                                                <h3 class="py-1 d-flex justify-content-center">No data available in table
                                                </h3>
                                            </td>
                                        </tr>
                                    @endforelse
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
