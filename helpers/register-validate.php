<?php

if (isset($_POST)) {
 include_once 'includes/conexion.php';
 var_dump($_POST);

 $name = (isset($_POST['name'])) 
 ? mysqli_real_escape_string($db, $_POST['name'])
 : false;

 $surname = (isset($_POST['surname'])) 
 ? mysqli_real_escape_string($db, $_POST['surname'])
 : false;

 $password = (isset($_POST['password'])) 
 ? mysqli_real_escape_string($db, $_POST['password'])
 : false;

 $email = (isset($_POST['email'])) 
 ? mysqli_real_escape_string($db, $_POST['email'])
 : false;


 //to get errors
 $error = [];

 if (!empty($name) && !preg_match('/0-9/', $name) && !is_numeric($name)) {
   $name_validate = true;
 } else {
   $error['name'] = 'Error in the name';
 }

 if (!empty($surname) && !preg_match('/0-9/', $surname) && !is_numeric($surname)) {
   $surname_validate = true;
 } else {
   $error['surname'] = 'Error in the surname';
 }

 if (!empty($password) && strlen($password) > 5) {
   $password_validate = true;
 } else {
   $error['password'] = 'Error in the password';
 }

 if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $email_validate = true;
 } else {
   $error['email'] = 'Error in the email';
 }

 var_dump($error);





 if (count($error) == 0) {
   $password_secure = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
   $sql = "INSERT INTO usuarios VALUES(null, '$name', '$surname', '$email', '$password_secure')";
   
   $register = mysqli_query($db, $sql);
   var_dump($register);
   
   if ($register) {
     $_SESSION['success'] = 'Datos insertados con éxito';
   }
   else {
    $_SESSION['error']['email'] = 'Fallo al insertar los datos en el email';
  }
 } else{
  $_SESSION['error'] = $error;
}
header('location: contacto.php');
}

?>