
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php require_once 'includes/header.php'?>
  <?php require_once 'includes/redireccion.php'?>
  <h1 class="text">Agregar categoria</h1>
  <form action="helpers/agregar-categoria.php" class="form" method="POST">
    <label for="name" class="label" style="margin: 10px;">Nombre de la categoria</label>
    <input type="text" name="name" style="margin: 10px;">
    <input type="submit" class="submit" value="Enviar" style="margin: 10px;">
  </form>
</body>
</html>
