<?php
    require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Detail</title>
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

                echo "
                <h1>Room $idRoom</h1>
                <h6>Supervisor: $supervisor</h6>

                <div class='row mx-sm-0 mt-2'>
                    Status:&nbsp$val
                </div>

                <div class='row mx-sm-0 mt-2'>
                    Date:&nbsp$date
                </div>

                <div class='row mx-sm-0 mt-2'>
                    Teams:
                </div>

                <div class='row mx-sm-0'>
                    - Vincentius1: $1500
                </div>

                <div class='row mx-sm-0' style='color:red;'>
                    - Vincentius1: $2500
                </div>

                <a href='activity.php' class='btn btn-secondary mt-3'>Back to home</a>
                <a href='#' class='btn btn-danger mt-3'>Delete Room</a>
                ";
            }
        
        ?>
        </div>
    </div>
</body>
</html>
