<?php
require 'connect.php';

// var_dump($_POST);
if (isset($_POST['deleteAdmin'])) {
    if (isset($_POST['id_admin'])) {
        $id = htmlspecialchars($_POST['id_admin']);
        if ($_SESSION['usernameADM'] === $id || $id === "sam1") {
            echo "2";
            exit();
        }
        else {
            $query = "DELETE FROM admin WHERE id_admin = '$id'";
            $result = mysqli_query($con, $query);
            if (mysqli_affected_rows($con) > 0) {
                $admin = $_SESSION['usernameADM'];
                $detail = "$admin has deleted $id from database.";
                $sql = "INSERT INTO log_admin VALUES('','$detail')";
                mysqli_query($con, $sql);
                echo "1";
                exit();
            } else {
                echo "2";
                exit();
            }
        }
    }
}

if (isset($_POST['register'])) {
    $username = htmlspecialchars($_POST['usernameADM']);
    $name = htmlspecialchars($_POST['nameADM']);
    $password = htmlspecialchars($_POST['passwordADM']);
    $confirmPassword = htmlspecialchars($_POST['passwordConfirmADM']);
    $resultAll = mysqli_query($con, "SELECT * FROM admin");

    while ($row = mysqli_fetch_assoc($resultAll)) {
        if ($row['id_admin'] === $username) {
            echo "1";
            exit();
        }
    }

    if ($password !== $confirmPassword) {
        echo "2";
        exit();
    } else {
        $query = "INSERT INTO admin VALUES('$username', '$name','$password', '0')";
        $result = mysqli_query($con, $query);

        $admin = $_SESSION['usernameADM'];
        $detail = "$admin has added $username into database.";
        $sql = "INSERT INTO log_admin VALUES('','$detail')";
        mysqli_query($con, $sql);
        echo "3";
        exit();
    }
    exit();
}
?>