<?php   
    $id = $_GET['id'];
    if(isset($_POST['NamaPelanggan'])){
        $nama = $_POST ['NamaPelanggan'];
        $alamat =$_POST ['Alamat'];
        $no_telepon = $_POST['NomorTelepon'];


        $query = mysqli_query($koneksi, "UPDATE pelanggan set NamaPelanggan='$nama',Alamat='$alamat',NomorTelepon='$no_telepon' where PelangganID=$id");
        if($query){
            echo '<script>alert("Ubah data berhasil")</script>';
        }else{
            echo '<script>alert("Ubah data gagal")</script>';

        }
    }

    $query =mysqli_query($koneksi,"SELECT*FROM pelanggan WHERE PelangganID=$id");
    $data = mysqli_fetch_array($query);
?>
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <a href="?page=pelanggan" class ="btn btn-danger">Kembali</a>
                        <hr>
                        <form method = "post">
                        <table class = "table table-bordered">
                            <tr>
                                <td width="200">Nama Pelanggan</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="NamaPelanggan" value="<?php echo $data['NamaPelanggan'];?>"></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>
                                    <textarea name="Alamat" rows="5" class="from-control"><?php echo $data['Alamat'];?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>No Telepon</td>
                                <td>:</td>
                                <td>
                                    <textarea name="NomorTelepon" type="number" step="0" class="from-control"><?php echo $data['NomorTelepon'];?></textarea>
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
                        </form> 
                    </div>