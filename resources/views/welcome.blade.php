@extends('master')
@section('title')
    Welcome !
@endsection
@section('links')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Acme&family=Great+Vibes&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Jost:ital,wght@0,100..900;1,100..900&family=Mirza:wght@400;500;600;700&family=Parkinsans:wght@300..800&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Rubik:ital,wght@0,300..900;1,300..900&family=Russo+One&family=Saira:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mainSite.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="welcominText">
            <img width="300px" src="{{ asset('logo.png') }}" onclick = "window.location.href='{{ url('/') }}'" alt="">
            <h1>Golden Bites</h1>
        </div>
    </div>
    <div class="container">
        <div class="cntSliderPl c-p-c">
            <div class="r-p-c p20 wmia cntMainPage">
                <div class="c-s-s cntInasdf">
                    <h1 class="nameH1">
                        Juicy, Flavor-Packed, and Always Satisfying – Bite into Burger Bliss!
                    </h1>
                    <p class="mt50 ml20">100% Angus Beef, Fresh Lettuce, Ripe Tomatoes, Crispy Bacon, Melted Cheddar,
                        Special
                        Sauce, all nestled
                        in a Soft Toasted Bun.
                    </p>
                    <button class="mt50 r-p-c">Order now <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                        </svg></button>

                </div>
                <img class="imgMaind" src="{{ asset('media/burgerimg.png') }}" alt="">
            </div>
            <div class="r-p-c h600 wmia cntMainPage mt50">
                <div class="cntSouAdFood r-p-c mr20 p10">
                    <div class="c-s-s r20">
                        <h1 class="h1loofdfn">Juicy chicken balls with crispy coating, paired with ice-cold Pepsi – the
                            combo that hits the
                            spot!</h1>
                        <button class="r-c-c tbnOrderisdfds">Order now <svg class="ml15"
                                xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#000000">
                                <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                            </svg></button>
                    </div>
                    <img src="media/imgCombo1.png" alt="">
                </div>
                <div class="cntSouAdFood r-p-c mr20 p10">
                    <div class="c-s-s r20">
                        <h1 class="h1loofdfn">Juicy chicken balls with crispy coating, paired with ice-cold Pepsi – the
                            combo that hits the
                            spot!</h1>

                        <button class="r-c-c tbnOrderisdfds">Order now <svg class="ml15"
                                xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                                fill="#000000">
                                <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                            </svg></button>

                    </div>
                    <img src="media/download__1_-removebg-preview.png" alt="">
                </div>
            </div>
            <div class="r-p-c p20 wmia cntMainPage mt50">
                <div class="c-s-s cntInasdf">
                    <h1 class="nameH1">
                        Unwrap the Flavor Fiesta! 🌮 </h1>
                    <ul class="mt50 ml20">
                        <li>
                            100% Angus Beef, Fresh Lettuce, Ripe Tomatoes, Crispy Bacon, Melted Cheddar,
                        </li>
                        <li>
                            Special
                        </li>
                        <li>
                            Tortilla (soft or hard shell)
                        </li>
                        <li>
                            Protein (beef, chicken, pork, fish, or plant-based options)
                        </li>
                        <li>
                            Vegetables (lettuce, tomatoes, onions, bell peppers, etc.)
                        </li>
                        <li>
                            Cheese (shredded cheddar, cotija, or queso fresco)
                        </li>
                        <li>
                            Sauce (salsa, guacamole, sour cream, or hot sauce)
                        </li>
                        <li>
                            Seasonings (taco seasoning, chili powder, cumin, garlic, etc.)
                        </li>
                    </ul>
                    <button class="mt50 r-p-c">Order now <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                            viewBox="0 -960 960 960" width="24px" fill="#000000">
                            <path d="m700-300-57-56 84-84H120v-80h607l-83-84 57-56 179 180-180 180Z" />
                        </svg></button>

                </div>
                <img class="imgMaind mb20" style="max-height: 100%" src="{{ asset('media/tacos2.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="aboutUsPrivay">
        <div class="aboutUs">
            <h1>About Us</h1>
            <p>
                Welcome to Golden Bites, where we bring food to life through convenience, taste, and innovation. Our
                mission is to provide a seamless experience for food lovers, offering everything from fast food delivery
                and meal kits to virtual cooking classes and curated subscription boxes. At Golden Bites, we believe
                that food is not just about nourishment – it's about creating memories, sharing experiences, and
                discovering new flavors.

            </p>
            <p>
                Whether you're looking to grab a quick bite, discover new recipes, or embark on a culinary adventure, we
                are here to guide you every step of the way. We are committed to quality, ensuring that every meal and
                service we provide is crafted with care. Join our growing community of food enthusiasts and let Golden
                Bites enhance your dining experience.

            </p>
        </div>
        <section id="privacy-policy">
            <h1>Privacy Policy</h1>
            <p>At <strong>Golden Bites</strong>, we are committed to safeguarding your privacy. This Privacy Policy
                outlines how we collect, use, and protect your personal information when you use our website and
                services.</p>

            <h2>Information We Collect</h2>
            <p>We collect personal information such as your name, email address, delivery address, and payment details
                when you place an order or sign up for our services. We may also collect data related to your
                preferences, browsing behavior, and feedback to improve our services.</p>

            <h2>How We Use Your Information</h2>
            <p>Your information is used to:</p>
            <ul>
                <li>Process and deliver your orders</li>
                <li>Communicate with you regarding your account or service updates</li>
                <li>Tailor recommendations and promotions based on your preferences</li>
                <li>Improve our website and services based on your feedback</li>
            </ul>

            <h2>Information Sharing</h2>
            <p>We do not share your personal information with third parties except for the purpose of fulfilling your
                orders (such as delivery partners) or when required by law. All third-party services we collaborate with
                are required to follow strict confidentiality agreements.</p>

            <h2>Security</h2>
            <p>We use the latest security measures to protect your data, including encryption protocols for sensitive
                information like payment details. We continually review our security practices to ensure your
                information remains safe.</p>

            <h2>Cookies</h2>
            <p>Our website uses cookies to enhance your browsing experience by remembering your preferences and
                providing personalized content. You can disable cookies in your browser settings if you prefer.</p>

            <h2>Your Rights</h2>
            <p>You have the right to access, update, or delete your personal information at any time. If you have any
                concerns about your data or would like to request changes, please contact us at <a
                    href="mailto:mstph.iderkaoui@gmail.com">your-email@example.com</a>.</p>
        </section>

    </div>
    <div class="welcomingDev">
        <video src="{{ asset('media/logoWebSite.mp4') }}" autoplay muted playsinline></video>
    </div>
    <script>
        function _(m) {
            console.log(m);
        }

        function D(elems, className = "displayFlex") {
            elems.forEach(elem => elem.classList.add(className))
        }

        function R(elems, className = "displayFlex") {
            elems.forEach(elem => elem.classList.remove(className))
        }
        let VideoIntro = document.querySelector('.welcomingDev');

        window.onload = () => {
            if (localStorage.getItem('Strg_variedName') == null) {
                localStorage.setItem('Strg_variedName', JSON.stringify({}));
            }
            if (localStorage.getItem("darkMode") != null) {
                localStorage.getItem("darkMode") == 'true' ? document.body.classList.add("darkMore") : document.body
                    .classList.remove("darkMore")
            }
            setTimeout(() => {
                VideoIntro.querySelector('video').classList.add('addAnimatioToVideo')
            }, 10000);

            setTimeout(() => {
                VideoIntro.remove();
                runLoop(0);

            }, 3600);

            setTimeout(() => {
                runLoop(0);

            }, 3900);
        }
    </script>
@endsection
