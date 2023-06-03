<?php
include("db.php");
$nombre = '';
$apellido = '';
$sexo = '';
$email = '';
$telefono = '';
$direccion = '';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $NOMBRE = $row['NOMBRE'];
    $APELLIDO = $row['APELLIDO'];
    $SEXO = $row['SEXO'];
    $EMAIL = $row['EMAIL'];
    $TELEFONO = $row['TELEFONO'];
    $DIRECCION = $row['DIRECCION'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $NOMBRE = $_POST['NOMBRE'];
  $APELLIDO = $_POST['APELLIDO'];
  $SEXO = $_POST['SEXO'];
  $EMAIL = $_POST['EMAIL'];
  $TELEFONO = $_POST['TELEFONO'];
  $DIRECCION = $_POST['DIRECCION'];

  $query = "UPDATE usuario SET NOMBRE='$NOMBRE', APELLIDO='$APELLIDO', SEXO='$SEXO', EMAIL='$EMAIL', TELEFONO='$TELEFONO', DIRECCION='$DIRECCION' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'SE ACTUALIZÓ CORRECTAMENTE';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}
?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
          <div class="form-group">
            <input type="text" name="NOMBRE" class="form-control" value="<?php echo $NOMBRE; ?>" placeholder="ACTUALIZAR NOMBRE">
          </div>
          <div class="form-group">
            <input type="text" name="APELLIDO" class="form-control" value="<?php echo $APELLIDO; ?>" placeholder="ACTUALIZAR APELLIDO">
          </div>
          <div class="form-group">
            <input type="text" name="SEXO" class="form-control" value="<?php echo $SEXO; ?>" placeholder="ACTUALIZAR SEXO">
          </div>
          <div class="form-group">
            <input type="text" name="EMAIL" class="form-control" value="<?php echo $EMAIL; ?>" placeholder="ACTUALIZAR EMAIL">
          </div>
          <div class="form-group">
            <input type="text" name="TELEFONO" class="form-control" value="<?php echo $TELEFONO; ?>" placeholder="ACTUALIZAR TELEFONO">
          </div>
          <div class="form-group">
            <input type="text" name="DIRECCION" class="form-control" value="<?php echo $DIRECCION; ?>" placeholder="ACTUALIZAR DIRECCION">
          </div>
          <button class="btn btn-success" name="update">ACTUALIZAR DATOS</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
