@extends('user.profile.master_profile')
@section('title', 'Customer Support')
@section('contentProfile')
    <div class="c-p-c" style="width: 100%;">
        <div class="r-c-c ctINroducongCustsUP ">
            <h1>We're Here to Help You!</h1>
            <img src="{{ asset('media/pexels-mikhail-nilov-7682340.jpg') }}" alt="">
        </div>

        <div class="faqs c-s-s p10" style="width:100%">
            <h1 class="mt20">Frequently Asked Questions</h1>
            <div class="listFAQS c-s-s ml20">
                @foreach ($faqs as $item)
                    <span class="mt20">
                        <p>- {{ $item->question }}</p>
                        <span class="r-s-c ml20 mt10">Answer => <h2 class="ml10 c-b">{{ $item->answer }}</h2></span>
                    </span>
                @endforeach
            </div>
        </div>

        <div class="faqs c-s-s mt50 p10" style="width:100%">
            <h1 class="r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M240-400h320v-80H240v80Zm0-120h480v-80H240v80Zm0-120h480v-80H240v80ZM80-80v-720q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v480q0 33-23.5 56.5T800-240H240L80-80Zm126-240h594v-480H160v525l46-45Zm-46 0v-480 480Z" />
                </svg> Live Chat</h1>
            <button class="bl mt20 ml20">Start a conversation <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M80-240v-480h80v480H80Zm560 0-57-56 144-144H240v-80h487L584-664l56-56 240 240-240 240Z" />
                </svg></button>
        </div>
        <div class="faqs c-s-s mt50 p10" style="width:100%">
            <h1 class="r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z" />
                </svg>Email Support </h1>

            <p class="m10">Write us a report , question, inquiry, any help</p>
            <div class="LabelinpInfo ml20">
                <textarea name="" id=""></textarea>
                <label for="">Content</label>
            </div>
            <button class="bl mt10">Submit content <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
                </svg></button>
        </div>
        <div class="faqs c-s-s mt50 p10" style="width:100%">
            <h1 class="r-c-c"><svg class="mr10" xmlns="http://www.w3.org/2000/svg" height="24px"
                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M760-480q0-117-81.5-198.5T480-760v-80q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480h-80Zm-160 0q0-50-35-85t-85-35v-80q83 0 141.5 58.5T680-480h-80Zm198 360q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z" />
                </svg>Call Us</h1>
            <div class="c-s-s mt20 ml10">
                <p>Phone numbers :</p>
                <span class="r-p-c mt10 ml20 cntPhoneNumber">
                    <p class="c-b">0544883633</p><svg class="f-b" onclick="copierElem( this , '0544883633')"
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z" />
                    </svg>
                </span>
                <span class="r-p-c mt10 ml20 cntPhoneNumber">
                    <p class="c-b">0555887799</p><svg class="f-b" onclick="copierElem( this ,'0555887799')"
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z" />
                    </svg>
                </span>
                <span class="r-p-c mt10 ml20 cntPhoneNumber">
                    <p class="c-b">0566998877</p><svg class="f-b" onclick="copierElem( this ,'0566998877')"
                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#000000">
                        <path
                            d="M360-240q-33 0-56.5-23.5T280-320v-480q0-33 23.5-56.5T360-880h360q33 0 56.5 23.5T800-800v480q0 33-23.5 56.5T720-240H360Zm0-80h360v-480H360v480ZM200-80q-33 0-56.5-23.5T120-160v-560h80v560h440v80H200Zm160-240v-480 480Z" />
                    </svg>
                </span>
            </div>

        </div>
        <div class="faqs c-s-s mt50 p10" style="width:100%">
            <h1 class="r-c-c">Feedback <svg class="ml10" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m354-287 126-76 126 77-33-144 111-96-146-13-58-136-58 135-146 13 111 97-33 143ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Zm247-350Z"/></svg></h1>
            <p class="mt10">We value your feedback and are dedicated to ensuring the best experience for you</p>
            <div class="LabelinpInfo mt15 ml20">
                <textarea name=""></textarea>
                <label for="">feedback</label>
            </div>
            <button class="bl mt10">Submit feedback <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
            </svg></button>
        </div>
    </div>
    <script>
        let copierElem = (e, n) => {
            navigator.clipboard.writeText(n).then(() => {
                let copeidElem = document.createElement('div');
                copeidElem.innerHTML =
                    `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg> `;

                e.parentNode.replaceChild(copeidElem, e)
            })
        }
    </script>
@endsection
