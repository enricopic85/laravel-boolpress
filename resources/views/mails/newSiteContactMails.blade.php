<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Nuovo messaggio ricevuto dal form contatti</h1>
    <ul>
        @if ($newContactInfo->name)
        <li>Nome: {{$newContactInfo->name}}</li>
        @endif
        <li>Email:{{$newContactInfo->email}}</li>
        <li>Messaggio: {{$newContactInfo->message}}</li>
    </ul>
</body>
</html>