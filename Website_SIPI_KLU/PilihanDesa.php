<?php
    session_start();
    include('connection.php');
    if (isset($_POST['Camat'])){
        $KLU = $_POST['Camat'];
    }
    $sql = "SELECT * from desa WHERE ID_Kecamatan = '$KLU'";
    $result = mysqli_query($conn, $sql);
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>