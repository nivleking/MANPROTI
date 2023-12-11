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
            <h1 style="font-weight:bold;">Decks</h1>
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

            <div class="form-group">
                <h6>Choose cards to be put into the deck</h6>
                <?php
                $sql = "SELECT * FROM sales";
                $result = mysqli_query($con, $sql);
                // $sql2 = "SELECT list_card FROM deck";
                // $result2 = mysqli_query($con, $sql2);
                // $tmp = json_encode($result[3]);
                // $tmp = mysqli_fetch_assoc($result2);

                if ($result->num_rows > 0) {
                    echo '<table class="table table-bordered table-striped" id="deckTable">';
                    echo '<thead>
                            <tr class="text">
                                <th>ID</th>
                                <th>Priority</th>
                                <th>Origin</th>
                                <th>Destination</th>
                                <th>qty</th>
                                <th>revenue</th>
                                <th>Choose</th>
                            </tr>
                        </thead>';
                    echo '<tbody>';

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id_sales'] . '</td>';
                        echo '<td>' . $row['priority'] . '</td>';
                        echo '<td>' . $row['origin'] . '</td>';
                        echo '<td>' . $row['destination'] . '</td>';
                        echo '<td>' . $row['quantity'] . '</td>';
                        echo '<td>' . $row['revenue'] . '</td>';
                        // if (in_array($row['id_sales'], $tmp['list_card'])) {
                        //     echo "Sudah ada";
                        // }

                        echo '<td class=><input class="ml-2" type="checkbox" class="form-check-input" type="submit" name="' . $row['id_sales'] . '"></td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo 'No data found in the database.';
                }
                ?>
            </div>
            <button class="btn btn-success" name="updateDeck">Submit</button>
            <a class="btn btn-warning" href="viewDeck.php">Refresh</a>
        </form>
    </div>
    <?php
    if (isset($_POST['updateDeck'])) {
        $tempArr = array();
        $sql = "SELECT id_sales FROM sales";
        $listSales = mysqli_query($con, $sql);
        while ($row = $listSales->fetch_array()) {
            if (isset($_POST[$row[0]])) {
                array_push($tempArr, $row[0]);
            }
        }
        $jsonSales = json_encode($tempArr);
        // echo $jsonSales;
        $idDeck = $_POST['idDeck'];
        $sql = "UPDATE deck SET list_card = '$jsonSales' WHERE id_deck = '$idDeck'";
        mysqli_query($con, $sql);
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>