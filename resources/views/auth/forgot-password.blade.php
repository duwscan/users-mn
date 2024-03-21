@extends('layouts.app')

@section('title', 'Forgot Password')

@section('addition_styles')
    <link href="/assets/css/signin.css" rel="stylesheet">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection
@section('content')
    <main class="form-signin text-center">
        <form action="{{ route('password.request') }}" method="post">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72"
                 height="57">
            <h1 class="h3 mb-3 fw-normal">Please input your email</h1>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com"
                       name="email" value="{{ old('email') }}">
                <label for=" floatingInputEmail">Email address</label>
                @if($errors->has("email"))
                    <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
    </main>
@endsection

