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
<h2 class="align-items-center justify-content-center text-center m-5">RecruitNXT Task</h2>
