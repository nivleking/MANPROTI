<?php
    require 'connect.php';
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
						timer: 3000
					}).then(function() {
						window.location.href = 'joinRoomUser.php';
					});
				</script>";
		} else {
			header("Location: loginUser.php?error=Invalid username or password");
		}
	}
	?>