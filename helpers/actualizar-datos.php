<?php
if (isset($_POST)) {
  require_once '../includes/conexion.php';
  $name = isset($_POST['name']) 
   ? mysqli_real_escape_string($db, $_POST['name'])
   : false;

   $surname = isset($_POST['surname']) 
   ? mysqli_real_escape_string($db, $_POST['surname'])
   : false;

   $email = isset($_POST['email']) 
   ? mysqli_real_escape_string($db, $_POST['email'])
   : false;


   $error = [];

   if (!empty($name) && !preg_match('/0-9/', $name) && !is_numeric($name)) {
   $name_validate = true;
 } else {
   $error['name'] = 'Error en el nombre';
 }

 if (!empty($surname) && !preg_match('/0-9/', $surname) && !is_numeric($surname)) {
   $surname_validate = true;
 } else {
   $error['surname'] = 'Error en el apellido';
 }

 
 if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $email_validate = true;
 } else {
   $error['email'] = 'Error en el email';
 }




 if (count($error) == 0) {
   $user_id = $_SESSION['user']['id'];
   $sql_previous = "SELECT id, nombre FROM usuarios WHERE email = '$email'";

  $query_previous = mysqli_query($db, $sql_previous);
  $with_fetch = mysqli_fetch_assoc($query_previous);
   if (empty($with_fetch) || $with_fetch['id'] == $user_id) {
     $sql = "UPDATE usuarios SET 
     nombre = '$name',
     apellido = '$surname',
     email = '$email' 
     WHERE id = $user_id";
  
     $query = mysqli_query($db, $sql);
  
     if ($query) {
       $_SESSION['user']['nombre'] = $name;
       $_SESSION['user']['apellido'] = $surname;
       $_SESSION['user']['email'] = $email;
       $_SESSION['success'] = 'Datos actualizados';
     } else {
  
      $_SESSION['errors'] = 'Error en la base de datos o consulta.';
     }
     
   } else {
     $_SESSION['errors'] = 'El email está repetido.';
   }



 }  else {
   $_SESSION['error'] = $error;
 }

 header('Location: ../actualizar-datos-html.php');
}




?>