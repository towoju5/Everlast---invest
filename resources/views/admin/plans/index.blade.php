@extends('adminlte::page')

@section('title', 'Subscription Plans')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>{{ __('Subscription Plans') }}</h1>
        <a href="{{ route('admin.plan.create') }}">
            <button type="button" class="btn btn-outline-primary">
                <i class="fas fa-plus-circle"></i> Add New Plan
            </button>
        </a>
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
                                        <th>Plan Name</th>
                                        <th>Minimum Amount</th>
                                        <th>Maximum Amount</th>
                                        <th>Images</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($plans as $k => $plan)
                                        <tr onclick="window.location.href='{{route('admin.plan.show', $plan->id)}}'" style="cursor: pointer">
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ ucwords($plan->plan_name) }}</td>
                                            <td>{{ format_price($plan->minimum_amount) }}</td>
                                            <td>{{ format_price($plan->maximum_amount) }}</td>
                                            <td>
                                                <img src="{{ $plan->image }}" width="30px" alt="{{ $plan->plan_name }}">
                                            </td>
                                            <td>
                                                {{ showDateTime($plan->created_at) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.plan.delete', $plan->id) }}">
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </a>
                                                
                                                <a href="{{ route('admin.plan.edit', $plan->id) }}">
                                                    <button class="btn btn-sm btn-primary">Edit</button>
                                                </a>
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
