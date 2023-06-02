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
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#btc-address" aria-expanded="true"
                                                    aria-controls="btc-address">
                                                    BTC Address
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="btc-address" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>1B7ByjuZwuYsPhaVLySHEDJNuCy7wFUEDZ</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#usdt-trc20-address" aria-expanded="true"
                                                    aria-controls="usdt-trc20-address">
                                                    USDT TRC20 Address
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="usdt-trc20-address" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>TFEqjFVfudgRL83SD9vFfMKsfCL9QcA8u1</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#ethereum-eth-address" aria-expanded="true"
                                                    aria-controls="ethereum-eth-address">
                                                    Ethereum ETH Address
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="ethereum-eth-address" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>0x570688287E909961B0cd7e77639a183f55A2F3b7</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#ltc-litecoin" aria-expanded="true"
                                                    aria-controls="ltc-litecoin">
                                                    LTC Litecoin
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="ltc-litecoin" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>M8LgzHdmb8uoWUHiCX3xewJxbr3vjoTnFH</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#bch-bitcoin-cash" aria-expanded="true"
                                                    aria-controls="bch-bitcoin-cash">
                                                    BCH Bitcoin Cash
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="bch-bitcoin-cash" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>qzs0mvgqh73ulhh52zk33ng6urjjh0tlkggflhku8m</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header py-0" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#usdt-erc20-network" aria-expanded="true"
                                                    aria-controls="usdt-erc20-network">
                                                    USDT ERC20 Network
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="usdt-erc20-network" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body text-center">
                                                <p>0x33742feF48368C81fFfCbbE06d1CaC3C4a25CeE5</p>
                                            </div>
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
            <div class="col-md-6 h-100">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h5>Submit Notification for Deposit</h5>
                            </div>
                            <div class="col-md-12 mt-2">
                                <form class="form" action="{{ route('deposit.process') }}" method="post" enctype="multipart/form-data">
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
                                                <option value="">-- Select Payment Method --</option>
                                                <option value="BTC Address">BTC Address</option>
                                                <option value="USDT TRC20 Address">USDT TRC20 Address</option>
                                                <option value="Ethereum ETH Address">Ethereum ETH Address
                                                </option>
                                                <option value="LTC Litecoin">LTC Litecoin</option>
                                                <option value="BCH Bitcoin Cash">BCH Bitcoin Cash</option>
                                                <option value="USDT ERC20 Network">USDT ERC20 Network</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 my-2">
                                            <label for="amount">Amount in Dollar ($)</label>
                                            <input type="text" name="amount" class="form-control" value=""
                                                placeholder="Enter Amount">
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
                                            <table id="dataTable" class="table table-hover table-striped table-borderless dataTable no-footer">
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
                                                            <td>{{ $k+1 }}</td>
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
                                                        <td colspan="5">
                                                            <h3 class="py-1 d-flex justify-content-center">No data available in table</h3>
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
    <script></script>
@stop
