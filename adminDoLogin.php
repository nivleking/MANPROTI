<?php

	require 'connect.php';
	if (isset($_POST['save'])) {
		$username = $_POST['usernameADM'];
		$password = $_POST['passwordADM'];
		$sql = mysqli_query($con, "SELECT * FROM admin where id_admin='$username' and password='$password'");
		$row  = mysqli_fetch_array($sql);

		if (is_array($row)) {
			$_SESSION["usernameADM"] = $row['id_admin'];
			$_SESSION["passwordADM"] = $row['password'];
			echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful',
                    text: 'Welcome back, {$row['id_admin']}!',
                    showConfirmButton: false,
                    timer: 3000
                }).then(function() {
                    window.location.href = 'activity.php';
                });
            </script>";
		} else {
			// header("Location: loginAdmin.php?error=Invalid username or password");
			echo "<script>
			    Swal.fire({
			        icon: 'error',
			        title: 'Login Failed',
			        text: 'Invalid username or password'
			    });
			</script>";
			// echo ("<script LANGUAGE='JavaScript'>
			// window.alert('Invalid Username/Password');
			// window.location.href='loginAdmin.php';
			// </script>");
		}
	}
	?>