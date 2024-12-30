<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/add_article.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
</head>

<body>
    <div class="containerAdd_Article">
        <form action="{{ route('add_article') }}" method="post" id="add_articleForm" enctype="multipart/form-data">
            <h1>Add New Element</h1>
            @csrf
            <div class="cntInpArticle">
                <input type="text" id="element_name" name="element_name" placeholder="">
                <label for="element_name"> the name of the Element</label>
            </div>
            <div class="cntInpArticle">
                <p class="desPType">Element Type</p>
                <select name="element_type" id="element_type">
                    <option value="pizza">Pizza </option>
                    <option value="burger">Burger </option>
                    <option value="sushi">Sushi </option>
                    <option value="tacos">Tacos</option>
                    <option value="pasta">Pasta </option>
                    <option value="tajine">Tajine </option>
                    <option value="coca_cola_sodas">Coca Cola</option>
                    <option value="pepsi_sodas">Pepsi</option>
                    <option value="redbull_sodas">Red Bull</option>
                    <option value="hawaiian_sodas">Hawaiian</option>
                    <option value="spritz_sodas">Spritz </option>
                    <option value="fanta_sodas">Fanta </option>
                    <option value="7UP_sodas">7UP</option>
                    <option value="Poms_sodas">Poms</option>
                    <option value="fruit_juice">Fruit Juice</option>
                    <option value="vegetable_juice">Vegetable Juices</option>
                    <option value="mixed_juices">Mixed Juices</option>
                    <option value="Detox_or_cleansing_juices">Detox or Cleansing Juices</option>
                    <option value="cold-pressed_juices">Cold-Pressed Juices</option>
                    <option value="concentrated_juices">Concentrated Juices</option>
                    <option value="smoothies">Smoothies</option>
                    <option value="lemonade">Lemonade </option>
                    <option value="coffee">Coffee </option>
                    <option value="tea">Tea </option>
                    <option value="chicken-tikka">Chicken Tikka </option>
                    <option value="croissant">Croissant</option>
                    <option value="paella">Paella </option>
                    <option value="dumplings">Dumplings </option>
                    <option value="shawarma">Shawarma </option>
                    <option value="fries">French Fries </option>
                    <option value="hotdog">Hot Dog </option>
                    <option value="ramen">Ramen </option>
                    <option value="kebab">Kebab </option>
                    <option value="schnitzel">Schnitzel </option>
                    <option value="pho">Pho </option>
                    <option value="ceviche">Ceviche </option>
                    <option value="nachos">Nachos</option>
                    <option value="fajitas">Fajitas</option>
                    <option value="falafel">Falafel </option>
                    <option value="milkshake">Milkshake </option>
                    <option value="couscous">Couscous </option>
                    <option value="pastilla">Pastilla </option>
                    <option value="harira">Harira </option>
                    <option value="briouat">Briouat </option>
                    <option value="rfissa">Rfissa </option>
                    <option value="zaalouk">Zaalouk </option>
                    <option value="biryani">Biryani </option>
                    <option value="empanadas">Empanadas </option>
                    <option value="poutine">Poutine </option>
                    <option value="gyros">Gyros</option>
                    <option value="goulash">Goulash </option>
                    <option value="pierogi">Pierogi </option>
                    <option value="hummus">Hummus </option>
                    <option value="tapas">Tapas </option>
                    <option value="bbq-ribs">BBQ Ribs </option>
                    <option value="sauerbraten">Sauerbraten </option>
                </select>
            </div>
            <div class="cntInpArticle">
                <p class="desPType">Element Physical Type</p>
                <select name="element_physical_type" id="">
                    <option value="">Select a Type</option>
                    <option value="edible">Edible</option>
                    <option value="drinkable">Drinkable </option>
                    <option value="consumables">Consumables </option>
                </select>
            </div>
            <div class="cntInpArticle">
                <input type="text" id="element_desc" name="element_desc" placeholder="">
                <label for="element_desc">Description</label>
            </div>
            <div class="cntInpArticle">
                <input type="text" id="element_component" name="element_component" placeholder="">
                <label for="element_component">Element Ingredients</label>
            </div>
            <div class="cntInpArticle">
                <input type="text" id="element_info" name="element_info" placeholder="">
                <label for="element_info">Nutritional Information</label>
            </div>

            <div class="cntInpArticle">
                <input type="text" id="element_price" name="element_price" placeholder="">
                <label for="element_price">Price en MAD</label>
            </div>

            <div class="cntImgElement">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-photo-scan AddImgIcone displayFlex" width="44"
                    height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M15 8h.01" />
                    <path d="M6 13l2.644 -2.644a1.21 1.21 0 0 1 1.712 0l3.644 3.644" />
                    <path d="M13 13l1.644 -1.644a1.21 1.21 0 0 1 1.712 0l1.644 1.644" />
                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                    <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                    <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                </svg>
                <img class="imgElement" src="" alt="">
                <label for="element_img">Upload Image for the Element </label>
                <p>Please take a good photo with the background removed.</p>
                <input type="file" name="element_img" id="element_img" onchange="handleFiles(this.files)"
                    style="display: none">
            </div>
            <button type="button" id="btnAddElement">Add</button>
        </form>
    </div>

    <script>
        let AddImgIcone = document.querySelector('.AddImgIcone');
        let imgElement = document.querySelector('.imgElement');
        let element_img = document.querySelector('#element_img');

        // element_img.onchange = () => {

        // }
        let imgAdded = false
        let btnAddElement = document.querySelector('#btnAddElement');
        btnAddElement.onclick = () => {
            if (imgAdded) {
                btnAddElement.type = "submit";
                btnAddElement.click();
            }
        }

        let dropArea = document.getElementById('add_articleForm');

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        // Highlight the drop area when an item is dragged over
        ['dragenter', 'dragover'].forEach(eventName => {
            dropArea.addEventListener(eventName, highlight, false);
        });

        // Unhighlight when the item is no longer dragging
        ['dragleave', 'drop'].forEach(eventName => {
            dropArea.addEventListener(eventName, unhighlight, false);
        });

        // Handle dropped files
        dropArea.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            dropArea.classList.add('highlight');
        }

        function unhighlight() {
            dropArea.classList.remove('highlight');
        }

        function handleDrop(e) {
            let dt = e.dataTransfer;
            let files = dt.files;

            handleFiles(files);
        }

        function handleFiles(files) {
            if (files.length > 0) {
                element_img.files = files;
                AddImgIcone.classList.remove('displayFlex');
                imgElement.classList.add('displayFlex');
                imgElement.src = URL.createObjectURL(files[0])
                imgAdded = true
            }
        }
    </script>
</body>

</html>
