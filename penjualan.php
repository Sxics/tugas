<div class="container-fluid px-4">
                        <h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pembelian </li>
                        </ol>
                        <a href="?page=penjualan_tambah" class ="btn btn-primary">+ Tambah Pembelian</a>
                        <hr>
                        <table class ="table table-bordered">
                            <tr>
                                <th>Tanggal</th>
                                <th>Total</th>
                                <th>Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            
                                $query =  mysqli_query($koneksi,"SELECT * FROM penjualan LEFT JOIN pelanggan ON pelanggan.PelangganID = penjualan.PelangganID");
                                while($data = mysqli_fetch_array($query))
                                {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['TanggalPenjualan']; ?> </td>
                                        <td><?php echo $data['TotalHarga']; ?> </td>
                                        <td><?php echo $data['PelangganID']; ?> </td>
                                        <td>
                                            <a href="?page=penjualan_detail&&id=<?php echo $data['PenjualanID'];?>"class="btn btn-secondary">Detail</a>
                                            <a href="?page=penjualan_hapus&&id=<?php echo $data['PenjualanID'];?>"class="btn btn-danger">Hapus</a>

                                        </td>

                                    </tr>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>