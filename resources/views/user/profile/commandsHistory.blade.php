@extends('user.profile.master_profile')
@section('contentProfile')
    @php
        use Carbon\Carbon;
    @endphp
    <div class="c-s-s p10" style="width:100%">
        <p>Order History </p>
        @if (count($all) > 0)
            <div class="listAllOrdes mt20 c-p-s" style="width:100%">
                @foreach ($all as $item)
                    <div class="commandCard r-p-s mt20" style="width: 100%  ; height:700px">
                        <div class="c-s-s" style="width: 50%">
                            <span class="r-c-c p5">Command identifyer : <p class="ml10 c-b">{{ $item->command_id }}</p></span>
                            <span class="mt29 p5 r-c-c">Status : <h1 class="ml10 c-b">{{ $item->status }}</h1></span>
                            <span class="mt29 p5 r-c-c">Total price : <h1 class="ml10 c-b">{{ $item->total_price }} MAD</h1>
                            </span>
                            <span class="mt29 p5 r-c-c">Ordered at : <p class="ml10 c-b">
                                    {{ Carbon::parse($item->created_at) }}
                                </p>
                            </span>
                            <span class="mt20 p15 c-s-s">Payment method used :
                                <div class="creditCardElement mt20 ml20">
                                    <img class="emvImg" src="{{ url('media/emv-removebg-preview.png') }}" alt="">
                                    <p class="cardNumber ">**** **** ****
                                        {{ substr(Crypt::decrypt($item->payment_method->card_number), -4) }}
                                    </p>
                                    <p class="expiration_dateELME">
                                        {{ $item->payment_method->expiration_date }}</p>
                                    <h1 class="">{{ $item->payment_method->card_name }}
                                    </h1>
                                    @switch($item->payment_method->card_type)
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
                                <p class="c-b mt20 ml20 r-c-c" style="font-weight: 600">{{ $item->address->phone }} ,
                                    {{ $item->address->streetAddress }} , {{ $item->address->city }} ,
                                    {{ $item->address->zip }} , {{ $item->address->state }}</p>
                                <button class="bl mt20 ml20 ">Update shipping address <svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="m482-200 114-113-114-113-42 42 43 43q-28 1-54.5-9T381-381q-20-20-30.5-46T340-479q0-17 4.5-34t12.5-33l-44-44q-17 25-25 53t-8 57q0 38 15 75t44 66q29 29 65 43.5t74 15.5l-38 38 42 42Zm165-170q17-25 25-53t8-57q0-38-14.5-75.5T622-622q-29-29-65.5-43T482-679l38-39-42-42-114 113 114 113 42-42-44-44q27 0 55 10.5t48 30.5q20 20 30.5 46t10.5 52q0 17-4.5 34T603-414l44 44ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z" />
                                    </svg></button>
                            </span>
                        </div>
                        <div class="ListElmeOrder c-p-s ml10">
                            <p class="mb20">Order items</p>
                            @foreach ($item->items as $i)
                                <div class="cardOrderElem r-s-c mt20" style="width: 100% ; ">
                                    <img src="{{ asset($i->food->image) }}" class="mr20" alt="">
                                    <div class="c-s-s p10 " >
                                        <h1 style="color:var( --gold-color) ; font-size:20px !important;" class="mt20">{{ $i->food->name}}</h1>
                                        <span class="r-c-c">
                                            price : <h1 class="ml20"> {{$i->food->price}} MAD</h1>
                                        </span>

                                        <span class="mt20 r-c-c">Quantity : <h1 class="c-b ml10" > {{ $i->quantity }} items
                                            </h1></span>
                                        <span class=" mt20 r-c-c" >Totale Price for this item :  <h1 class=" c-b ml10"> {{$i->food->price * $i->quantity}} MAD</h1></span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="c-c-c mt50" style="margin: auto">
                <h1>You haven't placed any orders yet!</h1>
                <a href="{{ url('popular_meals') }}" class="bl mt50">Start Ordering <svg xmlns="http://www.w3.org/2000/svg"
                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                        <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                    </svg></a>
            </div>
        @endif

    </div>
@endsection
