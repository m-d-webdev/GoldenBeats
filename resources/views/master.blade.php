<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('links')
</head>

<body>
    @include('header')
    <main class="content">
        @yield('content')
    </main>
    @include('footer')
    <script>
        
        let btnChangeColor = document.getElementById('BNT_changeColor');

        window.addEventListener('load' , ()=>{
            if(localStorage.getItem("darkMode")!= null){
                localStorage.getItem("darkMode") == 'true' ? document.body.classList.add("darkMore") : document.body.classList.remove("darkMore")  
            }
        })

        BNT_changeColor.onclick = function() {
            document.body.classList.toggle('darkMore');
            if (localStorage.getItem('darkMode') == null) {
                localStorage.setItem('darkMode', 'true');
            } else {
                if (localStorage.getItem('darkMode') == 'true') {
                    localStorage.setItem('darkMode', 'false');
                } else {
                    localStorage.setItem('darkMode', 'true');
                }
            }
        }
    </script>
</body>

</html>
