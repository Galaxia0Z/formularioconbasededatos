<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group">
            <input type="text" name="NOMBRE" class="form-control" placeholder="NOMBRE" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="APELLIDO" class="form-control" placeholder="APELLIDO" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="SEXO" class="form-control" placeholder="SEXO" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="EMAIL" class="form-control" placeholder="EMAIL" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="TELEFONO" class="form-control" placeholder="TELEFONO" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="DIRECCION" class="form-control" placeholder="DIRECCION" autofocus>
          </div>

          <input type="submit" name="SALVAR DATOS" class="btn btn-success btn-block" value="SALVAR DATOS">
        </form>
      </div>

    </div>

    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
            <th>SEXO</th>
            <th>EMAIL</th>
            <th>TELEFONO</th>
            <th>DIRECCION</th>
            <th>RESULTADO</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario";
          $result_usuario = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_usuario)) { ?>
          <tr>
            <td><?php echo $row['NOMBRE']; ?></td>
            <td><?php echo $row['APELLIDO']; ?></td>
            <td><?php echo $row['SEXO']; ?></td>
            <td><?php echo $row['EMAIL']; ?></td>
            <td><?php echo $row['TELEFONO']; ?></td>
            <td><?php echo $row['DIRECCION']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['ID']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['ID']?>" class="btn btn-warning">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
