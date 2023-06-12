@extends('adminlte::page')

@section('title', 'Add New Plan')

@section('content_header')
    <h1>{{ __('Add New Plan') }}</h1>
@stop

@section('content')
    <div class="container">
        @include('error')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.plan.store') }}" method="post" enctype="multipart/form-data">
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="plan_name">Plan Name</label>
                                                <input type="text" name="plan_name" value="{{ old('plan_name') }}" id="plan_name" class="form-control form-control-lg">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="duration">Plan Duration in hours</label>
                                                <input type="text" name="duration" value="{{ old('duration') }}" id="duration" class="form-control form-control-lg">
                                          </div>
                                    </div>
                              </div>
                              @csrf
                              <div class="row">
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="minimum_amount">Plan Minimum Amount</label>
                                                <input type="text" name="minimum_amount" value="{{ old('minimum_amount') }}" id="minimum_amount" class="form-control form-control-lg">
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                          <div class="form-group mb-3">
                                                <label for="maximum_amount">Plan Maximum Amount</label>
                                                <input type="text" name="maximum_amount" value="{{ old('maximum_amount') }}" id="maximum_amount" class="form-control form-control-lg">
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
                                                <img id="blah" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" alt="your image" width="300px" height="300px">
                                          </div>
                                    </div>
                              </div>

                              <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-lg btn-outline-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Create Plan  </button>
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
