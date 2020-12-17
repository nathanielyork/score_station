<?php
session_start();
function inputElement($type,$icon,$placeholder,$name,$value){
    $ele="<div class=\"input-group mb-2\">
    <div class=\"input-group-prepend\">
    <div class=\"input-group-text bg-warning\">$icon</div>
    </div>
    <input value='$value' type='$type' name='$name' type=\"text\" autocomplete=\"on\" placeholder=$placeholder class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"Username\">
    </div>";
    echo$ele;
}

function buttonElement($btnid,$class,$text,$name,$attr){
    $btn="
    <button name='$name' '$attr' class='$class' id='$btnid'>$text</button>
    
    ";
    echo$btn;
}


if(isset($_POST['log_out'])){    
        session_destroy();
        unset($_SESSION['pseudo']);
        unset($_SESSION['id']);
        header('Location: accueil.php'); 
    }

//  redirections
if(isset($_POST['register'])){
$pseudo=htmlspecialchars_decode(trim($_POST['pseudo']));
$pass1=sha1($_POST['pass1']);
$pass2=sha1($_POST['pass2']);
$qual=htmlspecialchars_decode(trim($_POST['qualification']));
if(!empty($_FILES) && $pseudo && $pass1 && $pass2 && $qual){
    if($pass1==$pass2){
        if(strlen($pass1)>6){
        $userExiste=$bdd->prepare("SELECT * FROM user WHERE pseudo=?");
        $userExiste->execute(array($pseudo));
        $unUser=$userExiste->fetch(PDO::FETCH_OBJ);
        if (!$unUser){

                $img_file_name=$_FILES['profil_pic']['name'];
                $img_file_type=$_FILES['profil_pic']['type'];
                $img_file_tmp_name=$_FILES['profil_pic']['tmp_name'];
                $img_file_extension=strrchr($img_file_name,".");
                $img_dest='files/'.$img_file_name;
                $extensions_img_autorise=array('.PNG','.jpg','.png','.JPG','.JPEG','.jpeg');
                if(in_array($img_file_extension,$extensions_img_autorise)){
               //c'est bien un fichier profil_pic
                    if(move_uploaded_file($img_file_tmp_name,$img_dest)){
                        //fichier uploadé
                        if($_FILES['profil_pic']['error']==0){
                            // Aucune error
                            //   Insertion
                                    $InsertUser=$bdd->prepare("INSERT INTO user(pseudo,pass,qualification,pp_name,pp_url) VALUES(?,?,?,?,?)");
                                    $InsertUser->execute(array($pseudo,$pass2,$qual,$img_file_name,$img_dest));
                    }
                    }
                    }else{TexteNode("attention","Image rejetée");}
                    }else{TexteNode("attention","Cet utilisateur existe déja");}
                    }else{TexteNode("attention","Mot de passe trop court");}
                    }else{TexteNode("attention","Verifiez les mots de passe");}
                    }else{TexteNode("attention","veuillez remplir tous les champs");}
                    }
    
if(isset($_POST['publier'])){
    $titre=htmlspecialchars_decode(trim($_POST['titre']));
    $auteur=htmlspecialchars_decode(trim($_POST['auteur']));
    // TexteNode("success","ok");
    // var_dump($_FILES);
    if(!empty($_FILES) && $titre && $auteur){
        //titre et auteur

        //fichier valide
        $pdf_file_name=$_FILES['pdf']['name'];
        $img_file_name=$_FILES['image']['name'];
        $pdf_file_type=$_FILES['pdf']['type'];
        $img_file_type=$_FILES['image']['type'];
        $pdf_file_tmp_name=$_FILES['pdf']['tmp_name'];
        $img_file_tmp_name=$_FILES['image']['tmp_name'];
        $pdf_file_extension=strrchr($pdf_file_name,".");
        $img_file_extension=strrchr($img_file_name,".");
        $extensions_pdf_autorise=array('.pdf','.PDF');
        $pdf_dest='files/'.$pdf_file_name;
        $img_dest='files/'.$img_file_name;
        $extensions_img_autorise=array('.PNG','.jpg','.png','.JPG','.JPEG','.jpeg');
        if(in_array($pdf_file_extension,$extensions_pdf_autorise) && in_array($img_file_extension,$extensions_img_autorise)){
       //c'est bien un fichier pdf
       //c'est bien un fichier image
            if(move_uploaded_file($pdf_file_tmp_name,$pdf_dest) && move_uploaded_file($img_file_tmp_name,$img_dest)){
                //fichier uploadé
                if($_FILES['pdf']['error']==0 && $_FILES['image']['error']==0){
                    // Aucune error
                    $publie_par="@".$_SESSION['pseudo'];
                    $insertProduit=$bdd->prepare("INSERT INTO produit(titre,auteur,pdf_name,pdf_url,img_name,img_url,publie_par) VALUES(?,?,?,?,?,?,?)");
                    $insertProduit->execute(array($titre,$auteur,$pdf_file_name,$pdf_dest,$img_file_name,$img_dest,$publie_par));
                    TexteNode("success","Partition publié!!!");
                }
            }
        }else {
            TexteNode("attention","Verifiez les formats de vos fichiers");
        }

        // echo"nom :".$file_name.'<br>';
        // echo"type :".$file_type.'<br>';
        // echo"extention :".$file_extension.'<br>';
    }else {
        TexteNode("attention","Remplisez tous les champs");
    }
}
if(isset($_POST['login_plutot'])){
    header('Location: login.php'); 
}
if(isset($_POST['register_plutot'])){
    header('Location: register.php'); 
}
if(isset($_POST['login'])){
            $pseudo=htmlspecialchars_decode(trim($_POST['pseudo']));
    $pass=sha1($_POST['pass']);
   if($pseudo && $pass){
    $reqUser=$bdd->prepare("SELECT * FROM user WHERE pseudo=? AND pass=?");
    $reqUser->execute(array($pseudo,$pass));
    // $unUs=$reqUser->fetch(PDO::FETCH_OBJ);
    if($unUs=$reqUser->fetch(PDO::FETCH_OBJ)){
        TexteNode("success","Connecté");
        // echo"ok";
        //session
        $_SESSION['id']=$unUs->id;
        $_SESSION['pseudo']=$unUs->pseudo;
        $_SESSION['qual']=$unUs->qualification;
        $_SESSION['date']=$unUs->datepub;
        $_SESSION['ppname']=$unUs->pp_name;
        $_SESSION['ppurl']=$unUs->pp_url;
        header('Location: accueil.php'); 
        
    }else {
        TexteNode("attention","Cet utilisateur n'existe pas");
    }
   }else {
       TexteNode("attention","Remplisez tous les champs");
   }

  
}
    
    

?>


