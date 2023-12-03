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

    <?php
    $i = 5; // Number of bays
    $layout = [];

    for ($bay = 1; $bay <= $i; $bay++) {
        $bayArray = [];

        for ($row = 0; $row < 3; $row++) {
            // Initialize each row with different values
            $rowArray = [0, 0, 0];

            // Add the row to the bay array
            $bayArray[] = $rowArray;
        }

        // Add the bay array to the layout
        $layout[] = $bayArray;
    }

    print_r($layout);
    ?>



</body>

</html>