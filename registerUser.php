<?php
	require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

	<style>
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "Montserrat", sans-serif
		}

		.w3-row-padding img {
			margin-bottom: 12px
		}

		.w3-sidebar {
			width: 120px;
			background: #222;
		}

		#main {
			margin-left: 120px
		}

		@media only screen and (max-width: 600px) {
			#main {
				margin-left: 0
			}
		}
	</style>
</head>

<body class="w3">
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
		<a href="activity.php" class="w3-bar-item w3-button w3-padding-large w3-black">
			<i class="fa fa-dashboard w3-xxlarge d-flex justify-content-center mt-2"></i>
			<p>Home</p>
		</a>
		<a href="activity.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
			<i class="fa fa-ellipsis-h w3-xxlarge d-flex justify-content-center mt-2"></i>
			<p>Activity</p>
		</a>
		<a href="accounts.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
			<i class="fa fa-group w3-xxlarge d-flex justify-content-center mt-2"></i>
			<p>Accounts</p>
		</a>

		<a href="logoutAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center p-2 ml-auto">
			<i class="fa fa-sign-out w3-xxlarge d-flex justify-content-center mt-1"></i>
			<p>Log Out</p>
		</a>
	</nav>
	<section class="vh-100">
		<div class="row">
			<div class="col-6 mt-5">
				<div class="d-flex justify-content-center">

					<form style="width: 23rem;" method="POST" action="" class="">

						<h4 class="d-flex justify-content-center" style="font-style: italic;">Add User</h4>
						<?php // if (isset($_GET['error'])) { ?>
							<!-- <p class="d-flex justify-content-center" style="color:red; font-weight:bold;"><?php // echo $_GET['error']; ?></p> -->
						<?php // } ?>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example18">Username</label>
							<input type="text" id="form2Example18" class="form-control form-control-lg" name="teamUserName" required />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example28">Password</label>
							<input type="password" id="form2Example28" class="form-control form-control-lg" name="teamPassword" required />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example38">Confirm Password</label>
							<input type="password" id="form2Example38" class="form-control form-control-lg" name="teamPasswordConfirm" required />
						</div>

						<div class="pt-1 mb-4">
							<button class="btn btn-info btn-lg btn-block" type="submit" name="register">Add User</button>
						</div>

						<!-- <p class="small d-flex justify-content-center">
						<a class="text-muted" href="#!">Forgot password?</a>
					</p> -->
						<!-- <p class="d-flex justify-content-center">
						Already have an account?&nbsp
						<a href="loginAdmin.php" class="link-info"> Login here</a>
					</p> -->
					</form>
				</div>
			</div>

			<div class="col-6 mt-5">
				<h4 class="d-flex justify-content-center">User List</h4>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$sql = "SELECT * FROM user";
						$result = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_array($result)) {
							echo "<tr>
								<td>$row[0]</td>
								<td>
									<form method='POST' action='#'>
										<input type='hidden' name='#' value='$row[0]'>
										<button type = 'submit' name='editUser' class='btn btn-link'>Edit</button> |
										
										<input type='hidden' name='team_name' value='$row[0]'>
										<button type = 'submit' name='deleteUser' class='btn btn-link'>Delete</button>
									</form>
								</td>
								</tr>
							";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>

	<?php
	if (isset($_POST['deleteUser'])) {
		if (isset($_POST['team_name'])) {
			$id = $_POST['team_name'];
			$query = "DELETE FROM user WHERE team_name = '$id'";
			$result = mysqli_query($con, $query);
			if (mysqli_affected_rows($con) > 0 ) {
				echo "<script>
					Swal.fire({
						icon: 'success',
						title: 'User Deleted',
						text: 'The User has been successfully deleted.'
					});
				</script>";
				exit();
				// header("Refresh: 3");
			}
			else {
				echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'Delete Failed',
						text: 'Error ID Admin'
					});
				</script>";
			}
		}
	}

	if (isset($_POST['register'])) {
		$username = $_POST['teamUserName'];
		$password = $_POST['teamPassword'];
		$confirmPassword = $_POST['teamPasswordConfirm'];
		$resultAll = mysqli_query($con, "SELECT * FROM user");

		while ($row = mysqli_fetch_assoc($resultAll)) {
			// echo $row['id_admin'];
			if ($row['team_name'] === $username) {
				echo "<script>
						Swal.fire({
							icon: 'error',
							title: 'Register Failed',
							text: 'ID Team User already exists'
						});
					</script>";
				exit();
			}
		}

		if ($password !== $confirmPassword) {
			// header("Location: registerAdmin.php?error=Your confirm password is incorrect");
			echo "<script>
					Swal.fire({
						icon: 'error',
						title: 'Register Failed',
						text: 'Invalid confirm password'
					});
				</script>";
			// exit();
		} else {
			$layout = [
                [
                    [0,0,0],
                    [0,0,0],
                    [0,0,0]
                ],
                [
                    [0,0,0],
                    [0,0,0],
                    [0,0,0]
                ],
                [
                    [0,0,0],
                    [0,0,0],
                    [0,0,0]
                ]
            ];
			$layout = json_encode($layout);

			$query = "INSERT INTO user VALUES('$username','$password', '$layout',0,0)";
			$result = mysqli_query($con, $query);
			echo "<script>
					Swal.fire({
						icon: 'success',
						title: 'User Added',
						text: 'The user has been successfully added.'
					});
				</script>";
			// header("Location: loginAdmin.php");
		}
	}
	?>
</body>

</html>