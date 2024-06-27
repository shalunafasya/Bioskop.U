<?php
include 'config.php';
include 'queries.php';

$conn = connect_to_db();
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        $sql = delete($id);
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Data berhasil dihapus'); window.location.href = 'edit_lokasi.php';</script>";
            exit();
        } else {
            echo "Error deleting record: " . $conn->error;
            echo "<script>alert('Data gagal dihapus'); window.location.href = 'edit_lokasi.php';</script>";
        }
    } elseif (isset($_GET['confirm']) && $_GET['confirm'] == 'no') {
        header("Location:edit_lokasi.php");
        exit();
    } else {
        include 'confirm_delete.php';
    }
} else {
    echo "Invalid request.";
}
?>
