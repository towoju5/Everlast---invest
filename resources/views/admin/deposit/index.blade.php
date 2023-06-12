@extends('adminlte::page')

@section('title', 'Deposit Details')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>{{ __('Deposit Details') }}</h1>
        <form action="" method="get" id="statusForm">
            <select name="status" class="form-control form-control-lg" onchange="$('#statusForm').submit()" id="status">
                <option @if(request()->status ==  'pending') selected @endif value="pending">Pending</option>
                <option @if(request()->status ==  'success') selected @endif value="success">Successful/Completed</option>
                <option @if(request()->status ==  'cancelled') selected @endif value="cancelled">Cancelled</option>
            </select>
        </form>
    </div>
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
                                        <th>Currency</th>
                                        <th>Proof of Payment</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($deposits as $k => $item)
                                        <tr onclick="window.location.href='{{route('admin.deposit.show', $item->id)}}'" style="cursor: pointer">
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->currency }}</td>
                                            <td>
                                                @if(empty($item->proof_of_pay))
                                                <i class="fas fa-times-circle"></i>   Evidence not yet provided
                                                @else
                                                    <a href="{{ $item->proof_of_pay }}" target="_blank">
                                                        <i class="fas fa-check-circle"></i>  Already Uploaded
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ format_price($item->amount) }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-primary">Successful</span>
                                                @elseif($item->status == 0)
                                                    <span class="badge badge-secondary">Pending</span>
                                                @elseif($item->status == 3)
                                                    <span class="badge badge-danger">Failed</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ showDateTime($item->created_at) }}
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <a href="{{ route('admin.deposit.status', [$item->id, 'cancel']) }}">
                                                        <button class="btn btn-sm btn-danger">Cancel</button>
                                                    </a>
                                                    <a href="{{ route('admin.deposit.status', [$item->id, 'approve']) }}">
                                                        <button class="btn btn-sm btn-primary">Approve</button>
                                                    </a>
                                                @else
                                                    <a href="#!">
                                                        <button class="btn btn-sm btn-danger" disabled>Cancel</button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="odd">
                                            <td colspan="7">
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
