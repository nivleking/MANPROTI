<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documen</title>
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
        
    </div>

    
    
</body>
</html>
