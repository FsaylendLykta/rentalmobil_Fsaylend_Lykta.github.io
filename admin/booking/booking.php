<?php
    require '../../koneksi/koneksi.php';
    $title_web = 'Daftar Booking';
    include '../header.php';
    if(empty($_SESSION['USER']))
    {
        session_start();
    }
    if(!empty($_GET['id'])){
        $id = strip_tags($_GET['id']);
        $sql = "SELECT tbl_mobil_Fsaylend_Lykta.merk, tbl_rental_Fsaylend_Lykta.* FROM tbl_rental_Fsaylend_Lykta JOIN tbl_mobil_Fsaylend_Lykta ON 
                tbl_rental_Fsaylend_Lykta.id_mobil=tbl_mobil_Fsaylend_Lykta.id_mobil WHERE id_login = '$id' ORDER BY id_booking DESC";
    }else{
        $sql = "SELECT tbl_mobil_Fsaylend_Lykta.merk, tbl_rental_Fsaylend_Lykta.* FROM tbl_rental_Fsaylend_Lykta JOIN tbl_mobil_Fsaylend_Lykta ON 
                tbl_rental_Fsaylend_Lykta.id_mobil=tbl_mobil_Fsaylend_Lykta.id_mobil ORDER BY id_booking DESC";
    }
    $hasil = $koneksi->query($sql)->fetchAll();
?>

<br>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary">
            <h5 class="card-title">
            Data Rental
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Booking</th>
                            <th>Tanggal Sewa </th>
                            <th>Pelanggan </th>
                            <th>Mobil</th>
                            <th>Lama Sewa </th>
                            <th>Total Harga</th>
                            <th>Konfirmasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  $no=1; foreach($hasil as $isi){?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?= $isi['kode_booking'];?></td>
                            <td><?= $isi['tanggal'];?></td>
                            <td><?= $isi['nama'];?></td>
                            <td><?= $isi['merk'];?></td>
                            <td><?= $isi['lama_sewa'];?> hari</td>
                            <td>Rp. <?= number_format($isi['total_harga']);?></td>
                            <td><?= $isi['konfirmasi_pembayaran'];?></td>
                            <td>
                                <a class="btn btn-primary" href="bayar.php?id=<?= $isi['kode_booking'];?>" 
                                role="button">Detail</a>   
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php  include '../footer.php';?>