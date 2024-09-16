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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/> 
</head>

<style>
    body {
        display: grid;
        place-content: center;
        background: #454545;
        margin: 0;
    }

    h1 {
        text-align: center;
        color: white;
        margin-bottom: 20px;
    }

    .padre {
        display: flex;
        flex-wrap: wrap; /* Permite que las películas se ajusten en pantallas pequeñas */
        gap: 30px; /* Espacio entre las películas */
        justify-content: center;
        align-items: stretch; /* Hace que ambos divs tengan la misma altura */
        margin-top: 4%;
    }

    .padre div {
        flex: 1; /* Hace que ambos divs tengan el mismo ancho */
        text-align: center;
        background-color: #333;
        padding: 30px;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Distribuye los elementos equitativamente */
        max-width: 600px; /* Limita el ancho de cada div */
        padding-bottom: 20px;
    }

    section {
        margin-top: 0px;
        display: flex;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .diasRestantes {
        flex-grow: 1;
        height: 30vh;
    }

    .fechaEstreno {
        margin-bottom: 0px;
        align-self: center;
    }
    

    img {
        width: 100%;
        max-width: 200px;
        margin: 0 auto;
        display: block;
        border-radius: 16px;
    }

    h1, h3 {
        color: white;
        margin: 10px 0;
    }

    p {
        color: lightgray;
        margin: 10px 0;
    }

    .titulo {
        padding: 20px;
        border-radius: 16px;
    }

    footer p {
        text-align: center;
        color: white;
        margin-top: 30px;
        margin-bottom: 0px;
    }
</style>

<main>
    <h1 class="titulo">Las siguientes peliculas de Marvel son:</h1>
    <div class="padre">
        <div>
            <section>
                <img src="<?= $data["poster_url"]; ?>" alt="Poster de <?=$data["title"]; ?>" />
            </section>
            <div class="diasRestantes">
                <h3><?=$data["title"];?> se estrena en <?=$data["days_until"]; ?> días</h3>
            </div>
            <div class="fechaEstreno">
                <p>Fecha de estreno: <?=$data["release_date"];?></p>
            </div>
        </div>

        <div>
            <section>
                <img src="<?=$data["following_production"]["poster_url"]; ?>" alt="Poster de <?=$data["following_production"]["title"]; ?>"/>
            </section>
            <div class="diasRestantes">
                <h3><?=$data["following_production"]["title"]; ?> se estrena en <?=$data["following_production"]["days_until"];?> días</h3>
            </div>
            <div class="fechaEstreno">
                <p>Fecha de estreno: <?=$data["following_production"]["release_date"];?></p>
            </div>
        </div>
    </div>
    <footer>
        <p>Jonatan Martins do Vale - 2º DAW</p>
    </footer>
</main>
