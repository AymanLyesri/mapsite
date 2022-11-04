<?php




?>

<!DOCTYPE html>
<html class="h-100 w-100">

<head>
    <title>hi there</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>

<body class="bg-dark h-100 w-100">
    <!--upper section-->

    <div class="container-fluid bg-primary w-100">
        <nav class="nav">
            <button class="btn btn-primary w-25 h-50 m-auto" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Choose your destination
            </button>
        </nav>
    </div>
    <!--Map-->

    <div class="container-fluid w-75 h-50 align-self-center border border-secondary mt-5">
        <div id="map" class="w-100 h-100"></div>
    </div>

    <!--map overlay-->

    <div id="popup" class="ol-popup text-black">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content"></div>
    </div>

    <!--offcanvas -->

    <div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">QuickTravel</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!--body-->
            <div class="container-fluid w-100 m-1 text-black">
                <div class="card w-100">
                    <img src="img/external-content.duckduckgo.jpg" class="card-img" alt="click" />
                    <div class="card-body">
                        <h5 class="card-title">Restaurents</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                        <a href="restaurants.php" class="btn btn-primary stretched-link">
                            Go somewhere
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid w-100 m-1 text-black">
                <div class="card w-100">
                    <img src="img/little-national-sydney-lounge.jpg" class="card-img" alt="click" />
                    <div class="card-body">
                        <h5 class="card-title">Hotels</h5>
                        <p class="card-text">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                        <a href="hotels.html" class="btn btn-primary stretched-link">
                            Go somewhere
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid w-100 text-center m-2">
            <a href="page.php" class="btn btn-danger">HomePage</a>
        </div>
    </div>

    <!--info-->

    <div class="container-fluid mt-5"></div>



</body>
<script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.12.0/build/ol.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>


<?php

include "controller.php";

$id = $_GET['id'];

$rest = new restaurant();

$rest->map_init($id);

$rest->map_one($id);

$rest->display_one($id);

?>

</html>