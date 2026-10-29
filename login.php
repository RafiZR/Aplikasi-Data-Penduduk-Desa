<?php
  include "inc/koneksi.php";
   
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>login | Desa Lemahabang</title>
	<link rel="icon" href="dist/img/lemahabang.png">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	
	<style>
		/* Custom styles for modern login page */
		.login-page {
			background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
						url('dist/img/lemahabang2.jpg');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			min-height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		
		.login-box {
			width: 400px;
			max-width: 90%;
		}
		
		.login-card-body {
			border-radius: 10px;
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
			background: rgba(255, 255, 255, 0.95);
			padding: 2rem;
		}
		
		.login-logo img {
			transition: all 0.3s ease;
		}
		
		.login-logo img:hover {
			transform: scale(1.05);
		}
		
		.btn-login {
			background: linear-gradient(45deg, #4d53ffff, #4f1affff);
			border: none;
			letter-spacing: 1px;
			transition: all 0.3s ease;
		}
		
		.btn-login:hover {
			transform: translateY(-2px);
			box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
		}
		
		.input-group-text {
			background-color: #f8f9fa;
		}
		
		.form-control:focus {
			border-color: #ff4d4d;
			box-shadow: 0 0 0 0.2rem rgba(255, 77, 77, 0.25);
		}
		
		h5 {
			color: #333;
			font-weight: 600;
		}
		
		h5 p {
			color: #666;
			font-weight: 400;
			margin-top: 0.5rem;
		}
	</style>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<center>
					<img src="dist/img/lemahabang.png" width=170px class="mb-4" />
					<h5>
						<b>Sistem Data Kependudukan</b>
						<p>Desa Lemahabang</p>
					</h5>
				</center>

				<form action="" method="post" class="mt-4">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-4">
						<input type="password" class="form-control" name="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-login btn-block btn-flat" name="btnLogin" title="Masuk Sistem">
								<b>Login</b>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.min.js"></script>
	<!-- Alert -->
	<script src="plugins/alert.js"></script>

</body>

</html>

<?php
if (isset($_POST['btnLogin'])) {  
	//anti inject sql
	$username=mysqli_real_escape_string($koneksi,$_POST['username']);
	$password=mysqli_real_escape_string($koneksi,$_POST['password']);

	//query login
	$sql_login = "SELECT * FROM tb_pengguna WHERE BINARY username='$username' AND password='$password'";
	$query_login = mysqli_query($koneksi, $sql_login);
	$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
	$jumlah_login = mysqli_num_rows($query_login);


	if ($jumlah_login ==1 ){
		session_start();
		$_SESSION["ses_id"]=$data_login["id_pengguna"];
		$_SESSION["ses_nama"]=$data_login["nama_pengguna"];
		$_SESSION["ses_username"]=$data_login["username"];
		$_SESSION["ses_password"]=$data_login["password"];
		$_SESSION["ses_level"]=$data_login["level"];
	
		echo "<script>
			Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'index.php';}
			})</script>";
		}else{
		echo "<script>
			Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
			}).then((result) => {if (result.value)
				{window.location = 'login.php';}
			})</script>";
		}
}
?>