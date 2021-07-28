<?php
require_once 'includes/conexion.php';
if (isset($_SESSION['user']) && isset($_GET['id'])) {
  $entry_id = $_GET['id'];
  $user_id = $_SESSION['user']['id'];

  $sql = "DELETE FROM entradas WHERE usuarios_id = $user_id AND id = $entry_id";
  $query = mysqli_query($db, $sql);

}

header('Location: index.php');














?>

