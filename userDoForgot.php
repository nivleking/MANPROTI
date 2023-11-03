<?php
    require 'connect.php';

    if (isset($_POST['change'])){
        $username = $_POST['userTeamName'];
        $password = $_POST['passwordUser'];
        $confirmPassword = $_POST['passwordConfirmUser'];
        $newPassword = $_POST['newPasswordUser'];
        $newConfirmPassword = $_POST['newPasswordConfirmUser'];

        if ($password !== $confirmPassword || $newPassword !== $newConfirmPassword) {
            header("Location: forgotPasswordUser.php?error=Your old / new confirm password is incorrect");
            exit();
        }
        else {
            $sql = "SELECT * FROM user WHERE team_name = '$username' and password = '$confirmPassword'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);

            if (is_array($row)) {
                $query = "UPDATE user SET `password`='$newConfirmPassword' WHERE team_name = '$username'";
                $result = mysqli_query($con, $query);
                header("Location: loginUser.php");
            }
            else {
                header("Location: forgotPasswordUser.php?error=Invalid username and password");
            }
        }
    } 
?>