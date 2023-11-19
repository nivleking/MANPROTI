<?php
require 'connect.php';
if (!isset($_SESSION["loginUser"])) {
	header("Location: loginUser.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Join Room</title>

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

		/* #main {
            margin-left: 120px;
            transition: margin-left .5s;
        } */

		.navbar-boots {
			background: #191970;
			/* position: fixed; */
			height: 66px;
		}

		/* Sidebar styles */
		.w3-sidebar {
			width: 150px;
			background: #191970;
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

<body>
	<!-- SIDEBAR -->
	<div class="w3-sidebar w3-bar-block w3-small w3-hide-small text-white w3-center" style="width:150px">
		<div class="flex-column" style="display: flex; flex-direction: column; height:100%;">
			<h3 class="w3-bar-item" style="font-weight: bold; font-style:italic;">BLC</h3>
			<a href="homeUser.php" class="w3-bar-item w3-indigo  w3-button w3-padding-large">
				<i class="fa fa-dashboard w3-xxlarge d-flex justify-content-center mt-2"></i>
				<p>Home</p>
			</a>
			<a href="joinRoomUser.php" class="w3-bar-item w3-indigo w3-button w3-padding-large w3-center">
				<i class="fa fa-ship w3-xxlarge d-flex justify-content-center mt-2"></i>
				<p>Join Game</p>
			</a>

			<!-- Profile Dropdown -->
			<div class="dropdown mt-auto">
				<a class="btn w3-indigo dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: auto;" id="dropDownUser">
					<i class="fa fa-user w3-xxlarge d-flex justify-content-center mt-1"></i>
					<span class="text-white">Profile</span>
				</a>
				<ul class="dropdown-menu text-small shadow" aria-labelledby="dropDownUser" style="width:25px">
					<!-- <li class="dropdown-item"><a href="#">Profile</a></li> -->
					<li class="dropdown-item"><a href="logoutUser.php">Log Out</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- MAIN CONTENT -->
	<div class="vh-100" style="margin-left:150px">
		<!-- NAVBAR -->
		<div class="w3-container navbar-boots"></div>

		<!-- MAIN CONTENT -->
		<div class="w3-container-fluid w3-center">
			<div class="row">
				<div class="col-sm-12 mx-auto">
					<div class="d-flex justify-content-center align-self-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form action="" method="post" class="w3-card w3-padding flex-column" style="width:500px; height:300px">
							<h3 class="m-3 d-flex justify-content-center mt-5" style="letter-spacing: 0.5px; font-size:38px; font-weight:bold;">Input Room Code</h3>

							<div class="form-outline mb-4 mt-auto">
								<label>Room ID</label>
								<input type="text" class="form-control" name="roomID">
							</div>

							<div class="pt-1 mb-4 mt-auto">
								<button type="submit" name="join" class="btn w3-indigo btn-lg btn-block">Join</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['join'])) {
		$id = $_POST['roomID'];
		$_SESSION['roomID'] = $_POST['roomID'];
		$sql = mysqli_query($con, "SELECT * FROM room where id_room = '$id'");
		$row  = mysqli_fetch_array($sql);
		if (!is_array($row)) {
			echo "<script>
			    Swal.fire({
			        icon: 'error',
			        title: 'ID Room Not Found',
			        text: 'Please contact admin'
			    });
			</script>";
		} else {
			$room = $_SESSION['roomID'];
			$name = $_SESSION['username'];
			$sql = mysqli_query($con, "UPDATE user SET id_room = '$room' WHERE team_name = '$name'");
			// header("Location: waitingRoom.php");
			echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'ID Room Found',
                    text: 'Joining the room',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function() {
                    window.location.href = 'waitingRoom.php';
                });
            </script>";
		}
	}
	?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>