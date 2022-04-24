<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>forage</title>
    <meta name="description" content="GesCommercialeForage">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/css/style.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/list/fonts/icomoon/style.css">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/list/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/list/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $url?>public/GesCommerciale/list/css/style.css">
    <link rel="stylesheet" href="<?= $url?>public/Admin/add/css/form.css">
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
                        <a class="nav-link" href="<?= $url?>GesCommerciale/GesCommerciale" style="font-weight:bold;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight:bold;">Register consumption</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url?>GesCommerciale/ListConsommation" style="font-weight:bold;">Consumption List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url?>GesCommerciale/ListFacture" style="font-weight:bold;">Facture List </a>
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
        <a href="#" id="side-nav-close">&times;</a>
        <div class="content">
            <ul>
                <li>
                    <h3><?php echo $_SESSION['userConnecter']['nameUser'] . " " . $_SESSION['userConnecter']['lastNameUser']; ?></h3>
                </li>
                <li><?php echo $_SESSION['userConnecter']['emailUser']; ?></li>
                <li><a href="<?= $url?>">Logout</a></li>
            </ul>
        </div>
    </div>

    <form id="regForm" action="<?= $url ?>/GesCommerciale/AjoutConsommation" method="post">
        <i class="fas fa-paper-plane"></i>
        <h1>Add Consumption</h1>
        <div class="tab">Consumption:
            <p><input type="number" name="consoC" placeholder="Number Consumption..." oninput="this.className = ''" id="consoC"></p>
            <p><input type="text" name="consoL" placeholder="Letter Consumption..." oninput="this.className = ''" id="consoL" readonly></p>
        </div>

        <div class="tab">Month Consumption:
            <p><input type="month" min="<?php echo date('F'); ?>" name="moisConso" placeholder="Month Consumption..." oninput="this.className = ''" required></p>
            <select name="comp" id="" required>
                <option value="" disabled selected>Choose Compteur</option>
                <?php

                foreach ($_SESSION['compteurs'] as $value) {
                    echo '<option value="'.$value['id'].'">'.$value['numeroCompteur'].'</option>';
                }
                ?>
            </select>
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
        </div>
    </form>
    <script src="<?= $url?>public/GesCommerciale/list/js/jquery-3.3.1.min.js"></script>
    <script src="<?= $url?>public/GesCommerciale/list/js/popper.min.js"></script>
    <script src="<?= $url?>public/GesCommerciale/list/js/bootstrap.min.js"></script>
    <script src="<?= $url?>public/GesCommerciale/list/js/main.js"></script>
    <script src="<?= $url?>public/GesCommerciale/js/convert.js"></script>
    <script src="<?= $url?>public/Admin/add/js/form.js"></script>
    <script src="<?= $url?>public/js/side-bar.js"></script>
</body>

</html>