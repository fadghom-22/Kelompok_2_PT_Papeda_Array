<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Sport Zone</title>
</head>

<body>
  <?php error_reporting(0);
include 'c/konek.php';
$kd = $_GET['kd'];
?>
    <?php
if (!empty($kd))
{

?>
      <?php
?>
        <div class="modal-dialog">
          <div class="modal-content">
            <center>
              <h3 class="modal-title">KONFIRMASI PEMBAYARAN</h3> </center>
            <div class="modal-body">
              <form class="form-horizontal form-label-left" action=" " method="post" enctype="multipart/form-data">
                <input type="hidden" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kd; ?>" readonly>
                <br>
                <h4>NO. REK PENGIRIM</h4>
                <input type="text" id="first-name" name="rek_kirim" required="required" class="form-control col-md-7 col-xs-12" value="" placeholder="xxxx-xxx-xxxx-xx">
                <br>
                <h4>NO. REK YANG DITUJU</h4>
                <br>
                <div class="radio">
                  <label>
                    <input type="radio" name="rek_tuju" value="bri"><img src="bri.jpg" style="width:200px; height:80px;"> xxxx-xxx-xxxx-xx (an. xxxxx)</label>
                </div>
                <br>
                <h4>UPLOAD BUKTI</h4>
                <br>
                <div class="input-group">
                  <input name="foto_bukti" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload"> </div>
                <br>
                <br> </div>
            <div class="modal-footer">
              <a href="./">
                <button type="button" class="btn btn-danger">Close</button>
              </a>
              <button type="submit" name="up" class="btn btn-primary">Konfirmasi</button>
              </form>
            </div>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php
    if (isset($_POST['up']))
    {
        $id_book = $_POST['id_book'];
        $rek_kirim = $_POST['rek_kirim'];
        $rek_tuju = $_POST['rek_tuju'];
        $status = "Menunggu Konfirmasi admin";
        $foto = $_FILES['foto_bukti']['name'];
        $tipe = $_FILES['foto_bukti']['type'];
        $lokasi = $_FILES['foto_bukti']['tmp_name'];
        //simpan foto ke folder
        copy($lokasi, "./assets/bukti_bayar/" . $foto);
        if($tipe == "image/jpeg" || $tipe == "image/png" ) {
        //simpan ke database
        $simpan = "insert into bayar_transfer values('$id_book','$rek_kirim','$rek_tuju','$status','$foto')";
        //update data di database
        $s = mysqli_query($koneksi, "update transaksi set status = '$status' where id_book = '$id_book'");
        $pro = mysqli_query($koneksi, $simpan);
        
        if ($pro && $s)
        { //jika berhasil menyimpan dan update
            echo "<script> alert(\"Silahkan Tunggu  konfirmasi Admin\"); window.location = \"index.php\"; </script>";
        }
        else
        { //jika tidak
            echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";
        }
    }
    else {
      echo "<script> alert(\"File yang anda upload bukan gambar\");</script>";
    }
  }

}
else
{

    echo "<br><br><r><center><h1>ID TERSEBUT TIDAK DITEMUKAN</h1></center>";

} ?>
          </div>
</body>

</html>