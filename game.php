<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
    <div>
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
                $sql = "SELECT * FROM user";
                $result= mysqli_query($con,$sql);
                
                while($row = mysqli_fetch_array($result)){
                    if($row[4] == 0){
                        $val = 'Disconnected';
                    }
                    else{
                        $val = 'Connected';
                    }
                    
                    echo "<tr>
                        <td>$row[1]</td>
                        <td>$val</td>
                        </tr>
                    ";
                }
                        
                                
                ?>
                
            </tbody>
            </table>			
            
    </div>
    <div>
        <?php
        include 'connect.php';
        // $asu = [[0,3,7],[1,2,3],[0,9]];
        // $hasil = json_encode($asu);
        // $sql = "UPDATE user SET ship = '$hasil' WHERE id_user = 1";
        // $result = mysqli_query($con, $sql);
        $sql = "SELECT ship from user WHERE id_user = 1";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        // var_dump($row);
        $hasil1= json_decode($row['ship']);

        $sql2 = "SELECT ship from user WHERE id_user = 2";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_array($result2);
        // var_dump($row);
        $hasil2= json_decode($row2['ship']);

        // var_dump($hasil1);
        // var_dump($hasil2);
        $swap1 = json_encode($hasil2);
        $swap2 = json_encode($hasil1);
        $sql3 = "UPDATE user SET ship = '$swap1' WHERE id_user = 1";
        $sql4 = "UPDATE user SET ship = '$swap2' WHERE id_user = 2";
        $result3 = mysqli_query($con,$sql3);
        $result4 = mysqli_query($con,$sql4);

        ?>
    </div>

    
    
</body>
</html>
