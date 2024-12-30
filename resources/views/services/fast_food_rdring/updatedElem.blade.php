@isset($i)
    <div class="cntArticleInfo">
        <h1>{{ $i->name }}</h1>
        <p>{{ $i->description }}</p>
        <p class="inneradditional"><strong>Popular Additions:</strong> Pickles, Onions, Ketchup</p>
        <h2 class="price_food"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#000000">
                <path
                    d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z" />
            </svg>{{ $i->price }} MAD</h2>
        @if (session('isBuilding') == true)
            @if (array_key_exists($i->id, session('meal')))
                <span class="spAlreadyInTHeMeal">
                    <p> in the meal ( {{ session('meal')[$i->id]['quantity'] }} items)</p>
                    <button class="btnAddToDish" id="btnAddToMeal"
                        onclick="setVariedMeal( this.parentNode.parentNode.parentNode ,[{{ $i->id }} , {{ $i->price }}] )">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                        </svg>
                        <p>Increase quantity</p>
                    </button>
                    <button class="btnDecreaseQu"
                        onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,[{{ $i->id }} , {{ $i->price }}] )">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
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
@else
    <p>The Array wasn't sended to the update com</p>
@endisset
