<!DOCTYPE html>
<?php

$bdd= new PDO('mysql:host=127.0.0.1;dbname=gestionEcole','issakha','diallo91');

if(isset($_POST['forminscription']))
{	

	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);

	$mdp1 =sha1($_POST['password1']);
	$mdp2 =sha1($_POST['password2']);

	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['password1']) AND !empty($_POST['password2']))
	{
		$prenomlength = strlen($prenom);
		if ($prenomlength <=100) 
		{

				if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
				{
					$reqmail = $bdd->prepare("SELECT * FROM inscription WHERE email= ?");
					$reqmail->execute(array($email));
					$mailexist = $reqmail->rowCount();
					if($mailexist==0)
					{



					if ($password1 == $password2) 
					{
						$insertmbr = $bdd->prepare("INSERT INTO inscription (nom, prenom, email, password ) VALUES (?,?,?,?) ");
						$insertmbr->execute(array($nom, $prenom, $email, $password1));
						$erreur = "Votre compte a ete bien créé!!!<a href=\" formconnexion.php\">Me connecter</a>";
						//$_SESSION['comptecree'] = "votre compte a été bien créé!";
						//header('location:index.php');

					}
					else
					{
						$erreur = "Vos mots de passe ne correspondent pas!!!";
					}
				}
				else{
					$erreur = "Adresse mail déjà utilisée";
				}

				}
				
		}
		else
		{
			$erreur = "votre prenom ne doit pas depasser 100 caracteres";
		}

	}
	else
	{
		 $erreur = "tous les champs  doivent etre completes !";
	}
} 

?>



<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    
<form action="" method="post">
       <table>
            <legend> <h1>formulaire d'inscription</h1></legend>
            <tr> 
                <td><label for="nom">nom</label></td>
                <td> <input type="text" name="nom" id="nom" required="required" maxlength="50" style="width:300px;" placeholder="nom"></td> 
                <td>  <span id="nom_manquant"></span> </td>     
            </tr>
              
            <tr>
                <td>
                    <label for="prenom">prenom</label>
                </td>
                <td>
                    <input type="text" name="prenom" id="prenom" required="required" maxlength="50" style="width:300px;" placeholder="prenom">
                </td>
                <td>  <span id="prenom_manquant"></span></td>
            </tr>
            
                
            
            <tr> 
                <td> 
                    <label for="email">email</label>
                </td>
                <td> 
                     <input type="email" name="email" id="email" required="required" maxlength="50" style="width:300px;" placeholder="email">
                </td>
                <td> <span id="email_manquant"></span> </td>
            </tr>
            

            <tr> 
                <td>  <label for="password">password</label> </td>
                <td> <input type="password" name="password" id="password1" required="required" maxlength="50" style="width:300px;" placeholder="password"> </td>
                <td> <span id="password1_manquant"></span> </td>
            </tr>
            
            
            <tr> 
                <td> <label for="password">confirmer password</label> </td>
                <td>  <input type="password" name="password" id="password2" required="required" maxlength="50" style="width:300px;"placeholder="confirmer password"> </td>
                
                <td> <span id="password2_manquant"></span> </td>
            </tr>
                  
            
            <tr>
                <td> <label for="phone">telephone</label> </td>
                <td>
                     <input type="tel" name="phone" id="phone" required="required" maxlength="50" style="width:300px;" >
                </td>
                <td> <span id="phone_manquant"></span> </td>
            </tr>
            
            
            <tr> 
                <td></td> <td> <input type="submit" value="valider" id="valider" style="width:150px;color: blue"> </td>
            </tr>
            
                
                
                
        </table>

    </form>

    <script>
    var validation = document.getElementById('valider');

    var prenom =document.getElementById('prenom');
    var prenom_m =document.getElementById('prenom_manquant');

    var nom =document.getElementById('nom');
    var nom_m =document.getElementById('nom_manquant');

    var email =document.getElementById('email');
    var email_m =document.getElementById('email_manquant');

    var password1 =document.getElementById('password1');
    var password1_m =document.getElementById('password1_manquant');

    var password2 =document.getElementById('password2');
    var password2_m =document.getElementById('password2_manquant');

    var phone =document.getElementById('phone');
    var phone_m =document.getElementById('phone_manquant');

    
    validation.addEventListener('click',f_valid);

    function f_valid(e){
        if(prenom.validity.valueMissing){
            e.preventDefault();
            prenom_m.textContent="Prenom manquant";
            prenom_m.style.color="red";

        }
        if(nom.validity.valueMissing){
            e.preventDefault();
            nom_m.textContent="Nom manquant";
            nom_m.style.color="red";
        }
        if(email.validity.valueMissing){
            e.preventDefault();
            email_m.textContent="Email manquant";
            email_m.style.color="red";
        }
        if(password1.validity.valueMissing){
            e.preventDefault();
            password1_m.textContent="Password manquant";
            password1_m.style.color="red";
        }
        if(password2.validity.valueMissing){
            e.preventDefault();
            password2_m.textContent="Password manquant";
            password2_m.style.color="red";
        }
        if(phone.validity.valueMissing){
            e.preventDefault();
            phone_m.textContent="Telephone manquant";
            phone_m.style.color="red";
        }
    
    
    
    }

    
    </script>
</body>
<?php
	if(isset($erreur))
	{
		echo '<font color="red">'.$erreur.'</font>';
	}
?>
</html>