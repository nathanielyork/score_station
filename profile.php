<?php
require('./php/header.php');
require('./php/component.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="card">
  <div class="card-body">
  <main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-user-alt"></i>Profile</h1>
        <div class="d-flex justify-content-center">
        </div>
    </div>
  </main>
</div>
</div>


<div class="box">
    <div class="box-img">
    <!-- <img class="avatar" src="files/nathpic.jpeg" alt=""> -->
    <img src="<?=$_SESSION['ppurl']?>" class="avatar" alt="Profil pic">
     
    </div>
    <h1>@<?=$_SESSION['pseudo']?></h1>
        <h4><?=$_SESSION['qual']?></h4>
    <div class="box-text">
    <!-- 2020-12-08 15:35:30 -->
    <?php
    $datecompte=substr($_SESSION['date'],0,-9);
    $heurecompte=substr($_SESSION['date'],11,-3);
    ?>
        Membre depuis <?=$datecompte?><br>
        A <?=$heurecompte?>
    
        <div class="log_out">
        <form action="accueil.php" method="POST">
        <?php buttonElement("btn-log_out","btn btn-success","Déconnexion","log_out","dat-toogle='tooltip' data-placement='bottom' title='Log out'") ?>             
        </form> 
         </div>
    </div>
</div>
</body>
</html>