<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Waiting Room</title>
</head>
<body>
    <div class="row m-5">
    <h1>
        Room ID 
        <?php
        require 'connect.php';
        // echo $_SESSION['roomID_admin'];
        // var_dump($_SESSION);
        // unset($_SESSION['username']);
        // require 'connect.php';
        // // var_dump($_SESSION);
        if (isset($_SESSION['username'])) {
            echo $_SESSION['roomID'];
        } 
        else {
            echo $_SESSION['roomID_admin'];
        }
        ?>

    </h1>
    <table class="table">
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
            $result= mysqli_query($con,$sql);
            
            while($row = mysqli_fetch_array($result)){
                if($row[3] == 1){
                    $val = 'Connected';
                }
                else{
                    $val = 'Disconnected';
                }
                
                echo "<tr>
                    <td>$row[0]</td>
                    <td>$val</td>
                    <td></td>
                    </tr>
                ";
            }              
            ?>
        </tbody>
        </table>
        <?php 
            $sql = "SELECT id_admin FROM room WHERE id_room= ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i",$_SESSION["roomID_admin"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if (isset($_SESSION['usernameADM'])) {
                if ($_SESSION['usernameADM'] == mysqli_fetch_array($result)[0]) {
                    echo '<form method = "POST"><button name="adminStart" id="adminStart" class="btn btn-primary">Start</button>
                    <button name="swap" id="swap" class="btn btn-danger">Swap</button></form>';
                    if (isset($_POST['adminStart'])) {
                        $room = $_SESSION['roomID_admin'];
                        $value = 1;
                        $sql = "UPDATE room SET status=? WHERE id_room =?";
                        $stmt = $con->prepare($sql);
                        $stmt->bind_param("ii",$value,$room);
                        $stmt->execute();                
                    }
                    if (isset($_POST['swap'])) {
                        $sql = "SELECT ship FRom user WHERE team_name = 'Actonoi'";
                        $result = mysqli_query($con,$sql);
                        $row = mysqli_fetch_array($result);
                        $hasil1 = json_decode($row['ship']);

                        $sql2 = "SELECT ship FRom user WHERE team_name = 'Vincentius'";
                        $result2 = mysqli_query($con,$sql2);
                        $row2 = mysqli_fetch_array($result2);
                        $hasil2 = json_decode($row2['ship']);

                        $swap1 = json_encode($hasil2);
                        $swap2 = json_encode($hasil1);
                        $sql3 = "UPDATE user SET ship = '$swap1' WHERE team_name = 'Actonoi'";
                        $sql4 = "UPDATE user SET ship = '$swap2' WHERE team_name = 'Vincentius'";
                        $result3 = mysqli_query($con,$sql3);
                        $result4 = mysqli_query($con,$sql4);
                    }                    
                }
            } else {
                echo '<div class="userCont" id="userCont"></div>';
            }
        ?>
        <script>
            // var userCont = document.getElementById('userCont');
            // adminStart.addEventListener('click', function() {
            //     var xhr = new XMLHttpRequest();
            //     xhr.onreadystatechange = function() {
            //         if (xhr.readyState  == 4 && xhr.status == 200) {
            //             userCont.innerHTML = xhr.responseText;
            //         }
            //     }

            //     xhr.open('GET','userWaitingRoomLogic.php',true);
            //     xhr.send()
            // });

            setInterval(()=>{
                $.ajax({
                url:'userWaitingRoomLogic.php',
                method:'POST',
                success:function(temp) {
                    console.log(temp)
                    if (temp == 'sukses') {
                        window.location.href='game.php';

                    }
                    else {
                        $('#userCont').html('<h2>Waiting for Host To Start The Game</h2>');
                    }
                }

                });
            },1000);
        </script>
    </div>
</body>
</html>