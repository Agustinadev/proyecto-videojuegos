<?php
if (isset($_POST)) {
  require_once '../includes/conexion.php';
  $name = !empty($_POST['name']) 
  ? mysqli_real_escape_string($db, $_POST['name'])
  : false;

  if ($name) {
    $sql = "INSERT INTO categorias VALUES(null, '$name')";
    $insert = mysqli_query($db, $sql);

    if ($insert) {
       $_SESSION['success'] = 'Categoria insertada con éxito.';
    } else {
      $_SESSION['error'] = 'No se ha podido insertar la categoria.';
    }
    
  } else {
      $_SESSION['error'] = 'Un problema en el nombre.';
  }
}
header('Location: ../index.php');



?>