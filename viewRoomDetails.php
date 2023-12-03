<?php
    require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col mx-5 my-5">
        <?php
            
            if (isset($_POST['viewButton'])) {
                // var_dump($_POST);

                $idRoom = $_POST['roomID'];
                $supervisor = $_POST['supervisor'];
                $status = $_POST['statusRoom'];
                $date = $_POST['dateRoom'];

                if ($status == 1) {
                    $val = 'Finished';
                }
                else {
                    $val = 'Ongoing';
                }
                $sql = "SELECT id_admin FROM room WHERE id_room = '$idRoom'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                echo "<h1>Room $idRoom</h1>
                <h6>Supervisor: $row[0]</h6>";


                echo "
                    <table class='table table-responsive table-bordered table-striped' id='tableHistory' style = 'width:100%'>
                        <thead>
                            <tr>
                                <th scope='col''>Date / Time</th>
                                <th scope='col''>Team Name</th>
                                <th scope='col''>Ship</th>
                                <th scope='col''>Origin</th>
                                <th scope='col''>Room ID</th>
                                <th scope='col''>Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                ";

                $sql = "SELECT * FROM history WHERE id_room = '$idRoom'";
                $result = mysqli_query($con,$sql);
                
                while($row = mysqli_fetch_array($result)){
                    echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[6]</td>
                        <td>$row[5]</td>
                    </tr>
                    ";
                }

                echo "</tbody>
                </table>";

                // echo "
                // <h1>Room $idRoom</h1>
                // <h6>Supervisor: $supervisor</h6>

                // <div class='row mx-sm-0 mt-2'>
                //     Status:&nbsp$val
                // </div>

                // <div class='row mx-sm-0 mt-2'>
                //     Date:&nbsp$date
                // </div>
                // <div class='row mx-sm-0 mt-2'>
                //     Teams:
                // </div>

                // <div class='row mx-sm-0'>
                //     - Vincentius1: $1500
                // </div>

                // <div class='row mx-sm-0' style='color:red;'>
                //     - Vincentius1: $2500
                // </div>

                // <a href='activity.php' class='btn btn-secondary mt-3'>Back to home</a>
                // <a href='#' class='btn btn-danger mt-3'>Delete Room</a>
                // ";
            }
        
        ?>
        </div>
    </div>
</body>
</html>
