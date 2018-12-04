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
                                <label for="name" class="col-md-4 col-form-label text-md-right">文字(name)</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="int" class="col-md-4 col-form-label text-md-right">數字(int)</label>

                                <div class="col-md-6">
                                    <input id="int" type="text" class="form-control{{ $errors->has('int') ? ' is-invalid' : '' }}" name="int" value="{{ old('int') }}">

                                    @if ($errors->has('int'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('int') }}</strong>
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
                            {{ $errors->MessageBagName->first('name') }}
                            <br>
                            {{ $errors->MessageBagName->first('int') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
