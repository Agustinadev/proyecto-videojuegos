
<!DOCTYPE html>
<html lang="en">
<?php require_once 'includes/head.php'?>
<body>
  <?php include 'includes/header.php'?>
<section id="section">
  <?php 
if (isset($_GET)) :
  require_once "includes/conexion.php";
  $id = $_GET['id'];

  $sql = "SELECT e.*, c.nombre FROM entradas e INNER JOIN categorias c ON c.id = e.categorias_id WHERE e.categorias_id = $id";


  $query = mysqli_query($db, $sql);
 ?>
  
  <?php  if (!empty($query) && mysqli_num_rows($query) > 0) : ?>
  <?php while ($fetch = mysqli_fetch_assoc($query)) :  ?>

<article class="entrada">
  <h2><?= $fetch['titulo']?></h2>
  <span><?= $fetch['nombre']?></span>
  <p><?= $fetch['descripcion'] ?></p>
</article>



<?php endwhile;
 else : ?>
  <h3>No hay entradas en esta categoría.</h3>
<?php endif;
      endif; ?>
</section>
<?php include 'includes/footer.php'?>
</body>
</html>