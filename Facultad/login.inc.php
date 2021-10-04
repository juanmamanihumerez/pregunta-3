
<?php session_start(); ?>

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

if (isset($_POST['login'])) 
{

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = $connection->prepare("SELECT * FROM usuario WHERE usuario=:username"); 
    $query->bindParam("username", $username, PDO::PARAM_STR);
   
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
  

    if (!$result) {
        echo '<p class="error">El usuario o contraseña son incorrectos!</p>';
    } else {
       
          if (password_verify($password, $result['password'])) {
            
            $_SESSION['user_id'] = $result['ci'];
            
            header('Location: index.php');
        } else {

            echo  '<p class="error">El usuario o contraseña son incorrectos!</p>';
                   
        }
    }
}

?>

<form method="post" action="docente/index.php" name="signin-form">
    <div class="form-element">
        <label>Usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Iniciar</button>
    <label><a href="registro.php">Regístrate</a></label>
</form>



