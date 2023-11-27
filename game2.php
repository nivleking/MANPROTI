<?php
require 'connect.php';
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
    <title>Section 2</title>

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
            /* overflow: hidden; */
            margin: 0;
        }

        #div1,
        #div2 {
            float: left;
            width: 100px;
            height: 35px;
            margin: 10px;
            padding: 10px;
            /* border: 1px solid black; */
        }

        .id {
            margin-top: -8px;
            margin-left: -3px;
            font-size: 10px;
            vertical-align: top;
            text-align: left;
        }

        input {
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
    <nav class="navbar navbar-dark bg-primary navbar-expand d-flex justify-content-between" style="width:100vw;">
        <div>
            <a href="#" class="navbar-brand disabled" style="font-style: italic; font-weight:bold; font-size:26px">BLC</a>
        </div>
        <div class="text-white">
            <h3>
                SBY - WEEK 1
            </h3>
        </div>
        <div class="text-white" style="font-weight: bold;">
            <?php
            echo $_SESSION['username'];
            ?>
        </div>
        <!-- <button class="btn btn-danger" disabled>
            MARKET INTELLIGENCE
        </button> -->
    </nav>

    <div class="container-fluid mt-3" style="width: 109rem;">
        <table class="flex-nowrap table table-responsive table-bordered text-center overflow-x-auto" style="margin-top: 10px;">
            <thead>
                <tr class="flex flex-nowrap row" style="margin-left:0;">
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
                                echo "<div style='color: gray'>$row[0]</div>";
                            }
                        }
                        ?>
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
                            if ($row[2] == 'MDN') {
                                echo "<div style='color: green'>$row[0]</div>";
                            }
                        }
                        ?>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
    <!-- Menampilkan Pendapatan -->
    <!-- <div class="card" style="height: 7.55rem; width:28rem;">
        <div class="text-center card-header bg-primary text-white">
            <h3>
                Total Revenue
            </h3>
        </div>
        <div class="d-flex justify-content-center my-auto">
            <div class="money" data-ccy='IDR'>
                <?php
                // $id = $_SESSION['username'];
                // $sql = "SELECT * FROM user WHERE team_name = '$id'";
                // $result = mysqli_query($con, $sql);
                // $row = mysqli_fetch_array($result);

                // echo $row[6];
                ?>
            </div>
        </div>
    </div> -->

    <div class="row mt-3 d-flex justify-content-center mx-5">
        <!-- Controller -->
        <div class="col-2">
            <!-- Menampilkan Pendapatan -->
            <div class="row">
                <div class="card mb-3" style="height: 7.55rem; width:18rem;">
                    <div class="text-center card-header bg-primary text-white">
                        <h3>
                            Total Revenue
                        </h3>
                    </div>
                    <div class="d-flex justify-content-center my-auto">                        
                        <div class="money" data-ccy='IDR'>
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
            <div class="row">
                <div class="card" style="border: 0.px solid;width:18rem;">
                    <div class="card-header text-center text-white bg-primary">
                        <h3 style="margin-top: 10px; text-align: center">
                            Controller
                        </h3>
                    </div>
                    <form method="POST" action="bongpasLogic2.php">
                        <div class="row d-flex justify-content-center">
                            <div class="col-5 mt-3" style="text-align: left;">
                                <h6>Bay</h6>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="bay" id="bay">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-5 mt-3" style="text-align: left;">
                                <h6>Baris</h6>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="baris" id="baris">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-5 mt-3" style="text-align: left;">
                                <h6>Kolom</h6>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="kolom" id="kolom">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <div class="col-5 mt-3" style="text-align: left;">
                                <h6>Kontainer</h6>
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" name="kontainer" id="kontainer">
                            </div>
                        </div>
                        <div class="row p-2 d-flex justify-content-center">
                            <div class="col-1 mx-auto">
                                <button class="btn btn-info" type="submit" name="pasang" id="pasang">Load</button>
                            </div>
                            <div class="col-7">
                                <button class="btn btn-danger" type="submit" name="bongkar" id="bongkar">Unload</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Of Container -->
        <div class="col-5">
            <div class="card" style="height:32rem; width:45.5rem;">
                <div class="card-header text-center bg-primary text-white">
                    <h3 style="margin-top: 10px; text-align: center">Container Yang Tersedia</h3>
                </div>
                <div class="card-body flex-nowrap overflow-y-auto" style="overflow:auto;">
                    <div class="row d-flex justify-content-center overflow-y-auto">
                        <?php
                        $id = $_SESSION['username'];
    
                        $sql = "SELECT * FROM temp_container2 WHERE id_user = '$id'";
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

        <div class="col-4">
            <div class="card" style="width: 39rem;">
                <div class="card-header bg-primary text-white text-center">
                    <h3 style="margin-top: 10px; text-align: center">
                        Sales Card
                    </h3>
                </div>
                <div style="margin-top: 10px;text-align: center">
                    <h6 style>Remaining Sales Card</h6>
                    <?php
                    // Isi berapa banyak sales yg blm
                    ?>
                </div>
                <div>
                    <!-- Card -->
                    <?php
                    $id = $_SESSION['username'];
                    $sql = "SELECT origin FROM user WHERE team_name = '$id'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($result);

                    $origin = $row[0];

                    $sql = "SELECT * FROM sales WHERE origin = '$origin'";
                    $result = mysqli_query($con, $sql);
                    // $row = mysqli_fetch_array($result);
                    $count = 0;
                    $rows = [];
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($rows, $row);
                        $count = $count + 1;
                    }
                    $rand = $rows[random_int(0, $count - 1)];

                    ?>

                    <div class="card mx-auto" style="text-align: center; width: 18rem;height:28rem;margin-top: 10px; border-width: 0.5px; border: 0.01px solid">
                        <div style="text-align: center;margin-top: 10px; font-weight: 950; font-size: 20px">
                            SBY - 
                            <?php echo $rand[0];
                                    $_SESSION['rand'] = $rand[0]; ?>
                        </div>

                        <hr class="mx-auto" style="border-width: 2px; border: 0.01px solid; width: 90%; margin-top: 10px">

                        <div class="row" style="margin-top: 0px">
                            <div class="col-6" style="text-align: left;margin-top: 10px; margin-left: -20px; font-size: 13px;font-weight: 750;">
                                <ul>Priority</ul>
                                <ul>Origin</ul>
                                <ul>Destination</ul>
                                <ul>Quantity</ul>
                                <ul>Revenue</ul>
                                <ul>Total</ul>
                            </div>

                            <div class="col-6" style="text-align: left;margin-top: 10px; font-size: 13px; font-weight: 400;">
                                <?php
                                $t_revenue = $rand[4] * $rand[5];
                                echo "<ul>$rand[1]</ul>
                                        <ul>$rand[2]</ul>
                                        <ul>$rand[3]</ul>
                                        <ul>$rand[4]</ul>
                                        <ul>$rand[5]</ul>
                                        <ul style = 'margin-top: 16px'>$t_revenue</ul>
                                    ";
                                ?>
                            </div>
                        </div>
                        <hr class="mx-auto" style="border-width: 2px; border: 0.25px solid; width: 90%; margin-top: 5px">

                        <div class="row" style='margin-bottom: 10px'>

                            <?php
                            $id_sales = $rand[0];
                            $sql = "SELECT * FROM container WHERE id_sales = '5'";
                            $result = mysqli_query($con, $sql);
                            $count = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<div class='col-4' style = 'text-decoration: underline'>$row[0]</div>";
                                $count = $count + 1;
                                if ($count % 3 == 0) {
                                    echo "</div>
                                    <div class = 'row' style = 'margin-bottom: 10px'>";
                                }
                            }
                            echo "</div>";

                            ?>
                        </div>

                        <!-- Button -->
                        <form class="mx-auto" method="POST" action="accRef.php">
                            <div class="row" style="margin-bottom: 20px; margin-top:10px">

                                <?php
                                if ($rand[1] == "N-COMMIT") {
                                    echo "
                                <div class='col-6' style = 'text-align: right'>
                                    <button class = 'btn btn-success' name = 'accept'   >Accept</button>
                                </div>
                                <div class='col-6'>
                                    <button class = 'btn btn-danger' name = 'refuse'>Refuse</button>
                                </div>";
                                } else {
                                    echo "
                                <div class='col-6' style = 'text-align: right'>
                                    <button class = 'btn btn-success' name = 'accept'>Accept</button>
                                </div>
                                <div class='col-6'>
                                    <button class = 'btn' name = 'refuse' style = 'cursor: not-allowed;background-color: #ccc'disabled>Refuse</button>
                                </div>";
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            // Ngecek stiap waktu kalau admin sudah pencet swap atau belum
            setInterval(() => {
                $.ajax({
                    url: 'bongpasLogic2.php',
                    method: 'POST',
                    success: function(temp) {
                        // console.log(temp)
                        if (temp == 'YES') {
                            window.location.href = 'game1.php';
                        } 
                    }
                });
            }, 1000);

            $("#pasang").click(function(e) {
                e.preventDefault()
                let bay = $('#bay').val()
                let baris = $('#baris').val()
                let kolom = $('#kolom').val()
                let kontainer = $('#kontainer').val()

                $.ajax({
                    url: "bongpasLogic2.php",
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
                                position: "top-end",
                                icon: "error",
                                title: "Pemasangan kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Pemasangan kontainer melayang!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Sudah terdapat kontainer!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "4") {
                            Swal.fire({
                                // position: "top-end",
                                icon: "success",
                                title: "Kontainer berhasil dimasukkan!",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                location.reload()
                            });
                        } else if (response === "5") {
                            Swal.fire({
                                position: "top-end",
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
                // console.log("tes")
                $.ajax({
                    url: "bongpasLogic2.php",
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
                                position: "top-end",
                                icon: "error",
                                title: "Pembongkaran kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Pembongkaran kontainer menumpuk!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                position: "top-end",
                                icon: "error",
                                title: "Tidak ada kontainer yang dapat dibongkar!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "4") {
                            Swal.fire({
                                // position: "top-end",
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


        });
    </script>

    <script>
        OSREC.CurrencyFormatter.formatEach('.money');
    </script>
</body>

</html>