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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
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
            background-color: #f1f1f1;
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

        .table {
            background-color: #fff;
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
            <?php
            $id = $_SESSION['username'];
            $sql = "SELECT origin, round FROM user WHERE team_name='$id'";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $temp = $row['round'];
            echo "<h3 style='font-weight:bold;'>
                        <div class='row'>
                            Port  
                            $row[origin]
                        </div>";
            echo "
                        <div class='row d-flex justify-content-center'>
                            <h6 class='text-center' style='font-weight:bold;'>Round $temp</h6>
                        </div>
                    </h3>";
            // echo "";
            // echo $row[];
            ?>
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
                <?php
                $id = $_SESSION['username'];
                $sql = "SELECT ship FROM user WHERE team_name='$id'";
                $result = mysqli_query($con, $sql);
                $resShip = mysqli_fetch_array($result);
                $shipLayout = json_decode($resShip['ship']);

                $temp = count($shipLayout);
                ?>
                <tr class="flex flex-nowrap row" style="margin-left: 0;">
                    <?php
                    // $i = 5;
                    for ($i = 0; $i < $temp; $i++) {
                        if ($i == 1 || $i == 2) {
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

    <div class="row d-flex justify-content-center">
        <!-- Controller -->
        <div class="col-2">
            <!-- Menampilkan Pendapatan -->
            <div class="row">
                <div class="card mb-3" style="height: 7.55rem; width:18rem;">
                    <div class="text-center card-header bg-primary text-white">
                        <h4>
                            Total Revenue
                        </h4>
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
                </div>
            </div>
            <div class="row">
                <div class="card" style="border: 0.px solid;width:18rem;">
                    <div class="card-header text-center text-white bg-primary">
                        <h4 style="margin-top: 10px; text-align: center">
                            Controller
                        </h4>
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
                        <div class="row m-2 d-flex justify-content-around">
                            <div class="">
                                <button class="btn btn-info" type="submit" name="pasang" id="pasang">Load</button>
                            </div>
                            <div class="">
                                <button class="btn btn-danger" type="submit" name="bongkar" id="bongkar">Unload</button>
                            </div>
                            <div class="">
                                <?php
                                $sql = "SELECT * FROM user WHERE team_name='$id'";
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_array($result);
                                if ($row['finish'] <= $row['round']) {
                                    echo "
                                        <button class='btn btn-dark' type='submit' name='finishGames' id='finishGame'>FINISH</button>
                                    ";
                                } else {
                                    // echo "
                                    // <form method = 'POST'>
                                    //     <button class='btn btn-dark' type='submit' name='finishGame' id='finishGame'>FINISH</button>
                                    // </form>
                                    // ";
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- List Of Container -->
        <div class="col-5">
            <div class="card" style="height:35rem; width:45.5rem;">
                <div class="card-header text-center bg-primary text-white">
                    <h4 style="text-align: center">Container Yang Tersedia</h4>
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

        <div class="">
            <div class="card" style="height: 36.5rem; width:25rem">
                <div class="card-header bg-primary text-white text-center">
                    <h4 style="text-align: center">
                        Sales Card
                    </h4>
                </div>
                <div class="card-body">
                    <h6 class="text-center">Remaining Sales Card</h6>
                    <?php
                    // Isi berapa banyak sales yg blm
                    ?>

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
                    if (mysqli_affected_rows($con) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            array_push($rows, $row);
                            $count = $count + 1;
                        }
                        $rand = $rows[random_int(0, $count - 1)];
                        $_SESSION['rand'] = $rand[0];
                        echo '
                        <div class="d-flex justify-content-center">
                            <div class="row d-flex justify-content-center">
                                <div class="card" style="text-align: center;width: 20rem;height:26rem;margin-top: 10px; border-width: 0.5px; border: 0.01px solid">
                                    <div style="text-align: center;margin-top: 10px; font-weight: 950; font-size: 20px">';
                        echo $origin . " - " . $rand[0];
                        $_SESSION['rand'] = $rand[0];
                        echo '
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

                                        <div class="col-6" style="text-align: left;font-size: 13px; font-weight: 400;">';
                        $t_revenue = $rand[4] * $rand[5];
                        echo '<ul>' . $rand[1] . '</ul>
                                            <ul>' . $rand[2] . '</ul>
                                            <ul>' . $rand[3] . '</ul>
                                            <ul>' . $rand[4] . '</ul>
                                            <ul>' . $rand[5] . '</ul>
                                            <ul style = "margin-top: 16px">' . $t_revenue . '</ul>
                                        </div>
                                    </div>

                                    <hr class="mx-auto" style="border-width: 2px; border: 0.25px solid; width: 90%; margin-top: 5px">

                                    <div class="flex-nowrap overflow-auto" style="height:200px; overflow:scroll;">
                                        <div class="row" style="margin-bottom: 10px">';
                        $id_sales = $rand[0];
                        $sql = "SELECT * FROM container WHERE id_sales = '$id_sales'";
                        $result = mysqli_query($con, $sql);
                        $count = 0;

                        while ($row = mysqli_fetch_array($result)) {
                            echo '<div class="col-4" style = "text-decoration: underline">' . $row[0] . '</div>';
                            $count = $count + 1;
                            if ($count % 3 == 0) {
                                echo '</div><div class = "row" style = "margin-bottom: 10px">';
                            }
                        }
                        echo '</div></div>
                                            </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Button -->
                                    <form class="mx-auto" method="POST" action="accRef.php">
                                        <div class="row mt-2">';
                        if ($rand[1] == "N-COMMIT") {
                            echo '<div class="col-6" style = "text-align: right">
                                                <button class = "btn btn-success" name = "accept">Accept</button>
                                            </div>
                                            <div class="col-6">
                                                <button class = "btn btn-danger" name = "refuse">Refuse</button>
                                            </div>';
                        } else {
                            echo '<div class="col-6" style = "text-align: right">
                                                <button class = "btn btn-success" name = "accept">Accept</button>
                                            </div>
                                            <div class="col-6">
                                                <button class = "btn" name = "refuse" style = "cursor: not-allowed;background-color: #ccc" disabled>Refuse</button>
                                            </div>';
                        }
                        echo '</div>
                                    </form>
                                </div>
                            </div>
                        ';
                    } else {
                        echo "
                            <div class='d-flex justify-content-center'>
                                There are no cards left!
                            </div>
                        ";
                    }
                    ?>


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
                            Swal.fire({
                                icon: 'warning',
                                title: 'Saatnya berpindah!',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true
                            }).then(function() {
                                window.location.href = 'game1.php';
                            });
                        }
                    }
                });
            }, 1000);

            // setInterval(() => {
            //     $.ajax({
            //         url: 'bongpasLogic2.php',
            //         method: 'POST',
            //         success: function(temp2) {
            //             if (temp2 == "DONE") {
            //                 Swal.fire({
            //                     icon: 'warning',
            //                     title: 'Game is Finished!',
            //                     showConfirmButton: false,
            //                     timer: 2500,
            //                     timerProgressBar: true
            //                 }).then(function() {
            //                     window.location.href = 'homeUser.php';
            //                 });
            //             }
            //         }
            //     });
            // }, 1001);

            $("#finishGame").click(function(e) {
                e.preventDefault()
                
                $.ajax({
                    url: "bongpasLogic2.php",
                    type: "POST",
                    data: {
                        "finishGame": 1
                    },
                    success: function(response) {
                        if (response === "1") {
                            Swal.fire({
                                icon: 'warning',
                                title: 'GAME FINISHED!',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true
                            }).then(function() {
                                window.location.href = 'homeUser.php';
                            });
                        }
                    }
                })
            })

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
                                // position: "top-end",
                                icon: "error",
                                title: "Pemasangan kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                // position: "top-end",
                                icon: "error",
                                title: "Pemasangan kontainer melayang!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                // position: "top-end",
                                icon: "error",
                                title: "Sudah terdapat kontainer!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "4") {
                            Swal.fire({
                                // position: "top-end",
                                icon: "success",
                                title: "Kontainer ID " + kontainer + " berhasil dimasukkan!",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(function() {
                                location.reload()
                            });
                        } else if (response === "5") {
                            Swal.fire({
                                // position: "top-end",
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
                                // position: "top-end",
                                icon: "error",
                                title: "Pembongkaran kontainer melebihi koordinat!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "2") {
                            Swal.fire({
                                // position: "top-end",
                                icon: "error",
                                title: "Pembongkaran kontainer menumpuk!",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else if (response === "3") {
                            Swal.fire({
                                // position: "top-end",
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