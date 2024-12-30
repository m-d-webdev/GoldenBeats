@extends('user.profile.master_profile')
@section('contentProfile')
    <div class="cntSecondUserInfo r-w ml20 p15 ">
        <div class="c-s-c mb20" style="width:48%; min-width:400px;">
            <p style="align-self: flex-start;" class="mb20 r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg"
                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M200-246q54-53 125.5-83.5T480-360q83 0 154.5 30.5T760-246v-514H200v514Zm280-194q58 0 99-41t41-99q0-58-41-99t-99-41q-58 0-99 41t-41 99q0 58 41 99t99 41ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm69-80h422q-44-39-99.5-59.5T480-280q-56 0-112.5 20.5T269-200Zm211-320q-25 0-42.5-17.5T420-580q0-25 17.5-42.5T480-640q25 0 42.5 17.5T540-580q0 25-17.5 42.5T480-520Zm0 17Z" />
                </svg>Picture</p>
            <img class="userImage" src="{{ asset(Auth::user()->path_PrfPic) }}" alt="">
            <h1 class="mt20" id="UserFullName"> {{ Auth::user()->name }}</h1>
            <a class="cr mt20 p5 pl10 pr10 br5" href="{{ url('profile_picture') }}"><svg xmlns="http://www.w3.org/2000/svg"
                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z" />
                </svg>Edit Profile Picture
            </a>
        </div>
        <div class="c-s-c mb20" style="width:48%; min-width:400px;">
            <p style="align-self: flex-start;" class="mb20 r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg"
                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M480-440q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T540-580q0-25-17.5-42.5T480-640q-25 0-42.5 17.5T420-580q0 25 17.5 42.5T480-520Zm0 460L120-280v-400l360-220 360 220v400L480-60Zm0-93 147-91q-34-18-71.5-27t-75.5-9q-38 0-75.5 9T333-244l147 91ZM256-291q50-34 107-51.5T480-360q60 0 117 17.5T704-291l56-33v-311L480-806 200-635v311l56 33Zm224-189Z" />
                </svg>Identity</p>
            <div class="LabelinpInfo">
                <input type="text" id="inpFullNameUser" value="{{ Auth::user()->name }}" placeholder="">
                <label for="inpFullNameUser">Full Name</label>
                <button class="bl"
                    onclick="upadte_user_elem(this , 'name' ,this.parentNode.querySelector('input').value)">Save<svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                    </svg></button>
            </div>
            <div class="LabelinpInfo mt20">
                <input type="email" id="inpEmauilsdf" value="{{ Auth::user()->email }}" placeholder="">
                <label for="inpEmauilsdf">Email address</label>
                <button class="bl"
                    onclick="upadte_user_elem(this , 'email' ,this.parentNode.querySelector('input').value)">Save<svg
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                    </svg>
                </button>
            </div>

        </div>
        <div class="c-s-c mt20" style="width:48%; min-width:400px;">
            <p style="align-self: flex-start;" class="mb20  r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg"
                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="m438-426 198-198-57-57-141 141-56-56-57 57 113 113Zm42 240q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                </svg>Default Address :</p>

            @if (Auth::user()->address()->where('is_default', true)->exists())
                <div class="LabelinpInfo ">
                    <input type="text" id="inpPhoneUser" maxlength="14"
                        value="{{ Auth::user()->address()->where('is_default', true)->first()->phone }}">
                    <label for="inpPhoneUser">Phone number</label>
                    <button onclick='update_address(this , "phone" , this.parentNode.querySelector("input").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                            width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" id="inpStreetAdre"
                        value="{{ Auth::user()->address()->where('is_default', true)->first()->streetAddress }}">
                    <label for="inpStreetAdre">Street Address</label>
                    <button onclick='update_address(this , "streetAddress" , this.parentNode.querySelector("input").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                            width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" id="inpCITY"
                        value="{{ Auth::user()->address()->where('is_default', true)->first()->city }}">
                    <label for="inpCITY">City </label>
                    <button onclick='update_address(this , "city" , this.parentNode.querySelector("input").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" id="inpState"
                        value="{{ Auth::user()->address()->where('is_default', true)->first()->state }}">
                    <label for="inpState">Region</label>
                    <button onclick='update_address(this , "state" , this.parentNode.querySelector("input").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" id="inpZIP"
                        value="{{ Auth::user()->address()->where('is_default', true)->first()->zip }}">
                    <label for="inpZIP">Phone number</label>
                    <button onclick='update_address(this , "zip" , this.parentNode.querySelector("input").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
                <div class="LabelinpInfo mt20">
                    <textarea type="text" id="inpadditionalInstruction">{{ Auth::user()->address()->where('is_default', true)->first()->additionalInstruction }}</textarea>
                    <label for="inpadditionalInstruction">Additional Instruction </label>
                    <button
                        onclick='update_address(this , "additionalInstruction" , this.parentNode.querySelector("textarea").value)'
                        class="bl">Save<svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path
                                d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                        </svg>
                    </button>
                </div>
            @else
                <div class="c-c-c">
                    <p>No home address added yet, add one</p>
                    <a class="r-c-c p5 pr20 pl20 bl br20 mt20" href="{{ url('add_address/true') }}">Add address <svg
                            xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M440-400h80v-120h120v-80H520v-120h-80v120H320v80h120v120Zm40 214q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                        </svg></a>
                </div>
            @endif
        </div>
        <div class="c-s-c mt20" style="width:48%; min-width:400px;">
            <p style="align-self: flex-start;" class="mb20  r-c-c"><svg class="mr10"
                    xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="M160-640h640v-80H160v80Zm-80-80q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v240H160v240h164v80H160q-33 0-56.5-23.5T80-240v-480ZM598-80 428-250l56-56 114 112 226-226 56 58L598-80ZM160-720v480-180 113-413Z" />
                </svg>Default Payment Method :</p>

            @if (Auth::user()->paymenth_method()->exists())
                @php
                    $cardInfo = Auth::user()->paymenth_method()->where('is_default', true)->first();
                @endphp

                <div class="LabelinpInfo mt10">
                    <input type="text" value="{{ $cardInfo->card_type }}" disabled>
                    <label for="">Card Type</label>
                </div>
                <div class="LabelinpInfo mt10">
                    <input type="text" value="{{ $cardInfo->card_name }}" disabled>
                    <label for="">Card name</label>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" value="**** **** **** {{ substr(Crypt::decrypt($cardInfo->card_number), -4) }}"
                        disabled>
                    <label for="">Card last four number</label>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" value="{{ $cardInfo->expiration_date }}" disabled>
                    <label for="">Expiration date</label>
                </div>
                <div class="LabelinpInfo mt20">
                    <input type="text" value="{{ $cardInfo->cvv }}" disabled>
                    <label for="">Cvv</label>
                </div>
            @else
                <div class="c-c-c">
                    <p>No payment method added</p>
                    <a href="{{ url('add_Payment_Method') }}" class="r-c-c p5 pr20 pl20 bl br20 mt20">Add Payment method
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                            fill="#000000">
                            <path
                                d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v240H160v240h400v80H160Zm0-480h640v-80H160v80ZM760-80v-120H640v-80h120v-120h80v120h120v80H840v120h-80ZM160-240v-480 480Z" />
                        </svg></a>
                </div>
            @endif
        </div>
    </div>


    <script>
        let inputsValue = document.querySelectorAll('.LabelinpInfo input');
        inputsValue.forEach(element => {
            if (!element.getAttribute("disabled")) {
                element.onchange = () => {
                    element.parentNode.querySelector("button").style.display = 'flex';
                }

            }
        });
        let txtasdasd = document.querySelector('.LabelinpInfo textarea');
        if (txtasdasd) {

            txtasdasd.onchange = () => {
                txtasdasd.parentNode.querySelector("button").style.display = 'flex';
            }
        }
        const upadte_user_elem = (e, key, value) => {
            let loaderEL = document.createElement("div");
            loaderEL.className = 'loader2'
            e.append(loaderEL)
            if (value != "") {
                $.ajax({
                    url: "{{ url('update_user_info') }}",
                    method: "POST",
                    data: {
                        key: key,
                        value: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (res) => {
                        e.style.display = 'none';
                        e.removeChild(loaderEL);
                        if (key == "name") {
                            document.querySelector("#UserFullName").innerText = value
                        }
                    },
                    error: (error) => {
                        console.log(error);
                    }
                })
            }
        }
        const update_address = (e, key, value) => {
            if (key == "additionalInstruction") {
                let loaderEL = document.createElement("div");
                loaderEL.className = 'loader2'
                e.append(loaderEL)
                $.ajax({
                    url: "{{ url('update_address_info') }}",
                    method: "POST",
                    data: {
                        key: key,
                        value: 'null',
                        _token: '{{ csrf_token() }}'
                    },
                    success: (res) => {
                        e.style.display = 'none';
                        e.removeChild(loaderEL)
                        console.log(res);
                    },
                    error: (error) => {
                        console.log(error);
                    }
                })
            }
            if (value != "" && key != "additionalInstruction") {
                let loaderEL = document.createElement("div");
                loaderEL.className = 'loader2'
                e.append(loaderEL)
                $.ajax({
                    url: "{{ url('update_address_info') }}",
                    method: "POST",
                    data: {
                        key: key,
                        value: value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: (res) => {
                        e.style.display = 'none';
                        e.removeChild(loaderEL)
                        console.log(res);
                    },
                    error: (error) => {
                        console.log(error);
                    }
                })
            }
        }
    </script>
@endsection
