@extends('adminlte::page')

@section('title', 'Subscription Plans')

@section('content_header')
<h1>Subscription Plans</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @forelse ($plans as $item)
            <div class="col-md-4">
                  <form class="form" action="/subscribe/1" method="post">
                    <input type="hidden" name="_token" value="CD3z6MzWafNOMYqiXjcKtmzz0KWdns5zxrVrDa1c">                <div class="card">
                        <div class="card-header my-2">
                          <h5>{{ ucwords($plan->name) }}</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 text-center">
                              <img src="{{ $item->image }}" alt="" height="150px" width="150px">
                            </div>
                            <div class="col-md-12 mt-4 text-center">
                              <p> <strong>MINIMUM DEPOSIT</strong><strong class="ml-2">{{ format_price($user->price) }}</strong></p>
                            </div>
                            <div class="col-md-12 mt-2 text-center">
                              <p><strong class="">24 HOURS</strong></p>
                            </div>
                            <div class="col-md-12 mt-2 text-center">
                              <p><strong class="">$3,500</strong></p>
                            </div>
                            <div class="col-md-12 mt-2 ">
                              <input type="text" name="amount" value="" class="form-control" placeholder="Enter Amount">
                            </div>
                            <div class="col-md-12 mt-2 ">
                              <button type="submit" class=" btn btn-primary col-md-12"> Subscribe to Plan</button>
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
            @empty
                <div class="card">
                  <div class="card-body">
                        <h3 class="text-center">
                              Subscription plans are currently unavailable
                        </h3>
                  </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
</script>
@stop