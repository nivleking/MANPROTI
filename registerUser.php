<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Register</title>
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

	<!-- DATATABLES -->
	<link rel="stylesheet" type="" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

	<style>
		.w3-row-padding img {
			margin-bottom: 12px
		}

		.w3-sidebar {
			width: 120px;
			background: #222;
		}

		#main {
			margin-left: 100px
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
		<div class="flex-column">
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
		</div>
	</nav>

	<siv class="w3-padding-large" id="main">
		<div class="w3-padding-16 d-flex justify-content-center">
			<div class="w3-row-padding">
				<form style="width: 23rem;" method="POST" action="" class="">
					<h4 class="d-flex justify-content-center">Add User</h4>
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

					<div class="pt-1 mb-4 d-flex justify-content-center">
						<button class="btn btn-primary btn-lg btn-block" type="submit" name="register" id='register'>Add User</button>
					</div>
				</form>
			</div>

			<div class="w3-row-padding">
				<div class="w3-padding-16 ps-5">
					<table class="table table-striped table-bordered table-responsive" id="userTable" style="width: 100vh;">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>

						<tbody id="listUser">
							<?php
							$sql = "SELECT * FROM user";
							$result = mysqli_query($con, $sql);

							while ($row = mysqli_fetch_array($result)) {
								echo "<tr>
								<td>$row[0]</td>
								<td>
									<button type='submit' name='deleteUser' class='btn btn-danger user-del' id='' value='$row[0]'>Delete</button>
								</td>
								</tr>
							";
							}
							?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</siv>

	<script>
		$(document).ready(function() {
			$('.user-del').click(function(e) {
				e.preventDefault()

				let id_user = $(this).val()

				$.ajax({
					url: "userExtension.php",
					type: 'POST',
					data: {
						"deleteUser": 1,
						"team_name": id_user
					},
					success: function(response) {
						if (response == "1") {
							console.log("sukes")
							// location.reload()
							// refreshTable();
							$("#listUser").find(`[value='${id_user}']`).closest('tr').remove();

							Swal.fire({
								icon: 'success',
								title: 'User Deleted',
								text: 'The User has been successfully deleted.'
							});
						} else if (response == "2") {
							// console.log("sukess")
							Swal.fire({
								icon: 'error',
								title: 'Delete Failed',
								text: 'Error ID User'
							});
						}
					},
					error: function(err) {
						// console.log("sukes")
						console.log(err)
					}
				});
			})

			let table = $('#userTable').DataTable()

			$("#register").click(function(e) {
				e.preventDefault()

				let username = $('#form2Example18').val()
				let password = $('#form2Example28').val()
				let confirmPassword = $('#form2Example38').val()
				console.log("tes")

				$.ajax({
					url: "userExtension.php",
					type: 'POST',
					data: {
						"register": 1,
						"teamUserName": username,
						"teamPassword": password,
						"teamPasswordConfirm": confirmPassword
					},
					success: function(response) {
						if (response == "1") {
							console.log("halww")
							Swal.fire({
								icon: 'error',
								title: 'Register Failed',
								text: 'ID Team User already exists'
							});
						} else if (response == "2") {
							console.log("halow")
							Swal.fire({
								icon: 'error',
								title: 'Register Failed',
								text: 'Invalid confirm password'
							});
						} else if (response == "3") {
							// console.log("halo")
							table.destroy()
							$('#listUser').append(
								`<tr>
									<td>` + username + `</td>
									<td>
										<button type='submit' name='deleteUser' class='btn btn-danger user-del' value='` + username + `'>Delete</button>
									</td>
								</tr>`
							);

							Swal.fire({
								icon: 'success',
								title: 'User Added',
								text: 'The user has been successfully added.'
							});

							table = $("#userTable").DataTable().draw()
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