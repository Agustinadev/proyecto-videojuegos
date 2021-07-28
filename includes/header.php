<?php require_once "conexion.php"?>
<?php require_once "helpers/function-error.php"?>


  <header id="header">
    <nav id="nav">
      <div id="logo"><img class="img" src="assets/img/ghost.png" alt=""></div>
      <ul id="ul">
        <li><a href="index.php">Inicio</a></li>   
          <?php
          $categories = mostrarCategorias($db);
          while ($category = mysqli_fetch_assoc($categories)) : 
          ?>
        <li><a href="categoria.php?id=<?=$category['id']?>"><?=$category['nombre']?></a></li>

<?php endwhile;                        ?>

        <li><a href="nosotros.php">Nosotros</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
  </header>
