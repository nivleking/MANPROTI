<?php
    require 'connect.php';
    $admin = $_SESSION["usernameADM"];
    $sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cargo Master</title>
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
        .w3-row-padding img {
            margin-bottom: 12px
        }

        .w3-sidebar {
            width: 120px;
            background: #222;
        }

        #main {
            margin-left: 120px
        }

        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0
            }
        }
    </style>
</head>

<body class="w3">

<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
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

		<a href="logoutAdmin.php" class="w3-bar-item w3-button w3-padding-large w3-black w3-center p-2 ml-auto">
			<i class="fa fa-sign-out w3-xxlarge d-flex justify-content-center mt-2"></i>
			<p>Log Out</p>
		</a>
	</nav>

    <div class="w3-padding-large" id="main">
        <!-- Header/Home -->
        <div class=" w3-padding-16 w3-center" id="home">
            <h1 class="w3-jumbo"><span class="w3-hide-small">Accounts</span></h1>
            <h3>Hello,
                <?php echo $row[1]; ?>
            </h3>
        </div>

        <!-- Grid for pricing tables -->
        <div class="w3-row-padding">
            <div class="w3-half w3-margin-bottom">
                <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                    <div class="card" style="width:w3">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight:bold;">Edit Admin Accounts</h3>
                            <img class="object-fit-md-cover border rounded" src="fa " alt="Admin">
                            <div class="row d-flex justify-content-center">
                                <div class="col-3">
                                    <a type="submit" class="btn btn-dark" href="registerAdmin.php" style="margin-top: 10px; width: 10rem;">Edit Admins</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w3-half">
                <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                    <div class="card" style="width:w3">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight:bold;">Edit User Accounts</h3>
                            <image src = "" alt="User"></image>
                            <form action="registerUser.php">
                                <button type="submit" class="btn btn-dark" style="margin-top: 10px; width: 10rem;">Edit Users</button>
                            </form>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>