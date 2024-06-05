<?php
$id = $_GET ['id'];
$query = mysqli_query($koneksi,"DELETE FROM penjualan WHERE PenjualanID=$id");
$query = mysqli_query($koneksi,"DELETE FROM detailpenjualan WHERE PenjualanID=$id");
if($query){
    echo '<script>alert("Hapus data berhasil"); location.href="?page=penjualan"</script>';

}else{
    echo '<script>alert("Hapus data gagal")</script>';

}