@extends('master')
@section('links')
    <link rel="stylesheet" href="{{ url('css/addPayment.css') }}">
@endsection
@section('content')
    <div class="r-p-c">
        <form action="store_payment" method="POST" class="formAddPayment c-p-c">
            @csrf
            <div class="LabelinpInfo">
                <input type="text" id="card_name" value="{{ old('card_name') }}" name="card_name" placeholder="" >
                <label for="card_name">Cardholder Name:</label>
                @if ($errors->has('card_name'))
                    <p class="errorUnderInput"> Error: {{ $errors->first('card_name') }} </p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="card_number" value="{{ old('card_number') }}" name="card_number" placeholder=""
                    maxlength="16">
                <label for="card_number">Card Number:</label>
                @if ($errors->has('card_number'))
                    <p class="errorUnderInput"> Error: {{ $errors->first('card_number') }} </p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="month" id="expiration_date" value="{{ old('expiration_date') }}" name="expiration_date">
                <label for="expiration_date">Expiration Date:</label>
                @if ($errors->has('expiration_date'))
                    <p class="errorUnderInput"> Error: {{ $errors->first('expiration_date') }} </p>
                @endif
            </div>

            <div class="LabelinpInfo">
                <input type="text" id="cvv" value="{{ old('cvv') }}" name="cvv" placeholder=""
                    maxlength="3" pattern="\d{3}" >
                <label for="cvv">CVV:</label>
                @if ($errors->has('cvv'))
                    <p class="errorUnderInput"> Error: {{ $errors->first('cvv') }} </p>
                @endif
            </div>

            <div class="LabelinpSelect">
                <label for="card_type">Card Type:</label>
                <select id="card_type" value="{{ old('card_type') }}" name="card_type" >
                    <option value="Visa">Visa</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="AmEx">American Express</option>
                    <option value="Discover">Discover</option>
                </select>
                @if ($errors->has('card_type'))
                    <p class="errorUnderInput"> Error: {{ $errors->first('card_type') }} </p>
                @endif
            </div>

            <div class="LabelinpCheck">
                <input type="checkbox" id="is_default"  name="is_default">
                <label for="is_default">Set as Default Payment Method</label>
                @if ($errors->has('first_be_default'))
                    <p class="errorUnderInput">Error :{{ $errors->first('first_be_default') }} </p>
                @endif
            </div>
            <button type="submit" style="width:150px" value="{{ old('150px') }}" class="bl">Save<svg
                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                </svg>
            </button>
        </form>
        <div class="c-c-c">
            <h1 class="mb20">Add payment Method</h1>
            <img style="width:400px" src="media/2903544-removebg-preview.png" alt="">
        </div>
    </div>
@endsection
