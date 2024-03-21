@extends('layouts.app')

@section('title', 'Reset Password')

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
    <main class="form-signin">
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72"
                 height="57">
            <h1 class="h3 mb-3 fw-normal">Please update your password</h1>
            <input name="token" hidden value="{{$request->token}}"/>
            <input name="email" hidden value="{{$request->email}}"/>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="password_confirmation">
                <label for="floatingPassword">Confirm password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
        </form>
    </main>
@endsection
