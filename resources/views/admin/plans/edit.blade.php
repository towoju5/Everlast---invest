@extends('adminlte::page')

@section('title', 'Plan Details')

@section('content_header')
    <h1>{{ __('Plan Details') }}</h1>
@stop

@section('content')
    <div class="container">
        @include('error')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.plan.update',  $plan->id) }}" method="post">
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="plan_name">Plan Name</label>
                                                <input type="text" name="plan_name" value="{{ $plan->plan_name }}" id="plan_name" class="form-control form-control-lg">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="duration">Plan Duration in hours</label>
                                                <input type="text" name="duration" value="{{ $plan->duration }}" id="duration" class="form-control form-control-lg">
                                          </div>
                                    </div>
                              </div>
                              @csrf
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="minimum_amount">Plan Minimum Amount</label>
                                                <input type="text" name="minimum_amount" value="{{ $plan->minimum_amount }}" id="minimum_amount" class="form-control form-control-lg">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="maximum_amount">Plan Maximum Amount</label>
                                                <input type="text" name="maximum_amount" value="{{ $plan->maximum_amount }}" id="maximum_amount" class="form-control form-control-lg">
                                          </div>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="image">Plan Image</label>
                                                <input type="file" name="image" id="image" class="form-control form-control-lg">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <img id="blah" src="{{ $plan->image}}" alt="your image" width="300px" height="300px">
                                          </div>
                                    </div>
                              </div>

                              <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg btn-outline-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Update Plan  </button>
                              </div>
                        </form>
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
    <script>
      image.onchange = evt => {
            const [file] = image.files
            if (file) {
            blah.src = URL.createObjectURL(file)
            }
      }
    </script>
@stop
