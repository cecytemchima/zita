<?php

if(isset($_POST['register'])) { // Si se envió el formulario
    include("conexion.php"); // Incluir el archivo de conexión
    $name = $_POST['name'];
    $email = $_POST['email'];
    $direction = $_POST['direction'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $fecha = date("d/m/y");//este solo es para la fecha

    $sql = "INSERT INTO registro (nombre,email,direccion,telefono,contraseña,fecha) VALUES (?,?,?,?,?,?)";
    try {
        $stmt = $conex->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $direction);
        $stmt->bindParam(4, $phone);
        $stmt->bindParam(5, $password);
        $stmt->bindParam(6, $fecha);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            echo '<script>alert("Registro guardado");</script>';
        }
    } catch(PDOException $e) {
        echo '<script>alert("Usuario existente");</script>';
    }

    // Cierra la conexión
    $conex->close();
}

?>