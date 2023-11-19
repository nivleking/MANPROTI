<?php
require 'connect.php';

if (!isset($_SESSION["loginADM"])) {
    header("Location: loginAdmin.php");
    exit;
}

$admin = $_SESSION["usernameADM"];
$sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>BLC Accounts</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            background: #222;
            position: fixed;
            height: 66px;
        }

        /* Sidebar styles */
        .w3-sidebar {
            width: 150px;
            background: #222;
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

<body class="w3">
    <div class="row">
        <div class="col-1 min-vh-100">
            <!-- Sidebar -->
            <div class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center" id="mySidebar">
                <div class="flex-column" style="display: flex; flex-direction: column; height: 100%;">
                    <h3 class="w3-bar-item text-white" onclick="closeNav()" style="font-style: italic;font-weight:bold;">BLC</h3>

                    <a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black">
                        <i class="fa fa-dashboard w3-xxlarge d-flex justify-content-center mt-2"></i>
                        <p>Home</p>
                    </a>
                    <a href="homeAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
                        <i class="fa fa-ellipsis-h w3-xxlarge d-flex justify-content-center mt-2"></i>
                        <p>Activity</p>
                    </a>
                    <a href="accounts.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
                        <i class="fa fa-group w3-xxlarge d-flex justify-content-center mt-2"></i>
                        <p>Accounts</p>
                    </a>

                    <!-- Profile Dropdown -->
                    <div class="dropdown mt-auto">
                        <a class="btn w3-black dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="margin-top: auto;" id="dropDownUser">
                            <i class="fa fa-user w3-xxlarge d-flex justify-content-center mt-1"></i>
                            Profile
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropDownUser" style="width:25px">
                            <!-- <li class="dropdown-item"><a href="#">Profile</a></li> -->
                            <li class="dropdown-item"><a href="logoutAdmin.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-11 mx-auto" id="main">
            <!-- <div class="row my-auto" id="navbarUpper">
                <div class="w3-container navbar-boots min-vw-100 text-white">
                    <h1 class="">
                        Halo
                    </h1>
                    <a class="navbar-brand text-white" href="#">
                            <?php //echo $_SESSION['usernameADM']
                            ?>
                        </a>
                    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
                            <div class="bg-dark p-4">
                                <h5 class="text-body-emphasis h4">Collapsed content</h5>
                                <span class="text-body-secondary">Toggleable via the navbar brand.</span>
                            </div>
                        </div>
                    <button class="navbar-toggler navbar-brand bg-white" onclick="openNav()" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                </div>
            </div> -->
            <div class="row">
                <div class="w3-padding-large" id="main">
                    <!-- Header/Home -->
                    <div class=" w3-padding-16 w3-center" id="home">
                        <h1 class="" style="font-weight:bold;"><span class="">Accounts</span></h1>
                        <h4>Hello,
                            <?php echo $row[0]; ?>
                        </h4>
                    </div>

                    <!-- Grid for pricing tables -->
                    <div class="w3-row-padding">
                        <div class="w3-half w3-margin-bottom">
                            <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                                <div class="card" style="width:w3">
                                    <div class="card-body">
                                        <h3 class="card-title" style="font-weight:bold;">Edit Admin Accounts</h3>
                                        <!-- <img class="object-fit-md-cover border rounded" src="" alt="Admin"> -->
                                        <div class="row d-flex justify-content-center ">
                                            <a type="submit" class="btn btn-dark" href="registerAdmin.php" style="margin-top: 10px; width: 10rem;">Edit Admins</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w3-half w3-margin-bottom">
                            <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                                <div class="card" style="width:w3">
                                    <div class="card-body">
                                        <h3 class="card-title" style="font-weight:bold;">Edit User Accounts</h3>
                                        <!-- <image src="" alt="User"></image> -->
                                        <form action="registerUser.php">
                                            <button type="submit" class="btn btn-dark" style="margin-top: 10px; width: 10rem;">Edit Users</button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row mx-auto ms-3">
                        Halo
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "0px";
            document.getElementById("main").style.marginLeft = "-150px";
        }

        /* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
        function closeNav() {
            document.getElementById("mySidebar").style.width = "150px";
            document.getElementById("main").style.marginLeft = "150px";
        }
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>