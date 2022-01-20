<?php 
include 'c/konek.php';

session_start();
 error_reporting(0);
if (!isset($_SESSION['nm'])) {
    header("Location: index.php");
}
if(isset($_SESSION['nm'])){
  $username = $_SESSION['nm'];
  $sql = "select * from member where nama = '$username'";
  $query_sel = mysqli_query($koneksi,$sql);
  $sql_sel = mysqli_fetch_array($query_sel);
  
  ?>
                    <?php

       $number = uniqid();
    $varray = str_split($number);
    $len = sizeof($varray);
    $otp = array_slice($varray, $len-4, $len);
    $otp = implode(",", $otp);
    $otp = str_replace(',', '', $otp);
 // membuat kode urut otomatis sebagai ID booking
            $sql = "SELECT max(id_book) as terakhir from transaksi";
            $hasil = mysqli_query($koneksi,$sql);
            $data = mysqli_fetch_array($hasil);
            $lastID = $data['terakhir'];
            $lastNoUrut = substr($lastID, 3, 9);
            $nextNoUrut = $lastNoUrut + 1;
            $nextID = "SZ".$otp.sprintf("%02s",$nextNoUrut);


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=1024">

  <title>fitrah</title>
  <meta name="description" content="lapangan" />
  <meta name="keywords" content="lpagan bola, bola kilo 12 sorong" />
  <meta name="author" content="FIBO">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/images/logo-xsmall.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/images/logo-xsmall.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/images/logo-xsmall.png">
  <link rel="apple-touch-icon-precomposed" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/images/logo-xsmall.png">
  <link rel="shortcut icon" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/images/logo-xsmall.png" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/bootstrap/css/bootstrap.min.css" media="screen"> 
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/css/main.css" rel="stylesheet">
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/css/component.css" rel="stylesheet">
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/icons/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-128184034-1');
  </script>
  
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/css/style.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/custom/plugins/datepicker/datepicker3.css">
    
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/css/loading/style.css" rel="stylesheet">
  <link href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script  src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jssor.slider-26.5.2.min.js"></script>
      <script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/custom/plugins/datepicker/bootstrap-datepicker.js"></script>
         <script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/login/bootstrapvalidator-0.4.5/dist/js/bootstrapValidator.js"></script>
         <script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/login/plugins/iCheck/icheck.min.js"></script> 
         <link rel="stylesheet" href="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/login/plugins/iCheck/square/blue.css"> 
         <script src="https://apis.google.com/js/api:client.js"></script>
         <script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/login/js/_login.js"></script>
  <style>
    /* Style the tab content */
.tabcontent {
  display: none;

}
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: linear-gradient(45deg, #f9fafd, #f9fafd);
  z-index: 9999999;
}
.bounce-in-top {
  -webkit-animation: bounce-in-top 2s infinite both;
          animation: bounce-in-top 2s infinite both;
}

@-webkit-keyframes bounce-in-top {
  0% {
    -webkit-transform: translateY(-500px);
            transform: translateY(-500px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
    opacity: 0;
  }
  38% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
    opacity: 1;
  }
  55% {
    -webkit-transform: translateY(-65px);
            transform: translateY(-65px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  72% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  81% {
    -webkit-transform: translateY(-28px);
            transform: translateY(-28px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  90% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  95% {
    -webkit-transform: translateY(-8px);
            transform: translateY(-8px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}
@keyframes bounce-in-top {
  0% {
    -webkit-transform: translateY(-500px);
            transform: translateY(-500px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
    opacity: 0;
  }
  38% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
    opacity: 1;
  }
  55% {
    -webkit-transform: translateY(-65px);
            transform: translateY(-65px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  72% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  81% {
    -webkit-transform: translateY(-28px);
            transform: translateY(-28px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  90% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
  95% {
    -webkit-transform: translateY(-8px);
            transform: translateY(-8px);
    -webkit-animation-timing-function: ease-in;
            animation-timing-function: ease-in;
  }
  100% {
    -webkit-transform: translateY(0);
            transform: translateY(0);
    -webkit-animation-timing-function: ease-out;
            animation-timing-function: ease-out;
  }
}

</style>

</head>
<body class="transparent-header" style=" background-image:url('a.png'); background-size: cover; background-repeat: no-repeat; background-color: black;">

  <div class="container-wrapper">
    
    <header id="header" style="font-family: 'Oswald'">
        
      <nav class="navbar navbar-default navbar-fixed-top">
            <div class="header-inner">
              <div class="navbar-header">
          </div>
                  <div id="navbar" class="collapse navbar-collapse navbar-arrow pull-left">
                   <ul class="nav navbar-nav" id="responsive-menu" style="font-family: 'Oswald'">
              <li><a onclick="openCity(event, 'home')" >Home</a></li>
                            <li>
                <a  onclick="openCity(event, 'booking')">Cara Booking</a>
                            </li>
                            
              <li><a onclick="openCity(event, 'keranjang')">Keranjang Booking</a></li>             
              <li><a onclick="openCity(event, 'konfirmasi')" >Pembayaran</a></li>
              <li><a onclick="openCity(event, 'Tentang')" > Tentang Kami</a></li>
            </ul>
          </div>
                  <div class="pull-right">
            <div class="navbar-mini">
              <ul class="clearfix">
                <li><a style="font-size:20px;"><?php echo $_SESSION['nm']; ?></a></li>
                <li class="dropdown bt-dropdown-click" >
                                  <a class="btn btn-primary btn-inverse btn-sm dropdown-toggle"  href="./Logout.php" >
                     Logout</a>
                         </li>
              </ul>
            </div>
                    </div>
                  </div>
                  <div id="slicknav-mobile"></div>
                </nav>
      
    </header>    
    <div class="main-wrapper scrollspy-container" style="background:transparent;">
        
      <div class="hero text-center alt-height with-counting" style="border-color: transparent; padding-top:90px;">
            <div class="container">
              <div class="row">
            <div id="home" class="tabcontent " style="display:block">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"><center>
              <img style="width:250px;" src="lgo.png"></center>
              <h3 style="margin-top: 0;
    font-size: 28px;
    color: #FFF;
    line-height: 48px;
    text-transform: uppercase;
    margin: 0 0 10px;
    margin-top:-10px;
    margin-bottom:-15px;
    letter-spacing: 2px;">WELCOME TO SPORT ZONE</h3><h3 style="margin-top: 0;
    font-size: 28px;
    color: #FFF;
    
    line-height: 48px;
    text-transform: uppercase;
    margin: 0 0 10px;
    letter-spacing: 2px;"> Find your field</h3>
                <div class="home-search-form home-search-form-center">
          <div class="home-search-form-inner">
            
            <style type="text/css">
              .home-search-form .form-control {
    height: 40px;
    padding-left: 18px;
    border: none;
    border-right: 1px solid #EBEBEB;
    margin: 0;
    font-weight: 400;
  }
            </style>
                        <form  action="home.php" method="POST" id="itemForm" role="form" class="validate" >
            
              <div style="width:20%;" class="form-group location-form">
                 
             
              </div>
              <div style="width:37%;" class="form-group">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div><input type="text" class="form-control pull-right" id='datepicker'  name="tanggal_main" placeholder="PILIH TANGGAL" value="">
                  
                </div>
                            </div>
              <div class="form-group">
                <select class="custom-select"id="sel1" name="jam_mulai">
<option >PILIH WAKTU</option>
                                <option>09:00</option>
                                <option>10:00</option>
                                <option>11:00</option>
                                <option>12:00</option>
                                <option>13:00</option>
                                <option>14:00</option>
                                <option>15:00</option>
                                <option>16:00</option>
                                <option>17:00</option>
                                <option>18:00</option>
                                <option>19:00</option>
                                <option>20:00</option>
                                <option>21:00</option>
                                <option>22:00</option>
                                <option>23:00</option>                </select>
              </div><br>
              <center><br><br><br>
                <input type="hidden" id="first-name" name="id_book" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nextID; ?>" readonly>
                              
                              <input type="hidden" id="first-name" required="required" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $sql_sel['email']; ?>" readonly>
                              

                              
                              <input type="hidden" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['no_lap']; ?>" readonly>

                              <input type="hidden" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['jenis_rumput']; ?>" readonly>

                              <input type="hidden" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pilih['harga']; ?>" readonly>
                          
                  
                              <input type="hidden" name="jenis_bayar" required value="transfer"> 
                        

                              <input type="hidden" name="durasi" id="durasi" value="4">
                                    
                              <input type="hidden" id="total" name="total_harga" value="30000" >
              <table style=" margin-top:-15px; display: flex;
  align-items: center; ">
<tr>
<th style="padding-left:120px;"><button type="submit" name="bola" style=" background:transparent; border:none;"> <img src="bola.png" style="width:60px;"></button> </th>
<th style="padding-left:100px;"><button type="submit" name="kok" style="background:transparent; border:none;" ><img src="kok.png" style="width:60px;"></button> </th>
<th style="padding-left:100px;"> <button type="submit" name="gym" style="background:transparent; border:none;" ><img src="gym.png" style="width:60px;"></button> </th>
</tr>
<tr style="font-size:20px;color:white;">
  <td style="  padding-left:115px; padding-top:7px;  text-align: center;
">Futsal</td>
    <td style="; padding-left:85px; padding-top:7px;  text-align: center;
">Badminton</td>
    <td style=" padding-left:90px; padding-top:7px;  text-align: center;
">Gym</td>
 </tr>
</table>
</form>



                             
<?php 
if (isset($_POST['bola'])) {
            $id_book = $_POST['id_book'];
            $username = $_POST['username'];
            $id_lap = 'FUTSAL';           //variabel yang berisi inputan yang diisi oleh member pada form transaksi
            $tanggal_main = $_POST['tanggal_main'];
            $jam_mulai = $_POST['jam_mulai'];
            $durasi = $_POST['durasi'];
            //penambahan pada jam mulai dan durasi
            $jamdur = $durasi + $jam_mulai;
            $jam_berakhir = $jamdur.":00:00";
            //echo $jam_berakhir;
            //$now=date('Y-m-d h:i:s', strtotime('4 hours', strtotime($tgl)));
            $tanggal = date('Y-m-d', time()+60*60*6); //variabel dengan nilai date/tanggal sekarang
            $jam = date('H:i:s', time()+60*60*6); ////variabel dengan nilai time/jam sekarang
            $tanggaljam = date('Y-m-d H:i:s', time()+60*60*6); //variabel dengan nilai datetime sekarang
            $tgljam = $tanggal_main." ".$jam_mulai;
            if(strtotime($tgljam)-strtotime($tanggaljam) > 43200){ //jika main lebih dari 12 jam
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*12); // maka bayar akhir 6 jam dari waktu pesan
              } 
            else { // jika tidak
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*9); // maka bayar akhir 3 jam dari waktu pesan
                }
            
            
            $jenis_bayar = $_POST['jenis_bayar'];
            $total = '200000';
            if($jenis_bayar == 'transfer'){ // jika jenis bayar transfer
            $status = "Menunggu Transfer"; // maka status Menunggu Transfer
            }
            else { //jika tidak
            $status = "Menunggu Pembayaran"; //maka status menjadi Menunggu pembayaran
              }
            //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
            $cek1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
            //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
            $cek2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai')  order by tgl_book"));

            if($cek1 > 0){ //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
              echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>"; 
            }
            elseif($cek2 > 0){ //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
              echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
            }
            elseif($tanggal_main == $tanggal && $jam_mulai < $jam){ // cek tanggal main = tanggal sekarang dan jam mulai kurang dari jam sekarang
              echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
            }
            elseif($tanggal_main < $tanggal){ // cek tanggal main kurang dari tanggal sekarang
              echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
            }
            elseif(strtotime($tgljam) - strtotime($tanggaljam) <= 10800){ // cek apakah waktu pesan kurang dari 3 jam dari waktu bermain
              echo "<script> alert(\"Waktu minimal pemesanan adalah 3 jam\");</script>";
            }
             else{ //jika tidak maka transaksi dapat dilanjutkan
              $simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$username','$id_lap',NOW(),'$bayarakhir','$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");

if($simpan & $jenis_bayar=='transfer'){ //jika simpan data berhasil dan jenis bayar = transfer 
  echo "<script> alert(\"Silakan Periksa Keranjang Booking\"); window.location = \"home.php\"; </script>";
  } elseif($jenis_bayar=='cod') { // dan jika jenis bayar cod
  echo "<script> alert(\"Segera Lakukan Pembayaran Kepada Operator Futsal Yang Dituju\"); window.location = \"index.php\"; </script>";
    } else { //dan jika tidak
    echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";    
      }}
            
  
}
elseif(isset($_POST['kok'])) {
            $id_book = $_POST['id_book'];
            $username = $_POST['username'];
            $id_lap = 'BADMINTON';           //variabel yang berisi inputan yang diisi oleh member pada form transaksi
            $tanggal_main = $_POST['tanggal_main'];
            $jam_mulai = $_POST['jam_mulai'];
            $durasi = $_POST['durasi'];
            //penambahan pada jam mulai dan durasi
            $jamdur = $durasi + $jam_mulai;
            $jam_berakhir = $jamdur.":00:00";
            //echo $jam_berakhir;
            //$now=date('Y-m-d h:i:s', strtotime('4 hours', strtotime($tgl)));
            $tanggal = date('Y-m-d', time()+60*60*6); //variabel dengan nilai date/tanggal sekarang
            $jam = date('H:i:s', time()+60*60*6); ////variabel dengan nilai time/jam sekarang
            $tanggaljam = date('Y-m-d H:i:s', time()+60*60*6); //variabel dengan nilai datetime sekarang
            $tgljam = $tanggal_main." ".$jam_mulai;
            if(strtotime($tgljam)-strtotime($tanggaljam) > 43200){ //jika main lebih dari 12 jam
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*12); // maka bayar akhir 6 jam dari waktu pesan
              } 
            else { // jika tidak
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*9); // maka bayar akhir 3 jam dari waktu pesan
                }
            
            
            $jenis_bayar = $_POST['jenis_bayar'];
            $total = '50000';
            if($jenis_bayar == 'transfer'){ // jika jenis bayar transfer
            $status = "Menunggu Transfer"; // maka status Menunggu Transfer
            }
            else { //jika tidak
            $status = "Menunggu Pembayaran"; //maka status menjadi Menunggu pembayaran
              }
            //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
            $cek1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
            //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
            $cek2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai')  order by tgl_book"));

            if($cek1 > 0){ //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
              echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>"; 
            }
            elseif($cek2 > 0){ //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
              echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
            }
            elseif($tanggal_main == $tanggal && $jam_mulai < $jam){ // cek tanggal main = tanggal sekarang dan jam mulai kurang dari jam sekarang
              echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
            }
            elseif($tanggal_main < $tanggal){ // cek tanggal main kurang dari tanggal sekarang
              echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
            }
            elseif(strtotime($tgljam) - strtotime($tanggaljam) <= 10800){ // cek apakah waktu pesan kurang dari 3 jam dari waktu bermain
              echo "<script> alert(\"Waktu minimal pemesanan adalah 3 jam\");</script>";
            }
             else{ //jika tidak maka transaksi dapat dilanjutkan
              $simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$username','$id_lap',NOW(),'$bayarakhir','$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");

if($simpan & $jenis_bayar=='transfer'){ //jika simpan data berhasil dan jenis bayar = transfer 
  echo "<script> alert(\"Silakan Periksa Keranjang Booking\"); window.location = \"home.php\"; </script>";
  } elseif($jenis_bayar=='cod') { // dan jika jenis bayar cod
  echo "<script> alert(\"Segera Lakukan Pembayaran Kepada Operator Futsal Yang Dituju\"); window.location = \"index.php\"; </script>";
    } else { //dan jika tidak
    echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";    
      }}
}
elseif(isset($_POST['gym'])) {
            $id_book = $_POST['id_book'];
            $username = $_POST['username'];
            $id_lap = 'GYM';           //variabel yang berisi inputan yang diisi oleh member pada form transaksi
            $tanggal_main = $_POST['tanggal_main'];
            $jam_mulai = $_POST['jam_mulai'];
            $durasi = $_POST['durasi'];
            //penambahan pada jam mulai dan durasi
            $jamdur = $durasi + $jam_mulai;
            $jam_berakhir = $jamdur.":00:00";
            //echo $jam_berakhir;
            //$now=date('Y-m-d h:i:s', strtotime('4 hours', strtotime($tgl)));
            $tanggal = date('Y-m-d', time()+60*60*6); //variabel dengan nilai date/tanggal sekarang
            $jam = date('H:i:s', time()+60*60*6); ////variabel dengan nilai time/jam sekarang
            $tanggaljam = date('Y-m-d H:i:s', time()+60*60*6); //variabel dengan nilai datetime sekarang
            $tgljam = $tanggal_main." ".$jam_mulai;
            if(strtotime($tgljam)-strtotime($tanggaljam) > 43200){ //jika main lebih dari 12 jam
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*12); // maka bayar akhir 6 jam dari waktu pesan
              } 
            else { // jika tidak
              $bayarakhir= date('Y-m-d H:i:s', time()+60*60*9); // maka bayar akhir 3 jam dari waktu pesan
                }
            
            
            $jenis_bayar = $_POST['jenis_bayar'];
            $total = '30000';
            if($jenis_bayar == 'transfer'){ // jika jenis bayar transfer
            $status = "Menunggu Transfer"; // maka status Menunggu Transfer
            }
            else { //jika tidak
            $status = "Menunggu Pembayaran"; //maka status menjadi Menunggu pembayaran
              }
            //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
            $cek1 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai<='$jam_mulai' && jam_berakhir>'$jam_mulai') && (status!='Dibatalkan' && status!='Selesai') order by tgl_book"));
            //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
            $cek2 = mysqli_fetch_array(mysqli_query($koneksi, "select * from transaksi where (id_lap = '$id_lap' && tgl_main='$tanggal_main') && (jam_mulai>'$jam_mulai' && jam_mulai<'$jam_berakhir') && (status!='Dibatalkan' && status!='Selesai')  order by tgl_book"));

            if($cek1 > 0){ //cek jam mulai diantara jam mulai dan jam berakhir yang telah ada di database
              echo "<script> alert(\"Jam mulai yang anda pilih telah dipesan orang lain.\");</script>"; 
            }
            elseif($cek2 > 0){ //cek jam mulai sebelum jam mulai di database, dan jam berakhir melebihi jam berakhir di database
              echo "<script> alert(\"Durasi yang anda pilih terlalu lama. Kurangi durasi atau pilih jam mulai yang lain.\");</script>";
            }
            elseif($tanggal_main == $tanggal && $jam_mulai < $jam){ // cek tanggal main = tanggal sekarang dan jam mulai kurang dari jam sekarang
              echo "<script> alert(\"Jam mulai kadaluarsa\");</script>";
            }
            elseif($tanggal_main < $tanggal){ // cek tanggal main kurang dari tanggal sekarang
              echo "<script> alert(\"Tanggal main kadaluarsa\");</script>";
            }
            elseif(strtotime($tgljam) - strtotime($tanggaljam) <= 10800){ // cek apakah waktu pesan kurang dari 3 jam dari waktu bermain
              echo "<script> alert(\"Waktu minimal pemesanan adalah 3 jam\");</script>";
            }
             else{ //jika tidak maka transaksi dapat dilanjutkan
              $simpan = mysqli_query($koneksi, "insert into transaksi values ('$id_book','$username','$id_lap',NOW(),'$bayarakhir','$tanggal_main','$jam_mulai','$jamdur:00:00','$jenis_bayar','$total','$status')");

if($simpan & $jenis_bayar=='transfer'){ //jika simpan data berhasil dan jenis bayar = transfer 
  echo "<script> alert(\"Silakan Periksa Keranjang Booking\"); window.location = \"home.php\"; </script>";
  } elseif($jenis_bayar=='cod') { // dan jika jenis bayar cod
  echo "<script> alert(\"Segera Lakukan Pembayaran Kepada Operator Futsal Yang Dituju\"); window.location = \"index.php\"; </script>";
    } else { //dan jika tidak
    echo "<script> alert(\"Maaf, Terjadi Kesalahan...\"); window.location = \"index.php\"; </script>";    
      }}
 
}
else {}
?>
</center>
                        </form>            

        </div>
        </div>
            </div>
                    </div>
          <div id="booking" class="tabcontent ">
  <div class="modal-dialog "  style="width:75%;">
    <div class="modal-content">
      <div class="modal-body ">
        <h1 style="font-size:18px; color:black;" ><b>Cara Booking</b></h1>
       <hr > <br>
        <p class="align-baseline" style="font-size:14px; color:black;" align="left">
          Berikut ini langkah-langkah dalam melakukan pemesanan lapangan futsal
<br>
1. Silahkan klik pada fasilitas lapangan yang di inginkan<br>
2. Setelah diklik, anda akan dialihkan pada halaman yang menampilkan jumlah ketersediaan lapangan pada tempat yang anda pilih<br>
3. Klik "Pesan" pada tempat dan waktu yang diinginkan<br>
4. Setelah selesai, klik checkout pada keranjang pemesanan anda (terdapat pada bagian bawah atau pada menu keranjang booking)<br>
5. Silahkan masukan data diri anda setelah itu klik "Finish"<br>
6. Lakukan pembayaran melalui transfer bank, setelah itu lakukan konfirmasi melalui email dan sms ke 08532112367<br>
7. Operator kami akan segera memproses pesanan anda begitu mendapatkan konfirmasi pembayaran<br>
8. Fasilitas lapangan sudah selesai dipesan      </p></div>
     <div class="btn-group" role="group" aria-label="Basic example" style="      float:right; padding-right:5%;
     ">
   <form action="" method="post">
  <button  type="submit" class="btn btn-primary"><a style="text-decoration:none;background: transparent; color: white;" onclick="openCity(event, 'home')" > Booking/pesan</a></button>
  <button style="margin-left:-10px;" type="submit" name="hapus" class="btn btn-primary">Kosongkan pesanan</button>
</form>
</div>
<br><br><br><br>
    </div>
  </div>
</div>
</div>
          <div id="keranjang" class="tabcontent ">
  <div class="modal-dialog "  style="width:75%;">
    <div class="modal-content">
      <div class="modal-body ">
        <p style="font-size:20px; color:black;" ><b>Keranjang Booking</b></p></h1><hr>

           <?php 

$tin = $sql_sel['email'];
  $sul = "select * from transaksi where username_member = '$tin'";
  $wing = mysqli_query($koneksi,$sul);
  $keran = mysqli_fetch_array($wing); 
if (!empty($keran['username_member'])) {

              $kata_kunci=trim($keran['username_member']);

    $sql="select * from transaksi where username_member like '%". $kata_kunci."%' order by status asc";

 echo "<table width='100%'><tbody><tr>
 <th style=' background:#dc3545;color:#efefef; border:solid black 1px;'><center>Nama Lapangan</th>
  <th style='background:#dc3545;color:#efefef; border:solid black 1px;'><center>Tanggal</th>
   <th style='background:#dc3545;color:#efefef; border:solid black 1px;'><center>Jam Mulai</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'><center>Kode Booking</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'><center>Harga</th>
 <th style='background:#dc3545;color:#efefef; border:solid black 1px;'><center>Konfirmasi</th>
 <tr>"; 
 $hasil=mysqli_query($koneksi,$sql);
        $no=1;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;$total += $data["total_harga"];
?>
 <?php 
                            $a = mysqli_query($koneksi, "select * from bayar_transfer where id_book='$data[id_book]'");
                          $c = mysqli_num_rows($a);
                          if($data['status'] == 'Menunggu Transfer' || $data['status'] == 'Menunggu Konfirmasi admin'){
                                                    if($c == 0){ ?>
                                                      <?php 
$lpoi = uniqid();
    $iko = str_split($lpoi);
    $len = sizeof($iko);
    $jike = array_slice($iko, $len-4, $len);
    $jike = implode(",", $jike);
    $jike = str_replace(',', '', $jike);
    $y = uniqid('2');
$laok= $data["id_book"];
 ?>

                <td style='border:solid black 1px;'><br><?php echo $data["id_lap"];   ?></td>
                <td style='border:solid black 1px;'><br><?php echo $data["tgl_main"];  ?></td>
                <td style='border:solid black 1px;'><br><?php echo $data["jam_mulai"];   ?></td> 
                <td style='border:solid black 1px;'><br><?php echo $data["id_book"];  ?><br></td> 
                <td style='border:solid black 1px;'><br><?php echo "Rp." . number_format($data["total_harga"]);  ?><br></td> 
                <td style='border:solid black 1px;'><br>
<?php 
if ($data['status'] == 'Menunggu Transfer'){
?>
<a href="keranjang.php?kd=<?php echo $data["id_book"];  ?>"> <button class='badge rounded-pill bg-primary' >     
Upload Bukti Bayar </button></a></p><br></td> 

<?php } elseif($data['status'] == 'Menunggu Konfirmasi admin') { ?>
<?php echo $data['status'];  ?><br><br>
<?php } elseif($data['status'] == 'Telah Dikonfirmasi') {} else{

}
?>


<?php
                           }                       
                          } 
                          else {
                           
                            }
                                                   ?>

</tr>
<!-- The oke -->



<?php 



}
  echo "
  
</tbody></table>";
   }
   else{
    echo'<p class="align-baseline" style="font-size:14px; color:black;" align="left">Anda belum melakukan booking, silahkan lakukan booking pada fasillitas yang anda inginkan</p><br><br>';
   }
  ?>


      </div>
     <div class="btn-group" role="group" aria-label="Basic example" style="      float:right; padding-right:5%;
     ">
 <form action="" method="post">
  <button  type="submit" class="btn btn-primary"><a style="text-decoration:none;background: transparent; color: white;" onclick="openCity(event, 'home')" > Booking/pesan</a></button>
  <button style="margin-left:-10px;" type="submit" name="hapus" class="btn btn-primary">Kosongkan pesanan</button>
</form>
</div>
<br><br><br><br>
    </div>
  </div>
</div>
    <div id="konfirmasi" class="tabcontent ">
  <div class="modal-dialog "  style="width:50%;">
    <div class="modal-content">
      <div class="modal-body ">
       <iframe style="width:100%; height:500px;" src="cari.php"></iframe>
<br><br><br>
      </div>
        </div>
  </div>
</div>
      <div id="Tentang" class="tabcontent ">
  <div class="modal-dialog "  style="width:65%;">
    <div class="modal-content">
      <div class="modal-body ">
        <p style="font-size:20px; color:black;"><b>Tentang Kami</b></p><hr>
        <p class="align-baseline" style="font-size:14px; color:black;" align="left"><b>Sport Zone.com</b> memberikan kemudahan bagi anda untuk melakukan<br>
        pemesanan lapangan olahraga secara online. Melalui situs ini, anda dapat melihat<br>
        ketersediaan lapangan olahraga sesuai dengan waktu yang diinginkan.
      </p>
<br><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.333264422864!2d131.32013631395603!3d-0.8934317355738353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5955a0eb5d11b3%3A0x9e5c8b9f4398ef32!2sHARAPAN%20INDAH%20SPORT%20ZONE!5e0!3m2!1sid!2sid!4v1641114465748!5m2!1sid!2sid" width="680" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>
      </div>
        </div>
  </div>
</div>
      
          </div>
          </div>
          </div>
          </div>
        <div style="border-top: transparent;" class="counting-wrapper">
              </div>
      </div></div>
      <script>
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
    
 <script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery-migrate-1.4.1.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/SmoothScroll.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.slicknav.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/spin.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.introLoader.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/fancySelect.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/bootstrap-rating.js"></script> 
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/slick.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/ion.rangeSlider.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/bootstrap-modalmanager.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/bootstrap-modal.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/customs.js"></script>

<!-- JS for Number animated counting -->
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/handlebars.min.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.countimator.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/jquery.countimator.wheel.js"></script>
<script type="text/javascript" src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/js/customs-counter.js"></script>

<?php
  if (isset($_POST['hapus'])) {
 $i=$sql_sel['email'];
  $hapus = "DELETE FROM transaksi WHERE username_member='$i'";
        $sql = mysqli_query($koneksi,$hapus);
        if ($sql) {        
            ?>
                <script language="JavaScript">
                alert('Seluruh Pesanan Berhasil dihapus!');
                document.location='home.php';
                </script>
            <?php        
        } 
        else {
            echo "<font color=red><center>Data Mahasiswa gagal dihapus</center></font>";    }
    }
?>
<script type="text/javascript">
  $("#open").click(function(){
     $("#a").css("display","block");
     $("#b").css("display","block");
                 });


$(".cancel").click(function(){
     $("#a").fadeOut();
     $("#b").fadeOut();
});
</script>
<!-- Select2 -->
<script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/custom/plugins/select2/select2.full.min.js"></script>

<!-- bootstrap time picker -->
<script src="https://s3-ap-southeast-1.amazonaws.com/fibostorage/assets/custom/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="//rum-static.pingdom.net/pa-5bed2b30db2aac001600007d.js" async></script>
    <script>
      //Date picker
      $('#datepicker').datepicker({
         format: 'yyyy-mm-dd',
        autoclose: true
      });
      $('#timepicker').datetimepicker({
          format: 'HH:mm'
        });
    </script>

       
</div> 
 </div>
</body>
</html>
<?php
}
else {
    echo "<script> alert(\"Silakan Login Sebagai Member\"); window.location = \"index.php\" </script>";
  }?>