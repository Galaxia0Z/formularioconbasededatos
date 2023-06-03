<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM usuario WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'DATOS ELIMINADOS CORRECTAMENTE';
  $_SESSION['message_type'] = 'Warning';
  header('Location: index.php');
}

?>
