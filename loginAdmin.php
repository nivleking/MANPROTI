<?php 
    require 'connect.php';
    if (isset($_SESSION["loginADM"])) {
        header("Location: homeAdmin.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Swal2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

    <title>Admin Login</title>

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

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            min-width: 90vw;
        }

        .side-image {
            background-image: url("images/login.jpg");
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 10px 0 0 10px;
            position: relative;
        }

        #bigImage {
            width: 1500px;
            height: 900px;
            border-radius: 10px;
            background: #fff;
            padding: 0px;
            box-shadow: 5px 5px 10px 1px rgba(0, 0, 0, 0.2);
        }

        .text {
            position: absolute;
            top: 13%;
            left: 37.7%;
            transform: translate(-50%, -50%);
            width: 500px;
        }

        .text p {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
        }

        i {
            font-weight: 400;
            font-size: 15px;
        }

        .right {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .input-box {
            width: 330px;
            box-sizing: border-box;
        }

        #logopetra {
            width: 200px;
            position: absolute;
            top: -40px;
        }

        #logoukp {
            width: 60px;
            position: absolute;
            top: 25px;
            left: 175px;
        }

        .input-box header {
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 0 10px 0 10px;
        }

        .input {
            height: 50px;
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            outline: none;
            margin-bottom: 20px;
            color: #40414a;
        }

        .input-box .input-field label {
            position: absolute;
            top: 10px;
            left: 10px;
            pointer-events: none;
            transition: .5s;
        }

        .input-field input:focus~label {
            top: -10px;
            font-size: 13px;
        }

        .input-field input:valid~label {
            top: -10px;
            font-size: 13px;
            color: #5d5076;
        }

        .input-field .input:focus,
        .input-field .input:valid {
            border-bottom: 1px solid #D2691E;
        }

        .submit {
            border: none;
            outline: none;
            height: 45px;
            background: #ececec;
            border-radius: 5px;
            transition: .4s;
        }

        .submit:hover {
            background: #D2691E;
            color: #fff;
        }

        .forgotPassword {
            text-align: center;
            font-size: small;
            margin-top: 25px;
        }

        span a {
            text-decoration: none;
            font-weight: 700;
            color: #000;
            transition: .5s;
        }

        span a:hover {
            text-decoration: underline;
            color: #000;
        }

        @media only screen and (max-width: 768px) {
            .side-image {
                /* border-radius: 10px 10px 0 0; */
                display: none;
            }

            /* img {
                width: 35px;
                position: absolute;
                top: 20px;
                left: 47%;
            } */

            #logopetra {
                width: 200px;
                position: absolute;
                top: -49px;
            }

            #logoukp {
                width: 60px;
                position: absolute;
                top: 20px;
                left: 175px;
            }

            .text {
                position: absolute;
                top: 30%;
                /* text-align:start; */
                left: 282px;

                /* filter: brightness(); */
            }

            .text p,
            i {
                font-size: 16px;
            }

            #bigImage {
                max-width: 420px;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row" id="bigImage">
                <div class="col-md-6 side-image">
                    <!-------------      image     ------------->
                    <img src="images/logopetra.png" alt="" id="logopetra">
                    <img src="images/logoukp.png" alt="" id="logoukp">

                    <div class="text">
                        <p>
                            Shipping Logistics Game
                        </p>
                    </div>

                </div>

                <div class="col-md-6 right flex-column">
                    <div class="row mt-auto">
                        <h1>Welcome to SLG!</h1>
                    </div>
                    <div class="row mt-auto" style="margin-bottom: 140px;">
                        <form class="input-box" action="#" method="post">

                            <header>
                                <h3>
                                    Admin Login
                                </h3>
                            </header>
                            <div class="input-field">
                                <input type="text" class="input" id="username" name="usernameADM" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="passwordADM" required>
                                <label for="pass">Password</label>
                            </div>
                            <div class="input-field">
                                <button type="submit" class="submit" name="submit">Log In</button>
                            </div>
                            <div class="forgotPassword">
                                <span>Forgot your password? </span><span style="font-weight: bold;">Contact Super Admin</span>
                            </div>
                        </form>
                    </div>
                    <div class="row mt-auto">
                        <h6 style="font-size: 12px;">Copyright @ 2023 MANPRO TI Kelompok 1, All Rights Reserved.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $username = htmlspecialchars($_POST['usernameADM']);
        $password = htmlspecialchars($_POST['passwordADM']);
    
        // Fetch the hashed password from the database
        $stmt = mysqli_prepare($con, "SELECT password FROM admin WHERE id_admin = ?");
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    
        // Verify the entered password against the hashed password
        if ($row && password_verify($password, $row['password'])) {
            $_SESSION["usernameADM"] = $username;
            $_SESSION["loginADM"] = true;
    
            // Redirect to homeAdmin.php with a success message
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Welcome back, {$username}!',
                        showConfirmButton: false,
                        timer: 2500
                    }).then(function() {
                        window.location.href = 'homeAdmin.php';
                    });
                </script>";
        } else {
            // Display an error message for invalid credentials
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: 'Invalid username or password'
                    });
                </script>";
        }
    }    
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>