<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    #map {
        height: 300px;
        width: 600px;
    }
    </style>
    <title><?= $title; ?></title>
    <link href="<?= base_url('assets/'); ?>style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script>
    var map;
    var x;
    var y;
    var marker = null;

    function initMap() {

        var myLatLng = {
            lat: -6.914864,
            lng: 107.608238
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 14
        });

    }

    function loadmaps() {
        $.getJSON("https://api.thingspeak.com/channels/1848875/feeds.json?api_key=0ATKYV8VNB0AL6RJ&results=1", function(
            result) {

            var m = result;

            x = Number(m.feeds[0].field2);
            //alert(x);

        });
        $.getJSON("https://api.thingspeak.com/channels/1848875/feeds.json?api_key=0ATKYV8VNB0AL6RJ&results=1", function(
            result) {

            var m = result;
            y = Number(m.feeds[0].field3);


        }).done(function() {

            initialize();
        });

    }
    window.setInterval(function() {
        loadmaps();
    }, 2000);

    function initialize() {
        //alert(y);
        var newPoint = new google.maps.LatLng(x, y);

        if (marker) {
            // Marker already created - Move it
            marker.setPosition(newPoint);
        } else {
            // Marker does not exist - Create it
            marker = new google.maps.Marker({
                position: newPoint,
                map: map
            });
        }

        // Center the map on the new position
        map.setCenter(newPoint);
        var infowindow = new google.maps.InfoWindow({
            content: '<p>Marker Location:' + marker.getPosition() + '</p>'
        });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script>
    setInterval(function() {
        $("#lat").load("<?= base_url('load/'); ?>lat.php");
    }, 600);
    setInterval(function() {
        $("#long").load("<?= base_url('load/'); ?>long.php");
    }, 600);
    setInterval(function() {
        $("#pesan").load("<?= base_url('load/'); ?>test.php");
    }, 600);
    </script>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">PTA LoRaWAN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= base_url(''); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->