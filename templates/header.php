<?php
  require_once "config/init.php";
  date_default_timezone_set('Asia/Jakarta');

  if( !isset($_SESSION['user']) ){
    //$_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
  }
  global $link;
  $idUser = $_SESSION['user'];
  $tampil = mysqli_query($link, "SELECT * FROM siswa where nis='$idUser'");
  $rowUser = mysqli_fetch_array($tampil);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- my css -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./asset/style.css">

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>SIS ELENA</title>
  </head>
  <body>
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-success">
      <div class="container">
        <a class="navbar-brand text-white" href="index.html">SIS ELENA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link fa fa-dashboard text-white" href="dasboard-siswa.php">Dasboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fa fa-mortar-board text-white" href="akademik.php">Akademik</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fa fa-user-circle-o text-white dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                  $nama_user = $rowUser['nama'];
                  $pecah_nama = explode(" ", $nama_user);

                  if (count($pecah_nama) > 2 ) {
                    echo htmlentities($pecah_nama[0] . " " . $pecah_nama[1]);
                  }else {
                    echo htmlentities($pecah_nama[0]);
                  }
                ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item fa fa-gear" href="edit_profile.php">Edit Profile</a>
                <a class="dropdown-item fa fa-lock" href="pass_editsiswa.php">Edit Password</a>
                <a class="dropdown-item fa fa-sign-out" href="logout.php">Log Out</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- navbar end -->
