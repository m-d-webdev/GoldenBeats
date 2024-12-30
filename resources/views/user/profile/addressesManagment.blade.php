@extends('user.profile.master_profile')
@section('title')
    Addresses Managment
@endsection
@section('contentProfile')
    <div style="width:100%;" class="mr20  c-s-s p10">
        <p class="mb20">Address management </p>
        @if (Auth::user()->address()->exists())
            @php
                $defaultAddres = Auth::user()->address()->where('is_default', true)->first();
                $allAddress = Auth::user()->address;
            @endphp
            <div class="r-s-c mb20 ">
                <svg class="mr10 f-g" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#000000">
                    <path
                        d="m438-426 198-198-57-57-141 141-56-56-57 57 113 113Zm42 240q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                </svg>
                <p class="c-g">Default :</p>
                <h1 class="ml15">{{ $defaultAddres->phone }} | {{ $defaultAddres->streetAddress }} |
                    {{ $defaultAddres->city }} |
                    {{ $defaultAddres->state }} | {{ $defaultAddres->zip }}</h1>
            </div>
            <div class=" list_addressELEM c-s-s mt10 mb20 ml20 p20">
                @if (count($allAddress) > 1)
                    @foreach ($allAddress as $item)
                        @if ($item->id != $defaultAddres->id)
                            <span class="cntAddress  mt20 r-s-c">
                                <svg class="mr15" xmlns="http://www.w3.org/2000/svg" height="24px"
                                    viewBox="0 -960 960 960" width="24px" fill="#000000">
                                    <path
                                        d="M240-120v-680h390q14 0 26 6.5t20 17.5l124 176-124 176q-8 11-20 17.5t-26 6.5H320v280h-80Zm80-360h300l80-120-80-120H320v240Zm0 0v-240 240Z" />
                                </svg>
                                <p style="font-weight: 600">{{ $item->phone }} | {{ $item->streetAddress }} |
                                    {{ $item->city }} |
                                    {{ $item->state }} | {{ $item->zip }}</p>
                                <button class="bl ml20" onclick="set_address_default({{ $item->id }})">Set as default
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path d="M440-160v-487L216-423l-56-57 320-320 320 320-56 57-224-224v487h-80Z" />
                                    </svg>
                                </button>
                                <button class="ml10 dng" onclick="delete_address({{ $item->id }})">Delete <svg
                                        xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                        width="24px" fill="#000000">
                                        <path
                                            d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z" />
                                    </svg></button>
                            </span>
                        @endif
                    @endforeach
                @else
                    <p>No more addresses</p>
                @endif
            </div>
            <a href="{{ url('addNewAddress') }}" class="bl mt20">Add new address <svg xmlns="http://www.w3.org/2000/svg"
                    height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                    <path
                        d="M440-400h80v-120h120v-80H520v-120h-80v120H320v80h120v120Zm40 214q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
                </svg></a>
        @else
        <div class="s-p-c">
            <h1>You Have no address yet !</h1>
            <a href="{{ url('addNewAddress') }}" class="bl mt20">Add an address <svg xmlns="http://www.w3.org/2000/svg"
                height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                <path
                    d="M440-400h80v-120h120v-80H520v-120h-80v120H320v80h120v120Zm40 214q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z" />
            </svg></a>
        </div>
        @endif
        <p class="mt100">Manage your saved delivery addresses effortlessly. Add, edit, or remove addresses to ensure your
            orders are delivered accurately and on time. Keep your information up-to-date for a seamless food delivery
            experience.</p>

    </div>
    <script>
        function set_address_default(id) {
            $.ajax({
                url: "{{ url('set_as_default') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: (res) => {
                    console.log(res);

                    if (res == "Done") {
                        window.location.reload();
                    }
                },
                error: (err) => {
                    console.log(err);

                }

            })
        }

        function delete_address(id) {
            $.ajax({
                url: "{{ url('deletea_ddress') }}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: (res) => {
                    if (res == true) {
                        window.location.reload();
                    }
                },
                error: (err) => {
                    console.log(err);

                }

            })
        }
    </script>
@endsection
