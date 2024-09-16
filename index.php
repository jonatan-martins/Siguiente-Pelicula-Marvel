<?php

const API_URL = "https://whenisthenextmcufilm.com/api";
# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petición
    y guardamos el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);
curl_close($ch);




?>

<head>
    <title>La próxima película de Marvel</title>
    <meta charset="UTF-8"/>
    <meta name="description" content="La próxima película de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    /> 
</head>


<style>
    body{
        display: grid;
        place-content: center;
        background: #454545;
    }

    section{
        margin-top: 10%;
        display: flex;
        justify-content: center;
        text-align: center;
        color: white;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        color: white;
    }

    img{
        margin: 0 auto;
    }

    h1, h3{
        color: white;
    }

    p{
        color: lightgray;
    }

</style>

<main>
    <h1>
        La siguiente pelicula de Marvel es:
    </h1>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width ="200" alt="Poster de <?=$data["title"]; ?>"
        style="border-radius: 16px"/>
    </section>  
    
    <hgroup>
        <h3><?=$data["title"];?> se estrena en <?=$data["days_until"]; ?> días</data></h3>
        <p>Fecha de estreno: <?=$data["release_date"]?></p>
        <p>La siguiente es: <?=$data["following_production"]["title"]?></p>
    </hgroup>
</main>
