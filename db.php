<?php
session_start();

$conn = mysqli_connect(
  'localhost:3306',
  'root',
  '',
  'FORMULARIODB'
) or die(mysqli_error($mysqli));

?>
