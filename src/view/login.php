<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="<?= $url?>public/Login/css/style.css">
  <script src="https://kit.fontawesome.com/c4254e24a8.js" crossorigin="anonymous"></script>
</head>

<body style="background-image:url('public/Admin/img/intro.svg');background-color:#3c373e;">
  <div class="container">
    <form action="<?= $url ?>Login/logon" method="post">
      <i class="fas fa-paper-plane"></i>

      <div class="input-group">
        <label>Identification.</label>
        <input type="text" name="iden" placeholder="Enter your identification" value="<?php if(isset($_SESSION['iden'])){echo $_SESSION['iden'];} ?>">
      </div>

      <div class="input-group">
        <label>Password.</label>
        <input type="password" name="mdp" placeholder="Enter your pasword" value="<?php if(isset($_SESSION['mdp'])){echo $_SESSION['mdp'];} ?>">
      </div>

      <button>Submit</button>
      <div class="erreur-group">
      <?php if(isset($_SESSION['erreurAuth'])){echo $_SESSION['erreurAuth'];} ?>
      </div>

    </form>
  </div>
</body>

</html>