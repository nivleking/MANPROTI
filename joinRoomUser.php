<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" id="theme-styles" />
</head>
<body>
	<div class="vh-100">
		<div class = "container-fluid mx-auto">
			<div class = "row">
				<div class = "col-sm-12 mx-auto">
					<div class="d-flex justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form action="#" method="post">
							<h3 class = "fw-normal m-3 d-flex justify-content-center" style="letter-spacing: 0.5px; font-style:italic; font-size:38px;">Welcome!</h3>
						
							<div class="form-outline mb-4">
								<label>Room ID</label>
								<input type="text" class = "form-control" name="roomID">
							</div>
							
							<div class="pt-1 mb-4">
								<button type="submit" name = "join" class="btn btn-danger btn-lg btn-block">Join</button>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>    
	</div>

	<?php
    require 'connect.php';
    if(isset($_POST['join'])){
        $id = $_POST['roomID'];
        $_SESSION['roomID'] = $_POST['roomID'];
        $sql = mysqli_query($con,"SELECT * FROM room where id_room = '$id'");
        $row  = mysqli_fetch_array($sql); 
        if(!is_array($row))
        {
            // echo ("<script LANGUAGE='JavaScript'>
            // window.alert('Room ID tidak terdaftar');
            // window.location.href='joinRoomUser.php';
            // </script>");

			echo "<script>
			    Swal.fire({
			        icon: 'error',
			        title: 'ID Room Not Found',
			        text: 'Please contact admin'
			    });
			</script>";
            
        }
        else{
            $room = $_SESSION['roomID'];
            $name = $_SESSION['username'];
            $sql = mysqli_query($con,"UPDATE user SET id_room = '$room' WHERE team_name = '$name'");
            // header("Location: waitingRoom.php");
			echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'ID Room Found',
                    text: 'Joining the room',
                    showConfirmButton: false,
                    timer: 2500
                }).then(function() {
                    window.location.href = 'waitingRoom.php';
                });
            </script>";
        }
    }
?>
</body>
</html>
