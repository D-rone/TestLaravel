<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div id="container">

        <div id="navbar">
            <a href="/acceuil">Acceuil</a>
            <a href="/inscription">Inscription</a>
        </div>

        <div id="content">
            @yield("inscription")
            @yield("acceuil")
        </div>


    </div>


</body>

</html>