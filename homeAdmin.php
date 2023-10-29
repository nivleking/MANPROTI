<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="row">
        <div class="col-3">
            <h1>Welcome 
            <?php 
            
            require 'connect.php';
            $admin = $_SESSION["usernameADM"];
            $sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
            $result= mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);

            echo $row[1]; 

            ?>
            </h1>
            <div>
                <form method = "POST" action = "createRoomLogic.php">
                <div class="mb-3">
                    <label for="roomCode" class="form-label">Room Code</label>
                    <input type="text" class="form-control" id="roomCode" name = "roomCode">
                </div>
                <button type="submit" class="btn btn-primary" name= "create">Create</button>
                </form>

            </div>
            <form action="setSalesCard.php" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Sales Card</button>
                
            </form>
            <form action="viewSalesCard.php" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">View Sales</button>
            </form>
            
        </div>
        <div class="col-9">
            <h1> List room </h1>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Room Number</th>
                <th scope="col">Admin</th>
                <th scope="col">Status</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                
                $sql = "SELECT * FROM room";
                $result= mysqli_query($con,$sql);
                
                while($row = mysqli_fetch_array($result)){
                    if($row[2] == 1){
                        $val = 'Finished';
                    }
                    else{
                        $val = 'Ongoing';
                    }
                    
                    echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$val</td>
                        </tr>
                    ";
                }
                        
                                
                ?>
                
            </tbody>
            </table>		
        </div>
    </div>
    
</body>
</html>