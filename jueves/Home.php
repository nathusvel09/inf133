<?php
session_start();
require_once "Conectar.php";
require_once "Usuarios.php";
$usuario = new Usuarios();
$user_name = $_SESSION['login']['user_name'];
$password = $_SESSION['login']['password'];
$resultado = $usuario->listavulnerable($user_name, $password);

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
    <?php echo "Usuario Logeado ". $_SESSION['user_name']."<br>"; ?>
    <?php 
        echo "Cantidad ".count($resultado)."<br>";

        
            echo "<h2>Listado de Usuarios</h2>";
            echo "<table border='1'>";
            echo "<tr><th>Nombre de Usuario</th><th>Nombre Completo</th><th>Email</th><th>Fecha de Registro</th></tr>";
        
            foreach ($resultado as $fila) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($fila['user_name']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['full_name']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['fh_record']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        
    
    ?>
</body>
</html>