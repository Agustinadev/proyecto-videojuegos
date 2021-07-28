<?php require_once 'includes/conexion.php'?>
    <?php require_once 'helpers/function-error.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'includes/head.php'?>
</head>
<body>
  <?php require_once 'includes/header.php'?>
  <main class="main">

  <?php 
  if (isset($_GET)) :
    $id = $_GET['editar'];
    $entry = getEntry($db, $id);
    
?>
<section id="section">
  <article class="entrada">
        <a href="entrada-completa.php?editar=<?= $entry['id']?>"><h2 id="title"><?= $entry['titulo']?></h2></a>
        <a href="categoria.php?id=<?= $entry['categorias_id']?>">  <h2 class="categories" style="color: rgba(192, 188, 197, 0.918); background-color: rgba(24, 2, 2, 0.205); padding: 10px; margin: 20px 0px;"><?= $entry['nombre']?></h2></a>
        <p><?=($entry['descripcion'])?></p> 


        <?php
          if ($_SESSION['user']['id'] == $entry['usuarios_id']) :
            echo '<p class="all-entries">' . 'Yo soy el autor' . '</p>';
          ?>

          <?php  else :
            ?>

            
        <p class="all-entries">Autor de la entrada: <?=$entry['usuarios']?></p>

        <?php  endif;?>
  </article>

<?php 
endif;
?>
</section>
<?php
if ($_SESSION['user']['id'] == $entry['usuarios_id']) : ?>
  <a href="borrar-entrada.php?id=<?=$entry['id']?>" class="all-entries">Borrar entrada</a>
  <a href="editar-entradas.php?id=<?=$entry['id']?>" class="all-entries">Editar entrada</a>

 <?php endif;?>
  </main>
  <?php require_once 'includes/footer.php'?>
</body>
</html>
