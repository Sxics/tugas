<?php
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.PelangganID =penjualan.PelangganId WHERE PenjualanID=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Pembelian</li>
                        </ol>
                        <a href="?page=pembelian" class ="btn btn-danger">+ Tambah Data</a>
                        <hr>
                        <form method = "post">          
                        <table class = "table table-bordered">
                            <tr>
                                <td width="200">Nama Pelanggan</td>
                                <td width="1">:</td>
                                <td>
                                    <?php echo $data['NamaPelanggan'];?>
                                </td>
                            </tr>
                            <?php
                                $pro = mysqli_query($koneksi,"SELECT * FROM detailpenjualan LEFT JOIN produk on produk.ProdukID=detailpenjualan.ProdukID WHERE PenjualanID =$id");
                                while($produk = mysqli_fetch_array($pro)){
                                    ?>
                                    <tr>
                                        <td><?php echo $produk ['NamaProduk'];?></td>
                                        <td>:</td>
                                        <td> 
                                            Harga Satuan : <?php echo $produk ['Harga']; ?><br>
                                            Jumlah : <?php echo $produk ['JumlahProduk']; ?><br>
                                            Sub total : <?php echo $produk ['Subtotal']; ?><br>


                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                        
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                        <?php echo  $data['TotalHarga']?>  ;
                                </td>
                            </tr>
                        </table>
                    </div>