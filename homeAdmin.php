<?php
require 'connect.php';

if (!isset($_SESSION["loginADM"])) {
    header("Location: loginAdmin.php");
    exit;
}

$admin = $_SESSION["usernameADM"];
$sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>SLG Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <style>
        /* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
        }

        .w3-row-padding img {
            margin-bottom: 12px
        }

        #main {
            margin-left: 120px;
        }

        /* Sidebar styles */
        .w3-sidebar {
            width: 150px;
            background: #222;
            position: fixed;
            height: 100%;
            overflow: hidden;
        }

        .w3-sidebar a {
            padding: 8px;
            text-align: center;
            width: 100%;
            display: block;
        }

        .w3-sidebar .flex-column {
            flex-direction: column;
            align-items: stretch;
        }

        /* Small */
        @media only screen and (max-width: 600px) {
            main {
                margin-left: 0px;
            }
        }

        /* Medium */
        @media only screen and (max-width: 991px) and (min-width: 768) {}
    </style>
</head>

<body class="w3">

    <!-- Sidebar -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
        <div class="flex-column" style="display: flex; flex-direction: column; height: 100%;">
            <h3 class="text-white w3-bar-item" style="font-style: italic;font-weight:bold;">SLG</h3>

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
                    <li class="dropdown-item"><a href="logoutAdmin.php">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w3-padding-large" id="main">
        <!-- Header/Home -->
        <div class=" w3-padding-16 w3-center" id="home">
            <h1><span style="font-weight: bold;">Shipping Logistics Game</span></h1>
            <h3>Hello,
                <?php echo $row[0]; ?>
            </h3>
        </div>

        <div class="w3-row-padding">
            <div class="w3-half w3-margin-bottom">
                <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                    <div class="card" style="width:w3">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight:bold; font-style:italic;">NEW GAME</h3>
                            <img class="object-fit-md-cover border rounded" src="https://img.freepik.com/free-vector/hand-drawn-container-ship-illustration_23-2149157495.jpg?size=626&ext=jpg&ga=GA1.1.1880011253.1699401600&semt=ais" alt="Admin">
                            <div class="row d-flex justify-content-center">
                                <div class="col-3">
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-createroom" style="margin-top: 10px; width: 10rem;">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-createroom">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-3" style="font-weight:bold;" id="exampleModalLabel">Create Room</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="createRoomLogic.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="roomCode" class="col-form-label">Room Code</label>
                                    <input type="text" class="form-control" id="roomCode" name="roomCode">
                                    <label for="selectDeck" class="col-form-label">Deck</label>
                                    <select class="form-select" aria-label="Default select example" name="selectDeck" id="selectDeck">
                                        <?php
                                        $query = "SELECT * FROM deck";
                                        $sql = mysqli_query($con, $query);

                                        while ($row = mysqli_fetch_array($sql)) {
                                            echo "
                                                                <option value='$row[0]'>
                                                                    $row[1]
                                                                </option>
                                                            ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="create">Finish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="w3-half">
                <div class="w3-white w3-center w3-opacity w3-hover-opacity-off">
                    <div class="card" style="width:w3">
                        <div class="card-body">
                            <h3 class="card-title" style="font-weight:bold;font-style:italic;">CARDS & DECKS</h3>
                            <img class="object-fit-md-cover border rounded" src="https://img.freepik.com/free-vector/hand-drawn-container-ship-illustration_23-2149157495.jpg?size=626&ext=jpg&ga=GA1.1.1880011253.1699401600&semt=ais" alt="Admin">
                            <div class="row d-flex justify-content-center">
                                <div class="col-3">
                                    <form action="setSalesCard.php">
                                        <button type="submit" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#moda-createcards" style="margin-top: 10px; width: 10rem;">Create Card</button>
                                    </form>
                                </div>
                                <div class="col-3">
                                    <form action="createDeck.php">
                                        <button type="submit" class="btn btn-dark" style="margin-top: 10px; width: 10rem;">Create Deck</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" w3-row-padding w3-center">
                <div class="w3-padding-32">
                    <h2 class="mb-5" id="activity" style="font-weight: bold;">Rooms</h2>
                    <table class="table table-responsive table-bordered table-striped" id="tableRoom" style="width: 100%;">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Room ID</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            <?php
                            $sql = "SELECT * FROM room";
                            $result = mysqli_query($con, $sql);

                            while ($row = mysqli_fetch_array($result)) {
                                if ($row[2] == 0) {
                                    $val = 'Finished';
                                } else {
                                    $val = 'Ongoing';
                                }

                                echo "<tr>
                        <td class='col-lg-1 text-start'>$i</td>
                        <td class='col-lg-1 text-start'>$row[0]</td>
                        <td class='col-lg-2 text-start'>$row[1]</td>
                        <td class='col-lg-2 text-start'>$val</td>
                        <td class='col-lg-2 text-start'>$row[3]</td>
                        <td class='col-lg-2'>
                            <form method='post' action='viewRoomDetails.php'>
                                <input type='hidden' name='roomID' value='$row[0]'>
                                <input type='hidden' name='supervisor' value='$row[1]'>
                                <input type='hidden' name='statusRoom' value='$row[2]'>
                                <input type='hidden' name='dateRoom' value='$row[3]'>
                                <button type='submit' class='btn btn-primary' name='viewButton'>View Room Details</button>
                            </form>
                            <form method='post' action='deleteRoom.php'>
                                <input type='hidden' name='roomID' value='$row[0]'>
                                <button type='submit' class='mt-1 btn btn-danger' name='deleteButton'>Delete Room</button>
                            </form>
                        </td>
                        </tr>
                    ";
                                $i += 1;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#tableRoom').DataTable()
            })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>