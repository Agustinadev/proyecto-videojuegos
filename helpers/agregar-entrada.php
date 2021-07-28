<?php 
if (isset($_POST)) {
  require_once '../includes/conexion.php';
  $name = !empty($_POST['name']) 
  ? mysqli_real_escape_string($db, $_POST['name'])
  : false;

  $description = isset($_POST['description']) 
  ? mysqli_real_escape_string($db, $_POST['description'])
  : false;

  $id_category = isset($_POST['id_category']) 
  ? $_POST['id_category']
  : false;

  $id_user = $_SESSION['user']['id'];
 
 
  $error = [];
  
  if (empty($name)) {
   $error['name'] = 'El nombre está vacía.';
  } 

   if (empty($description)) {
   $error['description'] = 'La descripción está vacía.';
  } 

   if (empty($id_category)) {
   $error['id_category'] = 'El id de la categoria está vacío.';
  } 

   if (empty($id_user)) {
  $error['id_user'] = 'El id del usuario está vacío.';
 
  } 

if (count($error) == 0) {
  if (isset($_GET['editar'])) {
    $id_entry = $_GET['editar'];

   $sql = "UPDATE entradas SET descripcion = '$description', titulo = '$name', categorias_id = $id_category WHERE id = $id_entry AND usuarios_id = $id_user";
  } else {
    $sql = "INSERT INTO entradas VALUES(null, $id_user, $id_category, '$description', '$name')";
  }
  $query = mysqli_query($db, $sql);
 
if ($query) {
  $_SESSION['success'] = 'entrada insertada con éxito';
} else {
  $_SESSION['errors'] = 'error al conectarse con la base de datos.';
}


header("Location: ../entrada-completa.php?editar=$id_entry");
} else  {
  $_SESSION['error'] = $error;
  if (isset($_GET['editar'])) {
     header("Location: ../editar-entradas.php?editar=$id_entry");
  } else {
    header('Location: ../agregar-entrada-html.php');
  }
}
}
?>