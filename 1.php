<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .id {
            margin-top: -8px;
            margin-left: -3px;
            font-size: 10px;
            vertical-align: top;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
        $sql = "SELECT list_card FROM deck WHERE id_deck = '1'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        
        // var_dump($row['list_card']);      
        
        $listArray = json_decode($row['list_card'], true);
        if ($listArray !== null) {
            $uniqueValues = array();            
            foreach ($listArray as $number) {
                // echo $number . "\n";
                $sql = "SELECT * FROM sales WHERE id_sales = $number";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($result);

                // Assuming 'origin' is the column you want to store in the list
                $originValue = $row['origin'];

                // Add to the list if not already present
                if (!in_array($originValue, $uniqueValues)) {
                    $uniqueValues[] = $originValue;
                }
            }
            print_r($uniqueValues);
        } else {
            echo "Error decoding the list.\n";
        }
    ?>
</body>

</html>