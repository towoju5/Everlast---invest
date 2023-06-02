@extends('adminlte::page')

@section('title', 'Withdrawal Histories')

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Withdrawal Histories') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('withdrawal') }}">Withdrawal Histories</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            @include('notifications')
            <form class="form" action="{{  route('withdrawal.process') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 p-3 h-100">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Enter Amount to Withdrawal</h4>
                                <input type="text" name="amount" class="form-control" value=""
                                    placeholder="Enter Amount">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 p-3 h-100">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Select Payment Method</h4>
                                <select id="wdmethods" class="form-control" name="payment_method">
                                    <option value="">--Select Withdrawal Method--</option>
                                    <option id="bank" value="bank">Bank</option>
                                    <option id="bitcoin" value="bitcoin">Bitcoin</option>
                                </select>

                                <span class="payment-meth bank" style="">
                                    <label for="">Bank Name</label>
                                    <input type="text" name="bank_name" class="form-control" value=""
                                        placeholder="Bank Name">
                                    <label for="">Account Name</label>
                                    <input type="text" name="account_name" class="form-control" value=""
                                        placeholder="Account Name">
                                    <label for="">Account Number</label>
                                    <input type="text" name="account_number" class="form-control" value=""
                                        placeholder="Account Number">
                                </span>
                                <span class="payment-meth bitcoin" style="display: none;">
                                    <label for="">Bitcoin Address</label>
                                    <input type="text" name="bitcoin_address" class="form-control" value=""
                                        placeholder="Bitcoin Address">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-7 mx-auto">
                        <div class="row">
                            <button type="submit" class="btn btn-lg btn-primary col-md-12">Withdrawal</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h4>Withdrawal History</h4>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive no-padding">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="dataTable"
                                                class="table table-hover table-striped table-borderless dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th>Trx ID</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                        <th>Updated At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($withdraw as  $k => $item)
                                                        <tr>
                                                            <td> {{ $k+1 }} </td>
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
                                                                {{ showDateTime($item->updated_at) }}
                                                            </td>
                                                            <td>
                                                                @if ($item->status == 0)
                                                                  <a href="{{ route('withdrawal.status', [$item->id, 'cancel']) }}">
                                                                        <button class="btn btn-sm btn-danger">Cancel</button>
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
                                                            <td colspan="6">
                                                                <h3 class="py-3 d-flex justify-content-center">No data
                                                                    available in table</h3>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $withdraw->appends(request()->all())->render('pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_custom.css') }}">
@stop

@section('js')
    <script>
        $('#wdmethods').change(function() {
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(".payment-meth").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else {
                    $(".payment-meth").hide();
                }
            });
        }).change();
    </script>
@stop
