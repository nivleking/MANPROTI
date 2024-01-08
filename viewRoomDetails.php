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
    <title>Room Details</title>

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

    <!-- DATATABLES -->
    <link rel="stylesheet" type="" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = $('#tableHistory').DataTable({
                info: true
                // scrollCollapse: true,
                // scrollY: '430px'
            })
        })

        $(document).ready(function() {
            let table = $('#tableLogs').DataTable({
                info: true
                // scrollCollapse: true,
                // scrollY: '430px'
            })
        })
    </script>

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
            <a href="#activity" class="w3-bar-item w3-button w3-padding-large w3-black w3-center">
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
        <a class="btn btn-dark mb-2" href="homeAdmin.php">Back</a>
        <div class="row d-flex justify-content-center">
            <?php
            if (isset($_POST['viewButton'])) {
                // var_dump($_POST);

                $idRoom = $_POST['roomID'];
                $supervisor = $_POST['supervisor'];
                $status = $_POST['statusRoom'];
                $date = $_POST['dateRoom'];

                if ($status == 1) {
                    $val = 'Finished';
                } else {
                    $val = 'Ongoing';
                }
                $sql = "SELECT id_admin FROM room WHERE id_room = '$idRoom'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);
                echo "<h1 style='font-weight:bold;'>Room $idRoom</h1>
                    <h6>Supervisor: $row[0]</h6>";

                $sql = "SELECT * from temp_user WHERE id_room = '$idRoom'";
                $result = mysqli_query($con, $sql);
                $winner = "";
                $score = 0;
                while ($row = mysqli_fetch_array($result)) {
                    // echo "$row[2] <br>";

                    if ($row[2] > $score) {
                        $score = $row[2];
                        $winner = $row[0];
                    }
                }
                echo "<h6 style='color:red;font-weight:bold;'>Winner: $winner</h6>";
                echo "
                        <h2 class='d-flex justify-content-center' style='font-weight:bold;'>History</h2>
                        <table class='table table-responsive table-bordered table-striped' id='tableHistory' style = 'width:100%'>
                            <thead>
                                <tr>
                                    <th scope='col'>Round</th>
                                    <th scope='col''>Date</th>
                                    <th scope='col''>Team Name</th>
                                    <th scope='col''>Ship</th>
                                    <th scope='col''>Origin</th>
                                    <th scope='col''>Room ID</th>
                                    <th scope='col''>Revenue</th>
                                </tr>
                            </thead>
                            <tbody>
                    ";

                $sql = "SELECT * FROM history WHERE id_room = '$idRoom'";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo "
                        <tr>
                            <td>$row[1]</td>
                            <td>$row[0]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <td>$row[6]</td>
                            <td>$row[5]</td>
                        </tr>
                        ";
                }

                echo "</tbody>
                    </table>";


                $sql = "SELECT * FROM log_users WHERE id_room = '$idRoom'";
                $result = mysqli_query($con, $sql);
                echo "
                    <h2 class='d-flex justify-content-center' style='font-weight:bold;'>Logs</h2>
                    <table class='table table-responsive table-bordered table-striped' id='tableLogs' style = 'width:100%'>
                    <thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Detail</th>
                        </tr>
                    </thead>
                    <tbody>";

                while ($row = mysqli_fetch_array($result)) {
                    echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[2]</td>
                        </tr>
                    ";
                }


                echo "
                    </tbody>
                        </table>  
                ";

                // echo "
                // <h1>Room $idRoom</h1>
                // <h6>Supervisor: $supervisor</h6>

                // <div class='row mx-sm-0 mt-2'>
                //     Status:&nbsp$val
                // </div>

                // <div class='row mx-sm-0 mt-2'>
                //     Date:&nbsp$date
                // </div>
                // <div class='row mx-sm-0 mt-2'>
                //     Teams:
                // </div>

                // <div class='row mx-sm-0'>
                //     - Vincentius1: $1500
                // </div>

                // <div class='row mx-sm-0' style='color:red;'>
                //     - Vincentius1: $2500
                // </div>

                // <a href='activity.php' class='btn btn-secondary mt-3'>Back to home</a>
                // <a href='#' class='btn btn-danger mt-3'>Delete Room</a>
                // ";
            }

            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>