<?php

$conex = mysqli_connect("localhost", "root", "", "usuarios");

if (isset($_POST['register'])) {
  if (
    strlen($_POST['name']) >= 1 &&
    strlen($_POST['email']) >= 1 &&
    strlen($_POST['direction']) >= 1 &&
    strlen($_POST['phone']) >= 1 &&
    strlen($_POST['password']) >= 1
  ) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $direction = trim($_POST['direction']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // Se corrige la sintaxis de la consulta SQL
    $sql = "INSERT INTO datos (nombre, email, direccion, telefono, clave) 
            VALUES ('$name', '$email', '$direction', '$phone', '$password')";

    // Se cambia el orden de los parámetros de la función mysqli_query()
    $resultado = mysqli_query($conex, $sql);

    if ($resultado) {
      ?>
      <a href="file:///C:/xampp/htdocs/registro/SDBM/SDBM.html" target="_blank">siguiente</a> 
              <h3 class="success">Tu registro ha sido exitoso</h3>
      <?php
    } else {
      ?>
        <h3 class="error">Ocurrió un error</h3>
      <?php
    }
  } else {
    ?>
      <h3 class="error">Llena todos los campos</h3>
    <?php
  }
}

mysqli_close($conex);
