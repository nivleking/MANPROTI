<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<section class="vh-100 " >
	<div class="container-fluid mx-auto">
		<div class="row">
			<div class="col-sm-12 text-black">
				<div class="d-flex justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

				<form style="width: 23rem;" method = "POST" action = "userDoRegister.php" class = "">

					<h3 class="fw-normal mt-3 d-flex justify-content-center" style="letter-spacing: 0.5px; font-style:italic; font-size:38px;">
						Cargo Master<br>
						<h4 class = "d-flex justify-content-center" style="font-style: italic;">Register to Play!</h4>
						<?php if (isset($_GET['error'])) { ?>
							<p class = "d-flex justify-content-center" style="color:red; font-weight:bold;"><?php echo $_GET['error']; ?></p>
						<?php } ?>
					</h3>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example18">Username</label>
						<input type="text" id="form2Example18" class="form-control form-control-lg" name = "userTeamName" required/>
					</div>

					<div class="form-outline mb-4">
						<label class="form-label" for="form2Example28">Password</label>
						<input type="password" id="form2Example28" class="form-control form-control-lg" name = "passwordTeamName" required />
					</div>

                    <div class="form-outline mb-4">
						<label class="form-label" for="form2Example38">Confirm Password</label>
						<input type="password" id="form2Example38" class="form-control form-control-lg" name = "confirmPasswordTeamName" required/>
					</div>

					<div class="pt-1 mb-4">
						<button class="btn btn-danger btn-lg btn-block" type="submit" name = "register" >Register</button>
					</div>

					<!-- <p class="small d-flex justify-content-center">
						<a class="text-muted" href="#!">Forgot password?</a>
					</p> -->
					<p class="d-flex justify-content-center">
						Already have an account?&nbsp
						<a href="loginAdmin.php" class="link-info"> Login here</a>
					</p>
				</form>
				</div>
			</div>
		</div>
	</div>
	</section>
</body>
</html>