@extends('adminlte::page')

@section('title', 'Deposit Methods')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>{{ __('Deposit Methods') }}</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Add New Deposit Method
        </button>
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
                                        <th>{{ strippy('method_name') }}</th>
                                        <th>{{ strippy('method_value') }}</th>
                                        <th>{{ strippy('network') }}</th>
                                        {{-- <th>{{ strippy('min_amount') }}</th>
                                        <th>{{ strippy('max_amount') }}</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($methods as $k => $item)
                                        <tr style="cursor: pointer">
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $item->method_name }}</td>
                                            <td>{{ $item->method_value }}</td>
                                            <td>{{ $item->network }}</td>
                                            {{-- <td>{{ format_price($item->min_amount) }}</td>
                                            <td>{{ format_price($item->max_amount) }}</td> --}}
                                            <td>
                                                <a href="{{ route('admin.deposit.method.delete', $item->id) }}">
                                                      <button class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash"></i> Delete
                                                      </button>
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

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Deposit Method</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.deposit.method.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="method_name">@lang('Method Name') <span class="text-danger">*</span> </label>
                            <input type="text" name="method_name" id="method_name" required class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="method_value">@lang('Wallet Address') <span class="text-danger">*</span> </label>
                            <input type="text" name="method_value" id="method_value" required class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="network">@lang('Wallet Network')</label>
                            <input type="text" name="network" id="network" class="form-control form-control-lg">
                        </div>
                        {{-- <div class="form-group">
                            <label for="min_amount">@lang('Min  Amount')</label>
                            <input type="number" name="min_amount" id="min_amount" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="max_amount">@lang('Max Amount')</label>
                            <input type="number" name="max_amount" id="max_amount" class="form-control form-control-lg">
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
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
