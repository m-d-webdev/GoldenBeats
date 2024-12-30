@extends('services.fast_food_rdring.master1')
@section('content_service')
    <div class="cntCombos">
      
        @foreach ($combos as $i)
            <div class="burger-card">
                <div class="cntArticleInfo">
                    <h1>{{ $i->name }}</h1>
                    <p>{{ $i->description }}</p>
                    <h2 class="price_food"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                            width="24px" fill="#000000">
                            <path
                                d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z" />
                        </svg>{{ $i->price }} MAD</h2>
                    @if (session('isBuilding') == true)
                        @if (array_key_exists($i->id, session('meal')))
                            <span class="spAlreadyInTHeMeal">
                                <p> in the meal ( {{ session('meal')[$i->id]['quantity'] }} items )</p>
                                <button class="btnAddToDish" id="btnAddToMeal"
                                    onclick="setVariedMeal( this.parentNode.parentNode.parentNode ,[{{ $i->id }} , {{ $i->price }}] )">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                                    </svg>
                                    <p>Increase quantity</p>
                                </button>
                                <button class="btnDecreaseQu"
                                    onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,[{{ $i->id }} , {{ $i->price }}] )">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path d="M200-440v-80h560v80H200Z" />
                                    </svg>
                                    <p>Decrease quantity</p>
                                </button>
                            </span>
                        @else
                            <button class="btnOrder addTOMeal" id="btnAddToMeal"
                                onclick="setVariedMeal( this.parentNode.parentNode ,[{{ $i->id }} , {{ $i->price }}] )">
                                <svg xmlns="http://www.w3.org/2000/svg" class="iconsNotdIn" viewBox="0 -960 960 960">
                                    <path d="M440-440H200v-80h240v-240h80v240h240v80H520v240h-80v-240Z" />
                                </svg>
                                <p>Add to meal</p>
                            </button>
                        @endif
                    @else
                        <a href="{{ route('initializeOrdering') . '?' . http_build_query(['data' => ['id' => $i->id, 'quantity' => 1, 'price' => $i->price]]) }}"
                            class="btnOrder">
                            <p>Order Now</p>
                            <svg version="1.1" viewBox="0 0 2048 2048" class="f-l ml15" xmlns="http://www.w3.org/2000/svg">
                                <path transform="translate(313)" d="m0 0h1418l1 3 23 10 16 8 15 9 14 11 12 11 12 14 10 15 8 15 8 20 4 15 2 19 1 23 1 166v966l-1 658-1 22-2 12-8 16-9 12-4 5-11 7-11 6-6 3h7l6-2-2 4h-47l-19-10-14-9-19-12-16-11-22-15-10-7-32-22-25-17-14-10-48-32-19-13-21-15-7 1-9 8-16 11-11 8-17 12-8 6-15 11-19 13-36 26-17 12-16 11-13 10-19 14-23 15-17 10-8 5h-35l-19-11-14-10-11-9-10-9-11-9-13-12-10-9-8-7-14-12-12-11-11-9-11-10-11-9-15-13-12-11-8-7-4-4-9-1-8 6-11 10-9 7-12 11-11 9-16 15-14 12-10 9-11 9-14 12-10 9-15 13-10 9-8 7-12 9-21 13-1 3h-38l-17-9-21-13-22-15-15-11-14-10-34-25-18-13-14-10-17-12-18-13-19-13-10-8-14-10-10-7-6-3h-6l-19 14-17 12-17 11-22 15-20 14-44 29-10 7-15 10-17 12-20 14-17 11-21 13-10 6-7 4h-39v-2l-4-2-11-9-10-7-10-9-7-8-6-14-2-15-1-20-1-53v-1464l1-282 2-24 3-15 6-18 11-22 10-15 7-9 12-14 13-11 13-9 21-12 24-11h2zm1416 1m-1256 140-115 1-16 1-6 3-1 4-1 16-1 37-1 115v1271l1 251 6-2 17-12 12-9 13-9 31-21 18-13 19-13 23-16 20-13 15-9 15-7 9-2h13l15 3 16 7 17 10 10 7 17 12 14 10 19 14 16 11 18 13 19 14 17 12 18 13 16 12 13 9 9 6 19 14 5 3 4-2 14-14 11-9 13-12 10-9 11-9 13-12 8-7 14-12 14-13 8-7 11-9 14-13 11-9 12-10 17-12 16-8 16-3 20 2 15 6 14 8 16 13 11 9 13 12 14 12 11 10 8 7 14 12 10 9 8 7 10 9 13 11 10 9 11 9 12 11 8 7 7 6h5l13-11 14-9 17-12 16-12 14-10 36-26 19-14 28-20 12-9 17-12 22-15 14-9 17-8 7-2h19l16 5 16 8 14 8 24 16 16 11 25 17 13 9 18 12 19 13 13 10 24 16h1v-1627l-1-45-2-20-3-3-10-1-28-1-166-1z"/>
                                <path transform="translate(697,379)" d="m0 0h662l38 1 23 2 13 4 11 6 9 7 7 7 7 10 5 11 4 14v21l-5 16-7 13-11 13-5 5-8 6-14 5-12 2-21 1-638 1h-109l-18-1-14-4-11-7-12-11-10-12-7-14-4-15v-14l3-14 5-13 7-11 13-13 16-10 10-3 19-2z"/>
                                <path transform="translate(636,761)" d="m0 0h764l22 2 14 5 11 7 10 9 8 10 8 16 3 12v20l-5 16-6 12-9 12-5 6-11 8-14 5-16 2-30 1h-338l-340 1h-60l-19-2-11-4-11-7-12-12-9-12-6-12-4-17v-14l3-12 5-13 8-12 8-9 11-8 11-6 11-3z"/>
                                <path transform="translate(641,1142)" d="m0 0h368l25 1 14 3 16 8 12 11 8 10 8 16 4 16v10l-3 14-5 12-7 13-11 12-8 7-11 5-13 3-19 2-27 1h-349l-17-2-11-3-10-5-10-9-10-11-8-13-5-14-2-10v-14l6-20 6-11 7-9 7-7 10-7 13-6 7-2z"/>
                                <path transform="translate(1736)" d="m0 0h18v2l-3 1-2-1 1 4-13-4z"/>
                                <path transform="translate(282,2046)" d="m0 0h2v2l-3-1z"/>
                                <path transform="translate(1260,2047)" d="m0 0 3 1z"/>
                                <path transform="translate(786,2047)" d="m0 0 2 1z"/>
                                <path transform="translate(1766,2047)" d="m0 0"/>
                                <path transform="translate(238,2047)" d="m0 0"/>
                                <path transform="translate(232,2047)" d="m0 0"/>
                                <path transform="translate(1754,5)" d="m0 0"/>
                                </svg>
                        </a>
                    @endif

                </div>
                <img src="{{ asset($i->image) }}" alt="">
            </div>
        @endforeach
    </div>

        <script>
            

            const setTotalePrice = (totale = 0, countItems = 0) => {
                    document.querySelector(".totalePriceForMeal").innerHTML = totale + " $";
                    document.querySelector(".countItemsOnMeal").innerHTML = `( for ${countItems} items )`;
                }

                function setVariedMeal(e, id) {
                    e.querySelector("#btnAddToMeal").innerHTML = "<div class='loader2'></div>";
                    $.ajax({
                        url: "/add_item_to_meal",
                        method: "POST",
                        data: {
                            id: id[0],
                            price: id[1],
                            _token: '{{ csrf_token() }}'
                        },
                        success: (res) => {
                            console.log(res);
                            e.innerHTML = res.newElem;
                            setTotalePrice(res.totalePrice, res.count)
                        },
                        error: (er) => {
                            console.log("Error => ", er);
                        }
                    });
                   
                }
                function decreaseQuan(e, id) {
                    e.querySelector(".btnDecreaseQu").innerHTML = "<div class='loader2'></div>";
                    $.ajax({
                        url: "/decease_item_from_meal",
                        method: "POST",
                        data: {
                            id: id[0],
                            _token: '{{ csrf_token() }}'
                        },
                        success: (res) => {
                            console.log(res);
                            e.innerHTML = res.newElem;
                            setTotalePrice(res.totalePrice, res.count)
                        },
                        error: (er) => {
                            console.log("Error => ", er);
                        }
                    });
                    
                }
        </script>

@endsection
