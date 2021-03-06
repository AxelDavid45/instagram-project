@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Upload Image</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('image.save') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="image-path"
                                       class="col-md-4 col-form-label text-md-right">Image</label>

                                <div class="col-md-6">
                                    <input id="image-path" type="file"
                                           class="form-control{{ $errors->has('image-path') ? '
                                           is-invalid' : '' }}"
                                           name="image-path" required
                                           autofocus>

                                    @if ($errors->has('image-path'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image-path') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="description" class="col-md-4 col-form-label
                                       text-md-right">Description</label>
                                <div class="col-md-6">
                                    <textarea class="form-control {{ $errors->has('description') ? '
                                           is-invalid' : '' }}" id="description"
                                              rows="3" name="description" required
                                              autofocus></textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Upload now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
