@extends('master')
@section('title')
    Login
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="contianer r-p-c">

        <form action="{{ url('submit_login') }}" method="POST" class="animate__animated">
            <h1 class="titleFomr">Login</h1>
            @csrf
            <div class="divErrors">
                @if ($errors->any())
                    @if ($errors->has('failed'))
                        <span><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#000000">
                                <path
                                    d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 11.5T440-320q0 17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240Zm40 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                            </svg> Error</span>

                        <p>{{ $errors->first('failed') }}</p>
                    @endif
                @endif
            </div>
            <div class="LabelinpInfo">
                <input type="email" name="email" value ="{{ old('email') }}" id="email" placeholder="">
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
    <div class="LabelinpCheck">
        <input type="checkbox" name="rememberMe" id="rememberMe">
        <label for="rememberMe">stay logged in </label>
    </div>
    <button type="button" class="btnForgetPass">Forget Password ?</button>

    <button type="submit" id="btnLogin">Login</button>
    <a href="{{ url('/register') }}" id="btnRegister"><img src="{{ asset('icones/add-user.png') }}" alt="">
        <p>Create Account</p>
    </a>
</form>
<img src="{{ asset('media/4957136-removebg-preview.png') }}" class="imgUndrew" alt="">
</div>
@endsection
