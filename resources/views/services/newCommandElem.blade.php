    <div class="cntArticleInfo">
        <h1>{{ $i['food']->name }}</h1>
        <p>{{ $i['food']->description }}</p>
        <h2 class="price_food"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                fill="#000000">
                <path
                    d="M446-80q-15 0-30-6t-27-18L103-390q-12-12-17.5-26.5T80-446q0-15 5.5-30t17.5-27l352-353q11-11 26-17.5t31-6.5h287q33 0 56.5 23.5T879-800v287q0 16-6 30.5T856-457L503-104q-12 12-27 18t-30 6Zm0-80 353-354v-286H513L160-446l286 286Zm253-480q25 0 42.5-17.5T759-700q0-25-17.5-42.5T699-760q-25 0-42.5 17.5T639-700q0 25 17.5 42.5T699-640ZM480-480Z" />
            </svg>
            {{ $i['food']->price }} MAD</h2>
        <div class="spAlreadyInTHeMeal">
            <span class="r-c-c mb20">
                <p>Quantity : </p>
                <h2 class="ml10">{{ $i['quantity'] }} items</h2>

            </span>
            <button class="btnAddToDish" id="btnAddToMeal"
                onclick="IncreaseQuantity( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }})">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z" />
                </svg>
                <p>Increase quantity</p>
            </button>
            @if ($i['quantity'] > 1)
                <button class="btnDecreaseQu"
                    onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }}  )">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path d="M200-440v-80h560v80H200Z" />
                    </svg>
                    <p>Decrease quantity</p>
                </button>
            @else
                <button class="bg-r btnDecreaseQu"   onclick="decreaseQuan( this.parentNode.parentNode.parentNode ,{{ $i['food']->id }}  )">
                    <p class="c-l">Delete</p> <svg class="ml10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                </button>
            @endif
        </div>
    </div>
    <img src="{{ asset($i['food']->image) }}" alt="">
