<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
<div class = "container">
		<div class = "row">
			<div class = "col-9 mx-auto">
				<div class="card center" style="width: 25rem;margin-top: 80px">
				  <div class="card-body">
				    <div class = "text-center" id = "title">
				    	<h3>WELCOME!</h3>
				    </div>
				    <form action="joinRoomLogic.php" method="post">
				    	<label>Room ID</label>
				    	<input type="text" class = "form-control" name="roomID">
				    	<button type="submit" name = "join">JOIN</button>
				    </form>
				  </div>
				</div>
			</div>	
		</div>
	</div>

    
    
</body>
</html>
