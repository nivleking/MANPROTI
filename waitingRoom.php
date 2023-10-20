<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Room ID 
        <?php
        session_start();
        require 'connect.php';
        echo $_SESSION['roomID'];
        ?>
    </h1>
    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Team Name</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php                                          
                    require 'connect.php';
                    $room = $_SESSION['roomID'];
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
                            </tr>
                        ";
                    }

                            
                                    
                    ?>
                    
                </tbody>
                </table>
                
                <?php
                    require 'connect.php';
                    $sql = "SELECT status FROM room where id_room =?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i",$_SESSION["roomID"]);
                    $stmt->execute();
                    $result = $stmt->get_result();      
                    $result2 = mysqli_fetch_array($result);
                    echo $result2;
                    // if($res[0] == 1){
                    //     echo "Asu";
                    // }
                    // else{
                    //     echo "<h2> Waiting for the host to satrt the game </h2>";
                    // }
                    // exit();
                ?>
        
</body>
</html>