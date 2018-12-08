@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="even_number" class="col-md-4 col-form-label text-md-right">只能輸入偶數</label>

                                <div class="col-md-6">
                                    <input id="even_number" type="text" class="form-control{{ $errors->has('even_number') ? ' is-invalid' : '' }}" name="even_number" value="{{ old('even_number') }}">

                                    @if ($errors->has('even_number'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('even_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
