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
	<nav id="header-navbar" class="navbar navbar-expand-lg py-4">
		<div class="container">
			<a class="navbar-brand d-flex align-items-center text-white" href="#">
				<h3 class="font-weight-bolder mb-0">FORAGE</h3>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
				<span class="lnr lnr-menu"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar-nav-header">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?= $url ?>Admin/admin" style="font-weight:bold;">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" style="font-weight:bold;">Add user</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= $url ?>Admin/listUser" style="font-weight:bold;">List user</a>
					</li>
					<li class="nav-item only-desktop">
						<a class="nav-link" id="side-nav-open" href="#" style="font-weight:bold;">
							<span class="lnr lnr-menu"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="side-nav" class="sidenav">
		<a id="side-nav-close">&times;</a>
		<div class="content">
			<ul>
				<li>
					<h3><?php echo $_SESSION['userConnecter']['nameUser'] . " " . $_SESSION['userConnecter']['lastNameUser']; ?></h3>
				</li>
				<li><?php echo $_SESSION['userConnecter']['emailUser']; ?></li>
				<li><a href="<?= $url ?>">Logout</a></li>
			</ul>
		</div>
	</div>

	<form id="regForm" action="<?= $url ?>Admin/AjoutUser" method="post">
		<i class="fas fa-paper-plane"></i>
		<h1>Add User</h1>
		<div class="tab">Name:
			<p><input type="text" name="name" placeholder="First name..." oninput="this.className = ''" value="<?php if(isset($_SESSION['nameAddUser'])){echo $_SESSION['nameAddUser'];} ?>"></p>
			<p><input type="text" name="lastName" placeholder="Last name..." oninput="this.className = ''" value="<?php if(isset($_SESSION['lastNameAddUser'])){echo $_SESSION['lastNameAddUser'];} ?>"></p>
		</div>

		<div class="tab">Login Info:
			<p><input type="text" name="identifiant" placeholder="Identifier..." oninput="this.className = ''" value="<?php if(isset($_SESSION['identifiantAddUser'])){echo $_SESSION['identifiantAddUser'];} ?>"></p>
			<p><input type="email" name="email" placeholder="Email..." oninput="this.className = ''" value="<?php if(isset($_SESSION['emailAddUser'])){echo $_SESSION['emailAddUser'];} ?>"></p>
		</div>

		<div class="tab">Role user:
			<p>
				<select name="role1" id="" value="<?php if(isset($_SESSION['roleAddUser'])){echo $_SESSION['roleAddUser'];} ?>">
					<option selected disabled>Choose an role</option>
					<?php

					foreach ($_SESSION['role'] as $value) {
						echo '<option value="' . $value['id'] . '">' . $value['nameRole'] . '</option>';
					}

					?>
				</select>
			</p>
		</div>

		<div style="overflow:auto;">
			<div style="float:right;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
		</div>

		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		</div>
		<?php if(isset($_SESSION['erreurAuth'])){echo $_SESSION['erreurAuth'];} ?>
	</form>

	<script src="<?= $url ?>public/Admin/add/js/jquery-3.3.1.min.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/jquery.steps.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/main.js"></script>
	<script src="<?= $url ?>public/Admin/add/js/form.js"></script>
	<script src="<?= $url?>public/js/side-bar.js"></script>
</body>

</html>