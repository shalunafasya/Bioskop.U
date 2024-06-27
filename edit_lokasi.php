<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Locations</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .btn-close {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 50px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .btn-close::before, .btn-close::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 30px;
            height: 5px;
            background-color: black;
        }

        .btn-close::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .btn-close::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }
    </style>
</head>

<body>
<button type="button" class="btn-close" aria-label="Close" onclick="window.location.href='index.php';"></button>
    <div class="container mt-5">
        <h1 class="mb-4">Locations</h1>
        <a href="tambah_lokasi.php" class="btn btn-success mb-3">Add Location</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Latitude, Longitude</th>
                    <th>Nama Bioskop</th>
                    <th>Kategori</th>
                    <th>Alamat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $conn = new mysqli("localhost", "root", "", "bioskop");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch data
                $sql = "SELECT id, lat_long, nama_tempat, kategori, keterangan FROM lokasi";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["lat_long"] . "</td>
                                <td>" . $row["nama_tempat"] . "</td>
                                <td>" . $row["kategori"] . "</td>
                                <td>" . $row["keterangan"] . "</td>
                                <td>
                                    <a href='update.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Update</a>
                                    <a href='delete.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No locations found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
