<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php require_once 'includes/header.php'?>
  <?php require_once 'includes/conexion.php'?>
  <?php require_once 'helpers/function-error.php'?>
  <?php require_once 'includes/redireccion.php'?>

  <h1 class="text">Editar entrada</h1>
  <?php
  if (isset($_SESSION['success'])) {
    echo '<div class="alert success">'. $_SESSION['success'] .'</div>';
  }

  if (isset($_SESSION['errors'])) {
    echo '<div class="alert error">'. $_SESSION['errors'] .'</div>';
  }
  ?>
  
 <?php 
 //solo para que me ande la variable entry
  if (isset($_GET)) {
    $id = $_GET['id'];
    $entry = getEntry($db, $id); }
    //solo para que me ande la variable entry
?>
  <form action="helpers/agregar-entrada.php?editar=<?=$entry['id']?>" class="form" method="POST">
  


<!-- titulo -->
    <label for="name" class="label" style="margin: 10px;">Nombre</label>
    
    <?php
     if(isset( $_SESSION['error']['name'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['name'].'</b></div>';
  }?>
    <input type="text" name="name" style="margin: 10px;" value="<?=$entry['titulo']?>">


    <!-- descripcion -->
    <label for="name" class="label" style="margin: 10px;">descripción</label>

    <?php
     if(isset( $_SESSION['error']['description'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['description'].'</b></div>';
  }?>
    <textarea name="description" id="" cols="30" rows="10"><?=$entry['descripcion']?></textarea>

   
  

    <!-- categoria con select -->
     <label for="id_category" class="label" style="margin: 10px;">Categoria</label>

  <?php
     if(isset( $_SESSION['error']['id_category'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['id_category'].'</b></div>';
  }?>
    <select name="id_category" class="inputs-class" value="<?=$entry['nombre']?>">
        <?php 
          $categories = mostrarCategorias($db);
          if (!empty($categories)) : 
            while ($category = mysqli_fetch_assoc($categories)) :
        ?>
            <option value="<?= $category['id']?>" <?= $category['id'] == $entry['categorias_id']? 'selected = "selected"' : '' ?> ><?=$category['nombre']?></option>
      <?php  endwhile;
          endif;?>
      </select>


      <!-- submit -->
      <input type="submit" class="submit" value="Enviar" style="margin: 10px;">
  </form>
  <?php if (isset($_SESSION['error']) || isset($_SESSION['errors']) || isset($_SESSION['success'])) {
    deleteError();
  }?>
</body>
</html>
