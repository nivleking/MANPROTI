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
        echo $_SESSION['roomID_admin'];
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
                    $room = $_SESSION['roomID_admin'];
                    $stmt = $con->prepare("SELECT * FROM user WHERE id_room = ?");
                    $stmt->bind_param("i", $room);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
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
</body>
</html>