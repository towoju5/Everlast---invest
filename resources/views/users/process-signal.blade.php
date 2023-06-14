@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Activity Logs') }}</h1>
@stop

@section('content')
    <div class="container">
        @include('notifications')
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto">
                            <?php $d = $deposit; ?>
                            <h4> Payment Method: <?= $pmeth['name'] ?> </h4>
                            <h6> Payment Address: <input type="text" readonly class="form-control"
                                    value="<?= $pmeth['method'] ?>">
                            </h6>
                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= $pmeth['method'] ?>&choe=UTF-8"
                                alt="qrcode">
                            <h5>Amount Due: <?= CURRENCY . number_format($d['amount'], 2) ?> </h5>
                            <h4>Payer: <?= session()->get('fullname') ?> </h4>
                            <hr>
                            <?= form_open_multipart(route('process.signal'), @csrf) ?>
                            <div class="form-group">
                                <input type="hidden" name="payment_id" value="<?= $orderId ?>">
                                <label for="imgUpload">Prove of Payment</label>
                                <input type="file" name="signal" class="form-control" required>
                            </div>
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    Upload File
                                </button>
                            </div>
                            <?= form_close() ?>
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
