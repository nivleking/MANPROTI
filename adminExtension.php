<?php
require 'connect.php';

// var_dump($_POST);
if (isset($_POST['deleteAdmin'])) {
    if (isset($_POST['id_admin'])) {
        $id = $_POST['id_admin'];
        if ($_SESSION['usernameADM'] === $id) {
            echo "2";
            exit();
        }
        else {
            $query = "DELETE FROM admin WHERE id_admin = '$id'";
            $result = mysqli_query($con, $query);
            if (mysqli_affected_rows($con) > 0) {
                echo "1";
                exit();
                // echo "<script>
                // 		Swal.fire({
                // 			icon: 'success',
                // 			title: 'Admin Deleted',
                // 			text: 'The admin has been successfully deleted.'
                // 		});
                // 	</script>";
                // header("Refresh: 3");
            } else {
                echo "2";
                exit();
                // echo "<script>
                // 		Swal.fire({
                // 			icon: 'error',
                // 			title: 'Delete Failed',
                // 			text: 'Error ID Admin'
                // 		});
                // 	</script>";
            }
        }
    }
}

if (isset($_POST['register'])) {
    // return "tes";
    $username = $_POST['usernameADM'];
    $name = $_POST['nameADM'];
    $password = $_POST['passwordADM'];
    $confirmPassword = $_POST['passwordConfirmADM'];
    $resultAll = mysqli_query($con, "SELECT * FROM admin");

    // var

    while ($row = mysqli_fetch_assoc($resultAll)) {
        // echo $row['id_admin'];
        if ($row['id_admin'] === $username) {
            echo "1";
            exit();
            // echo "<script>
            // 		Swal.fire({
            // 			icon: 'error',
            // 			title: 'Register Failed',
            // 			text: 'ID Admin already exists'
            // 		});
            // 	</script>";
        }
    }

    if ($password !== $confirmPassword) {
        // header("Location: registerAdmin.php?error=Your confirm password is incorrect");
        echo "2";
        exit();
        // echo "<script>
        // 		Swal.fire({
        // 			icon: 'error',
        // 			title: 'Register Failed',
        // 			text: 'Invalid confirm password'
        // 		});
        // 	</script>";
    } else {
        $query = "INSERT INTO admin VALUES('$username', '$name','$password', '0')";
        $result = mysqli_query($con, $query);
        echo "3";
        exit();
        // echo "<script>
        // 		Swal.fire({
        // 			icon: 'success',
        // 			title: 'Admin Added',
        // 			text: 'The admin has been successfully added.'
        // 		});
        // 	</script>";
    }
    exit();
}
?>