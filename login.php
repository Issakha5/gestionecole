<!DOCTYPE html>


<?php
session_start();
if(isset($_SESSION['email'])){
header("location: general message.php");
}
require "db.php";

if(isset($_POST['Se connecter'])){
$user = $_POST['email'];
$pass = md5($_POST['password']);
$messeg = "";

if(empty($user) || empty($pass)) {
    $messeg = "Email/Password sont vide";
} else {
    $sql = "SELECT email, password FROM inscription WHERE username=? AND 
  password=? ";
    $query = $conn->prepare($sql);
    $query->execute(array($user,$pass));

    if($query->rowCount() >= 1) {
        $_SESSION['email'] = $user;
        $_SESSION['time_start_login'] = time();
        header("location: general message.php");
    } else {
        $messeg = "email/Password non valide";
    }
}
}
?>




<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>connexion</title>
    
    <script src="main.js"></script>
</head>
<body>
    
    <form action="" method="post">
        <legend> <h1>connexion</h1> </legend>
        <table>
            <tr> 
                <td> <label for="email">email:</label></td>
                <td> <input type="email" name="email" id="email" maxlength="50"></td>
            </tr>
            <tr> 
                <td> <label for="login">password:</label></td>
                <td> <input type="password" name="password" id="password" maxlength="50"></td>
            </tr>
            <tr> 
                <td> </td>
                 <td> <input type="submit" name="connect" id="connect" value="Se connecter"></td>
            </tr>
            <tr> 
                    <td> </td>
                     <td> <input type="submit" name="inscription" id="inscription" value="S'inscrire"></td>
            </tr>
        </table>
    </form>
</body>
</html>