<?php
    session_start();
    include 'config.php';
    include 'queries.php';
    $conn = connect_to_db();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST['latlong']) && !empty($_POST['nama_tempat']) && !empty($_POST['kategori']) && !empty($_POST['keterangan']) && !empty($_POST['id'])) {
            
            $lat_long = $_POST['latlong'];
            $nama_tempat = $_POST['nama_tempat'];
            $kategori = $_POST['kategori'];
            $keterangan = $_POST['keterangan'];
        
            $sql = update($id, $lat_long, $nama_tempat, $kategori, $keterangan);
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Data berhasil diupdate'); window.location.href = 'edit_lokasi.php';</script>";
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
                echo "<script>alert('Data berhasil diupdate'); window.location.href = 'edit_lokasi.php';</script>";
            }
        } else {
            echo "<script>alert('Semua data harus diisi'); window.history.back();</script>";
        }
    }
    
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
    
        $sql = select_lokasi($id);
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $lat_long = $row['lat_long'];
            $nama_tempat = $row['nama_tempat'];
            $kategori = $row['kategori'];
            $keterangan = $row['keterangan'];
        } else {
            echo "Lokasi tidak ada.";
            exit();
        }
    } else {
        echo "Invalid request.";
        exit();
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="assets/styles.css">
    </head>
    <body>
    
    <div class="container">
        <div class="jumbotron">
            <h1>Update Location</h1>
            <hr>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <div class="form-group">
                    <label for="latlong">Latitude, Longitude</label>
                    <input type="text" class="form-control" id="latlong" name="latlong" value="<?php echo htmlspecialchars($lat_long); ?>">
                </div>
                <div class="form-group">
                    <label for="nama_tempat">Nama Tempat</label>
                    <input type="text" class="form-control" name="nama_tempat" value="<?php echo htmlspecialchars($nama_tempat); ?>">
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori" id="kategori">
                        <option value="">--Kategori Tempat--</option>
                        <option value="CGV" <?php if ($kategori == 'CGV') echo 'selected'; ?>>CGV</option>
                        <option value="XXI" <?php if ($kategori == 'XXI') echo 'selected'; ?>>XXI</option>
                        <option value="CINEPOLIS" <?php if ($kategori == 'CINEPOLIS') echo 'selected'; ?>>CINEPOLIS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" cols="30" rows="5"><?php echo htmlspecialchars($keterangan); ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" style="background-color: #b30000; color: white;">Update</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php
    if (!empty($errors)) {
        echo "<div class='errors'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
    ?>
    
    </body>
    </html>
    