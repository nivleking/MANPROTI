<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        #div1, #div2 {
            float: left;
            width: 100px;
            height: 35px;
            margin: 10px;
            padding: 10px;
            border: 1px solid black;
        }
        form{
            width: 25%;
            position: auto;
        }
        .id{
            margin-top: -8px;
            margin-left: -3px;
            font-size: 10px;
            vertical-align: top;
            text-align: left;
        }
    </style>
    <!-- <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }

        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
            })
    </script> -->
</head>
<body>
    <div style="font-weight: bold; background-color: lightgrey; padding: 15px;">
        <h1 class="text-center w3-jumbo" style="margin-top: 0PX;">CARGO MASTER</h1>
        <h2 class="text-center" style="font-weight: 550;">SURABAYA - WEEK 1</h2>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="position: absolute; top: 10px;right: 10px; background-color: black; color: lightgrey;">
        Market Intelligence
    </button>

    <table class="table table-bordered border-secondary text-center">
        <?php
            require 'connect.php';
        ?>
        <thead>
            <tr>
                <th colspan="3">BAY 1 DRY</th>
                <th colspan="3">BAY 2 REEF</th>
                <th colspan="3">BAY 3 REEF</th>
            </tr>
            <tr>
                <td>
                    <div class="id">000
                    
                    </div>  
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][0][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][0][0];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">001
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][0][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][0][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">002
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][0][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][0][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">100
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][0][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][0][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">101
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][0][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][0][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">102
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][0][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][0][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">200
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][0][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][0][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">201
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][0][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][0][1];

                         }
                    ?>
                </td>
                <td>
                <div class="id">202
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][0][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][0][2];

                         }
                    ?>
                </td>
            </tr>
            <tr>
            <td>
                <div class="id">010
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][1][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][1][0];

                         }
                ?>
                </td>
                <td>
                    <div class="id">011
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][1][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][1][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">012
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][1][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][1][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">110
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][1][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][1][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">111
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][1][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][1][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">112
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][1][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][1][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">210
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][1][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][1][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">211
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][1][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][1][1];

                         }
                    ?>
                </td>
                <td>
                <div class="id">212
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][1][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][1][2];

                         }
                    ?>
                </td>

            </tr>
            <tr>
            <td>
                    <div class="id">020
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][2][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][2][0];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">021
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][2][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][2][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">022
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[0][2][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[0][2][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">120
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][2][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][2][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">121
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][2][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][2][1];

                         }
                    ?>
                </td>
                <td>
                    <div class="id">122
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[1][2][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[1][2][2];

                         }
                    ?>
                </td>

                <td>
                <div class="id">220
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][2][0] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][2][0];

                         }
                    ?>
                </td>
                <td>
                <div class="id">221
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][2][1] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][2][1];

                         }
                    ?>
                </td>
                <td>
                <div class="id">222
                    
                    </div> 
                    <?php
                         $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                         $result = mysqli_query($con,$sql);
                         $row = mysqli_fetch_array($result);
                         $row_dec = json_decode($row['ship']);
                         if($row_dec[2][2][2] == 0){
                            echo 'empty';
                         }
                         else{
                            echo $row_dec[2][2][2];

                         }
                    ?>
                </td>
            </tr>
        </thead>
    </table>
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-8">
                <form class = "mx-auto" method = "POST" action = "bongpasLogic.php">
                        <label>Bay</label>
                        <input type="text" class = "form-control" name="bay">
                        <label>Baris</label>
                        <input type="text" class = "form-control" name="baris">
                        <label>Kolom</label>
                        <input type="text" class = "form-control" name="kolom">
                        <label>Kontainer</label>
                        <input type="text" class = "form-control" name="kontainer">
                        <br>
                        <br>
                        <button class = "btn btn-danger" type="submit" name = "bongkar">Bongkar</button>
                        <button class = "btn btn-success" type="submit" name = "pasang">Pasang</button>
                </form>
        </div>
            
    </div>
    <!-- <div class="container text-center col-4" style="background-color: lightgrey; padding: 20px;">
        <div class="Header">SALES CALL</div>
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container123">123</p>
            </div>
            <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container122">122</p>
            </div>
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container121">121</p>
            </div>
            <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container120">120</p>
            </div>
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container133">133</p>
            </div>
            <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                <p  draggable="true" ondragstart="drag(event)" id="container132">132</p>
            </div>

        </div>
    </div> -->

</body>
    
</html>

