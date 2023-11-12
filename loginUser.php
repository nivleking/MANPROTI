<?php
	require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />
</head>

<body>
	<div class="vh-100">
		<div class="container-fluid mx-auto">
			<div class="row">
				<div class="col-sm-12 mx-auto">
					<div class="d-flex justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form action="#" method="post" style="width:23rem">
							<h3 class="fw-normal m-3 d-flex justify-content-center" style="letter-spacing: 0.5px; font-style:italic; font-size:38px;">
								Play Cargo Master!
								<h4 class="d-flex justify-content-center" style="font-style: italic;">User Login</h4>
								<?php // if (isset($_GET['error'])) { ?>
									<!-- <p class="d-flex justify-content-center" style="color:red; font-weight:bold;"><?php // echo $_GET['error']; ?></p> -->
								<?php // } ?>
							</h3>

							<div class="form-outline mb-4">
								<label>Username</label>
								<input type="text" class="form-control" name="username" required>
							</div>

							<div class="form-outline mb-4">
								<label>Password</label>
								<input type="password" class="form-control" name="password" required>
							</div>

							<div class="pt-1 mb-4">
								<button type="submit" name="save" class="btn btn-danger btn-lg btn-block">Login</button>
							</div>

							<p class="small d-flex justify-content-center">
								<a class="text-muted" href="forgotPasswordUser.php">Forgot password?</a>
							</p>
							<!-- <p class="d-flex justify-content-center">
								Don't have an account?&nbsp
								<a href="registerUser.php" class="link-info"> Register here</a>
							</p> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php

	if (isset($_POST['save'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$sql = mysqli_query($con, "SELECT * FROM user WHERE team_name ='$username' AND password='$password'");
		$row  = mysqli_fetch_array($sql);

		if (is_array($row)) {
			$_SESSION["username"] = $row['team_name'];
			$name = $_SESSION['username'];

			$_SESSION["password"] = $row['password'];
			$sql = mysqli_query($con, "UPDATE user SET status = '1' WHERE team_name = '$name'");

			echo "
				<script>
					Swal.fire({
						icon: 'success',
						title: 'Login Successful',
						text: 'Welcome, {$name}',
						showConfirmButton: false,
						timer: 2500
					}).then(function() {
						window.location.href = 'joinRoomUser.php';
					});
				</script>";
		} else {
			echo "
			<script>
				Swal.fire({
					icon: 'error',
					title: 'Login Failed',
					text: 'Invalid username or password'
				});
			</script>";
			// header("Location: loginUser.php?error=Invalid username or password");
		}
	}
	?>
</body>

</html>