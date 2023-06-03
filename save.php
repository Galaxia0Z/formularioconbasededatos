<?php

include('db.php');

if (isset($_POST['SALVAR_DATOS'])) {
  $NOMBRE = $_POST['NOMBRE'];
  $APELLIDO = $_POST['APELLIDO'];
  $SEXO = $_POST['SEXO'];
  $EMAIL = $_POST['EMAIL'];
  $TELEFONO = $_POST['TELEFONO'];
  $DIRECCION = $_POST['DIRECCION'];


  $query = "INSERT INTO usuario (NOMBRE, APELLIDO, SEXO, EMAIL, TELEFONO, DIRECCION) VALUES 
  ('$NOMBRE', '$APELLIDO', '$SEXO', '$EMAIL', '$TELEFONO', '$DIRECCION')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'DATOS SALVADOS CORRECTAMENTE';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
