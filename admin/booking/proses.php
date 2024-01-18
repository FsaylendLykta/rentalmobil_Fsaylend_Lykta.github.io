<?php
 require '../../koneksi/koneksi.php';

if($_GET['id'] == 'konfirmasi')
{
    $data2[] = $_POST['status'];
    $data2[] = $_POST['id_booking'];
    $sql2 = "UPDATE `tbl_rental_Fsaylend_Lykta` SET `konfirmasi_pembayaran`= ? WHERE id_booking= ?";
    $row2 = $koneksi->prepare($sql2);
    $row2->execute($data2);

    echo '<script>alert("Kirim Sukses , Pembayaran berhasil");history.go(-1);</script>'; 
}