<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPgLoFxMM4DEbbg6YCV54f4zH8d1bngsQ"></script>
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
        var markers = [];

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: {
                    lat: -6.21462,
                    lng: 106.84513
                }, // Koordinat default untuk pusat peta
                mapTypeId: 'satellite'
            });
        }

        function addMarker(location) {
            if (location.btn == 0) {
                var Btn = "Button off";
            } else if (location.btn == 1) {
                var Btn = "Button on";
            }
            var marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(location.lat),
                    lng: parseFloat(location.long)
                },
                map: map,
            });

            var infowindow = new google.maps.InfoWindow({
                content: '<p>Last button status = ' + Btn + '</p>' + '<p>Long = ' + location.long + '<br>' +
                    'Lat = ' + location.lat + '</p>',
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });

            markers.push(marker);
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }

        function loadmap() {
            $.ajax({
                url: "<?= base_url('home/') ?>getjson/<?= $user['deviceName'] ?>",
                type: 'GET',
                success: function(locations) {
                    locations = JSON.parse(locations);
                    var lastData = locations[locations.length - 1];
                    document.getElementById("lat").innerHTML = lastData.lat;
                    document.getElementById("long").innerHTML = lastData.long;
                    clearMarkers();
                    locations.forEach(function(location) {
                        addMarker(location);
                    });
                    map.setCenter({
                        lat: parseFloat(lastData.lat),
                        lng: parseFloat(lastData.long)
                    });
                }
            });
        }
        $(document).ready(function() {
            loadmap();
        });
        google.maps.event.addDomListener(window, 'load', initMap);
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