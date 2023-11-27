<?php
require 'connect.php';

$id = $_SESSION['username'];
$sql = "SELECT pindah from user where team_name = '$id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

// Ini biar aman aja
if($row['pindah'] == "YES") {
    $roomID = $_SESSION['roomID'];
    $sql = "UPDATE user SET pindah = 'NO' WHERE id_room = '$roomID'";
    mysqli_query($con,$sql);
    // $sql = "SELECT pindah from user where team_name = '$id'";
    // $result = mysqli_query($con, $sql);
    // $row = mysqli_fetch_array($result);
    // var_dump($row);
}

if (!isset($_SESSION["loginUser"])) {
    header("Location: loginUser.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Section 1</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Currency -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/currencyformatter.js/2.2.0/currencyFormatter.min.js" integrity="sha512-zaNuym1dVrK6sRojJ/9JJlrMIB+8f9IdXGzsBQltqTElXpBHZOKI39OP+bjr8WnrHXZKbJFdOKLpd5RnPd4fdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        /* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow: hidden;
        }

        #div1,
        #div2 {
            float: left;
            width: 100px;
            height: 35px;
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
        }

        .id {
            margin-top: -8px;
            margin-left: -3px;
            font-size: 10px;
            vertical-align: top;
            text-align: left;
        }

        #label {
            margin-top: 10px;
        }
    </style>
    <!-- <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
            })
    </script> -->
</head>

<body>
    <nav class="navbar navbar-dark bg-danger navbar-expand d-flex justify-content-between" style="width: 100%;">
        <div>
            <a href="#" class="navbar-brand disabled" style="font-style: italic; font-weight:bold; font-size:26px">BLC</a>
        </div>
        <div class="text-white">
            <h3 style="font-weight: bold;">
                SBY - WEEK 1
            </h3>
        </div>
        <div class="text-white" style="font-weight: bold;">
            <?php
            echo $_SESSION['username'];
            ?>
        </div>
    </nav>
    <!-- <div style="font-weight: bold; background-color: lightgrey; padding: 15px;">
        <h1 class="text-center w3-jumbo" style="margin-top: 0PX;">CARGO MASTER</h1>
        <h2 class="text-center" style="font-weight: 550;">SURABAYA - WEEK 1</h2>
    </div> -->

    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: absolute; top: 10px;right: 10px; background-color: black; color: lightgrey;">
        Market Intelligence
    </button> -->

    <div class="container-fluid mt-5" style="width: 109rem;">
        <!-- <div class="row"> -->
        <table class="flex-nowrap table table-responsive table-bordered text-center overflow-x-auto" style="margin-top: 10px;">
            <thead>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <th class="col-12">BAY 1 DRY</th>
                    <th class="col-12">BAY 2 REEF</th>
                    <th class="col-12">BAY 3 REEF</th>
                </tr>
            </thead>
            <tbody class="overflow-x-auto">
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <td class="col-4">
                        <div class="id">000

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][0][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][0][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">001

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][0][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][0][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">002

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][0][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][0][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                    <td class="col-4">
                        <div class="id">100

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][0][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][0][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">101

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][0][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][0][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">102

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][0][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][0][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                    <td class="col-4">
                        <div class="id">200

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][0][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][0][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">201

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][0][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][0][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">202

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][0][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][0][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <td class="col-4">
                        <div class="id">010

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][1][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][1][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">011

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][1][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][1][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray;'>$row[0]</div>";
                            }
                        }
                        ?>
                        <!-- <hr class="bg-secondary" style="margin-top: -5px; width: 3.5rem; height: 0.1rem;"> -->

                    </td>
                    <td class="col-4">
                        <div class="id">012

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][1][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][1][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                        <!-- <hr class="" style="margin-top: -5px; width: 3.5rem; height: 0.1rem; background-color:green;"> -->
                    </td>

                    <td class="col-4">
                        <div class="id">110

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][1][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][1][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">111

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][1][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][1][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">112

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][1][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][1][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                    <td class="col-4">
                        <div class="id">210

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][1][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][1][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">211

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][1][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][1][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">212

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][1][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][1][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                </tr>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <td class="col-4">
                        <div class="id">020

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][2][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][2][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">021

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][2][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][2][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">022

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[0][2][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[0][2][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                    <td class="col-4">
                        <div class="id">120

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][2][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][2][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">121

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][2][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][2][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">122

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[1][2][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[1][2][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                    <td class="col-4">
                        <div class="id">220

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][2][0] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][2][0];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">221

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][2][1] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][2][1];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                    <td class="col-4">
                        <div class="id">222

                        </div>
                        <?php
                        $id = $_SESSION['username'];
                        $sql = "SELECT ship FROM user WHERE team_name = '$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $row_dec = json_decode($row['ship']);
                        if ($row_dec[2][2][2] == 0) {
                            echo '-';
                        } else {
                            $container = $row_dec[2][2][2];
                            $sql = "SELECT * FROM container WHERE id_container='$container'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            if ($row[2] == 'SBY') {
                                echo "<div style='color: red'>$row[0]</div>";
                            }
                            if ($row[2] == 'MKS') {
                                echo "<div style='color: blue'>$row[0]</div>";
                            }
                            if ($row[2] == 'BPP') {
                                echo "<div style='color: brown'>$row[0]</div>";
                            }
                            if ($row[2] == 'JKT') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>

                </tr>
            </tbody>
        </table>
        <!-- </div> -->
    </div>

    <div class="row d-flex justify-content-center mt-3">
        <div class="col-3">
            <!-- Menampilkan Pendapatan -->
            <div class="row d-flex justify-content-center">
                <div class="card" style="height: 7.55rem; width:28rem;">
                    <div class="text-center card-header bg-danger text-white">
                        <h3>
                            Total Revenue
                        </h3>
                    </div>
                    <div class="d-flex justify-content-center my-auto">
                        <div class="row money" data-ccy='IDR'>
                            <?php
                            $id = $_SESSION['username'];
                            $sql = "SELECT * FROM user WHERE team_name = '$id'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                            echo $row[6];
                            ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php 
                            echo"Round: ";
                            $teamName = $_SESSION['username'];
                            $sql = "SELECT * FROM user WHERE team_name = '$teamName'";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            
                            echo $row[7];
                        ?>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header text-center bg-danger">
                    <h3 class="text-white">
                        Controller
                    </h3>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <form method="POST" action="bongpasLogic.php">
                        <div class="row my-auto p-2">
                            <h6 class="col-8">Bay</h6>
                            <input type="text" class="form-control" name="bay" id="bay" style="width: 5rem">
                        </div>
                        <div class="row my-auto p-2">
                            <h6 class="col-8">Baris</h6>
                            <input type="text" class="form-control" name="baris" id="baris" style="width: 5rem;">
                        </div>
                        <div class="row my-auto p-2">
                            <h6 class="col-8">Kolom</h6>
                            <input type="text" class="form-control" name="kolom" id="kolom" style="width: 5rem;">
                        </div>
                        <div class="row my-auto p-2">
                            <h6 class="col-8">Kontainer</h6>
                            <input type="text" class="form-control" name="kontainer" id="kontainer" style="width:5rem">
                        </div>
                        <div class="row mx-auto p-2" style="width: 15rem;">
                            <div class="mx-auto">
                                <button class="btn btn-primary" type="submit" name="pasang" id="pasang">Load</button>
                            </div>
                            <div class="mx-auto">
                                <button class="btn btn-danger" type="submit" name="bongkar" id="bongkar">Unload</button>
                            </div>
                            <div class="mx-auto">
                                <button class="btn btn-success" type="submit" name="done" id="done">Done</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card" style="height: 32rem;">
                <div class="card-header text-center bg-danger">
                    <h3 class="text-white">Container Yang Tersedia</h3>
                </div>
                <div class="card-body flex-nowrap overflow-y-auto" style="overflow: auto; scrollbar-gutter: stable;">
                    <div class="row d-flex justify-content-center overflow-y-auto">
                        <?php
                        $id = $_SESSION['username'];

                        $sql = "SELECT * FROM temp_container WHERE id_user = '$id'";
                        $result = mysqli_query($con, $sql);
                        // $row = mysqli_fetch_array($result);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                echo "
                            <div class='card text-left m-3' style='width: 11rem;height:10rem;margin-top: 10px; display: inline-block;'>
                                <div class='card-body'>
                                    <h5 class='card-title text-center' style = 'text-decoration: underline;'> CON-$row[0]";
                                $id = $row[0];
                                $sql = "SELECT * FROM container where id_container = '$id'";
                                $result2 = mysqli_query($con, $sql);
                                $row2 = mysqli_fetch_array($result2);


                                echo "</h5>
                            <h6 class='card-subtitle mb-2 text-muted text-center'>Detail</h6>
                            <p class='card-text'>
                                <div class='row'>
                                    <div class='col-7'>
                                        Tujuan:
                                    </div>

                                    <div class='col'>
                                        $row2[2]
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-7'>
                                        Asal:
                                    </div>

                                    <div class='col-5'>
                                        $row2[1]
                                    </div>
                                </div>
                            </p>
                        </div>
                    </div>";
                            }
                        } else {
                            echo "Kosong!";
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#pasang").click(function(e) {
                e.preventDefault()
                console.log("testing")
                let bay = $('#bay').val()
                let baris = $('#baris').val()
                let kolom = $('#kolom').val()
                let kontainer = $('#kontainer').val()

                $.ajax({
                    url: "bongpasLogic.php",
                    type: 'POST',
                    data: {
                        "pasang": 1,
                        "bay": bay,
                        "baris": baris,
                        "kolom": kolom,
                        "kontainer": kontainer
                    },
                    success: function(response) {
                        if (response === "1") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Pemasangan kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Pemasangan kontainer melayang!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Sudah terdapat kontainer!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "4") {
                            Swal.fire({
                                // position: "top",
                                icon: "success",
                                title: "Kontainer ID " + kontainer + " berhasil dimasukkan!",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                location.reload()
                            });
                        } else if (response === "5") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Kontainer ID tidak terdaftar!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            });

            $("#bongkar").click(function(e) {
                e.preventDefault()
                let bay = $('#bay').val()
                let baris = $('#baris').val()
                let kolom = $('#kolom').val()
                let kontainer = $('#kontainer').val()

                $.ajax({
                    url: "bongpasLogic.php",
                    type: 'POST',
                    data: {
                        "bongkar": 1,
                        "bay": bay,
                        "baris": baris,
                        "kolom": kolom,
                        "kontainer": kontainer
                    },
                    success: function(response) {
                        if (response === "1") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Pembongkaran kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Pembongkaran kontainer menumpuk!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Tidak ada kontainer yang dapat dibongkar!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "4") {
                            Swal.fire({
                                // position: "top",
                                icon: "success",
                                title: "Kontainer berhasil dibongkar!",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                location.reload()
                            });
                        }
                    },
                    error: function(err) {
                        console.log(err)
                    }
                });
            });

            $("#done").click(function(e) {
                e.preventDefault()
                $.ajax({
                    url: "bongpasLogic.php",
                    type: "POST",
                    data: {
                        "done": 1
                    },
                    success: function(response) {
                        if (response === "1") {
                            Swal.fire({
                                // position: "top",
                                icon: "error",
                                title: "Masih ada kontainer yang perlu dibongkar!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                // position: "top",
                                icon: "success",
                                title: "Section 1 selesai!",
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                window.location = "game2.php"
                            });
                        }
                    }
                });
            });
        });
    </script>

    <script>
        OSREC.CurrencyFormatter.formatEach('.money');
    </script>
</body>

</html>