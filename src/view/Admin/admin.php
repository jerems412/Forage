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
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

</head>

<body style="background-image:url('public/Admin/img/intro.svg');background-color:#3c373e;">
<nav id="header-navbar" class="navbar navbar-expand-lg py-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center text-white" href="#">
                <h3 class="font-weight-bolder mb-0" >FORAGE</h3>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-nav-header" aria-controls="navbar-nav-header" aria-expanded="false" aria-label="Toggle navigation">
                <span class="lnr lnr-menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-nav-header">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight:bold;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>Admin/addUser" style="font-weight:bold;">Add user</a>
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

    <div class="container text-align-center">
        <h1 style="color:white;margin:25% 0 0 33%;font-size:70px;">MANAGER</h1>
    </div>

    <div id="side-nav" class="sidenav">
        <a id="side-nav-close">&times;</a>
        <div class="content">
						<ul>
							<li><h3><?php echo $_SESSION['userConnecter']['nameUser'] . " " . $_SESSION['userConnecter']['lastNameUser']; ?></h3></li>
							<li><?php echo $_SESSION['userConnecter']['emailUser']; ?></li>
							<li><a href="<?= $url ?>">Logout</a></li>
						</ul>
		</div>
    </div>
    <script src="<?= $url?>public/js/side-bar.js"></script>
</body>
</html>