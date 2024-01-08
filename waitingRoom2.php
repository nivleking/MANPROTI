<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <title>Waiting Room</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-warning navbar-expand d-flex justify-content-around" style="width: 100%;">
        <div>
            <a href="#" class="navbar-brand disabled" style="font-style: italic; font-weight:bold; font-size:26px">BLC</a>
        </div>
        <div class="text-white" style="font-weight: bold;">
            <?php
            if (isset($_SESSION['username'])) {
                echo $_SESSION['username'];
            } else {
                echo $_SESSION['usernameADM'];
            }
            ?>
        </div>
    </nav>


    <!-- Modal -->
    <div class="modal fade" id="SetGame" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Set Origin Ports</h5>
                </div>
                <form method="POST" action="setGame.php">
                    <div class="modal-body">
                        <?php
                        $roomAdmin = $_SESSION['roomID_admin'];
                        $sql = "SELECT bay.id_bay, bay.nama_bay, bay.detail_bay FROM bay INNER JOIN room ON bay.id_deck=room.id_deck WHERE id_room = '$roomAdmin'";
                        $listBay = mysqli_query($con, $sql);
                        // var_dump($listBay);
                        $tempBay = array();
                        while ($bay = $listBay->fetch_array()) {
                            $tempBay[$bay[0]] = array($bay[0], $bay[1]);
                        }

                        $sql = "SELECT * FROM user WHERE id_room = '$roomAdmin'";
                        $listUser = mysqli_query($con, $sql);
                        $tempUser = array();
                        while ($user = $listUser->fetch_array()) {
                            array_push($tempUser, $user[0]);
                        }
                        if ($listUser->num_rows <= 0) {
                            echo 'Tidak ada user';
                        }
                        // var_dump($tempBay);
                        $i = 1;
                        foreach ($tempUser as $user) {
                            echo "<label for='$user' class='form-label d-flex' style='width:100%'>Team $i: " . $user . "</label>";
                            echo "<select class='form-select origin-select' name='$user' style='width: 100%;'>";
                            echo "<option value=''></option>";
                            foreach ($tempBay as $bay) {
                                echo "<option value='" . $bay[1] . "'>" . $bay[1] . "</option>";
                            }
                            echo "</select>";
                            $i += 1;
                        }
                        ?>
                        <label for="jumlahRonde" class="form-label d-flex mt-2" style="font-weight: bold;">Total Round</label>
                        <input type="number" class="form-control" id="jumlahRonde" name="jumlahRonde" placeholder="Minimum 1" style="width: 100%;">

                        <label for="jumlahBay" class="form-label d-flex mt-2" style="font-weight: bold;">Total Bay</label>
                        <input type="number" class="form-control" id="jumlahBay" name="jumlahBay" placeholder="Minimum 1" style="width: 100%;">

                        <label for="jumlahBay" class="form-label d-flex mt-2" style="font-weight: bold;">Chance Card For Each Round</label>
                        <input type="number" class="form-control" id="chanceCard" name="chanceCard" placeholder="Minimum 1" style="width: 100%;">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="adminStart">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5">
            <h1>
                Room ID
                <?php
                if (isset($_SESSION['username'])) {
                    echo $_SESSION['roomID'];
                } else {
                    echo $_SESSION['roomID_admin'];
                }
                ?>
            </h1>

            <table class="table table-striped" id="userTable">
                <thead>
                    <tr>
                        <th scope="col">Team Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Origin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_SESSION['usernameADM'])) {
                        $room = $_SESSION['roomID_admin'];
                    } else {
                        $room = $_SESSION['roomID'];
                    }
                    $sql = "SELECT * FROM user WHERE id_room = '$room' ";
                    $result = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        if ($row[3] == 1) {
                            $val = 'Connected';
                        } else {
                            $val = 'Disconnected';
                        }

                        echo "<tr>
                            <td>$row[0]</td>
                            <td>$val</td>
                            <td>$row[5]</td>
                            </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>

            <div class="row mt-2">
                <?php
                $sql = "SELECT id_admin FROM room WHERE id_room= ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("i", $_SESSION["roomID_admin"]);
                $stmt->execute();
                $result = $stmt->get_result();
                if (isset($_SESSION['usernameADM'])) {
                    if ($_SESSION['usernameADM'] == mysqli_fetch_array($result)[0]) {
                        echo '<form method = "POST">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SetGame">Start</button>
                            <button name="swap" id="swap" class="btn btn-danger">Swap</button>
                            <a href="waitingRoom2.php" class="btn btn-warning text-white">Refresh</a>
                            <a href="homeAdmin.php" class="btn btn-dark">Home Admin</a>
                            </form>';
                    } 
                    else {
                        echo '
                            <div class="row mt-2">
                                <form method="POST">
                                    <a href="waitingRoom2.php" class="btn btn-warning text-black">Refresh</a>
                                </form>
                            </div>
                            <div class="userCont mt-3" id="userCont"></div>
                        ';
                    }
                }
                ?>
            </div>
            <script>
                setInterval(() => {
                    $.ajax({
                        url: 'userWaitingRoomLogic.php',
                        method: 'POST',
                        success: function(temp) {
                            console.log(temp)
                            if (temp == 'sukses') {
                                window.location.href = 'game2.php';

                            } else {
                                $('#userCont').html('<h3>Waiting for Host To Start The Game</h3>');
                            }
                        }
                    });
                }, 1000);
            </script>
        </div>
    </div>

    <script>
        let table = $('#userTable').DataTable({
            // info: true,
            ordering: false,
            paging: false
            // scrollCollapse: true,
            // scrollY: '430px'
        })

        $(document).ready(function () {
            $('.origin-select').change(function () {
                var selectedValue = $(this).val();

                $('.origin-select').find('option[value="' + selectedValue + '"]').prop('disabled', true);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>