@extends('services.fast_food_rdring.master1')

@section('content_service')
    @if (count($data) == 0)
        <div class="say_nothings">
            <img src="{{ asset('media/3371471-removebg-preview.png') }}" alt="">
            <h1>No meals found</h1>
        </div>
    @else
        <a href="{{url("startCommandFromMeal")}}" class="btnGoPayment">Go to payment <svg version="1.1" viewBox="0 0 2048 2048" width="128" height="128"
                xmlns="http://www.w3.org/2000/svg">
                <path transform="translate(295,333)"
                    d="m0 0h1265l30 2 24 4 18 6 17 8 16 10 10 8 13 12 11 14 9 13 10 18 7 18 4 16 2 14 1 27v346l-1 25-3 9-8 5-13 4-13 1-10-2-6-3-6-5-3-7-2-16-1-140-50-1h-1425l1 620 2 17 5 18 8 16 7 9 4 5 8 7 11 8 13 6 14 4 17 2 20 1 771 1 15 1 13 4 8 7 4 7 2 8-1 12-5 12-6 7-8 4-15 2h-793l-26-2-14-3-16-5-12-5-15-8-11-8-14-12-10-10-8-10-10-15-11-21-6-20-3-16-2-26-1-54-1-767 1-27 2-20 4-18 7-19 10-20 12-18 11-12 11-11 12-9 18-11 16-7 18-5 18-3zm16 64-31 1-21 3-13 5-12 7-9 7-9 9-10 15-7 16-5 16-2 11-1 11v38l1 4 3 1h1469l2-2v-52l-2-16-3-13-8-16-8-11-9-10-12-9-16-8-12-4-15-2-27-1zm-118 208-3 1v23l1 26h1474l2-1v-21l-1-25-1-2-10-1z" />
                <path transform="translate(1517,907)"
                    d="m0 0 11 1 25 7 45 14 37 12 36 12 34 11 79 25 37 12 38 13 16 6 12 6 7 6 6 10 5 18 6 32 4 31 3 38 1 43-1 34-3 39-4 26-9 41-7 25-12 35-9 21-12 25-12 22-10 16-7 11-12 16-11 14-11 13-18 20-19 19-10 8-11 9-13 10-17 12-16 10-21 12-24 13-62 31-33 15-18 8-12 3h-8l-12-3-23-10-48-23-33-16-35-18-18-11-30-20-14-11-13-11-15-13-22-22v-2l-3-1-7-8-12-14-13-17-12-17-10-16-14-24-12-24-13-31-11-33-10-37-7-34-5-37-2-26v-71l3-35 3-23 10-53 4-12 7-10 8-6 28-10 80-26 25-8 61-20 36-11 30-10 33-10 15-5 26-8 16-6zm3 67-12 3-36 12-29 9-72 23-36 12-29 9-27 9-69 21-10 5-2 7-6 43-4 48v57l4 40 6 36 6 24 9 29 7 19 11 26 13 26 10 17 10 15 10 14 14 18 7 7 7 8 22 22 8 7 14 11 16 12 19 12 23 13 27 14 35 17 23 11 16 8 11 5 11 1 12-7 12-6 28-13 16-8 29-14 24-13 24-15 19-13 11-9 13-11 8-7 23-23v-2h2l9-11 11-14 13-18 12-19 14-26 14-32 12-36 6-21 7-34 6-43 2-24v-46l-3-40-4-36-4-24-2-4-9-3-15-4-36-11-66-21-79-26-48-16-54-17-11-3z" />
                <path transform="translate(1693,1192)"
                    d="m0 0h7l12 6 10 8 6 10 2 6v7l-4 11-14 15-11 11h-2v2l-8 7-10 9-8 7-10 9-8 7-10 9-13 12-11 9-13 12-8 7-14 12-16 15-10 9-11 9-12 11-15 11-13 6-6 1-18-10-13-12-7-6v-2l-3-1-5-6-8-7-28-28v-2l-3-1-7-8-13-13v-2h-2l-7-8-12-16-2-4v-8l6-11 7-8 10-7 10-4 9 2 10 6 13 11 10 10 6 5 6 7 8 7v2h2l6 7 10 8 7 8 10 9 5 1 17-17 11-9 8-8h2v-2l8-7 12-11 11-9 15-14 8-7 14-12 12-11 8-7 10-9 8-7 10-9 11-9 15-8z" />
                <path transform="translate(359,1226)"
                    d="m0 0h212l26 1 11 3 6 7 3 10v13l-3 16-4 6-8 5-12 2-70 1h-164l-11-2-6-4-8-9-3-9v-15l6-16 6-7 3-1z" />
            </svg>
        </a>
        <div class="list_meal_elements">
            @foreach ($data as $i)
                <div class="burger-card">
                    <div class="cntArticleInfo">
                        <h1>{{ $i->name }}</h1>
                        <p>{{ $i->description }}</p>
                        <p><strong>Popular Additions:</strong> Pickles, Onions, Ketchup</p>
                        <h2 class="price_food"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 -960 960 960" width="24px" fill="#000000">
                                <path
                                    d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z" />
                            </svg>{{ $i->price }} MAD</h2>
                        @if (session('isBuilding') == true)
                            @if (array_key_exists($i->id, session('meal')))
                                <span class="spAlreadyInTHeMeal">
                                    <p> in the meal ( {{ session('meal')[$i->id]['quantity'] }} items)</p>
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
                            <button class="btnOrder">
                                <p>Order Now</p>
                            </button>
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
                        e.innerHTML = res.newElem;
                        setTotalePrice(res.totalePrice, res.count)
                    },
                    error: (er) => {
                        console.log("Error => ", er);
                    }
                });

            }

           
        </script>
    @endif
@endsection
