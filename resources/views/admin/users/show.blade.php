@extends('adminlte::page')

@section('title', 'Deposit Details')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>{{ __('Deposit Details') }}</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
            Modify Balance
        </button>
    </div>
@stop

@php($array = to_array($user))
@section('content')
    @include('error')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table">
                                <tbody>
                                    <?= show_table($user) ?>
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
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modify <b>{{ $user->name }}</b> Balance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.user.balance', $user->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control form-control-lg">
                        </div>
                        <div class="form-group mb-3">
                            <label for="amount">Action Type</label>
                            <select name="action" id="action" class="form-control form-control-lg">
                                <option selected value="debit">Debit</option>
                                <option value="credit">Credit</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="wallet">Wallet Type</label>
                            <select name="wallet" id="wallet" class="form-control form-control-lg">
                                <option value="balance">Balance</option>
                                <option selected value="bonus">Bonus</option>
                                <option value="profit">Profit</option>
                            </select>
                        </div>
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
