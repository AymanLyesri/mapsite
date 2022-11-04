s


<!DOCTYPE html>
<html class="h-100 w-100">

<head>
    <title>hi there</title>
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.12.0/build/ol.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>

<body class="bg-dark h-100 w-100">
    <!--upper section-->

    <div class="container-fluid w-100 fixed-top" style="background-color: goldenrod" id="navynavy">
        <nav class="nav row">
            <button class="btn btn-outline-dark w-25 h-50 m-auto" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                Choose your destination
            </button>
            <h1 class="col font-weight-bold text-center text-white h-100 w-75">
                EazyTravel
            </h1>
        </nav>
    </div>

    <!--php test-->

    <?php

    $email = $_GET['login'];

    echo "<div class='container-fluid w-75 h-50 p-5 text-white'> <h1>welcome $email</h1></div>";

    ?>


    <!-- 73245643 -->

    <!--Map-->

    <div class="container-fluid w-75 h-50 align-self-center"
        style="margin-top: 100px; border: thick dotted white; border-radius: 10px">
        <div id="map" class="w-100 h-100"></div>
    </div>

    <!--map overlay-->

    <div id="popup" class="ol-popup">
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
                        <h5 class="card-title">Restaurants</h5>
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
                        <a href="hotels.php" class="btn btn-primary stretched-link">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--info-->

    <div class="container-fluid mt-5 w-100" style="height: 200px">
        <h2 class="text-center text-warning">Info:</h2>
        <p class="text-center text-white">
            La meilleur facon de decouvrir de nouveaux restaurants et hotels
            facilement pour avoir des moments incroyables!!
        </p>
    </div>
    <div class="container-fluid m-1 w-100 text-center" style="height: 200px">
        <h2 class="text-secondary">Supporter moi :</h2>
        <a href="https://github.com/AymanLyesri" class="btn btn-outline-warning" role="button">My Github</a>
        <a href="lyesri99@gmail.com" class="btn btn-outline-warning" role="button">Mon Email</a>
    </div>
</body>
<script src="script.js"></script>

</html>