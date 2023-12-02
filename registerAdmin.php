<?php
	require 'connect.php';
	
	if (!isset($_SESSION["loginADM"])) {
        header("Location: loginAdmin.php");
        exit;
    }
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

	<!-- DATATABLES -->
	<link rel="stylesheet" type="" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>	

	<style>
		/* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            background: #ececec;
            padding: 0 20px 0 20px;
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        #main {
            margin-left: 120px;
            transition: margin-left .5s;
        }

        .navbar-boots {
            background: #222;
            position: fixed;
            height: 66px;
        }

        /* Sidebar styles */
        .w3-sidebar {
            width: 150px;
            background: #222;
            position: fixed;
            height: 100%;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
        }

        .w3-sidebar a {
            padding: 8px;
            text-align: center;
            width: 100%;
            display: block;
            transition: 0.3s;
        }

        .w3-sidebar .flex-column {
            flex-direction: column;
            align-items: stretch;
        }

        /* Small */
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: -40px;
            }

            #navbarUpper {
                margin-left: -56px;
            }
        }

        /* Medium */
        @media only screen and (max-width: 991px) and (min-width: 768) {}
	</style>
</head>

<body class="w3">
	<!-- Sidebar -->
	<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
		<div class="flex-column" style="display: flex; flex-direction: column; height: 100%;">
			<h3 class="text-white w3-bar-item" style="font-style: italic;font-weight:bold;">BLC</h3>
		
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

			<!-- Profile Dropdown -->
			<div class="dropdown mt-auto">
				<a class="btn w3-black dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: auto;" id="dropDownUser">
					<i class="fa fa-user w3-xxlarge d-flex justify-content-center mt-1"></i>
					Profile
				</a>
				<ul class="dropdown-menu text-small shadow" aria-labelledby="dropDownUser" style="width:25px">
					<!-- <li class="dropdown-item"><a href="#">Profile</a></li> -->
					<li class="dropdown-item"><a href="logoutAdmin.php">Log Out</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="w3-padding-large" id="main">
		<div class="w3-padding-16 ms-5">
			<div class="row d-flex justify-content-around">
				<!-- Admin Registration Form -->
				<div class="col-lg-5 col-md-5 mt-4">
					<form method="POST" action="" class="w3-card w3-padding">
						<h4 class="d-flex justify-content-center" style="font-weight: bold;">Add Admin</h4>

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

						<div class="row d-flex justify-content-around">
							<button class="col-3 btn btn-dark btn-lg btn-block" type="submit" name="checkLogs" id="checkLogs">Admin Logs</button>
							<button class="col-3 btn btn-primary btn-lg btn-block" type="submit" name="register" id="register">Add Admin</button>
						</div>
					</form>
				</div>

				<!-- Admin Table -->
				<div class="col-lg-7 col-md-7">
					<div class="w3-padding-16 ps-4">
						<table class="display table table-bordered table-responsive table-striped" id="adminTable" style="width: 100%;">
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">Actions</th>
								</tr>
							</thead>

							<tbody id="listAdmin">
								<?php
								$sql = "SELECT * FROM admin";
								$result = mysqli_query($con, $sql);

								while ($row = mysqli_fetch_array($result)) {
									echo "<tr>
                                    <td class='col-lg-6'>$row[0]</td>
                                    <td class='col-lg-6'>	
										<button type='submit' name='deleteAdmin' class='btn btn-danger admin-del' id='' value='$row[0]'>Delete</button>
                                    </td>
                                </tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			let table = $('#adminTable').DataTable({
				info: true
				// scrollCollapse: true,
				// scrollY: '430px'
			})

			let table2 = $('#logTable').DataTable({
				info: true
				// scrollCollapse: true,
				// scrollY: '430px'
			})
			
			$(document.body).on('click', 'admin-edit', function(e) {
				e.preventDefault()
				console.log("test")
			})

			$(document.body).on('click', '.admin-del', function(e) {
				e.preventDefault()
				// console.log("test")
				let id_admin = $(this).val();
				console.log(id_admin)

				$.ajax({
					url: "adminExtension.php",
					type: 'POST',
					data: {
						"deleteAdmin": 1,
						"id_admin": id_admin
					},
					success: function(response) {
						if (response === "1") {
							// console.log("sukes")
							// location.reload()
							// refreshTable();
							table.destroy()
							table2.destroy()
							$("#listAdmin").find(`[value='${id_admin}']`).closest('tr').remove();

							table = $("#adminTable").DataTable().draw()
							table2 = $("#logTable").DataTable().draw()
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
						// console.log("sukes")
						console.log(err)
					}
				});
			});

			$("#checkLogs").click(function(e) {
				e.preventDefault()
				window.location.href = "adminLogs.php"
			})

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
							table.destroy()
							$('#listAdmin').append(
								`<tr>
								<td class='col-lg-6'>` + username + `</td>
								<td class='col-lg-6'>
									<button type = 'submit' name='deleteAdmin' class='btn btn-danger admin-del' value='` + username + `'>Delete</button>
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
							table = $("#adminTable").DataTable().draw()
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