<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            overflow: hidden;
            margin: 0;
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
    <nav class="navbar navbar-dark bg-primary navbar-expand">
        <a href="#" class="navbar-brand disabled" style="font-style: italic; font-weight:bold; font-size:26px">Cargo Master</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">A</span>
            </button> -->
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent" style="text-align:center;display:inline-block; float:none; vertical-align:top; color:aliceblue; font-size:26px; font-weight:bold;">
            SURABAYA - WEEK 1
        </div>

        <button class="btn btn-danger">
            MARKET INTELLIGENCE
        </button>
    </nav>
    <!-- <div style="font-weight: bold; background-color: lightgrey; padding: 15px;">
        <h1 class="text-center w3-jumbo" style="margin-top: 0PX;">CARGO MASTER</h1>
        <h2 class="text-center" style="font-weight: 550;">SURABAYA - WEEK 1</h2>
    </div> -->

    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: absolute; top: 10px;right: 10px; background-color: black; color: lightgrey;">
        Market Intelligence
    </button> -->

    <table class="table table-bordered text-center " style="margin-top: 10px;border: 0.35px solid">
        <?php
        require 'connect.php';
        ?>
        <thead>
            <tr>
                <th colspan="3">BAY 1 DRY</th>
                <th colspan="3">BAY 2 REEF</th>
                <th colspan="3">BAY 3 REEF</th>
            </tr>
            <tr>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

            </tr>
            <tr>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>

                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                    }
                    ?>
                </td>
                <td>
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
                            echo "<div style='color: green'>$row[0]</div>";
                        }
                    }
                    ?>
                </td>
            </tr>
        </thead>
    </table>
    <!-- Menampilkan Pendapatan -->
    <div class = text-center>
        RP. <?php
            $id = $_SESSION['username'];
            $sql = "SELECT * FROM user WHERE team_name = '$id'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            
            echo $row[6];

            
        ?>
    </div>
    <div class="row" style="border: 0.25px solid">
        <div class="card col-5" style="border: 0.25px solid">
            <h2 style="margin-top: 10px; text-align: center">Sales Card</h2>
            <div style="margin-top: 10px;text-align: center">
                <h6 style>Remaining Sales Card</h6>
                <?php

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
                $rand = $rows[random_int(0, $count-1)];

                ?>

                <div class="card mx-auto" style="text-align: center; width: 17rem;margin-top: 10px; border-width: 2px; border: 0.35px solid">
                    <div style="text-align: center;margin-top: 10px; font-weight: 950; font-size: 20px">
                        SUB - <?php echo $rand[0];
                        $_SESSION['rand'] = $rand[0];?>
                    </div>

                    <hr class="mx-auto" style="border-width: 2px; border: 0.25px solid; width: 90%; margin-top: 10px">

                    <div class="row" style="margin-top: 0px">
                        <div class="col-6" style="text-align: left;margin-top: 10px; margin-left: -20px; font-size: 13px;font-weight: 750;">
                            <ul>Priority</ul>
                            <ul>Origin</ul>
                            <ul>Destination</ul>
                            <ul>Quantity</ul>
                            <ul>Revenue</ul>
                            <ul>Total</ul>
                        </div>

                        <div class="col-6" style="text-align: left;margin-top: 10px; margin-left: -10px; font-size: 13px; font-weight: 400;">
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
            <!-- Controller -->
            <div class="card col-3" style="border: 0.35px solid">
                <h2 style="margin-top: 10px; text-align: center">Controller</h2>
                <form method="POST" action="bongpasLogic2.php" style="margin-top : 45px;">
                    <div class="row">

                        <div class="col-5" style="text-align: left; margin-top: 18px; margin-left: 100px">
                            <h6>Bay</h6>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="bay" style="margin-left: -90px">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-5" style="text-align: left; margin-top: 18px; margin-left: 100px">
                            <h6>Baris</h6>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="baris" style="margin-left: -90px">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-5" style="text-align: left; margin-top: 18px; margin-left: 100px">
                            <h6>Kolom</h6>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="kolom" style="margin-left: -90px">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-5" style="text-align: left; margin-top: 18px; margin-left: 100px">
                            <h6>Kontainer</h6>
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" name="kontainer" style="margin-left: -90px">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-6 text-right">
                            <button class="btn btn-success" type="submit" name="pasang">Pasang</button>
                        </div>
                        <div class="col-6 text-left">
                            <button class="btn btn-danger" type="submit" name="bongkar" style="margin-left: -10px">Bongkar</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- List Of Container -->
            <div class="card col-4" style="border: 0.35px solid">
                <h2 style="margin-top: 10px; text-align: center">Container Yang Tersedia</h2>
                <div class="text-center" style="display: inline-block; margin-top : 20px">
                    <?php
                    $id = $_SESSION['username'];

                    $sql = "SELECT * FROM temp_container2 WHERE id_user = '$id'";
                    $result = mysqli_query($con, $sql);
                    // $row = mysqli_fetch_array($result);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            echo "
                    <div class='card text-left' style='width: 9 rem;margin-top: 10px;display: inline-block;'>
                        <div class='card-body'>
                            <h5 class='card-title' style = 'border-bottom: 1px solid'> CON-$row[0]";
                            $id = $row[0];
                            $sql = "SELECT * FROM container where id_container = '$id'";
                            $result2 = mysqli_query($con, $sql);
                            $row2 = mysqli_fetch_array($result2);


                            echo "</h5>
                            <h6 class='card-subtitle mb-2 text-muted'>Detail</h6>
                            <p class='card-text'>Tujuan : $row2[1] </p>
                            <p class='card-text' style='margin-top: -15px'>Asal : $row2[2]</p>
                        </div>
                    </div>";
                        }
                    } else {
                        echo "Kosong";
                    }


                    ?>
                </div>
            </div>

        </div>

</body>

</html>