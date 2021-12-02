<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap');
    body {
    font-family: 'Libre Baskerville', serif;
    font-size: 12px;    
    margin-top: 3.5cm;
    margin-bottom: 4.4cm;
    margin-left: 5.5cm;
    margin-right: 1cm;
    border:1px solid red;
    } 
    .contenedor {
        display: grid;
        grid-template-columns: 1fr 2fr 1fr;
        grid-template-rows: 50px auto;
    }
    .date {
    grid-row: 1; 
    grid-column: 3;
    }
    </style>
</head>
<body>
    {{$request->dateSended}}
    {{$request->destiny}}
    {{$request->bodyCart}}
    {{$request->byCart}}
</body>
</html>