<?php
require('./php/header.php');
require('./php/component.php');
if (empty($_SESSION['pseudo'])) {
    header('Location: login.php');
    TexteNode("success","Vous devez d'abord vous connecter!"); 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">
  <div class="card-body">
  <main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-file-pdf"></i>   Publier une partition</h1>
        <div class="d-flex justify-content-center">
            <form action="" method="post" enctype="multipart/form-data" class="w-50">
                <div class="py-2">
                </div>
                <div class="pt-2">
                        <?php inputElement("","<i class=\"fas fa-id-badge\"></i>","Titre","titre","") ?>
                </div>
                
                <div class="pt-2">
                        <?php inputElement("","<i class=\"fas fa-id-badge\"></i>","Auteur","auteur","") ?>
                </div>
               
               <div class="row pt-2">
                <div class="col">
                <?php inputElement("file","<i class=\"fas fa-file-pdf\"></i>","PDF","pdf","") ?>          
             </div>

                <div class="col">
                <?php inputElement("file","<i class=\"fas fa-image\"></i>","IMAGE","image","") ?>
            </div>
                </div>
                <div class="d-flex justify-content-center">
                <?php buttonElement("btn-create","btn btn-success","<i class=\"fas fa-plus\"></i>","publier","dat-toogle='tooltip' data-placement='bottom' title='Ajouter'") ?>
                </div>
              


            </form>
        </div>
        <!-- Bootstrap table -->
</main>
  </div>
</div>
</body>
</html>