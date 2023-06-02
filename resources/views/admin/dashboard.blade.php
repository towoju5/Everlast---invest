@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>{{ get_greetings() . 'Admin' }}</h3>
@stop


@php($user = request()->user())
@section('content')
    <div class="container">
        <section class="content">
            @include('notifications')
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <!--============================ View for Non-Admin ============================-->

                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-primary">
                            <span class="d-none d-md-block info-box-icon bg-primary mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Account Balance"><i class="fa fa-user-plus fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Customer Balance</span>
                                <span class="info-box-number lead">
                                    {{ format_price($balance ?? 0) }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-danger">
                            <span class="d-none d-md-block info-box-icon bg-danger mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="Profit Return"><i class="fas fa-paw fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Customer Profits</span>
                                <span class="info-box-number lead">
                                    {{ format_price($profit ?? 0) }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-6 col-sm-3 col-md-4">
                        <div class="info-box shadow p-3 bg-teal">
                            <span class="d-none d-md-block info-box-icon bg-teal mr-2"
                                data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fa fa-user-cog fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Customer Bonus</span>
                                <span class="info-box-number lead">
                                    {{ format_price($bonus ?? 0) }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-warning">
                            <span class="d-none d-md-block info-box-icon bg-warning mr-2"
                                data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fa fa-download fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Deposit</span>
                                <span class="info-box-number lead">
                                    {{ format_price($total_deposit) }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-success">
                            <span class="d-none d-md-block info-box-icon  mr-2" data-toggle="tooltip"
                                data-placement="bottom" title="" data-original-title="Bonus"><i
                                    class="fas fa-upload fa-2x"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Withdrawal</span>
                                <span class="info-box-number lead">
                                    {{ format_price($total_withdrawal) }} </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-6 col-sm-3 col-md-4 d-none d-md-block ">
                        <div class="info-box shadow p-3 bg-navy">
                            <span class="d-none d-md-block info-box-icon bg-navy mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Deposits"><i class="fa fa-exchange-alt fa-2x"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Deposit Count</span>
                                <span class="info-box-number lead">
                                    {{ $deposits }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-6 col-sm-3 col-md-4 d-none d-md-block ">
                        <div class="info-box shadow p-3  bg-info">
                            <span class=" d-none d-md-block info-box-icon bg-info mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Withdrawal"><i class="fas fa-exchange-alt fa-2x"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Withdrawal Count</span>
                                <span class="info-box-number lead">
                                    {{ $withdrawal }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-6 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3 bg-secondary">
                            <span href="#!" class="d-none d-md-block info-box-icon bg-secondary mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Withdrawal"><i class="fa fa-users fa-2x"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Users/Customers</span>
                                <span class="info-box-number lead">
                                    {{ $users }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>

                    <div class="col-12 col-sm-3 col-md-4 ">
                        <div class="info-box shadow p-3  bg-info">
                            <span class="d-none d-md-block info-box-icon bg-info mr-2"
                                data-toggle="tooltip" data-placement="bottom" title=""
                                data-original-title="See Notification"><i class="fa fa-bullhorn fa-2x"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Notification</span>
                                <span class="info-box-number lead">
                                    Account is active
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </div>
            </div>

        </section>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
