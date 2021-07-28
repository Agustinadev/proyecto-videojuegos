
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php require_once 'includes/header.php'?>
  <?php require_once 'includes/redireccion.php'?>

  <h1 class="text">Mis datos</h1>
  <?php
  if (isset($_SESSION['success'])) {
    echo '<div class="alert success">'. $_SESSION['success'] .'</div>';
  }

  if (isset($_SESSION['errors'])) {
    echo '<div class="alert error">'. $_SESSION['errors'] .'</div>';
  }
  ?>
  
  <form action="helpers/actualizar-datos.php" class="form" method="POST">


  <!-- nombre -->
    <label for="name" class="label" style="margin: 10px;">Nombre</label>
    <?php
     if(isset( $_SESSION['error']['name'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['name'].'</b></div>';
  }?>
    <input type="text" name="name" value="<?=$_SESSION['user']['nombre']?>" style="margin: 10px;">


<!-- apellido -->
    <label for="surname" class="label" style="margin: 10px;">Apellido</label>
    <?php
     if(isset( $_SESSION['error']['surname'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['surname'].'</b></div>';
  }?>
    <input type="text" name="surname" value="<?=$_SESSION['user']['apellido']?>" style="margin:  10px;">     
    
    
    <!-- email -->
     <label for="email" class="label" style="margin: 10px;">Email</label>
    <?php
     if(isset( $_SESSION['error']['email'])){
   echo '<div class="alert"><b class="error">'. $_SESSION['error']['email'].'</b></div>';
  }?>
    <input type="text" name="email" value="<?=$_SESSION['user']['email']?>" style="margin:  10px;">     
    
    
<!-- submit -->
     <input type="submit" class="submit" name="submit" value="Actualizar" style="margin: 10px;">
  </form>
  <?php if (isset($_SESSION['error']) || isset($_SESSION['errors']) || isset($_SESSION['success'])) {
    deleteError();
  }?>

  <?php require_once 'includes/footer.php'?>
</body>
</html>
