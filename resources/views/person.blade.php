<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>People (Server-side)</title>
</head>
<body>
    <h1>Pessoas (renderizado pelo Laravel)</h1>
    <ul>
        @foreach($people as $person)
            <li>{{ $person->name }}</li>
        @endforeach
    </ul>
</body>
</html>
