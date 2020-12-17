<?php
require('./php/header.php');
require('./php/component.php');
if (!empty($_SESSION['pseudo'])) {
TexteNode("attention","Une session est déja en cours"); 
header('Location: accueil.php');
echo"<div class=\"success\">.<div/>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <div class="card">
  <div class="card-body">
  <main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="far fa-id-badge"></i>   Register</h1>
          <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50" enctype="multipart/form-data" autocomplete="on">
                <div class="py-2">
                </div>
                <div class="pt-2">
                        <?php inputElement("file","<i class=\"fas fa-image\"></i>","PROFILPIC","profil_pic","") ?>
                </div>
                <div class="pt-2">
                        <?php inputElement("","<i class=\"fas fa-id-badge\"></i>","Pseudonyme","pseudo","") ?>
                </div>
                
                <div class="pt-2">
                        <?php inputElement("password","<i class=\"fas fa-key\"></i>","Choisissez votre mot de passe","pass1","") ?>
                </div>
                <div class="pt-2">
                        <?php inputElement("password","<i class=\"fas fa-key\"></i>","Choisissez votre mot de passe","pass2","") ?>
                </div>
                <div class="pt-2">
                        <?php inputElement("","<i class=\"fas fa-music\"></i>","Domaine musicale","qualification","") ?>
                </div>               
              
                </div>
                <div class="d-flex justify-content-center">
               <?php buttonElement("btn-create","btn btn-success","S'inscrire","register","dat-toogle='tooltip' data-placement='bottom' title='register'") ?>
               <?php buttonElement("btn-create","btn btn-success","J'ai déja un compte","login_plutot","dat-toogle='tooltip' data-placement='bottom' title='login'") ?>
                </div>
              


            </form>
        </div>
        <!-- Bootstrap table -->
</main>
  </div>
</div>
</body>
</html>
