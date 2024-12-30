@extends('master')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/createAccount.css') }}">
@endsection
@section('title')
    Register
@endsection
@section('content')
    <div class="contianer r-p-c">

        <form action="{{ url('register') }}" method="POST" class="animate__animated ">
            <h1 class="titleForm">Create Account</h1>
            @csrf
            <div class="LabelinpInfo">
                <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="">
                <label for="name" class="lbl">Name</label>
                @if ($errors->has('name'))
                    <p class = "errorUnderInput">{{ $errors->first('name') }}</p>
                @endisset
        </div>
        <div class="LabelinpInfo">
            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="">
            <label for="email" class="lbl">Email</label>
            @if ($errors->has('email'))
                <p class = "errorUnderInput">{{ $errors->first('email') }}</p>
            @endisset
    </div>
    <div class="LabelinpInfo">
        <input type="password" name="password" id="password" placeholder="">
        <label for="password" class="lbl">Password</label>
        @if ($errors->has('password'))
            <p class = "errorUnderInput">{{ $errors->first('password') }}</p>
        @endisset
</div>
<div class="LabelinpInfo">
    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="">
    <label for="password_confirmation" class="lbl">Confirm Password</label>
</div>
<div class="LabelinpCheck">
    <input type="checkbox" name="rememberMe" id="rememberMe">
    <label for="rememberMe">stay logged in </label>
</div>
<button type="submit" id="btnRegister">Register</button>
</form>
<img src="{{ asset('media/2968290-removebg-preview.png') }}" class="imgUndrew" alt="">
</div>
@endsection
