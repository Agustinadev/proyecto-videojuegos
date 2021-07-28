
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php require_once 'includes/header.php'?>
  <?php require_once 'includes/redireccion.php'?>

  <h1 class="text">Agrega un juego</h1>
  <?php
  if (isset($_SESSION['success'])) {
    echo '<div class="alert success">'. $_SESSION['success'] .'</div>';
  }

  if (isset($_SESSION['errors'])) {
    echo '<div class="alert error">'. $_SESSION['errors'] .'</div>';
  }
  ?>
  
  <form action="helpers/agregar-entrada.php" class="form" method="POST">

    <label for="name" class="label" style="margin: 10px;">Nombre</label>
    <?php
     if(isset( $_SESSION['error']['name'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['name'].'</b></div>';
  }?>
    <input type="text" name="name" style="margin: 10px;">

    <label for="name" class="label" style="margin: 10px;">descripción</label>

    <?php
     if(isset( $_SESSION['error']['description'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['description'].'</b></div>';
  }?>
    <textarea name="description" id="" cols="30" rows="10"></textarea>

  
     <label for="id_category" class="label" style="margin: 10px;">Categoria</label>

  <?php
     if(isset( $_SESSION['error']['id_category'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['id_category'].'</b></div>';
  }?>
    <select name="id_category" class="inputs-class">
        <?php 
          $categories = mostrarCategorias($db);
          if (!empty($categories)) : 
            while ($category = mysqli_fetch_assoc($categories)) :
        ?>
            <option value="<?= $category['id']?>"> <?= $category['nombre']?></option>
      <?php  endwhile;
          endif;?>
      </select>

      <input type="submit" class="submit" value="Enviar" style="margin: 10px;">
  </form>
  <?php if (isset($_SESSION['error']) || isset($_SESSION['errors']) || isset($_SESSION['success'])) {
    deleteError();
  }?>
</body>
</html>
