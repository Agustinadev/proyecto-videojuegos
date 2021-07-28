<?php include_once 'helpers/function-error.php'?>



<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php include_once 'includes/header.php'?>

<main class="main">
  <h3>Iniciar sesión.</h3>
  
    <?php 
    //esta comprobacion es para errores al insertar datos en la base
      if(isset($_SESSION['errors'])) {
      echo '<div class="alert"><b class="error">'.$_SESSION['errors'].'</b></div>';
    }
    ?>



  <div class="block-aside">
        <form action="helpers/login-validate.php" method="POST" class="form">
          <label for="email" class="label">Email</label>
           <?php  if (isset($_SESSION['error']['email'])) {
        echo functionError($_SESSION['error']['email']);
      }?>
          <input type="email" name="email">
          <br>
          <label for="password" class="label">Contraseña</label>
           <?php  if (isset($_SESSION['error']['password'])) {
        echo functionError($_SESSION['error']['password']);
      }?>
          <input type="password" name="password">
          <br>
          <input type="submit">
         </form>
      </div>
      </main>
      <?php  if (isset($_SESSION['error']) || isset($_SESSION['errors'])|| isset($_SESSION['login'])) {
        deleteError();
      }
             ?>
      <?php include_once 'includes/footer.php'?>
</body>
</html>