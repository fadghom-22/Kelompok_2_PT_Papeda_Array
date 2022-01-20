   <?php 
include 'c/konek.php';
error_reporting(0);
?>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <p style="font-size:20px; color:black;"><b>Konfirmasi Pembayaran</b></p><hr>
        <p class="align-baseline" style="font-size:14px; color:black;" align="left">Kode Booking<br>
 <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
          <input type="text" name="kata_kunci" style="width: 18rem; " class="form-control" placeholder="Kode" aria-label="Username"></p>
<button type="submit" class="btn btn-danger" style="float:left; padding-right:5%;">
  SUBMIT
</button>
<br><br><br>
</form>

        <?php

        include "c/konek.php";
        if (isset($_POST['kata_kunci'])) {
        	if (!empty($_POST["kata_kunci"])) {
        	$kata_kunci=trim($_POST['kata_kunci']);
            $sql="select * from transaksi where id_book like '%".$kata_kunci."%' order by status asc";
 $hasil=mysqli_query($koneksi,$sql);
 $lah = mysqli_fetch_array($hasil);
 if (!empty($lah["id_lap"])) {
 $kata_kunci=trim($_POST['kata_kunci']);
            $sql="select * from transaksi where id_book like '%".$kata_kunci."%' order by status asc";
 $hasil=mysqli_query($koneksi,$sql);
 echo "<table width='100%'><tbody><tr>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'>Nama Lapangan</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'>Kode Booking</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'>Total Harga</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'>Status</th>
 <tr>"; $data = mysqli_fetch_array($hasil);

            ?>

                <td style='border:solid black 1px;'><?php echo $data["id_lap"];   ?></td>
                <td style='border:solid black 1px;'><?php echo $data["id_book"];  ?></td>
                <td style='border:solid black 1px;'><?php echo $data["total_harga"];  ?></td> 
                <td style='border:solid black 1px;'><?php echo $data["status"];  ?></td> 

    			<?php 

echo "</tr></tbody></table";
}

else {  
    echo "DATA TIDAK DITEMUKAN";
}
 }
else {  
    echo "KODE BOOKING BELUM DI ISI";
}
           }
else {}
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
