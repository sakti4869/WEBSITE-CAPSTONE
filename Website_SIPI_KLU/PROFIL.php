<?php
session_start();
include('connection.php');

if(isset($_SESSION['IDU'])){
    $IDU = $_SESSION['IDU'];
	$Nama = $_SESSION['Nama'];
	$Email = $_SESSION['Email'];
	$HP = $_SESSION['HP'];
	$JK = $_SESSION['JK'];
	$Pass = $_SESSION['Pass'];
	$Desa = $_SESSION['Desa'];
	$KTP = $_SESSION['KTP'];
	$Gambar = $_SESSION['Gambar'];

    $desauser = mysqli_query($conn, "SELECT * FROM desa WHERE ID_Desa = '$Desa'");
    $datausers = mysqli_fetch_assoc($desauser);
    $desa_user = $datausers['Nama_Desa'];

    $kecuser = mysqli_query($conn, "SELECT * FROM kecamatan WHERE ID_Kecamatan IN (SELECT ID_Kecamatan FROM desa WHERE ID_Desa='$Desa')");
    $datauserss = mysqli_fetch_assoc($kecuser);
    $kec_user = $datauserss['Nama_Kecamatan'];

    $kabuser = mysqli_query($conn, "SELECT * FROM kabupaten WHERE ID_Kabupaten IN (SELECT ID_Kabupaten FROM kecamatan WHERE ID_Kecamatan IN (SELECT ID_Kecamatan FROM desa WHERE ID_Desa='$Desa'))");
    $datausersss = mysqli_fetch_assoc($kabuser);
    $kab_user = $datausersss['Nama_kabupaten'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com    @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>user profile bio graph and total sales - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="user.css">
    <link rel="stylesheet" href="PROFIL.css">
</head>
<body>
    <div class="container bootstrap snippets bootdey"></div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#submenu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="NavMenu">
            <div class="menulink">
              </a>
              <a class="submenu" id="submenu" href="#">Beranda</a>
              <a class="submenu" id="submenu" href="#KLU_News">Pengaduan</a>
              <a class="submenu" id="submenu" href="#TentangKami">Wisata</a>
              <a class="submenu" id="submenu" href="#KontakKami">About Us</a>
              <a class="submenu" id="submenu" href="#KontakKami">Kontak Kami</a>
            </div>
          <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="icon ml-4">
              <h5>
                   <i class="fas fa-sign-out-alt mr-3" data-toggle="tooltip" title="Keluar"></i>
              </h5>
          </div>
      </nav>
      <div class="profile-info col-md">
            <div class="profile-nav">
                <div class="panel">
                    <div class="bio-graph-heading">
                        <div class="panel">
                            <div class="user-heading round">
                                <a href="#">
                                    <img src=<?php echo "./".$Gambar; ?> alt="">
                                </a>
                            </div>
                        </div>
                    <h1><?php echo $Nama;?></h1>
                </div>
            </div>
            <div class="panel-body bio-graph-info bg-dark" style="background-color: black;">
                <table>
                        <tr style="color:white;">
                            <td><b>Nama</b></td>
                        </tr>
                        <tr style= "border: 1px solid; color: #fbc02d;">
                            <td>
                                <?php echo $Nama;?>
                            </td>
                        </tr>
                        <tr class="nama">
                            <form action="PROFILact.php" method="post">
                                <td><input type="text" name="nama"><button type="submit">Ganti</button></td>
                            </form>
                        </tr>
                        <tr style="color:white;">
                            <td><b>Email</b></td>
                        </tr>
                        <tr style= "border: 1px solid; color: #fbc02d;">
                            <td><?php echo $Email;?></td>
                        </tr>
                        <tr class="Email">
                            <form action="PROFILact.php" method="post">
                                <td><input type="email" name="Email"><button type="submit">Ganti</button></td>
                            </form>
                        </tr>
                        <tr style="color:white;">
                            <td><b>Nomor Telpon</b></td>
                        </tr>
                        <tr style= "border: 1px solid; color: #fbc02d;">
                            <td><?php echo $HP;?></td>
                        </tr>
                        <tr class="Email">
                            <form action="PROFILact.php" method="post">
                                <td><input type="text" name="HP"><button type="submit">Ganti</button></td>
                            </form>
                        </tr>
                        <tr  style="color:white;">
                            <td><b>Jenis Kelamin</b></td>
                        </tr>
                        <tr style= "border: 1px solid; color: #fbc02d;">
                            <td><?php if($JK=='L'){echo 'Laki-laki';}else{echo 'Perempuan';} ?></td>
                        </tr>
                        <tr  style="color:white;">
                            <td><b>Nomor KTP</b></td>
                        </tr>
                        <tr style= " border: 1px solid; color: #fbc02d;">
                            <td><?php echo $KTP;?></td>
                        </tr>
                        <tr  style="color:white;">
                            <td><b>Alamat</b></td>
                        </tr>
                        <tr style= " border: 1px solid; color: #fbc02d;">
                            <td><?php echo 'Desa '.$desa_user.', Kecamatan '.$kec_user.', Kabupaten '.$kab_user; ?></td>
                        </tr>
                        <tr  style="color:white;">
                            <td><b>Ganti Gambar</b></td>
                        </tr>
                        <tr style= " border: 1px solid; color: #fbc02d;">
                            <?php if(isset($_GET['error'])){echo 'Warning : Ekstensi gambar tidak sesuai';} ?>
                            <form action="PROFILact.php" method="post" enctype="multipart/form-data">
                                <td><input type="file" name="gambar"><input type="submit" name="tgambar" value="Ganti"></td>
                            </form>
                        </tr>
                </table><br><br><br>
            </div>
        </div>  
    </div>
</body>
</html>

