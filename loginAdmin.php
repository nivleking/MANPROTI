<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
	<section class="vh-100">
	<div class="container-fluid mx-auto">
		<div class="row">
		<div class="col-sm-12 text-black">

			<div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

			<form style="width: 23rem;" method = "POST" action = "userDoLogin.php">

				<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Cargo Master</h3>

				<div class="form-outline mb-4">
				<input type="text" id="form2Example18" class="form-control form-control-lg" name = "username" />
				<label class="form-label" for="form2Example18">Username</label>
				</div>

				<div class="form-outline mb-4">
				<input type="password" id="form2Example28" class="form-control form-control-lg" name = "password"/>
				<label class="form-label" for="form2Example28">Password</label>
				</div>

				<div class="pt-1 mb-4">
				<button class="btn btn-info btn-lg btn-block" type="submit" name = "save" >Login</button>
				</div>

				<p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
				<p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

			</form>

			</div>

		</div>
		</div>
	</div>
	</section>
<!-- <div class = "container">
		<div class = "row">
			<div class = "col-9 mx-auto">
				<div class="card center" style="width: 25rem;margin-top: 80px">
				  <div class="card-body">
				    <div class = "text-center" id = "title">
				    	<h3>WELCOME!</h3>
				    </div>
				    <form action="adminDoLogin.php" method="post">
				    	<label>Username</label>
				    	<input type="text" class = "form-control" name="username">
				    	<label>Password</label>
				    	<input type="password" class = "form-control" name="password">
				    	<br>
				    	<br>
				    	<button type="submit" name = "save">Login</button>
				    </form>
				  </div>
				</div>
			</div>	
		</div>
	</div> -->

    
    
</body>
</html>
