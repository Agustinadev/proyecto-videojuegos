<?php  require_once 'helpers/function-error.php'?>
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php include 'includes/header.php'?>
  <main class="main">
 
    <?php 
    if (isset($_SESSION['success'])) {
      echo '<div class="alert"><b class="success">'.$_SESSION['success'].'</b></div>';
    }
    //esta comprobacion es para errores al insertar datos en la base
    elseif(isset($_SESSION['error']['general'])) {
      echo '<div class="alert"><b class="error">'.$_SESSION['error']['general'].'</b></div>';
    }
    ?>
   
    
    <!-- si tenes que registrarte-->
    <div class="block-aside" id="register">

     <div class="box-login">
       <h3>¿Ya tienes una cuenta? Registrate <a href="login.php">aquí</a>.</h3>
     </div>

    <form action="helpers/register-validate.php" method="POST" class="form">
         <h3>Identificate.</h3>
      <label class="label"for="name">Nombre</label>
      <?php  if (isset($_SESSION['error']['name'])) {
        echo functionError($_SESSION['error']['name']);
      }?>
      <input type="text" name="name">
          <br>
      <label class="label" for="surname">Apellido</label>
       <?php  if (isset($_SESSION['error']['surname'])) {
        echo functionError($_SESSION['error']['surname']);
      }?>
      <input type="text" name="surname">
          <br>
      <label class="label" for="email">Email</label>
       <?php  if (isset($_SESSION['error']['email'])) {
        echo functionError($_SESSION['error']['email']);
      }?>
      <input type="email" name="email">
          <br>
      <label class="label" for="password">Contraseña</label>
       <?php  if (isset($_SESSION['error']['password'])) {
        echo functionError($_SESSION['error']['password']);
      }?>
      <input type="password" name="password">
          <br>
      <input type="submit" value="Entrar">
    </form>
    <?php if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
      deleteError();                }?>
    </div>
    </main>
    <?php include 'includes/footer.php'?>
</body>
</html>