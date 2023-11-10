<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Master Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
    <div class="row">
        <div class="col-6">
            <div class = "mt-3 d-flex justify-content-center ">
                <h1>Welcome, 
                <?php 
                    require 'connect.php';
                    $admin = $_SESSION["usernameADM"];
                    $sql = "SELECT * FROM admin WHERE id_admin = '$admin'";
                    $result= mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    echo $row[1]; 
                    echo "<br>";    
                ?>
                </h1>
            </div>
            <div class="justify-content-center" style = "margin-left: 340px;margin-top: 20px">
                <form method="POST" action="createRoomLogic.php" style = "width: 15rem">
                    <div class="mb-3">
                        <label for="roomCode" class="form-label d-flex just">Room Code</label>
                        <input type="text" class="form-control" id="roomCode" name = "roomCode" placeholder="Input a room code">
                        <select class="custom-select" aria-label="Default select example" name="idDeck" style="width: 15rem;margin-top: 20px;">
                            <?php 
                                $sql = "SELECT id_deck FROM deck";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<option value=$row[0]>$row[0]</option>";
                                }
                            
                            ?>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary" name= "create" style="width: 15rem;">Create</button>
                </form>

                <form action="setSalesCard.php" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style = "width: 15rem">Sales Card</button>                
                </form>
                <form action="viewSalesCard.php" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style = "width: 15rem">View Sales</button>
                </form>
                <form action="createDeck.php" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style = "width: 15rem">Create Deck</button>
                </form>
                <form action="viewDeck.php" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary" style = "width: 15rem">View Deck</button>
                </form>

                
                
                
            </div>
        </div>


        <div class="col-6 mt-3">
            <h1>Room List</h1>
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Room Number</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
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
                        <td>$row[3]</td>
                        </tr>
                    ";
                }
                ?>
            </tbody>
            </table>		
        </div>
    </div>
    <!-- Button trigger modal -->


<!-- Modal -->
    
</body>
</html>