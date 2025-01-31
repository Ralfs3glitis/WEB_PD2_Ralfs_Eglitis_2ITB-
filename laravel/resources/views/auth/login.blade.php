@extends('layout')
@section('content')
    <h1 class="titel">{{ $title }}</h1>
    <hr>
    @if ($errors->any())
        <div>
            Failed to authenticate. Please try again!
        </div>
    @endif
    <form method="post" action="/auth">
        @csrf
        <div class="mb-3">
            <span class="search">
            <label for="login-name" class="form-label">User name</label>
            <input type="text" id="login-name" name="name" class="form-control" autocomplete="off" autofocus>
            </span>
        </div>
        <div class="mb-3">
            <span class="search">
            <label for="login-password" class="form-label">Password</label>
            <input type="password" id="login-password" name="password" class="form-control">
            </span>
        </div>
        <div class="mb-3">
            <button type="submit" class="h5">Login</button>
        </div>
    </form>
@endsection
