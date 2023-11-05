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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />
</head>

<body>
	<section class="vh-100">
		<div class="row">
			<div class="col-6 mt-5" style="margin-left: 100px;">
				<h4 class="d-flex justify-content-center">Admin List</h4>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$sql = "SELECT * FROM admin";
						$result = mysqli_query($con, $sql);

						while ($row = mysqli_fetch_array($result)) {
							echo "<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>
									<a href = '#'>Edit </a> |
									<a href = '#'>Delete </a>
								</td>
								</tr>
							";
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="col-5 mt-5">
				<div class="d-flex justify-content-center">

					<form style="width: 23rem;" method="POST" action="" class="">
							
						<h4 class="d-flex justify-content-center" style="font-style: italic;">Admin Register</h4>
						<?php if (isset($_GET['error'])) { ?>
							<p class="d-flex justify-content-center" style="color:red; font-weight:bold;"><?php echo $_GET['error']; ?></p>
						<?php } ?>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example18">Username</label>
							<input type="text" id="form2Example18" class="form-control form-control-lg" name="usernameADM" required />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example48">Name</label>
							<input type="text" id="form2Example48" class="form-control form-control-lg" name="nameADM" required />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example28">Password</label>
							<input type="password" id="form2Example28" class="form-control form-control-lg" name="passwordADM" required />
						</div>

						<div class="form-outline mb-4">
							<label class="form-label" for="form2Example38">Confirm Password</label>
							<input type="password" id="form2Example38" class="form-control form-control-lg" name="passwordConfirmADM" required />
						</div>

						<div class="pt-1 mb-4">
							<button class="btn btn-info btn-lg btn-block" type="submit" name="register">Register</button>
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
		</div>
	</section>

	<?php
		if (isset($_POST['register'])){
			$username = $_POST['usernameADM'];
			$name = $_POST['nameADM'];
			$password = $_POST['passwordADM'];
			$confirmPassword = $_POST['passwordConfirmADM'];
			$resultAll = mysqli_query($con, "SELECT * FROM admin");
	
			while ($row = mysqli_fetch_assoc($resultAll)) {
				// echo $row['id_admin'];
				if($row['id_admin'] === $username) {
					echo "<script>
						Swal.fire({
							icon: 'error',
							title: 'Register Failed',
							text: 'ID Admin already exists'
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
			}
			else {
				$query = "INSERT INTO admin VALUES('$username', '$name','$password', '0')";
				$result = mysqli_query($con, $query);
				// header("Location: loginAdmin.php");
			}
		} 
	?>
</body>

</html>