 @extends('master')
 @section('links')
     <link rel="stylesheet" href="{{ asset('css/addProfPic.css') }}">

 @endsection
 @section('title', 'Profile Picture')

 @section('content')
     <div class="container  r-p-c">
         <form method="POST" action="{{ url('/store_profile_pic') }}" enctype="multipart/form-data">
             <img src="{{ Auth::user()->path_PrfPic }}" alt="">
             @csrf
             @if ($errors->any())
                 <div class="divErrors">
                     @foreach ($errors->all() as $r)
                         <p>Error : {{ $r }}</p>
                     @endforeach
                 </div>
             @endif
             <input type="file" name="profile_pic" style="display: none" id="profile_pic">
             <label for="profile_pic" class="br"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                     viewBox="0 -960 960 960" width="24px" fill="#000000">
                     <path
                         d="M440-320v-326L336-542l-56-58 200-200 200 200-56 58-104-104v326h-80ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
                 </svg>Upload Profile Picture</label>
             <div class="r-p-c" style="width:100%;">
                 <button class="cr" type="button" onclick="window.location.href='/' "><svg
                         xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                         fill="#000000">
                         <path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z" />
                     </svg> Skip</button>
                 <button type="button" id="btnAddProfilePic" class="bl">Save<svg xmlns="http://www.w3.org/2000/svg"
                         height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000">
                         <path
                             d="M200-120v-640q0-33 23.5-56.5T280-840h400q33 0 56.5 23.5T760-760v640L480-240 200-120Zm80-122 200-86 200 86v-518H280v518Zm0-518h400-400Z" />
                     </svg></button>
             </div>
         </form>
         <div class="c-c-c">
             <h1>Edit Profile Picture</h1>
             <img src="{{asset('media/Photos-removebg-preview.png')}}" alt="">
         </div>
     </div>
     <script>
         let profile_pic = document.getElementById("profile_pic");
         profile_pic.onchange = () => {
             if (profile_pic.files.length > 0) {
                 document.querySelector('form img').src = URL.createObjectURL(profile_pic.files[0])
                 document.getElementById("btnAddProfilePic").type = "submit";
             }
         }
     </script>
 @endsection
