<?php
    require 'connect.php';

    if (isset($_POST['change'])){
        $username = $_POST['usernameADM'];
        $password = $_POST['passwordADM'];
        $confirmPassword = $_POST['passwordConfirmADM'];
        $newPassword = $_POST['newPasswordADM'];
        $newConfirmPassword = $_POST['newPasswordConfirmADM'];

        if ($password !== $confirmPassword || $newPassword !== $newConfirmPassword) {
            header("Location: forgotPasswordAdmin.php?error=Your old / new confirm password is incorrect");
            exit();
        }
        else {
            $sql = "SELECT * FROM admin WHERE id_admin = '$username' and password = '$confirmPassword'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $query = "UPDATE admin SET `password`='$newConfirmPassword' WHERE id_admin = '$username'";
                $result = mysqli_query($con, $query);
                header("Location: loginAdmin.php");
            }
            else {
                header("Location: forgotPasswordAdmin.php?error=Invalid username and password");
            }
        }
    } 
?>