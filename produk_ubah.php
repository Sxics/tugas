<?php
     $id = $_GET['id'] ; // Make sure ProdukID is passed through the URL
    if(isset($_POST['NamaProduk'])){
        $nama_produk = $_POST ['NamaProduk'];
        $harga =$_POST ['harga'];
        $stok = $_POST['stok'];

        $query = mysqli_query($koneksi, "UPDATE produk set NamaProduk='$nama_produk',Harga='$harga',Stok='$stok' where ProdukID=$id");
        if($query){
            echo '<script>alert("Tamabah data berhasil")</script>';
        }else{
            echo '<script>alert("Tamabah data gagal")</script>';

        }
    }
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID=$id");
    $data = mysqli_fetch_array($query);
?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                        <a href="?page=produk" class ="btn btn-danger">Kembali</a>
                        <hr>
                        <form method = "post">
                        <table class = "table table-bordered">
                            <tr>
                                <td width="200">Nama Produk</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="NamaProduk"value="<?php echo $data['NamaProduk'];?>"></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td>
                                    <textarea name="harga" rowsharga="5" class="from-control"value=""><?php echo $data['Harga'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td>
                                    <textarea name="stok" type="number" step="0" class="from-control"value=""><?php echo $data['Stok'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>

                                </td>
                            </tr>
                        </table>
                    </div>