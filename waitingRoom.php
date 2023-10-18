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
                
                <h2>Waiting for Host To Start The Game</h2>
        
</body>
</html>