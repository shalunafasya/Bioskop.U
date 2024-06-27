<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Membuat Peta</title>
    <!-- leaflet css -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background-color: black;
        }

        .container-fluid {
            height: calc(100% - 56px); /* Adjust height to account for navbar */
            padding: 0;
        }

        .row {
            height: 100%;
            margin: 0;
        }

        .jumbotron {
            height: 100%;
            border-radius: 0;
            margin: 0;
        }

        #mapid {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color: #b30000;">BIOSKOP YOGYAKARTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <span class="navbar-text">
                    <a href="edit_lokasi.php" class="btn" style="background-color: #b30000; color: white;">Edit Lokasi</a>
                </span>
                <!-- <span></span>
                <span class="navbar-text">
                    <a href="tambah_lokasi.php" class="btn" style="background-color: #b30000; color: white;">Tambah Lokasi</a>
                </span> -->
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <div id="mapid"></div>
        </div>
    </div>

    <!-- leaflet js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
    <script>
        // set lokasi latitude dan longitude, lokasinya kota yogyakarta
        var mymap = L.map('mapid').setView([-7.800697372464638, 110.3648874864441], 11);

        // Use OpenStreetMap tiles instead of Mapbox for simplicity
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        // buat variabel berisi fungsi L.popup
        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e.latlng.toString()) //set isi konten yang ingin ditampilkan
                .openOn(mymap);
            document.getElementById('latlong').value = e.latlng.lat + ", " + e.latlng.lng; //value pada form latitde, longitude akan berganti secara otomatis
        }
        mymap.on('click', onMapClick); //jalankan fungsi

        function popUp(f, l) {
            var out = [];
            if (f.properties) {
                for (key in f.properties) {
                    out.push(key + ": " + f.properties[key]);
                }
                l.bindPopup(out.join("<br />"));
            }
        }
        var jsonTest = new L.GeoJSON.AJAX(["geojson/id-yo.geojson"], {
            onEachFeature: popUp
        }).addTo(mymap);

        <?php
        $mysqli = mysqli_connect('localhost', 'root', '', 'bioskop'); //koneksi ke database
        $tampil = mysqli_query($mysqli, "select * from lokasi"); //ambil data dari tabel lokasi
        while ($hasil = mysqli_fetch_array($tampil)) {
            $lat_long = str_replace(['[', ']', 'LatLng', '(', ')'], '', $hasil['lat_long']);
            $lat_long = explode(',', $lat_long);
            $lat = trim($lat_long[0]);
            $lng = trim($lat_long[1]);
            $nama_tempat = $hasil['nama_tempat'];
            $kategori = $hasil['kategori'];
            $keterangan = $hasil['keterangan'];
            ?>
            L.marker([<?php echo $lat; ?>, <?php echo $lng; ?>]).addTo(mymap)
                .bindPopup(`<b> <?php echo $nama_tempat; ?></b><br>Kategori: <?php echo $kategori; ?><br>Alamat: <?php echo $keterangan; ?>`);
        <?php } ?>
        
    </script>
</body>

</html>
