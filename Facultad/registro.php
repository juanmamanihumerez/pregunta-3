<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>umsa</title>

        <link rel="stylesheet" href="css/styleform.css">
</head>


<?php

include('conexion.inc.php');
session_start();

if (isset($_POST['register'])) {

    $ci = $_POST['ci'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    
    $query = $connection->prepare("SELECT * FROM usuario WHERE usuario=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        echo '<p class="error">El usuario ya existe!</p>';
    }

    if ($query->rowCount() == 0) {


        $query = $connection->prepare("INSERT INTO usuario(ci,usuario,password) VALUES (:ci,:username,:password_hash)");

        $query->bindParam("ci", $ci, PDO::PARAM_STR);
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);

        $result=$query->execute();
        
        if ($result) {
            echo '<p class="success">>Registro Exitoso!</p>';
             header ("Location: index.php");
        } else {
            echo '<p class="error">Algo salio mal!</p>';
        }
    }
}

?>

<form method="post" action="" name="signup-form">
    <div class="form-element">
        <label>CI</label>
        <input type="text" name="ci"  required />
    </div>
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="register" value="register">Registrar</button>
</form>