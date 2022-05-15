<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<?php
session_start();
include('connection.php');
if(isset($_GET['eror'])){
	$eror = $_GET['eror'];
}

if (isset($_COOKIE['login'])){
    if($_COOKIE['login']=='true'){
        $_SESSION['login']=true;
    }
}

// if (isset($_SESSION['login'])){
//     header('Location: C_View.php');
// }

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $query = "select * from user where Email='$email' and Password='$password'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
	$_SESSION['IDU'] = $data['ID_User'];
	$_SESSION['Nama'] = $data['Nama'];
	$_SESSION['Email'] = $data['Email'];
	$_SESSION['HP'] = $data['HP'];
	$_SESSION['JK'] = $data['JK'];
	$_SESSION['Pass'] = $data['Password'];
	$_SESSION['Desa'] = $data['ID_Desa_Asal'];
	$_SESSION['KTP'] = $data['No_KTP'];
	$_SESSION['Gambar'] = $data['image'];

    if ($data == null) {
        header('Location: Index.php?eror=Akun tidak tersedia!');
    } else {
        if ($password == $data['Password']) {
            if(isset($_POST['remember'])){
                setcookie("login", "true", time() + 60);
            }
            header('Location: PROFIL.php');
        } else {
            header('Location: Index.php?eror=Password Salah!');
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 style="color:#FFC312;">Sign In</h3>
			</div>
			<div class="card-body">
				<?php if (isset($_GET['eror'])){echo "<span style='color:white;'>Waring : ".$eror.'</span>';} ?>
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="pass" placeholder="password" required>
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="Register.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>