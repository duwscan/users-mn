@extends('layouts.app')

@section('title', 'Login')

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
        <form action="{{ route('login') }}" method="post">

            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72"
                 height="57">
            @if ($errors->has('account'))
                <div class="alert alert-danger">{{ $errors->first('account') }}</div>
            @endif
            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputEmail" placeholder="name@example.com"
                       name="email">
                <label for="floatingInputEmail">Email address</label>
                @if ($errors->has('email'))
                    <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
    </main>
@endsection

