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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script>
        var map;
        var x;
        var y;
        var marker = null;
        var m;
        var view;


        function initMap() {

            var myLatLng = {
                lat: -6.914864,
                lng: 107.608238
            };

            map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 14,
                mapTypeId: 'satellite'
            });

        }

        function loadmaps() {
            // $.getJSON("<?= base_url('load/'); ?>api.php?devicename=<?= $user['deviceName']; ?>", function(
            // $.getJSON("https://api.qubitro.com/v1/projects/8e0a61f4-ae72-4d83-a5b8-c929386aec87/devices/<?= $user['api_device'] ?>/data?keys=Btn,Lat,Lon&period=30&limit=1&page=1", function(result) {
            //     var m = result;
            //     x = Number(m[0].response.Lat);
            // }).done(function() {
            //     document.getElementById("lat").innerHTML = x;
            // });
            // $.getJSON("<?= base_url('load/'); ?>api.php?devicename=<?= $user['deviceName']; ?>", function(
            // $.getJSON("https://api.qubitro.com/v1/projects/8e0a61f4-ae72-4d83-a5b8-c929386aec87/devices/<?= $user['api_device'] ?>/data?keys=Btn,Lat,Lon&period=30&limit=1&page=1", function(result) {
            //     var m = result;
            //     y = Number(m[0].response.Lon);
            //     view = Number(m[0].response.Btn);
            // }).done(function() {
            //     document.getElementById("long").innerHTML = y;
            //     if (view == "1") {
            //         document.getElementById("pesan").setAttribute('class', 'alert alert-danger text-white mx-3');
            //         document.getElementById("pesan").innerHTML = "Button Active";
            //     } else {
            //         document.getElementById("pesan").setAttribute('class', 'alert alert-success text-white mx-3');
            //         document.getElementById("pesan").innerHTML = "Button Off";
            //     }
            //     initialize();
            // }).headers({
            //     'Authorization': 'Bearer qPpMmAM42dokpKSv9c3cz2YCO-ElVyuSiESqhELA',
            //     'Content-Type': 'application/json'
            // });
            $.ajax({
                url: "https://api.qubitro.com/v2/projects/8e0a61f4-ae72-4d83-a5b8-c929386aec87/devices/<?= $user['api_device'] ?>/data?page=1&limit=1&range=all",
                method: "GET",
                timeout: 0,
                headers: {
                    'Authorization': 'Bearer QB_WM2riP7S9Cqm2wQqtjBMgYTNoNTn4XAQqylv04xY',
                },
            }).done(function(result) {
                var m = result;
                y = Number(m.data[0].data.Lon);
                view = Number(m.data[0].data.Btn);
                x = Number(m.data[0].data.Lat);
                document.getElementById("lat").innerHTML = x;
                document.getElementById("long").innerHTML = y;
                if (view == "1") {
                    document.getElementById("pesan").setAttribute('class', 'alert alert-danger text-white mx-3');
                    document.getElementById("pesan").innerHTML = "Button Active";
                } else {
                    document.getElementById("pesan").setAttribute('class', 'alert alert-success text-white mx-3');
                    document.getElementById("pesan").innerHTML = "Button Off";
                }
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
</head>

<body>

    <!-- navbar -->
    <nav class="navbar fixed-top navbar-dark navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(''); ?>">Panic Button</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#footer">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('auth'); ?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->