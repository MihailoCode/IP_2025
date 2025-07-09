<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnici</title>
</head>
<body>
    <h1> Lista korisnika </h1>
    <ul>
        @foreach ($korisnici as $korisnik) 
            <li> {{ $korisnik->ime }}, {{ $korisnik->email }} </li>
        @endforeach
    </ul>
</body>
</html>