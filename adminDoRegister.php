<?php
    require 'connect.php';

    if (isset($_POST['register'])){
        $username = $_POST['usernameADM'];
        $name = $_POST['nameADM'];
        $password = $_POST['passwordADM'];
        $confirmPassword = $_POST['passwordConfirmADM'];

        if ($password !== $confirmPassword) {
            header("Location: registerAdmin.php?error=Your confirm password is incorrect");
            exit();
        }
        else {
            $query = "INSERT INTO admin VALUES('$username', '$name','$password', '0')";
            $result = mysqli_query($con, $query);
            header("Location: loginAdmin.php");
        }
    } 
?>