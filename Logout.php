<?php
session_start();
if(isset($_SESSION['nm'])){
  unset($_SESSION['nm']);
  }

echo "<script language='javascript'>alert('Terima kasih, Anda Berhasil Logout'); document.location='index.php';</script>";
?>