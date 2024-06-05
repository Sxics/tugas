<?php
    if(isset($_POST['PelangganID'])){
        $id_pelanggan = $_POST ['PelangganID'];
        $produk =$_POST ['produk'];
        $total = 0;
        $tanggal = date ('Y/m/d');

        $query = mysqli_query($koneksi, "INSERT INTO penjualan (TanggalPenjualan,TotalHarga,PelangganID) values ('$tanggal','$total','$id_pelanggan')");
        
        $idTerakhir = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM penjualan ORDER BY PenjualanID DESC"));
        $PenjualanID = $idTerakhir['PenjualanID'];
        foreach($produk as $key =>$val){
        
            $pr = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM produk WHERE ProdukID =$key"));

        if($val>0){
            $sub = $val * $pr['Harga'];
            $total += $sub;
            $query = mysqli_query($koneksi,"INSERT INTO detailpenjualan(PenjualanID,ProdukID,JumlahProduk,Subtotal) values ('$PenjualanID','$key','$val','$sub')");
        
            $updateProduk = mysqli_query($koneksi,"UPDATE produk SET stok=stok-$val WHERE ProdukID=$key");
        }

    }
        $query = mysqli_query($koneksi,"UPDATE penjualan SET TotalHarga=$total WHERE PenjualanID=$PenjualanID");

        if($query){
            echo '<script>alert("Tambah data berhasil")</script>';
        }else{
            echo '<script>alert("Tambah data gagal")</script>';

        }
    }
?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pembelian</li>
                        </ol>
                        <a href="?page=penjualan" class ="btn btn-danger">Kembali</a>
                        <hr>
                        <form method = "post">
                        <table class = "table table-bordered">
                            <tr>
                                <td width="200">Nama Pelanggan</td>
                                <td width="1">:</td>
                                <td>
                                    <select class="form-control form-select" name="PelangganID" >
                                        <?php
                                        $p = mysqli_query($koneksi,"SELECT * FROM pelanggan");
                                        while($pel = mysqli_fetch_array($p)){
                                            ?>
                                            <option value="<?php echo $pel['PelangganID'];?>"><?php echo $pel['NamaPelanggan'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                                $pro = mysqli_query($koneksi,"SELECT * FROM produk");
                                while($produk = mysqli_fetch_array($pro)){
                                    ?>
                                    <tr>
                                        <td><?php echo $produk ['NamaProduk'].'(Stok:'.$produk['Stok'].')';?></td>
                                        <td>:</td>
                                        <td>
                                            <input class ="from-contol" type="number"
                                            step="0" value ="0" max="<?php echo $produk['Stok'];?>"name ="produk[<?php echo $produk['ProdukID'];?>]">

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        
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