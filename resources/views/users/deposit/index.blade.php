@extends('adminlte::page')

@section('title', 'Deposit Transaction')

@section('content_header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ __('Deposit Transaction') }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/deposit/list">Deposit Transaction</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('content')
    <style>
        .badge {
            font-size: 1rem;
        }
    </style>
    <!-- Main content -->
    <section class="content">
        @include('notifications')
        <div class="row">
            <div class="col-md-6 h-100">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Payment Methods</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="accordion payment-method" id="accordionExample">
                                    @forelse($methods as $k => $item)
                                        <div class="card">
                                            <div class="card-header py-0" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse"
                                                        data-target="#address_{{ $k }}" aria-expanded="true"
                                                        aria-controls="address_{{ $k }}">
                                                        {{ $item->method_name }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="address_{{ $k }}" class="collapse"
                                                aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body text-center">
                                                    <p class="h2">Network: {{ $item->network }}</p>
                                                    <p>
                                                        Wallet address:
                                                        <span class="badge badge-light">{{ $item->method_value }}</span>
                                                        <i class="fa fa-copy btn" data-clipboard-action="copy" data-clipboard-target="#copy_address_{{ $k }}" style="cursor: pointer" title="copy address"></i>
                                                    </p>
                                                    <input type="hidden" id="copy_address_{{ $k }}"  value="{{ $item->method_value }}">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            {!! get_qr_code($item->method_value) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6 h-100">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Submit Notification for Deposit</h5>
                            </div>
                            <div class="col-md-12 mt-2">
                                <form class="form" action="{{ route('deposit.process') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <strong class="text-primary">
                                                <i>
                                                    To deposit, please choose the payment method at the Payment
                                                    Methods panel and make the payment.
                                                </i>
                                            </strong>
                                            <strong class="text-primary d-block mt-1">
                                                <i>
                                                    After completing the payment come back here and fill the
                                                    deposit notification form.
                                                </i>
                                            </strong>
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label for="payment-method">Select Payment Method</label>
                                            <select class="form-control" name="payment_method">
                                                @forelse($methods as $k => $item)
                                                <option value="{{ $item->id  }}">{{ $item->method_name }} ({{ $item->method_value }})</option>
                                                @empty
                                                <option value="">-- Select Payment Method --</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label for="amount">Amount in Dollar ($)</label>
                                            <input type="text" name="amount" class="form-control" value=""
                                                placeholder="Enter Amount">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label for="amount">Deposit Trx</label>
                                            <input type="text" name="trx" class="form-control" placeholder="Ex: askfj843s">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label for="payment_verify">Upload Payment Reciept</label>
                                            <input type="file" name="payment_verify" class="form-control"
                                                placeholder="Enter Amount">
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <div class="row">
                                                <button type="submit" class="btn btn-primary col-md-12">Notify for
                                                    Deposit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h4>Deposit History</h4>
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
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($deposits as $k => $item)
                                                        <tr>
                                                            <td>{{ $k + 1 }}</td>
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
                                                                    <a
                                                                        href="{{ route('withdrawal.status', [$item->id, 'cancel']) }}">
                                                                        <button
                                                                            class="btn btn-sm btn-danger">Cancel</button>
                                                                    </a>
                                                                @else
                                                                    <a href="#!">
                                                                        <button class="btn btn-sm btn-danger"
                                                                            disabled>Cancel</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr class="odd">
                                                            <td colspan="5">
                                                                <h3 class="py-1 d-flex justify-content-center">No data
                                                                    available in table</h3>
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        {{ $deposits->appends(request()->all())->render('pagination') }}
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('dist/clipboard.min.js') }}"></script>
    <script>
        var clipboard = new ClipboardJS('.btn');
  
        clipboard.on('success', function (e) {
          console.info('Action:', e.action);
          console.info('Text:', e.text);
          console.info('Trigger:', e.trigger);
          alert('Copied: ' + e.text);
        });
  
        clipboard.on('error', function (e) {
          console.log(e);
        });
      </script>
@stop
