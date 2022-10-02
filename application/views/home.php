<?php
// session_start();   
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title><?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
				echo 'Welcome';
			} else
				echo 'Login';  ?></title>
</head>

<body>
	<h2 class="align-items-center justify-content-center text-center m-5">RecruitNXT Task</h2>
	
	<?php
	if (isset($_SESSION['loggedIn'])&& $_SESSION['loggedIn'] == true) { ?>
		<!-- && $_SESSION['loggedIn'] == true -->
		<!-- Now check for types -->
		<div class="container  text-center">
			<h4>Hi! <?php  if(isset($_SESSION['email'])) echo $_SESSION['email']; ?> your Login as <?php 
			// echo $_SESSION['type']; 
			// echo $result; ?> 
			was succesfull!</h4>
			<a class="btn btn-secondary btn-warning" href="<?php base_url() ?>states">State</a>
			<a class="btn btn-secondary btn-warning" href="<?php base_url() ?>cities">City</a>
			<a class="btn btn-secondary btn-danger" href="<?php base_url() ?>logout">Logout</a>
		</div>
	<?php
	} else {
		// $result = $this->db->where('email', 'aritra056@gmail.com')->get('master_users')->row_array();
		// print_r($result)
		
	?>
		<form class="container col-md-8" action="<?php base_url() ?>Home/login" method="POST">
			<div class="form-group">
				<label for="exampleInputPassword1">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputPassword1" placeholder="Name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
			</div>
			<!-- <div class="form-group">
				<label for="exampleFormControlSelect1">Example select</label>
				<select class="form-control" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
				</select>
			</div> -->
			<!-- <div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
			</div> -->
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	<?php
	}

	?>
</body>

</html>
