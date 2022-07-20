<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista prueba</title>
</head>
<body>
        {{$pruebaJoin}}
        <p>{{$pruebaJoin->numeroCinta}}</p>
        <p>{{$pruebaJoin->contenido_fk}}</p>
        <p>{{$pruebaJoin->getContenido}}</p>
    
</body>
</html>