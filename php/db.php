<?php
try{
	$bdd=new PDO('mysql:host=localhost;dbname=scores;meta charset=utf-8','root','');
    $bdd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 	
}catch(Exceptions $e){
						die('Erreur:'.$e->getMessage());
 }
return $bdd;
?>