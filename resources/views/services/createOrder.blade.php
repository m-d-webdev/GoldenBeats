@extends('master')
@section('links')
    <link rel="stylesheet" href="https://lottie.host/6354e887-dfc2-4ab8-a328-4234079012f1/88vrsnMBLw.lottie">
    <link rel="stylesheet" href="{{ asset('css/createOrder.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fastFoodOrdring.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('title', 'Create Order ')
@section('content')
    <div class="c-s-s p15" style="width:100%">
        <h1 class="r-c-c mb20"><svg class="mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160Zm40 200q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
            </svg>Create an order </h1>
        @isset($defaultaddress)
            <div class="cnt_etap_creating_order c-s-s p20 ml14 mt20">
                <p class="c-b  r-s-c mb20"><svg class="f-b mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path
                            d="M480-301q99-80 149.5-154T680-594q0-90-56-148t-144-58q-88 0-144 58t-56 148q0 65 50.5 139T480-301Zm0 101Q339-304 269.5-402T200-594q0-125 78-205.5T480-880q124 0 202 80.5T760-594q0 94-69.5 192T480-200Zm0-320q33 0 56.5-23.5T560-600q0-33-23.5-56.5T480-680q-33 0-56.5 23.5T400-600q0 33 23.5 56.5T480-520ZM200-80v-80h560v80H200Zm280-520Z" />
                    </svg>Shipping address</p>

                <div class="c-s-s mt10 ml20">
                    <p> Default shipping address :</p>
                    <span class="r-c-c mt10 p20">
                        <h1 class="c-b mr10 innerChoosedAddres">{{ Auth::user()->name }} , | {{ $defaultaddress->phone }} ,
                            {{ $defaultaddress->streetAddress }} , {{ $defaultaddress->city }} , {{ $defaultaddress->state }}
                        </h1><svg class="f-b" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                            width="24px" fill="#000000">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                        </svg>
                    </span>
                </div>
                <button class="bl mt10 ml20 p10" style="border-radius:20px">Update this address<svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                    </svg></button>
                <button class="cl mt50 " id="btnUseOtherAddress">Use another one <svg xmlns="http://www.w3.org/2000/svg"
                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                    </svg></button>

                <div id="listAllAddress" class="listAllAddress c-s-s- mt20 p10">
                    @foreach (Auth::user()->address as $item)
                        @if ($item->id != $defaultaddress->id)
                            <span class="r-c-c mt20 choosedAddre"><svg class="mr10" xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="M200-80v-760h640l-80 200 80 200H280v360h-80Zm80-440h442l-48-120 48-120H280v240Zm0 0v-240 240Z" />
                                </svg> {{ $item->phone }} , {{ $item->streetAddress }} , {{ $item->city }} ,
                                {{ $item->state }}

                                <svg class="svgDoneAddres" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="m438-426 198-198-57-57-141 141-56-56-57 57 113 113Zm42 240q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                                </svg>
                                <button class="bl ml20 p10" onclick="changeAddress(this , {{ $item }})">Choose this
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path d="M400-304 240-464l56-56 104 104 264-264 56 56-320 320Z" />
                                    </svg></button>
                            </span>
                            <span class="r-c-c mt20 choosedAddre"><svg class="mr10" xmlns="http://www.w3.org/2000/svg"
                                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="M200-80v-760h640l-80 200 80 200H280v360h-80Zm80-440h442l-48-120 48-120H280v240Zm0 0v-240 240Z" />
                                </svg> {{ $item->phone }} , {{ $item->streetAddress }} , {{ $item->city }} ,
                                {{ $item->state }}

                                <svg class="svgDoneAddres" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="m438-426 198-198-57-57-141 141-56-56-57 57 113 113Zm42 240q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                                </svg>
                                <button class="bl ml20 p10" onclick="changeAddress(this , {{ $item }})">Choose this
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path d="M400-304 240-464l56-56 104 104 264-264 56 56-320 320Z" />
                                    </svg></button>
                            </span>
                        @endif
                    @endforeach
                </div>

                <button class="btnNextTOPay bl" onclick="NextStip()"> Next <svg xmlns="http://www.w3.org/2000/svg"
                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                    </svg></button>
            </div>
            <script>
                let chooseAddress = {{ $defaultaddress->id }}
                let btnUseOtherAddress = document.getElementById("btnUseOtherAddress");
                let listAllAddress = document.getElementById("listAllAddress");
                btnUseOtherAddress.onclick = () => {
                    listAllAddress.style.display = "flex";
                }

                function changeAddress(e, addressDate) {
                    document.querySelectorAll(".choosedAddre").forEach(element => {
                        element.classList.remove("active")
                    });
                    chooseAddress = addressDate.id;
                    e.parentNode.classList.add('active');
                }

                function NextStip() {
                    $.ajax({
                        url: "{{ url('nextToPaymentMethod') }}",
                        method: 'post',
                        data: {
                            address_id: chooseAddress,
                            _token: '{{ csrf_token() }}'
                        },
                        success: (res) => {
                            if (res == "DONE") {
                                window.location.href = "../create_command/select_payment_method"
                            }

                        },
                        error: (er) => {
                            console.log(er);

                        }
                    })
                }
            </script>
        @else
            @if (!Auth::user()->address()->exists())
                <div style="width:100%;" class="c-c-c mt100">
                    <h1>No address found! Please add an address to proceed with your order.</h1>

                    <a href="{{ url('addAddressForOrder') }}" class=" mt20 bl br20 p10 pl20 pr20">Add an address <svg
                            version="1.1" viewBox="0 0 2048 2048" width="128" height="128"
                            xmlns="http://www.w3.org/2000/svg">
                            <path transform="translate(1007,64)"
                                d="m0 0h42l37 2 33 3 29 4 41 8 32 8 30 9 37 13 39 16 34 16 22 12 23 13 17 11 16 10 17 12 19 14 13 10 16 13 14 12 8 7 15 14 33 33 7 8 11 12 9 11 11 13 14 19 13 18 10 15 12 19 9 15 12 21 12 23 12 25 10 24 10 26 12 35 12 44 8 36 7 41 4 31 2 24 1 23v41l-2 31-4 26-9 42-8 29-10 31-11 30-10 26-12 29-10 22-7 14-11 23-8 16-18 35-6 10-13 24-15 26-11 19-9 14-16 26-8 12-9 14-5 9-16 24-8 11-9 14-8 12-8 11-9 13-10 15-11 16-12 16-14 19-8 12-10 13-7 9-9 12-10 13-12 17-13 16-9 11-11 14-14 18-12 16-14 17-12 14-9 11-10 12-9 11-11 14-22 26-13 15-10 11-7 8-11 13-9 11-11 13-8 10-9 10-7 8-9 10-7 8-11 12-5 6h-2l-2 4-7 7-7 8-12 13-1 2h-2l-2 4-10 10-7 8-8 8-1 2h-2l-2 4-20 20-8 7-10 7-5 2h-7l-8-3-11-7-30-30-7-8-8-8-7-8-15-16-7-8-14-15-11-12-10-11-9-11-11-12-9-11-9-10-9-11-8-9v-2h-2l-9-11-13-15-9-10-9-11-9-10-18-22-11-13-18-22-14-17-11-13-13-17-13-16-12-16-13-16-10-13-32-42-12-16-14-19-12-17-26-36-22-32-12-17-34-51-12-19-14-22-15-24-13-22-14-24-14-25-13-23-20-39-13-26-11-23-15-33-18-45-12-33-12-39-7-26-7-35-4-29-1-9-1-21v-28l2-43 4-38 10-56 7-30 12-43 15-42 12-29 10-22 16-32 12-21 11-18 6-10 18-27 10-13 6-9 13-17 7-9 9-11 9-10 3-4h2l2-4 12-12 7-8 20-20 8-7 8-8 8-7 14-12 14-11 16-12 34-24 17-11 17-10 21-12 27-14 25-12 24-10 28-11 38-12 39-10 31-7 34-6 36-4 31-2zm-13 64-41 3-49 7-36 7-41 11-36 12-24 9-19 8-12 6-23 11-23 12-20 12-21 13-16 11-11 8-11 9-16 12-11 9-12 11-9 7v2l-4 2-9 9-4 3v2l-4 2-4 4v2h-2v2h-2v2h-2v2h-2l-7 8-15 16-9 11-7 8-13 17-12 17-13 18-9 14-12 20-5 8-6 11-18 36-14 32-8 21-10 27-8 28-10 38-6 31-5 42-3 33-1 16v42l3 28 4 26 6 28 9 31 13 38 8 21 12 29 9 21 15 33 18 36 12 22 13 24 11 19 15 26 14 23 15 24 12 19 9 14 40 60 16 23 14 20 13 18 10 14 24 32 14 19 14 18 10 13 12 16 16 21 14 18 13 16 13 17 10 12 10 13 12 14 9 11 11 13 11 14 8 9 9 11 14 17 12 14 11 13 10 11 9 11 11 12 7 8 12 14 10 11 7 8 9 10 9 11 16 17 11 12 12 14 11 12 7 8 4 3 4-1 5-5 12-13 13-14 7-8 9-10 14-15 13-15 9-10 7-8 8-9 9-11 13-14 9-11 8-9v-2h2l9-11 5-6v-2h2l6-7v-2h2l9-11 11-13 7-8 8-10 14-17 13-16 11-14 10-11 11-14 14-17 26-34 11-14 7-9 9-12 14-18 21-28 10-13 8-11 8-10 7-10 11-15 10-14 9-13 14-20 16-24 7-10 10-15 11-17 10-15 9-14 12-19 30-50 12-21 9-16 14-26 16-30 11-23 18-38 10-24 8-20 14-38 11-35 6-22 7-38 5-41v-44l-3-44-3-28-8-43-7-30-12-41-14-40-13-30-11-23-13-26-11-19-12-19-8-12-11-16-13-18-10-13-9-11-11-13-12-13-14-15-20-20-8-7-11-10-22-18-13-10-16-12-19-13-19-12-25-15-16-9-25-13-34-15-28-11-30-10-44-12-32-7-34-5-36-4-31-2z" />
                            <path transform="translate(1008,420)"
                                d="m0 0h30l17 3 19 7 15 9 13 10 8 8 11 15 9 16 6 17 3 15 1 12v138l-1 15 2-1 44-1h100l22 2 17 4 17 7 14 9 11 9 8 7 10 13 8 14 6 13 5 16 2 17v10l-2 18-6 18-8 16-7 11-9 11-11 11-14 10-14 7-19 5-21 3-16 1-35 1-103 1v144l-2 22-4 17-5 12-6 11-8 12-12 13-10 9-14 9-20 8-20 5-19 1-21-2-17-5-16-8-11-7-13-12-7-7-9-13-8-14-6-15-4-18-2-20v-144l-23 1h-113l-22-1-18-3-18-6-15-8-13-10-13-13-9-13-8-14-6-15-5-18-1-9v-11l3-20 7-21 8-15 13-17 10-10 13-10 16-9 9-4 16-4 22-2h146v-37l1-108 2-21 5-20 8-17 8-12 7-9 9-10 13-10 13-8 14-6 16-4z" />
                        </svg>
                    </a>

                </div>
            @endif
        @endisset
        @isset($defaultPaymentMethod)
            <div class="cnt_etap_creating_order c-s-s p20 ml14 mt20">
                <p class="c-b  r-s-c mb20"><svg class="f-b mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path
                            d="M880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720Zm-720 80h640v-80H160v80Zm0 160v240h640v-240H160Zm0 240v-480 480Z" />
                    </svg>Payment Method</p>
                <div class="c-s-s mt10 ml20">
                    <p> Default Payment Method :</p>
                    <div class="creditCardElement active mt20 ml20">
                        <svg class="svgDoneCardPa f-b" xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                        </svg>
                        <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                        <p class="cardNumber">**** **** ****
                            {{ substr(Crypt::decrypt($defaultPaymentMethod->card_number), -4) }}
                        </p>
                        <p class="expiration_dateELME">
                            {{ $defaultPaymentMethod->expiration_date }}</p>
                        <h1 class="">{{ $defaultPaymentMethod->card_name }}
                        </h1>

                        @switch($defaultPaymentMethod->card_type)
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
                                <img src="{{ url('media/E-Ticket-removebg-preview.png') }}" alt=""
                                    class="creditCardTypeImg">
                                <p class="cardUserName ml14">Amercan Express</p>
                            @break

                            @case('Discover')
                                <img src="{{ url('media/Discover-removebg-preview.png') }}" alt=""
                                    class="creditCardTypeImg">
                                <p class="cardUserName ml14">Discover</p>
                            @break
                        @endswitch

                    </div>
                </div>
                <button class="cl mt50 " id="btnUseOtherAddress" onclick="open_listCards()">Use another one <svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                    </svg></button>

                @if (count(Auth::user()->paymenth_method) > 1)
                    <div class="litOfOtherCards r-w" style="width:100%">
                        @foreach (Auth::user()->paymenth_method as $item)
                            @if ($item->id != $defaultPaymentMethod->id)
                                <div class="creditCardElement mt20 ml20 ">
                                    <svg class="svgDoneCardPa f-b" xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                    </svg>
                                    <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                                    <p class="cardNumber">**** **** ****
                                        {{ substr(Crypt::decrypt($item->card_number), -4) }}
                                    </p>
                                    <p class="expiration_dateELME">
                                        {{ $item->expiration_date }}</p>
                                    <h1 class="">{{ $item->card_name }}
                                    </h1>
                                    <button class="bl btnUseCard" onclick="useCard(this ,{{ $item->id }})">Use this card
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#000000">
                                            <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                                        </svg></button>

                                    @switch($item->card_type)
                                        @case('Visa')
                                            <img src="{{ url('media/V-removebg-preview.png') }}" alt=""
                                                class="creditCardTypeImg">
                                            <p class="cardUserName ml14">Visa</p>
                                        @break

                                        @case('MasterCard')
                                            <img src="{{ url('media/Mastercard_logo_svg_free_download-removebg-preview.png') }}"
                                                alt="" class="creditCardTypeImg">
                                            <p class="cardUserName ml14">Master card</p>
                                        @break

                                        @case('AmEx')
                                            <img src="{{ url('media/E-Ticket-removebg-preview.png') }}" alt=""
                                                class="creditCardTypeImg">
                                            <p class="cardUserName ml14">Amercan Express</p>
                                        @break

                                        @case('Discover')
                                            <img src="{{ url('media/Discover-removebg-preview.png') }}" alt=""
                                                class="creditCardTypeImg">
                                            <p class="cardUserName ml14">Discover</p>
                                        @break
                                    @endswitch

                                </div>
                            @endif
                        @endforeach

                    </div>
                @endif

                <button class="btnNextTOPay bl mt50" onclick="NextStip()"> Next <svg xmlns="http://www.w3.org/2000/svg"
                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                    </svg></button>
            </div>
            <script>
                let cardId = {{ $defaultPaymentMethod->id }}

                function useCard(e, id) {
                    document.querySelectorAll(".creditCardElement").forEach(el => el.classList.remove("active"))
                    e.parentNode.classList.add("active")
                    cardId = id
                }

                function open_listCards() {
                    document.querySelector(".litOfOtherCards").style.display = "flex"
                }

                function NextStip() {
                    $.ajax({
                        url: "{{ url('nextToChoseQauntity') }}",
                        method: 'post',
                        data: {
                            cardId: cardId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: (res) => {
                            if (res == "DONE") {
                                window.location.href = "../create_command/select_quantity"
                            }

                        },
                        error: (er) => {
                            console.log(er);

                        }
                    })
                }
            </script>
        @else
            @if (!Auth::user()->paymenth_method()->exists())
                <div style="width:100%;" class="c-c-c mt100">
                    <h1>No payment method detected! Please add a payment method to complete your order</h1>

                    <a href="{{ url('addCardForOrder') }}" class=" mt20 bl br20 p10 pl20 pr20">
                        add a payment method
                        <svg version="1.1"
                            viewBox="0 0 2048 2048" width="128" height="128" xmlns="http://www.w3.org/2000/svg">
                            <path transform="translate(259,107)"
                                d="m0 0h1529l32 3 26 5 20 6 20 8 26 13 19 12 16 12 13 11 16 16 7 8 12 15 14 22 12 23 9 19 9 25 6 18 1 6h2v1038l-4 2-12 14-10 8-16 8-9 3-11-1-12-4-12-8-18-18-4-15-1-9-1-27v-566h-1753l-77-1v559l1 37 3 29 4 17 6 16 8 16 7 11 10 13 18 18 14 10 21 12 16 7 15 4 25 4 33 2 151 1h657l42 1 10 2 14 7 7 6 8 11 5 13 1 5v17l-3 11-7 11-9 10-7 7-11 4-9 1-42 1h-820l-39-2-28-4-23-6-19-7-20-9-18-10-12-8-11-8-13-11-12-11-13-13-9-11-13-17-12-19-10-19-10-25-7-19-5-16-2-2v-1071l3-7 10-29 13-33 12-22 9-14 8-12 12-14 7-8 14-14 10-8 11-9 15-10 21-12 26-12 21-7 29-6 22-3zm158 107-133 1-37 2-25 4-15 5-21 11-14 10-14 12-11 12-12 16-9 16-7 15-7 20-3 22-1 10-1 36v240l396 1h1433l1-1 1-21v-256l-3-25-4-17-6-15-8-16-7-12-10-13-14-15-13-10-13-8-14-8-21-8-11-3-26-3-22-1-100-1z" />
                            <path transform="translate(1658,1186)"
                                d="m0 0h21l10 3 12 6 11 10 8 11 4 13v280h258l22 1 10 3 10 6 8 7 7 8 5 5v2h2l2 3v38l-4 2-9 10-14 14-9 5-13 2-26 1h-248l-1 249-1 28-2 10-6 11-8 10-10 8-10 4-12 2-15-1-16-5-8-6-11-11-6-11-2-9-1-14-1-46-1-144 1-75-21 1-252-1-17-3-9-7-8-8-9-12-5-10-1-5v-15l3-12 7-12 8-10 8-7 12-6h282l1-5 1-266 2-14 6-12 9-11 10-8 12-6z" />
                            <path transform="translate(515,1077)"
                                d="m0 0h145l40 1 16 2 10 4 10 7 9 10 5 10 3 11v15l-2 10-4 9-7 10-13 13-9 3-20 2-23 1-102 1h-34l-55-1-16-2-10-4-10-9-8-10-7-12-2-7v-19l4-12 6-10 8-10 7-6 10-5 4-1z" />
                            <path transform="translate(0,317)" d="m0 0h1v7h-1z" />
                            <path transform="translate(2047,307)" d="m0 0 1 4-2-1z" />
                            <path transform="translate(2047,325)" d="m0 0" />
                            <path transform="translate(2047,1541)" d="m0 0" />
                            <path transform="translate(2044,1374)" d="m0 0" />
                            <path transform="translate(2046,1373)" d="m0 0" />
                            <path transform="translate(2047,1372)" d="m0 0" />
                        </svg>
                    </a>

                </div>
            @endif
        @endisset
        @isset($command_items)
            <div class="cnt_etap_creating_order c-s-s p20 ml14 mt20">
                <p class="c-b  r-s-c mb20"><svg class="f-b mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path d="M120-280v-80h560v80H120Zm80-160v-80h560v80H200Zm80-160v-80h560v80H280Z" />
                    </svg>Qnautity</p>
                <span class="r-c-c btnConfirmCommand">
                    <p>TOTALE PRICE :</p>
                    <h1 class="c-b ml10 totalePrice">{{ $totalePrice }} MAD</h1>
                    <a href="{{ url('goTOConfirmCommand') }}" class="ml20 bl">Go to order confirmation <svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                        </svg></a>
                </span>

                <div class="r-w-p-s p20 mt50 " style="width:100%">

                    @foreach ($command_items['items'] as $i)
                        <div class="burger-card">
                            <div class="cntArticleInfo">
                                <h1>{{ $i['food']->name }}</h1>
                                <p>{{ $i['food']->description }}</p>
                                <h2 class="price_food"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                        viewBox="0 -960 960 960" width="24px" fill="#000000">
                                        <path
                                            d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z" />
                                    </svg>
                                    {{ $i['food']->price }} MAD</h2>
                                <div class="spAlreadyInTHeMeal">
                                    <span class="r-c-c mb20">
                                        <p>Quantity : </p>
                                        <h2 class="ml10">{{ $i['quantity'] }} items</h2>

                                    </span>
                                    <button class="btnAddToDish p10" id="btnAddToMeal"
                                        onclick="IncreaseQuantity( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#000000">
                                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                        </svg>
                                        <p>Increase quantity</p>
                                    </button>
                                    @if ($i['quantity'] > 1)
                                        <button class="btnDecreaseQu"
                                            onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }} )">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                                width="24px" fill="#000000">
                                                <path d="M200-440v-80h560v80H200Z" />
                                            </svg>
                                            <p>Decrease quantity</p>
                                        </button>
                                    @else
                                        <button class="bg-r btnDecreaseQu"
                                            onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }}  )">
                                            <p class="c-l">Delete</p> <svg class="ml10"
                                                xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                                width="24px" fill="#000000">
                                                <path
                                                    d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                            </div>
                            <img src="{{ asset($i['food']->image) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

            <script>
                const IncreaseQuantity = (e, id) => {

                    e.querySelector('#btnAddToMeal').innerHTML = '<div class="loader2"></div>'
                    $.ajax({
                        method: "POST",
                        url: "{{ url('increaseCommandQuantity') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: (res) => {
                            document.querySelector(".totalePrice").innerText = res.newTotalePrice + " MAD";
                            e.innerHTML = res.newElem
                        },
                        error: (err) => {
                            console.log(err);

                        }
                    })
                }
                const decreaseQuan = (e, id) => {
                    e.querySelector('.btnDecreaseQu').innerHTML = '<div class="loader2"></div>'
                    $.ajax({
                        method: "POST",
                        url: "{{ url('decreaseCommandQuantity') }}",
                        data: {
                            id: id,
                            _token: "{{ csrf_token() }}"
                        },
                        success: (res) => {
                            if (res == "NO MORE ITEMS;") {
                                window.location.href = "{{ url('popular_meals') }}";

                            } else {
                                document.querySelector(".totalePrice").innerText = res.newTotalePrice + " MAD";
                                if (res?.deleted == true) {
                                    e.remove()
                                } else {
                                    e.innerHTML = res.newElem

                                }
                            }


                        },
                        error: (err) => {
                            console.log(err);

                        }
                    })
                }
            </script>
        @endisset
        @isset($FINALE_COMMAND)
            <div class="c-p-c" style="width: 100% ; margin:auto; height:800px">
                <h1>Finalize and confirm your order.</h1>
                <div class="commandCard r-p-s mt20" style="width: 100%  ; height:700px">
                    <div class="c-s-s" style="width: 50%">
                        <span class="mt29 p5 r-c-c">Total price : <h1 class="ml10 c-b">{{ $totalePrice }} MAD</h1>
                        </span>

                        <span class="mt20 p15 c-s-s">Payment method used :
                            <div class="creditCardElement mt20 ml20">
                                <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                                <p class="cardNumber ">**** **** ****
                                    {{ substr(Crypt::decrypt($FINALE_COMMAND['payment_method_info']->card_number), -4) }}
                                </p>
                                <p class="expiration_dateELME">
                                    {{ $FINALE_COMMAND['payment_method_info']->expiration_date }}</p>
                                <h1 class="">{{ $FINALE_COMMAND['payment_method_info']->card_name }}
                                </h1>
                                @switch($FINALE_COMMAND['payment_method_info']->card_type)
                                    @case('Visa')
                                        <img src="{{ url('media/V-removebg-preview.png') }}" alt=""
                                            class="creditCardTypeImg">
                                        <p class="cardUserName ml14">Visa</p>
                                    @break

                                    @case('MasterCard')
                                        <img src="{{ url('media/Mastercard_logo_svg_free_download-removebg-preview.png') }}"
                                            alt="" class="creditCardTypeImg">
                                        <p class="cardUserName ml14">Master card</p>
                                    @break

                                    @case('AmEx')
                                        <img src="{{ url('media/E-Ticket-removebg-preview.png') }}" alt=""
                                            class="creditCardTypeImg">
                                        <p class="cardUserName ml14">Amercan Express</p>
                                    @break

                                    @case('Discover')
                                        <img src="{{ url('media/Discover-removebg-preview.png') }}" alt=""
                                            class="creditCardTypeImg">
                                        <p class="cardUserName ml14">Discover</p>
                                    @break
                                @endswitch

                            </div>
                        </span>
                        <span class="mt20 p15 c-s-s">
                            Shipping Address :
                            <p class="c-b mt20 ml20 r-c-c" style="font-weight: 600">
                                {{ $FINALE_COMMAND['address_info']->phone }} ,
                                {{ $FINALE_COMMAND['address_info']->streetAddress }} ,
                                {{ $FINALE_COMMAND['address_info']->city }} ,
                                {{ $FINALE_COMMAND['address_info']->zip }} , {{ $FINALE_COMMAND['address_info']->state }}</p>
                        </span>
                    </div>
                    <div class="ListElmeOrder c-p-s ml10">
                        <p class="mb20">Order items</p>
                        @foreach ($FINALE_COMMAND['items'] as $i)
                            <div class="cardOrderElem r-s-c mt20" style="width: 100% ; ">
                                <img src="{{ asset($i['food']->image) }}" class="mr20" alt="">
                                <div class="c-s-s p10 ">
                                    <h1 style="color:var( --gold-color) ; font-size:20px !important;" class="mt20">
                                        {{ $i['food']->name }}</h1>
                                    <span class="r-c-c">
                                        price : <h1 class="ml20">{{ $i['food']->price }} MAD</h1>
                                    </span>

                                    <span class="mt20 r-c-c">Quantity : <h1 class="c-b">{{ $i['quantity'] }} items
                                        </h1></span>
                                    <span class=" mt20 r-c-c">Totale Price for this item : <h1 class=" c-b">
                                            {{ $i['food']->price * $i['quantity'] }} MAD</h1></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ url('store_command') }}" class="btnConfrimOrder mt100 mb20">Confirm <svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                    </svg></a>
            </div>
        @endisset
        @isset($commmandAddedSuccess)
            <div class="mt100 p20 c-p-c " style="margin:auto ; height:700px">
                <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player src="https://lottie.host/6354e887-dfc2-4ab8-a328-4234079012f1/88vrsnMBLw.lottie"
                    background="transparent" speed="1" style="width: 200px; height: 200px" autoplay></dotlottie-player>
                <h1 class="mt20" style="font-size: 25px; text-align:center; line-height:2 ; width:600px">Your order has been
                    submitted successfully and will be delivered to you as soon as possible.</h1>

                <a href="{{ url('cancelBuilding') }}" class="mt20 bl btnConfrimOrder"><svg class="mr15"
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                    </svg>Go back to main page</a>
            </div>
        @endisset
    </div>

@endsection
