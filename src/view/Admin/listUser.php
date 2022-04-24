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
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= $url ?>public/Admin/list/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= $url ?>public/Admin/list/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/Admin/list/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/Admin/list/css/style.css">

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
                        <a class="nav-link" href="<?= $url ?>Admin/addUser" style="font-weight:bold;">Add user</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight:bold;">List user</a>
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

    <div class="contente">

        <div class="table-responsive">
            <h2 class="mb-5">User list</h2>
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cpt = 0;
                    foreach ($_SESSION['users'] as $value) {
                        $cpt++;
                        echo '<tr scope="row">';
                        echo '<td><a href="#">' . $cpt . '</a></td>';
                        echo "<td>" . $value['nameUser'] . "</td>";
                        echo "<td>" . $value['lastNameUser'] . "</td>";
                        echo "<td>" . $value['emailUser'] . "</td>";
                        echo "<td>";
                        switch ($value['id_roles']) {
                            case 1:
                                echo '<a href="#">Admin';
                                break;

                            case 2:
                                echo '<a href="#">Gestion clientelle';
                                break;
                            case 3:
                                echo '<a href="#">Gestion commerciale';
                                break;
                            case 4:
                                echo '<a href="#">Gestion compteur';
                                break;
                        }
                        echo "</a></td>";
                        echo '<td><a onclick="bloquer('.$value['etatUser'].','.$value['id'].')" style="cursor:pointer;'.(($value['etatUser'] == 1)?"background:green":"background:red").';padding:10px;color: whitesmoke;font-weight:bold;">'.(($value['etatUser'] == 1)?"bloquer":"debloquer").'</a></td>';
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="<?= $url?>public/GesCommerciale/list/js/jquery-3.3.1.min.js"></script>
    <script src="<?= $url ?>public/Admin/list/js/main.js"></script>
    <script src="<?= $url?>public/js/side-bar.js"></script>
    <script src="<?= $url?>src/ajax/addFacture.js"></script>
    <?php require_once "src/ajax/addFacture.php"; ?>
</body>

</html>