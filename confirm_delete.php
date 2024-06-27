<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Data</title>
<!-- <link rel="stylesheet" href="../assets/styles.css"> -->
<style>
.confirm-popup {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.confirm-popup-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    text-align: center;
}

.confirm-popup-content a {
    padding: 10px 20px;
    text-decoration: none;
    margin: 0 10px;
    cursor: pointer;
}

.confirm-popup-content a:hover {
    background-color: #ddd;
}

</style>
</head>
<body>

<div id="confirmPopup" class="confirm-popup">
    <div class="confirm-popup-content">
        <p>Yakin ingin menghapus ?</p>
        <a href="#" id="confirmYes">Yes</a>
        <a href="#" id="confirmNo">No</a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('confirmPopup').style.display = 'block';
});

document.getElementById('confirmYes').addEventListener('click', function() {
    window.location.href = 'delete.php?id=<?php echo $id; ?>&confirm=yes';
});

document.getElementById('confirmNo').addEventListener('click', function() {
    window.location.href = 'delete.php?id=<?php echo $id; ?>&confirm=no';
});
</script>

</body>
</html>
