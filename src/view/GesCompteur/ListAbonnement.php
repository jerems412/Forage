<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>forage</title>
    <meta name="description" content="GesCompteurForage">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/list/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/list/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/list/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url ?>public/GesCompteur/list/css/style.css">

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
                        <a class="nav-link" href="<?= $url ?>GesCompteur/GesCompteur" style="font-weight:bold;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>GesCompteur/Attribution" style="font-weight:bold;">Attribution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight:bold;">Subscription List</a>
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
        <a href="javascript:void(0)" id="side-nav-close">&times;</a>
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
            <h2 class="mb-5">Subscription list</h2>
            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Subscription Date</th>
                        <th scope="col">Subscription Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cpt = 0;
                    foreach ($_SESSION['abonnements'] as $value) {
                        $cpt++;
                        echo '<tr scope="row">';
                        echo '<td><a href="#">' . $cpt . '</a></td>';
                        echo "<td>" . $value['dateAbonnement'] . "</td>";
                        echo "<td>" . $value['numeroAbonnement'] . "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/jquery-3.3.1.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/popper.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/bootstrap.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/main.js"></script>
    <script src="<?= $url?>public/js/side-bar.js"></script>
</body>

</html>