<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .id {
            margin-top: -8px;
            margin-left: -3px;
            font-size: 10px;
            vertical-align: top;
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- <div class="container-fluid mt-5">
        <table class="table table-responsive table-bordered text-center overflow-auto">
            <thead>
                <?php $temp = 3; ?>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <?php
                    // $i = 5;
                    for ($i = 0; $i < $temp; $i++) {
                        if ($i == 2 || $i == 3) {
                            echo
                            "
                                        <th class='col-12'>BAY $i REEF</th>
                                    ";
                        } else {
                            echo
                            "
                                    <th class='col-12'>BAY $i DRY</th>
                                ";
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody class="overflow-auto">
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <?php
                    $a = 0;
                    $b = 0;
                    $c = 0;
                    $counter = 0;
                    ?>
                    <?php
                    for ($i = 0; $i < 3 * $temp; $i++) {
                        $id = 'Vincentius';
                        $sql = "SELECT ship FROM user WHERE team_name ='$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $rowDeck = json_decode($row['ship']);

                        echo
                        "
                                <td class='col-4'>
                                    <div class='id'>
                                        $a$b$c
                                    </div>
                            ";

                        if ($rowDeck[$a][$b][$c] == 0) {
                            echo "-";
                        } else {
                            $container = $rowDeck[$a][$b][$c];
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
                        echo "</td>";

                        $c += 1;
                        $counter += 1;
                        if ($counter % 3 == 0) {
                            $a += 1;
                        }
                        if ($c == 3) $c = 0;
                    }
                    ?>   
                </tr>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <?php
                    $a = 0;
                    $b = 1;
                    $c = 0;
                    $counter = 0;
                    ?>
                    <?php
                    for ($i = 0; $i < 3 * $temp; $i++) {
                        $id = 'Vincentius';
                        $sql = "SELECT ship FROM user WHERE team_name ='$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $rowDeck = json_decode($row['ship']);

                        echo
                        "
                                <td class='col-4'>
                                    <div class='id'>
                                        $a$b$c
                                    </div>
                            ";

                        if ($rowDeck[$a][$b][$c] == 0) {
                            echo "-";
                        } else {
                            $container = $rowDeck[$a][$b][$c];
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
                        echo "</td>";

                        $c += 1;
                        $counter += 1;
                        if ($counter % 3 == 0) {
                            $a += 1;
                        }
                        if ($c == 3) $c = 0;
                    }
                    ?>   
                </tr>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                <?php
                $a = 0;
                $b = 2;
                $c = 0;
                $counter = 0;
                ?>
                    <?php
                    for ($i = 0; $i < 3 * $temp; $i++) {
                        $id = 'Vincentius';
                        $sql = "SELECT ship FROM user WHERE team_name ='$id'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        $rowDeck = json_decode($row['ship']);

                        echo
                        "
                                <td class='col-4'>
                                    <div class='id'>
                                        $a$b$c
                                    </div>
                            ";

                        if ($rowDeck[$a][$b][$c] == 0) {
                            echo "-";
                        } else {
                            $container = $rowDeck[$a][$b][$c];
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
                        echo "</td>";

                        $c += 1;
                        $counter += 1;
                        if ($counter % 3 == 0) {
                            $a += 1;
                        }
                        if ($c == 3) $c = 0;
                    }
                    ?>   
                </tr>
            </tbody>
        </table>
    </div> -->

    <div class="d-flex justify-content-center">
                        <div class="row d-flex justify-content-center">
                            <div class="card" style="text-align: center;width: 20rem;height:26rem;margin-top: 10px; border-width: 0.5px; border: 0.01px solid">
                                <div style="text-align: center;margin-top: 10px; font-weight: 950; font-size: 20px">
                                    <?php
                                    echo $origin;
                                    echo " - ";
                                    echo $rand[0]
                                    ?>
                                </div>

                                <hr class="mx-auto" style="border-width: 2px; border: 0.01px solid; width: 90%; margin-top: 10px">

                                <div class="row" style="margin-top: 0px">
                                    <div class="col-6" style="text-align: left;font-size: 13px;font-weight: 750;">
                                        <ul>Priority</ul>
                                        <ul>Origin</ul>
                                        <ul>Destination</ul>
                                        <ul>Quantity</ul>
                                        <ul>Revenue</ul>
                                        <ul>Total</ul>
                                    </div>

                                    <div class="col-6" style="text-align: left;font-size: 13px; font-weight: 400;">
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

                                <div class="flex-nowrap overflow-auto" style="height:200px; overflow:scroll;">
                                    <div class="row" style='margin-bottom: 10px'>
                                        <?php
                                        $id_sales = $rand[0];
                                        $sql = "SELECT * FROM container WHERE id_sales = '$id_sales'";
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Button -->
                            <form class="mx-auto" method="POST" action="accRef.php">
                                <div class="row mt-2">
                                    <?php
                                    if ($rand[1] == "N-COMMIT") {
                                        echo "
                                        <div class='col-6' style = 'text-align: right'>
                                            <button class = 'btn btn-success' name = 'accept'>Accept</button>
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



</body>

</html>