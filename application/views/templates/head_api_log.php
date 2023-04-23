<!DOCTYPE html>
<html>

<head>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPgLoFxMM4DEbbg6YCV54f4zH8d1bngsQ"></script>
    <style>
        #map {
            height: 400px;
            width: 90%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                url: "<?= base_url('user/') ?>getjson/<?= $user['deviceName'] ?>",
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