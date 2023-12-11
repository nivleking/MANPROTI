<?php require 'connect.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Decks</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            let table = $('#deckTable').DataTable({
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
        <a class="btn btn-dark" href="createDeck.php">Back</a>
        <div class="row d-flex justify-content-center">
            <h1 style="font-weight:bold;">Deck Info</h1>
        </div>
        <form method="POST">
            <div>
                <?php
                    $sql = "SELECT * FROM deck";
                    $result = mysqli_query($con,$sql);
                    echo "
                    <table class='table table-bordered table-striped' id='tableListOfCards'>
                        <thead>
                            <tr>
                                <th>ID Deck</th>
                                <th>Name</th>
                                <th>List of Cards</th>
                            </tr>
                        </thead>
                        <tbody>
                    ";
                    while ($row=mysqli_fetch_array($result))
                    echo "
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                        </tr>
                    ";
                    echo "
                        </tbody>
                    </table>
                    ";

                ?>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Choose a deck</label>
                <select class="form-control" name="idDeck">
                    <?php
                    $sql = "SELECT * FROM deck";
                    $deck = mysqli_query($con, $sql);
                    if ($deck->num_rows > 0) {
                        while ($row = $deck->fetch_array()) {
                            echo '<option value=' . $row[0] . '>' . $row[1] . '</option>';
                        }
                    } else {
                        echo 'No data found in the database.';
                    }
                    ?>
                </select>
            </div>
            <button class="btn btn-success" name="updateDeck">Submit</button>
            <a class="btn btn-warning" href="deckinfo.php">Refresh</a>
            
        </form>
        <div class="form-group mt-3">
                <?php
                if (isset($_POST['updateDeck'])) {
                    $idDeck = $_POST['idDeck'];
                    $countPort = array();
                    $arrNamaBay = array();
                    $sql = "SELECT * FROM bay where id_deck = '$idDeck'";
                    $result = mysqli_query($con, $sql);
                    while ($row = $result->fetch_array()) {
                        $count = 0;
                        array_push($arrNamaBay,$row[1]);
                        $sql2 = "SELECT * FROM deck WHERE id_deck = '$idDeck'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = $result2->fetch_array();
                        $list = json_decode($row2[2]);
                        for ($i = 0; $i  < count($list); $i++) {
                            $tempindex = $list[$i];
                            $sql3 = "SELECT * FROM sales where id_sales = '$tempindex'";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = $result3->fetch_array();
                            if ($row3[2] == $row[1]) {
                                $count++;
                            }
                        }
                        array_push($countPort,$count);
                    }


                    // $arrBay = array();
                    // $arrNamaBay = array();
                    // $idDeck = $_POST['idDeck'];
                    // $sql = "SELECT nama_bay FROM bay WHERE id_deck='$idDeck'";
                    // $result = mysqli_query($con, $sql);
                    // if ($result->num_rows > 0) {
                    //     while ($row = $result->fetch_array()) {
                    //         array_push($arrBay,0);
                    //         array_push($arrNamaBay,$row);
                    //     }
                    // }
                    // $sql2 = "SELECT list_card FROM deck WHERE id_deck = '$idDeck'";
                    // $result2 = mysqli_query($con, $sql2);
                    // $tempres = $result2->fetch_array();
                    // $listCard = json_decode($tempres[0]);
                    // foreach ($listCard as $j) {
                    //     $sql = "SELECT origin FROM sales WHERE id_sales = '$j'";
                    //     $result = mysqli_query($con, $sql);
                    //     $temp = $result->fetch_array();
                    //     for ($i) {
                    //         if ($temp[0] == $k) {
                    //             $arrBay
                    //         }
                    //     }

                    // }
                    echo '<table class="table table-bordered table-striped mt-3" id="deckTable">';
                    echo '<thead>
                            <tr class="text">
                                <th>No</th>
                                <th>Origin</th>
                                <th>Count</th>
                            </tr>
                        </thead>';
                    echo '<tbody>';
                    for ($i = 0; $i < count($arrNamaBay); $i++) {
                        echo '<tr>';
                        echo '<td>' . ($i+1) . '</td>';
                        echo '<td>' . $arrNamaBay[$i] . '</td>';
                        echo '<td>' . $countPort[$i] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                }
                ?>
            </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>