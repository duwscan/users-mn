@extends('layouts.app')

@section('title', 'Register')

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
        <form action="{{ route('register') }}" method="post">
            @csrf
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72"
                 height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputUsername" placeholder="Your name" name="name">
                <label for="floatingInputUsername">Username</label>
                @error('name')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputEmail" placeholder="name@example.com"
                       name="email">
                <label for="floatingInputEmail">Email address</label>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                       name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
        </form>
    </main>
@endsection
