@extends('user.profile.master_profile')

@section('title')
    Payment Methods
@endsection
@section('contentProfile')
    <div class="p10 c-s-s" style="width: 100%">
        <p class="mb20">Payment Methods</p>
        @if (Auth::user()->paymenth_method()->where('is_default', true)->exists())
            
        <div class="defaultCard r-s-s mb20 ">
            <svg class="f-g mr10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#000000">
                <path
                    d="M160-640h640v-80H160v80Zm-80-80q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v240H160v240h164v80H160q-33 0-56.5-23.5T80-240v-480ZM598-80 428-250l56-56 114 112 226-226 56 58L598-80ZM160-720v480-180 113-413Z" />
            </svg>
            <p class="c-g">Default</p>
            <div class="creditCardElement ml20">
                <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                <p class="cardNumber">**** **** ****
                    {{ substr(Crypt::decrypt(Auth::user()->paymenth_method()->where('is_default', true)->first()->card_number), -4) }}
                </p>
                <p>

                </p>
                <p class="expiration_dateELME">
                    {{ Auth::user()->paymenth_method()->where('is_default', true)->first()->expiration_date }}</p>
                <h1 class="">{{ Auth::user()->paymenth_method()->where('is_default', true)->first()->card_name }}
                </h1>
                @php
                    $Cardtype = Auth::user()->paymenth_method()->where('is_default', true)->first()->card_type;
                @endphp

                @switch($Cardtype)
                    @case('Visa')
                        <img src="{{ url('media/V-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                        <p class="cardUserName ml14">Visa</p>
                    @break

                    @case('MasterCard')
                        <img src="{{ url('media/Mastercard_logo_svg_free_download-removebg-preview.png') }}" alt=""
                            class="creditCardTypeImg">
                        <p class="cardUserName ml14">Master card</p>
                    @break

                    @case('AmEx')
                        <img src="{{ url('media/E-Ticket-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                        <p class="cardUserName ml14">Amercan Express</p>
                    @break

                    @case('Discover')
                        <img src="{{ url('media/Discover-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                        <p class="cardUserName ml14">Discover</p>
                    @break
                @endswitch

            </div>
        </div>
        <p class="mb20 mt20">All payment methods</p>
        <div class="listALlCards r-w-p-s mt20 ">
            @php
                $defaultCardId = Auth::user()->paymenth_method()->where('is_default', true)->first()->id;
            @endphp
            @foreach (Auth::user()->paymenth_method as $item)
                <div class="creditCardElement mt20 ml20">
                    @if ($item->id != $defaultCardId)
                        <button class="bl btnDetasDefault" onclick="setAsDefault({{ $item->id }})"> Set as default <svg
                                xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#000000">
                                <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
                            </svg></button>
                        <button class="dng btnDeleCard" onclick="delete_card_payment({{ $item->id }})"><svg
                                class="mr10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                width="24px" fill="#000000">
                                <path
                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                            </svg></button>
                    @endif
                    <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                    <p class="cardNumber">**** **** ****
                        {{ substr(Crypt::decrypt($item->card_number), -4) }}
                    </p>
                    <p class="expiration_dateELME">
                        {{ $item->expiration_date }}</p>
                    <h1 class="">{{ $item->card_name }}
                    </h1>

                    @switch($item->card_type)
                        @case('Visa')
                            <img src="{{ url('media/V-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                            <p class="cardUserName ml14">Visa</p>
                        @break

                        @case('MasterCard')
                            <img src="{{ url('media/Mastercard_logo_svg_free_download-removebg-preview.png') }}" alt=""
                                class="creditCardTypeImg">
                            <p class="cardUserName ml14">Master card</p>
                        @break

                        @case('AmEx')
                            <img src="{{ url('media/E-Ticket-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                            <p class="cardUserName ml14">Amercan Express</p>
                        @break

                        @case('Discover')
                            <img src="{{ url('media/Discover-removebg-preview.png') }}" alt="" class="creditCardTypeImg">
                            <p class="cardUserName ml14">Discover</p>
                        @break
                    @endswitch

                </div>
            @endforeach
        </div>

        <a href="{{url('addNewCard')}}" class="bl mt50 p10" style="border-radius:20px !important">Add new payment method <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v240H160v240h400v80H160Zm0-480h640v-80H160v80ZM760-80v-120H640v-80h120v-120h80v120h120v80H840v120h-80ZM160-240v-480 480Z"/></svg> </a>

        <div class="mt100 c-s-s">
            <h1 class="mt50">Payment Methods</h1>
            <p class="mt10">
                This page allows you to manage your preferred payment methods for easy and secure transactions. You can add,
                update, or remove your payment options at any time. Choose from multiple payment methods, including online
                payments and cash on delivery, to suit your convenience.</p>
        </div>
        @else 
        <div class="c-p-c mt50" style="margin:auto;">
            <h1>You have no payment Method yet !</h1>
            <a href="{{url('addNewCard')}}" class="bl mt50 p10" style="border-radius:20px !important">Add a payment method <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v240H160v240h400v80H160Zm0-480h640v-80H160v80ZM760-80v-120H640v-80h120v-120h80v120h120v80H840v120h-80ZM160-240v-480 480Z"/></svg> </a>

        </div>
        @endif

    </div>
    <script>
        function setAsDefault(id) {
            $.ajax({
                url: "{{ url('se_card_as_defaul') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: (res) => {
                    console.log(res);
                    if (res == "Done") {
                        window.location.reload();
                    }

                },
                error: (res) => {
                    console.log(res);

                }
            })
        }

        function delete_card_payment(id) {
            $.ajax({
                url: "{{ url('delete_paymentMethod') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                success: (res) => {
                    console.log(res);
                    if (res == "Done") {
                        window.location.reload();
                    }

                },
                error: (res) => {
                    console.log(res);

                }
            })
        }
    </script>
@endsection
