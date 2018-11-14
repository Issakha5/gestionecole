<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>
</head>
<body>
    


    <div class="deroule"><h1>gestion de l'ecole</h1></div>
    <div class="menu">
        
            <ul>
                <li>
                    <a href="gestioneleve">gestion eleve</a> 
                     
                </li>
                <li>
                        <a href="gestionclasse.html">gestion classe</a> 
                 </li>
                 <li>
                        <a href="#contact">contact</a> 
                 </li>
                 <li>
                        <a href="">a propos</a> 
                 </li>

            </ul>
    
    </div>





<?php

    /Données en BDD
    $sql = " SELECT * FROM classe";
  
    //Execution de la requete
    try{
      $requete = $bdd -> prepare($sql) ;
      $requete->execute() ;
      //on stocke le résultat dans un array
      $result = $requete->fetchAll();
    }catch(Exception $e){
      // en cas d'erreur :
       echo " Erreur ! ".$e->getMessage();
       echo " Les datas : " ;
      print_r($datas);
   }
  
  // affichage..
  foreach($result as $row){
   
    print_r($row);
  
  }
  ?>









    
    <input type="submit" value="gestion de classe" >
    <input type="submit" value="liste des classes">
    <input type="submit" value="liste des classes">
</body>
</html>