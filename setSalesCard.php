<?php
require 'connect.php';

if (!isset($_SESSION["loginADM"])) {
    header("Location: loginAdmin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Sales Card</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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

        #main {
            margin-left: 120px;
            transition: margin-left .5s;
        }

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

<body>
    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <div class="flex-column" style="display: flex; flex-direction: column; height: 100%;">
            <h3 class="text-white w3-bar-item" style="font-style: italic;font-weight:bold;">BLC</h3>

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
    </nav>

    <div class="container mt-5">
        <a class="btn btn-dark" name="" href="homeAdmin.php">Back</a>
        <a class="btn btn-dark" name="" href="viewSalesCard.php">View Cards</a>

        <div class="row d-flex justify-content-center">
            <h1 style="font-weight:bold;">Set Sales Card</h1>
        </div>
        <form method="POST">
            <div class="form-group">
                <label for="id_sales">ID Sale</label>
                <input type="number" class="form-control" name="id_sales" id = "sales" required>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="priority" id="commit" value="COMMIT" onclick="return false">
                            <label class="form-check-label" for="commit">COMMIT
                                </label>
                        <br>
                        <input class="form-check-input" type="radio" name="priority" id="ncommit" value="N-COMMIT" onclick="return false" >
                            <label class="form-check-label" for="ncommit">
                                    N-COMMIT
                                </label>
                    </div>
            </div>
                    <script>
                        document.getElementById("sales").addEventListener("input", function() {
                            var idSalesValue = parseInt(this.value);

                            if (idSalesValue % 5 == 0) {
                                document.getElementById("commit").checked = true;
                                document.getElementById("ncommit").checked = false;
                            } 
                            else {
                                document.getElementById("ncommit").checked = true;
                                document.getElementById("commit").checked = false;

                            }
                        });

                    </script>
                <!-- <div class="row d-flex ml-1">
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="priority" id="commit" value="COMMIT" checked>
                        <label class="form-check-label" for="commit">
                            COMMIT
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="priority" id="ncommit" value="N-COMMIT">
                        <label class="form-check-label" for="ncommit">
                            N-COMMIT
                        </label>
                    </div> -->
            <div class="form-group">
                <label for="origin">Origin</label>
                <input type="text" class="form-control" name="origin" required>
                <!-- <div class="row d-flex ml-1">
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="origin" id="SBY" value="SBY" checked>
                        <label class="form-check-label" for="origin">
                            SBY
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="origin" id="MDN" value="MDN">
                        <label class="form-check-label" for="origin">
                            MDN
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="origin" id="JYP" value="JYP">
                        <label class="form-check-label" for="origin">
                            JYP
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="origin" id="MKS" value="MKS">
                        <label class="form-check-label" for="origin">
                            MKS
                        </label>
                    </div>
                </div> -->
            </div>
            <div class="form-group">
                <label for="destination">Destination</label>
                <input type="text" class="form-control" name="destination" required>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="col-6">
                    <label for="quantity_lower">Quantity (Lower)</label>
                    <input type="number" class="form-control" name="quantity_lower" required>
                </div>
                <div class="col-6">
                    <label for="quantity_upper">Quantity (Upper)</label>
                    <input type="number" class="form-control" name="quantity_upper" required>
                </div>
            </div>

            <div class="form-group">
                <label for="revenue">Revenue</label>
                <input type="number" class="form-control" name="revenue" required>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary ml-3" name="addSales">Create</button>
                <!-- <div class="m-2" style="color:green">
                </div> -->
            </div>
        </form>

        <?php
        if (isset($_POST['addSales'])) {
            // $deck = $_POST['id_deck'];

            $id = $_POST['id_sales'];
            $priority = $_POST['priority'];
            $origin = $_POST['origin'];
            // var_dump($_POST['origin']);
            $dest = $_POST['destination'];
            // var_dump($_POST['destination']);
            $qty = random_int($_POST['quantity_lower'], $_POST['quantity_upper']);
            $revenue = $_POST['revenue'];

            $sql = "INSERT INTO sales VALUES (?,?,?,?,?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("isssii", $id, $priority, $origin, $dest, $qty, $revenue);
            $res = $stmt->execute();

            for ($i = 0; $i < $qty; $i++) {
                // echo "Halo";
                $sql = "INSERT INTO container (asal_container,tujuan_container,id_sales) VALUES (?,?,?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssi", $origin, $dest, $id);
                $stmt->execute();
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</html>