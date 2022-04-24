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
    <link rel="stylesheet" href="<?= $url ?>public/Admin/add/css/form.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

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
                        <a class="nav-link" href="#" style="font-weight:bold;">Attribution</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>GesCompteur/ListAbonnement" style="font-weight:bold;">Subscription List</a>
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

    <form id="regForm" action="<?= $url ?>GesCompteur/AjoutAttribution" method="post">
        <i class="fas fa-paper-plane"></i>
        <h1>Add Attribution</h1>
        <div class="tab">Compteur and Subscription:
            <p>
                <select name="abonnement" id="">
                    <option value="" selected disabled>Choose Subscription</option>
                    <?php

                    foreach ($_SESSION['abonnements'] as $value) {
                        echo '<option value="' . $value['id'] . '">' . $value['numeroAbonnement'] . '</option>';
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
        </div>
        <?php if(isset($_SESSION['erreurAuth'])){echo $_SESSION['erreurAuth'];} ?>
    </form>
    <script src="<?= $url ?>public/GesCompteur/list/js/jquery-3.3.1.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/popper.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/bootstrap.min.js"></script>
    <script src="<?= $url ?>public/GesCompteur/list/js/main.js"></script>
    <script src="<?= $url ?>public/Admin/add/js/form.js"></script>
    <script src="<?= $url?>public/js/side-bar.js"></script>
</body>

</html>