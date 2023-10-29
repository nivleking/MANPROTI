<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class = "vh-100">
		<div class="container-fluid mx-auto">
			<div class = "row">
				<div class = "col-sm-12 mx-auto">
					<div class="d-flex justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
						<form action="userDoLogin.php" method="post" style="width:23rem">
							<h3 class = "fw-normal m-3 d-flex justify-content-center" style="letter-spacing: 0.5px; font-style:italic; font-size:38px;">
								Play Cargo Master!
							</h3>

							<div class="form-outline mb-4">
								<label>Username</label>
								<input type="text" class = "form-control" name="username">
							</div>

							<div class="form-outline mb-4">
								<label>Password</label>
								<input type="password" class = "form-control" name="password">
							</div>	
							
							<div class="pt-1 mb-4">
								<button type="submit" name = "save" class = "btn btn-danger btn-lg btn-block">Login</button>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</body>
</html>
