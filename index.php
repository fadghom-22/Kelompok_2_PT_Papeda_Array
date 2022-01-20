
     
     <?php
include ("c/konek.php");
if(isset($_POST['submit'])){
 $nama = $_POST['nama'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 //acak karakter
 $ver_code = '';
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM operator WHERE email='$email'"));
    $cek3 = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email'"));
      if ($cek > 0 || $cek3 > 0){
    echo "<script>window.alert('Email yang anda masukan sudah ada')
    window.location='index.php'</script>";
    }  elseif($_POST['email'] == ''){
      echo "<script>window.alert('email belum diisi')
    window.location='index.php'</script>";
    } else {
      $sql = "insert into member values ('$nama','$email','$password','$ver_code','')";
       $query = mysqli_query($koneksi,$sql) or die(mysql_error());
        if($query)
            {
        $to = $email;
        $subject = "Konfirmasi Akun Anda $nama";
        $message = "http://localhost/project/Home/member/member_konfirmasi.php?passkey=$ver_code";
        
        //sender
        $sender = "gofutsaldev@gmail.com";
        $password = "tif20152016";
  
        $sentmail = ' ';
  
        if($sentmail)
        
                echo "<script> alert(\"SUKSES TERDAFTAR SILAHKAN LOGIN ....\"); window.location = \"index.php\"; </script>";
               }
              else
              {
                echo "<script> alert(\"Maaf!! Silakan Cek Kembali Form Yang Telah Anda Isi\"); window.location = \"member_daftar.php\"; </script>";
              }
    }
}
  ?>
   <?php
  include ("c/konek.php");

error_reporting(0);
session_start();
 
if (isset($_SESSION['nm'])) {
    echo "<script> window.location = \"home.php\"; </script>";
}
 
if (isset($_POST['loginmember'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM member WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['nm'] = $row['nama'];
        header("Location: home.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
  ?><!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Weekly Coding Challenge #1 -  Double slider Sign in/up Form - Desktop Only</title>

<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
  box-sizing: border-box;
}

body {
  background: #f6f5f7;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  font-family: 'Montserrat', sans-serif;
  height: 100vh;
  margin: -20px 0 50px;
}

h1 {
  font-weight: bold;
  margin: 0;
}

h2 {
  text-align: center;
}

p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 20px 0 30px;
}

span {
  font-size: 12px;
}

a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}

button {
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}

button:active {
  transform: scale(0.95);
}

button:focus {
  outline: none;
}

button.ghost {
  background-color: transparent;
  border-color: #FFFFFF;
}

form {
  background-color: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
}

input {
  background-color: #eee;
  border: none;
  padding: 12px 15px;
  margin: 8px 0;
  width: 100%;
}

.container {
  background-color: #fff;
  border-radius: 10px;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
  position: relative;
  overflow: hidden;
  width: 768px;
  max-width: 100%;
  min-height: 480px;
}

.form-container {
  position: absolute;
  top: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}

.sign-in-container {
  left: 0;
  width: 50%;
  z-index: 2;
}

.container.right-panel-active .sign-in-container {
  transform: translateX(100%);
}

.sign-up-container {
  left: 0;
  width: 50%;
  opacity: 0;
  z-index: 1;
}

.container.right-panel-active .sign-up-container {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
  animation: show 0.6s;
}

@keyframes show {
  0%, 49.99% {
    opacity: 0;
    z-index: 1;
  }
  
  50%, 100% {
    opacity: 1;
    z-index: 5;
  }
}

.overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}

.container.right-panel-active .overlay-container{
  transform: translateX(-100%);
}

.overlay {
  background: #FF416C;
  background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
  background: linear-gradient(to right, #FF4B2B, #FF416C);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: 0 0;
  color: #FFFFFF;
  position: relative;
  left: -100%;
  height: 100%;
  width: 200%;
    transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
    transform: translateX(50%);
}

.overlay-panel {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}

.overlay-left {
  transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
  transform: translateX(0);
}

.overlay-right {
  right: 0;
  transform: translateX(0);
}

.container.right-panel-active .overlay-right {
  transform: translateX(20%);
}

.social-container {
  margin: 20px 0;
}

.social-container a {
  border: 1px solid #DDDDDD;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  margin: 0 5px;
  height: 40px;
  width: 40px;
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
<body>


  <div id="preloader"><center>
            
            <h1 style="padding-top: 25%" class="bounce-in-top"><img style="width:220px;"src="lgo.png"><br>SPORT ZONE</h1></center>
        </div>

<div class="container" id="container" style="border:solid #86cbcf 3px;">
  <div class="form-container sign-up-container">
    <form action="" method="post" enctype="multipart/form-data">
      <img style="width:85px;" src="Login.png">
      <h2 style="color:#00f0ff;">Registrasi</h2>
      <input type="text" name="nama" placeholder="Name" />
      <input name="email" name="email" type="email" placeholder="Email" />
      <input type="password " name="password" placeholder="Password" />
      <button type="submit" name="submit">DAFTAR</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="" method="post">
<img style="width:85px;" src="Login.png">
      <h2 style="color:#00f0ff;">Masuk</h2>
      <input type="email" name="email" style="background:transparent; border:solid #00f0ff 2px; " placeholder="Email" />
      <input type="password" name="password" style="background:transparent; border:solid #00f0ff 2px; "placeholder="Password" />
      <a href="#">Forgot your password?</a>
      <button type="submit" name="loginmember">MASUK</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Selamat Datang Kembali !</h1>
        <br>
        <button class="ghost" id="signIn">MASUK</button>
      </div>
      <div class="overlay-panel overlay-right">
        <img style="width:220px;" src="lgo.png" >
        <p>Don’t have an account?  </p>
        <button id="signUp">DAFTAR</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
  const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
  container.classList.remove("right-panel-active");
});
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        $('#status').fadeOut();
        $('#preloader').delay(3000).fadeOut('slow');
        $('body').delay(0).css({
            'overflow': 'visible'
        });
    }); 
</script>
</body>
</html>
