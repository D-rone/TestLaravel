@extends('main')
@section('inscription')

<h1>Inscription</h1>

<form method="post" action="/inscrire" id="inscriptionForm">
    <input type="hidden" name="_token" value=<?php echo csrf_token(); ?> />

    <div>
        <span>Nom et Prenom : </span>
        <input type="text" name="nomprenom" required />
    </div>

    <div>
        <span>Sexe : </span>
        <input type="radio" id="homme" name="sexe" value="homme" required>
        <label for="homme">Homme</label>
        <input type="radio" id="femme" name="sexe" value="femme" required>
        <label for="femme">Femme</label>
    </div>


    <div>
        <span>Selectionner une formation : </span>
        <select id="formation" name="formation" required>
            <option value="" disabled selected>Selectionner</option>
            <option value="web">Outils et languages WEB</option>
            <option value="lp">Langagues de programmation</option>
        </select>
    </div>

    <div id="hiddenOptions">
        <div id="lpOptions" style="display:none;">
            <label>Languages:</label>
            <div>
                <input type="checkbox" id="java" name="lp[]" value="java">
                <label for="java">Language Java</label>

                <input type="checkbox" id="c" name="lp[]" value="c">
                <label for="c">Language C</label>
            </div>
        </div>

        <div id="webOptions" style="display:none;">
            <label>Languages:</label>
            <div>
                <input type="checkbox" id="html" name="web[]" value="html">
                <label for="html">HTML</label>

                <input type="checkbox" id="css" name="web[]" value="css">
                <label for="css">CSS</label>

                <input type="checkbox" id="js" name="web[]" value="js">
                <label for="js">JavaScript</label>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#formation').change(function () {
                var formation = $(this).val();

                $('#lpOptions, #webOptions').hide();

                if (formation === 'lp') {
                    $('#lpOptions').show();
                } else if (formation === 'web') {
                    $('#webOptions').show();
                }
            });
        });
    </script>



    <div>
        <input type="submit" value="S'inscrire" id="submitBtn">
    </div>
</form>

@endsection