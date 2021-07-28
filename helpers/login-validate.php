
<?php
if (isset($_POST)) {
  require_once '../includes/conexion.php';


  $email = isset($_POST['email'])
  ? mysqli_real_escape_string($db, $_POST['email'])
  : false;

  $password = isset($_POST['password'])
  ? mysqli_real_escape_string($db, $_POST['password'])
  : false;


  $error = [];

  // validaciones

  if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validate_email = true;
  } else {
    $error['email'] = 'Error in the email';
  }

  if (!empty($email) && strlen($password) > 5) {
    $validate_password = true;
  } else {
    $error['password'] = 'Error in the password';
  }


  if (count($error) == 0) {
  $validate = true;

  $query = "SELECT * FROM usuarios WHERE email = '$email'";
  $login = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($login);
 

  if ($user) {

    $password_verify = password_verify($password, $user['password']);
    if ($password_verify) {
      $_SESSION['login'] = "¡Bienvenido" . ' '.  $user['nombre'] . ' '.  $user['apellido'] . '! ';
      $_SESSION['user'] = $user;
       

      header('Refresh: 0.5; URL=../index.php');
      die();
    } else {
      $_SESSION['errors'] = "error entering password";
    }

  } else {
 $_SESSION['errors'] = 'error when entering the email';
  }




 } else {
    $_SESSION['error'] = $error;
  }
  header('Location: ../login.php');
} 



?>