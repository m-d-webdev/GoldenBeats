@extends('master')
@section('title')
    Add address
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection
@section('content')
    <div class="container r-p-c">
        <form action="{{ url('store_address') }}" method="POST">
            @csrf
            <div class="LabelinpInfo">
                <input type="text" id="name" name="name" value="{{ old('name') }}" value="{{ Auth::user()->name }}"
                    placeholder="">
                <label for="name">Full Name</label>
                @if ($errors->has('name'))
                    <p class="errorUnderInput">Error : {{ $errors->first('name') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" placeholder="">
                <label for="phone">Phone Number</label>
                @if ($errors->has('phone'))
                    <p class="errorUnderInput">Error : {{ $errors->first('phone') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="street" name="street" value="{{ old('street') }}" placeholder="">
                <label for="street">Street Address</label>
                @if ($errors->has('street'))
                    <p class="errorUnderInput">Error : {{ $errors->first('street') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="city" name="city" value="{{ old('city') }}" placeholder="">
                <label for="city">City</label>
                @if ($errors->has('city'))
                    <p class="errorUnderInput">Error : {{ $errors->first('city') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="state" name="state" value="{{ old('state') }}" placeholder="">
                <label for="state">State/Province</label>
                @if ($errors->has('state'))
                    <p class="errorUnderInput">Error : {{ $errors->first('state') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="zip" name="zip" value="{{ old('zip') }}" placeholder="">
                <label for="zip">ZIP/Postal Code</label>
                @if ($errors->has('zip'))
                    <p class="errorUnderInput">Error : {{ $errors->first('zip') }}</p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <textarea id="instructions" name="instructions"></textarea>
                <label for="instructions">Additional Instructions (Optional)</label>
            </div>
            <div class="LabelinpCheck">
                <input type="checkbox" name="is_default" id="is_default">
                <label for="is_default">Set as default address</label>
                @if ($errors->has('first_be_default'))
                    <p class="errorUnderInput"> {{ $errors->first('first_be_default') }}</p>
                @endif
            </div>
            @isset($wantToAddAddressForOrder)
                @if ($wantToAddAddressForOrder == true)
                    <button class="bl p10 " style="width: 200px">Save address <svg version="1.1" viewBox="0 0 2048 2048"
                            width="128" height="128" xmlns="http://www.w3.org/2000/svg">
                            <path transform="translate(753)"
                                d="m0 0h193l8 3 12 3 31 6 40 9 53 15 21 7 32 12 30 13 27 13 22 12 28 16 19 12 15 10 20 14 30 23 10 8 14 12 14 13 8 7 9 9 7 6 7 8 13 13 7 8 9 10 7 8 12 14 7 9 16 21 8 12 11 16 11 17 13 22 12 21 17 33 16 36 15 39 8 24 11 37 9 41 6 33 5 39 4 48 1 23v24l-2 37-7 69-5 35-12 59-9 35-8 28-14 44-6 15-4 6-3 2-452 1-39 1-22 2-21 6-15 8-17 12-12 11-8 10-9 14-9 19-4 14-2 12-1 13-1 718-1 31-3 6-6 7-8 7-10 9-5 5-10 9-14 11-9 7-4 5v1h-32l-6-7-22-18v-2l-4-2-17-16-38-38-2-1v-2h-2v-2h-2v-2l-4-2-23-23-4-3v-2l-3-1-5-6-8-7-12-13-10-10-7-8-8-8-7-8-9-9v-2h-2l-7-8-15-16-9-10-11-12v-2h-2l-7-8-18-20-9-11-10-11-11-14-13-15-11-13-9-11-12-14-10-13-13-16-9-12-11-14-14-18-13-17-10-14-14-19-26-36-13-19-29-43-7-11-11-17-12-19-19-32-9-15-15-26-12-21-14-26-24-47-19-39-16-36-17-42-15-40-16-48-13-46-7-27-10-47-7-40-5-39-3-40-1-21v-47l3-45 4-33 6-37 8-39 13-49 14-40 14-36 10-22 7-15 14-27 8-14 9-14 7-12 10-16 7-10 11-16 16-21 9-12 10-13 7-7 9-11 9-9 7-8 7-7 7-8 6-5 18-18 8-7 14-12 11-10 13-10 19-14 17-12 16-11 19-12 20-12 17-10 23-12 28-13 23-10 26-10 43-14 37-10 45-10 41-8zm9 1m-6 1m91 424-23 1-32 4-26 6-29 9-24 10-16 8-13 7-17 11-17 12-14 11-11 10-8 7-15 15-7 8-10 12-13 18-8 12-6 11-9 16-12 26-9 24-7 28-6 36-3 30v28l4 33 7 34 7 25 11 27 12 25 10 17 11 16 16 21 11 13 23 23 11 9 18 14 17 11 20 12 23 12 28 11 23 7 27 6 19 3 19 2 33 1 19-1 29-4 30-7 21-6 24-9 34-17 20-12 14-10 11-8 17-14 8-7 15-15 8-10 8-9 11-15 11-17 8-13 11-21 11-27 10-31 7-34 3-26 1-20v-17l-2-28-4-27-7-30-7-21-10-25-8-17-10-18-13-21-8-11-11-14-11-12-5-6-8-7-14-13-14-11-15-11-21-13-20-11-20-9-23-9-20-6-29-7-31-4-22-1z" />
                            <path transform="translate(1562,1193)"
                                d="m0 0h51l52 1 11 2 13 7 11 9 12 11 56 56 7 8 23 23 6 5v2l4 2v2l4 2 36 36 7 8 9 9 10 14 3 9 1 35-1 537-1 35-1 11-4 9-4 5-9 6-6 11h-804l-3-8-5-5-12-11-4-5-2-15-1-55v-623l1-92 4-13 6-9 11-12 7-3 10-2 13-1zm-366 86-2 2v203l2 21 4 11 9 10 8 6 12 3 9 1 30 1h243l124-1 32-1 12-2 9-4 8-9 5-11 3-13 1-12v-138l-4-10-11-12-30-30-10-8-12-6-3-1h-29l-6 2 2 5 9 10 5 10 3 12 1 10 1 26v44l-2 19-4 11-7 9-10 7-12 5h-14l-9-2-8-4-8-7-8-13-2-7-1-8-1-23v-44l2-21 3-12 7-12 5-6 5-5 2-5-2-1zm39 427-15 2-11 6-6 7-5 9-2 9-1 10-1 73v140h510l1-2v-201l-1-18-4-13-7-11-4-5-9-4-3-1-12-1z" />
                            <path transform="translate(967)" d="m0 0h21l-3 3-17-1z" />
                            <path transform="translate(724)" d="m0 0h8v1h-8z" />
                            <path transform="translate(955)" d="m0 0h2l-1 2z" />
                            <path transform="translate(957,3)" d="m0 0 2 1z" />
                            <path transform="translate(1046,2044)" d="m0 0" />
                        </svg>
                    </button>
                @endif
            @else
                <div class="cntBtnSubmitForm r-p-c">
                    <button type="button" onclick="window.location.href='profile_picture'"> <svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                        </svg> Later </button>
                    <button type="submit">Save Address <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg></button>
                </div>
            @endisset

        </form>
        <div class="c-c-c">
            <h1>Add Your Address</h1>
            <img src="{{ asset('media/2665829-removebg-preview.png') }}" alt="" class="ImgIllustr">
        </div>
    </div>
    <div class="descriptionOfPage c-c-c">
        <h1 style="font-size: 18px">What is this page for?</h1>
        <p>The Adding Address page allows you to input and save your address information for purposes such as shipping,
            billing, or personal records. Please provide accurate details to ensure proper delivery or service.</p>
    </div>
@endsection
