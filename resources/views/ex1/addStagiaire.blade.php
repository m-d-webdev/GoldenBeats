@extends('ex1.master')
@section('title', 'Ajouter un Stagiaire')
@section('links')
    <link rel="stylesheet" href="{{ asset('css/addStagiaire.css') }}">
@endsection
@section('content')
    <form action="/store_stagiaire" method="POST" enctype="multipart/form-data" class="formAddStagiare">
        @csrf
        <input type="text" name="cin" placeholder="C.I.N">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prenom">

        <label for="annee">Année académique</label>
        <select name="annee" id="annee">
            <option value="1anne">Première Annee</option>
            <option value="2anne">Deusieme Annee</option>
        </select>

        <label for="filiere">Choose a filière:</label>
        <select id="filiere" name="filiere">
            <option value="dev_info">Développement Informatique</option>
            <option value="reseaux_systemes">Réseaux et Systèmes Informatiques</option>
            <option value="gestion_entreprises">Gestion des Entreprises</option>
            <option value="techniques_vente">Techniques de Vente</option>
            <option value="techniques_audiovisuelles">Techniques Audiovisuelles</option>
            <option value="electromecanique">Électromécanique des Systèmes Automatisés</option>
            <option value="electricite_maintenance">Électricité de Maintenance Industrielle</option>
            <option value="froid_climatisation">Froid et Climatisation</option>
            <option value="hotellerie_restauration">Hôtellerie et Restauration</option>
        </select>

        <input type="text" name="tel" placeholder="Numero De Téléphone">
        <input type="email" name="email" placeholder="Email">
        <input type="date" name="dateN" placeholder="Date De Naissance ">
        <label for="img" class="lblSelectImg">Image De Stagiaire</label>
        <input type="file" onchange="loadFile(event)" name="img" id="img" style="display: none">
        <img src="" id="imgS" alt="">
        <button type="submit">Submit</button>
    </form>
    <script>
        let loadFile = function(event) {
            let output = document.getElementById('imgS');
            output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
