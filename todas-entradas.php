      <!DOCTYPE html>
      <html lang="en">
      <?php require_once 'includes/head.php'?>
      <body>


        <?php include_once 'includes/header.php'?>;
        <div class="box-animate" id="title-box">
        <h1 class="text">Todos los juegos</h1>
    </div>
       <section id="section">
         <?php
         include_once 'helpers/function-error.php';
         include_once 'includes/conexion.php';
         $entry = getLastCategories($db, null);
         if (!empty($entry)) :
          while ($entries = mysqli_fetch_assoc($entry)):
            ?>
      <article class="entrada">
      <a href="entrada-completa.php?editar=<?=$entries['id']?>"><h2><?= $entries['titulo'] ?></h2></a>
      <span><?= $entries['nombre']?></span>
      <p><?= $entries ['descripcion'] ?></p>
    </article>

        <?php  endwhile; endif; ?>
      </section>
 



<?php include_once 'includes/footer.php'?>
</body>
</html>