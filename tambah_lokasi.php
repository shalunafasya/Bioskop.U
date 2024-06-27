<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .jumbotron {
            height: 100%;
            border-radius: 0;
        }

        body {
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Add Location</h1>
            <hr>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Latitude, Longitude</label>
                    <input type="text" class="form-control" id="latlong" name="latlong">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama Bioskop</label>
                    <input type="text" class="form-control" name="nama_tempat">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori Bioskop</label>
                    <select class="form-control" name="kategori" id="">
                        <option value="">--Kategori Tempat--</option>
                        <option value="CGV">CGV</option>
                        <option value="XXI">XXI</option>
                        <option value="CINEPOLIS">CINEPOLIS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Alamat</label>
                    <textarea class="form-control" name="keterangan" cols="30" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" style="background-color: #b30000; color: white;">Add</button>
                </div>
            </form>
        </div>
    </div>
    <!-- leaflet js -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        // Initialize the map
        var mymap = L.map('mapid').setView([-2.9547949, 104.6929233], 13);

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
    </script>
</body>
