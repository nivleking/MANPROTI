<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Register</title>

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

	<!-- FA W3 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- SWEET ALERT -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

	<!-- JQUERY -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<style>
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
		<a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black">
			<i class="fa fa-dashboard w3-xxlarge d-flex justify-content-center mt-2"></i>
			<p>Home</p>
		</a>
		<a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
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
	<section class="w3-padding-large">
		<div class="w3-padding-16 w3-center">
			<div class="d-flex justify-content-center">
				<form style="width: 23rem;" method="POST" action="" class="">

					<h4 class="d-flex justify-content-center">Add Admin</h4>
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

					<div class="pt-1 mb-4 d-flex justify-content-center">
						<button class="btn btn-primary btn-lg btn-block" type="submit" name="register" id="register">Add Admin</button>
					</div>
				</form>
			</div>

			<h4 class="d-flex justify-content-center">Admin List</h4>
			<table class="table" id="adminTable" class="w3-">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Name</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>

				<tbody id="listAdmin">
					<?php
					$sql = "SELECT * FROM admin";
					$result = mysqli_query($con, $sql);

					while ($row = mysqli_fetch_array($result)) {
						echo "<tr>
								<td>$row[0]</td>
								<td>$row[1]</td>
								<td>
									<button type='submit' name='deleteAdmin' class='btn btn-danger admin-del' id='' value='$row[0]'>Delete</button>
								</td>
								</tr>
							";
					}
					?>
				</tbody>
			</table>
		</div>
	</section>
	<script>
		$(document).ready(function() {
			$(".admin-del").click(function(e) {
				e.preventDefault()
				// console.log("test")

				let id_admin = $(this).val();

				$.ajax({
					url: "adminExtension.php",
					type: 'POST',
					data: {
						"deleteAdmin": 1,
						"id_admin": id_admin
					},
					success: function(response) {
						if (response === "1") {
							console.log("sukes")
							// location.reload()
							// refreshTable();
							$("#listAdmin").find(`[value='${id_admin}']`).closest('tr').remove();

							Swal.fire({
								icon: 'success',
								title: 'Admin Deleted',
								text: 'The admin has been successfully deleted.'
							});

						} else if (response === "2") {
							// console.log("sukess")
							Swal.fire({
								icon: 'error',
								title: 'Delete Failed',
								text: 'Error ID Admin'
							});
						}
					},
					error: function(err) {
						console.log("sukes")
						console.log(err)
					}
				});
			});

			$("#register").click(function(e) {
				e.preventDefault()
				let username = $('#form2Example18').val()
				let name = $('#form2Example48').val()
				let password = $('#form2Example28').val()
				let confirmPassword = $("#form2Example38").val()
				console.log("tes/")

				$.ajax({
					url: "adminExtension.php",
					type: 'POST',
					data: {
						"register": 1,
						'usernameADM': username,
						"nameADM": name,
						"passwordADM": password,
						"passwordConfirmADM": confirmPassword
					},
					success: function(response) {
						if (response === "1") {
							Swal.fire({
								icon: 'error',
								title: 'Register Failed',
								text: 'ID Admin already exists'
							});
						} else if (response === "2") {
							Swal.fire({
								icon: 'error',
								title: 'Register Failed',
								text: 'Invalid confirm password'
							});
						} else if (response === "3") {
							$('#listAdmin').append(
								`<tr>
								<td>` + username + `</td>
								<td>` + name + `</td>
								<td>
									<button type = 'submit' name='deleteAdmin' class='btn btn-danger admin-del' data-id='<?php echo $row[0]; ?>'>Delete</button>
								</td>
								</tr>`
							);

							setTimeout(
								Swal.fire({
									icon: 'success',
									title: 'Admin Added',
									text: 'The admin has been successfully added.'
								}),
								5000)

							// location.reload()	
						}
					},
					error: function(err) {
						console.log(err)
					}
				});
			});
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>