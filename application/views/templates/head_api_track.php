<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        #map {
            height: 300px;
            width: 90%;
        }
    </style>
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/'); ?>img/apple-icon.png">
    <link rel="icon" type="image/png" href="#">
    <title>
        <?= $title ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/'); ?>css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= base_url('assets/'); ?>css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= base_url('assets/'); ?>css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
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
                url: "https://api.qubitro.com/v1/projects/8e0a61f4-ae72-4d83-a5b8-c929386aec87/devices/<?= $user['api_device'] ?>/data?keys=Btn,Lat,Lon&period=30&limit=1&page=1",
                method: "GET",
                timeout: 0,
                headers: {
                    'Authorization': 'Bearer qPpMmAM42dokpKSv9c3cz2YCO-ElVyuSiESqhELA',
                },
            }).done(function(result) {
                var m = result;
                y = Number(m.response[0].lon);
                view = Number(m.response[0].btn);
                x = Number(m.response[0].lat);
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
    <!-- <script>
        setInterval(function() {
            $("#lat").load("<?= base_url('load/'); ?>lat.php");
        }, 600);
        setInterval(function() {
            $("#long").load("<?= base_url('load/'); ?>long.php");
        }, 600);
        setInterval(function() {
            $("#pesan").load("<?= base_url('load/'); ?>test.php");
        }, 600);
    </script> -->
</head>