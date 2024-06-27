<?php
function delete($id){
    return "DELETE FROM lokasi WHERE id = $id";
}

function update($id, $lat_long, $nama_tempat, $kategori, $keterangan) {
    return "UPDATE lokasi SET latlong='$lat_long', nama_tempat='$nama_tempat', kategori='$kategori',
keterangan='$keterangan' WHERE id = $id";
}

function select_lokasi($id){
    return "SELECT * FROM lokasi WHERE id = $id";
}

?>
