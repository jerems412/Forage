<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>forage</title>
	<meta name="description" content="AdminForage">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="<?= $url ?>public/Admin/vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $url ?>public/Admin/css/style.min.css">
	<link rel="stylesheet" href="<?= $url ?>public/Admin/add/css/style.css">
	<link rel="stylesheet" href="<?= $url ?>public/Admin/add/css/form.css">
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<link rel="stylesheet" type="text/css" href="<?= $url ?>public/Admin/add/css/montserrat-font.css">
	<link rel="stylesheet" type="text/css" href="<?= $url ?>public/Admin/add/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="<?= $url ?>public/Admin/add/css/style.css" />

</head>

<body style="background-image:url('public/Admin/img/intro.svg');background-color:#3c373e;">
	<form id="regForm" action="<?= $url ?>Login/forgot" method="post">
		<i class="fas fa-paper-plane"></i>
		<h1>Change password</h1>
		<div class="tab">Password:
			<p><input type="password" name="password" minlength="5" placeholder="Password..." oninput="this.className = ''" required></p>
		</div>

		<div style="overflow:auto;">
			<div style="float:right;">
				<button type="submit" id="nextBtn">Submit</button>
			</div>
		</div>
	</form>

	<script src="<?= $url ?>public/Admin/add/js/jquery-3.3.1.min.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/jquery.steps.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/main.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/form.js"></script>
</body>

</html>