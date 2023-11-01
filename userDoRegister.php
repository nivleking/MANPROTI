<?php
    require 'connect.php';

    if (isset($_POST['register'])){
        $username = $_POST['userTeamName'];
        $password = $_POST['passwordTeamName'];
        $confirmPassword = $_POST['confirmPasswordTeamName'];

        if ($password !== $confirmPassword) {
            header("Location: registerAdmin.php?error=Your confirm password is incorrect");
            exit();
        }
        else {
            // $layout = [
            //     [
            //         [0,0,0],
            //         [0,0,0],
            //         [0,0,0]
            //     ],
            //     [
            //         [0,0,0],
            //         [0,0,0],
            //         [0,0,0]
            //     ],
            //     [
            //         [0,0,0],
            //         [0,0,0],
            //         [0,0,0]
            //     ]
            // ];

            // $layout = json_decode($layout);
            $query = "INSERT INTO user VALUES('$username', '$password', 'null', '1', '0')";
            $result = mysqli_query($con, $query);
            header("Location: loginUser.php");
        }
    } 
?>