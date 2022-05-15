<?php

include('connection.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "select * from user where Username='$username'";

    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);

    if ($data == null) {
        echo "<h1>Akun Tidak Tersedia</h1>";
        die();
    } else {
        if ($password == $data['Password']) {
            header('Location: C_View.php');
            echo "login berhasil";
        } else {
            echo "<h1>Password salah</h1>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./CSS/Style_Halaman_1.css" type="text/css">
</head>
<body>
    <div class="parent_navbar">
        <div class="navbar">
            <div class="logo">
                <div class="gambarC">
                    <img src="./Atribut/cpp-bordered-turquoise.png">
                </div>
                <div class="boxnamalogo">
                    <div class="namaSIPC">SIP C++</div>
                    <div class="namaku">Mapparewa</div>
                </div>
            </div>
            <div class="boxmenu">
                <div class="menu_1">
                    <div class="isimenu_1">Tentang SIP C++</div>
                    <div class="barmenu_1"></div>
                </div>
                <div class="menu_2">
                    <div class="isimenu_2">Install Tools</div>
                    <div class="barmenu_2"></div>
                </div>
                <div class="menu_3">
                    <div class="isimenu_3">Masuk</div>
                    <div class="barmenu_3"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="badan">
        <div class="box_login">
            <table>
                <tr>
                    <th>
                        Yuk mulailah untuk belajar bahasa pemrograman bersama kami!<br>
                        Masukkan akun anda dan mulailah untuk belajar!<br>
                        <form action="" method="post">
                            <div class="formulir">
                                <input type="text" placeholder="username" name="username">
                                <input type="password" placeholder="password" name="password">
                            </div><br>
                            <button type="submit">Masuk</button>
                        </form>
                        <br>
                        <a href="./A_RegisterUserAct.php">Belum memiliki akun</a>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>