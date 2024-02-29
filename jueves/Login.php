<?php
session_start();
if($_POST){
    require_once "Usuarios.php";
    $usuario = new Usuarios();
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $resultado = $usuario->loginvulnerable($user_name, $password);
    if(is_array($resultado) && count($resultado) > 0) {
        $_SESSION['user_name'] = $resultado['user_name'];
        $_SESSION['login']['user_name'] = $_POST['user_name'];
        $_SESSION['login']['password'] = $_POST['password'];
        //header("Location: listar_usuarios.php");
        header("Location: home.php");
    } else {
        $mensaje = "Nombre de usuario o contraseña incorrecta";
    }

    
      
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <style>
        body{
            background-color: #222;
            color: #fff;
        }
    </style>

</head>
<body>
    <form method="post">
        <label for="user_name">Usuario:</label>
        <input type="text" name="user_name" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <input type="submit" value="Iniciar sesión">
    </form>
    <?php
    if (isset($mensaje)) {
        echo $mensaje;
    }
    ?>
</body>
</html>