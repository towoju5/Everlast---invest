@extends('adminlte::page')

@section('title', 'Subscription Plans')

@section('content_header')
    <h1>Subscription Plans</h1>
@stop

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-3">To referrer a user, copy the referral link for
                                            registration</h5>
                                        <label for="">Referral Link</label>
                                        <input type="text" name="referral_link" class="form-control"
                                            value="https://app.24legitstockoptionstading.com/register?ref=ref-Yv004b"
                                            disabled="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-3">Your referred members</h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Date of Registration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mx-auto">





                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                            </div>
                            <div class="col-md-12">
                                <h4>Affiliate Commision</h4>
                                <div class="table-responsive no-padding">
                                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="dataTable_length"><label>Show
                                                        <select name="dataTable_length" aria-controls="dataTable"
                                                            class="custom-select custom-select-sm form-control form-control-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> entries</label></div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div id="dataTable_filter" class="dataTables_filter">
                                                    <label>Search:<input type="search" class="form-control form-control-sm"
                                                            placeholder="" aria-controls="dataTable"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="dataTable"
                                                    class="table table-hover table-striped table-borderless dataTable no-footer"
                                                    role="grid" aria-describedby="dataTable_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1" style="width: 213.984px;"
                                                                aria-sort="ascending"
                                                                aria-label="Amount: activate to sort column descending">
                                                                Amount</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1" style="width: 188.812px;"
                                                                aria-label="Status: activate to sort column ascending">
                                                                Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1" style="width: 281.922px;"
                                                                aria-label="Description: activate to sort column ascending">
                                                                Description</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                rowspan="1" colspan="1" style="width: 266.281px;"
                                                                aria-label="Created At: activate to sort column ascending">
                                                                Created At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="odd">
                                                            <td valign="top" colspan="4" class="dataTables_empty">No
                                                                data available in table
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">
                                                <div class="dataTables_info" id="dataTable_info" role="status"
                                                    aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                    id="dataTable_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="dataTable_previous"><a href="#"
                                                                aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                                                class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item next disabled"
                                                            id="dataTable_next"><a href="#"
                                                                aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                                                class="page-link">Next</a></li>
                                                    </ul>
                                                </div>
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
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
