<!DOCTYPE html>
<html lang="es">
  <?php require_once 'includes/head.php'?>
<body>
  
  
  <?php include 'includes/header.php'?>
  
   <main class="main">
      <?php
          if (isset($_SESSION['login'])) {
            echo '<div class="alert success div-login">'.$_SESSION['login'] 
            .'<a href="actualizar-datos-html.php" style="margin: 0px 20px;" class="other-a">Mis datos</a>' 
            .'<a href="agregar-categoria-html.php" style="margin: 0px 20px;" class="other-a">Agregar categoria</a>'
            .'<a href="agregar-entrada-html.php" style="margin: 0px 20px;" class="other-a">Agregar entrada</a>'
            .'<a href="includes/cerrar-sesion.php" style="margin: 0px 20px;" class="other-a"> Cerrar sesión</a>'
            
            . '</div>';
          }
          ?>
          
    <img src="https://images4.alphacoders.com/990/990604.png" class="img-background">
    <div id="principal">

    <div class="box-animate" id="title-box">
      <h1 class="text">Últimos juegos</h1>
    </div>
      <section id="section">
      <?php
      if (isset($_POST['search'])) :
       
      $entry = getLastCategories($db, null, $_POST['search']);
      if (!empty($entry)) :
        while ($entries = mysqli_fetch_assoc($entry)):
          
      ?>
      <article class="entrada">
        <a href="entrada-completa.php?editar=<?=$entries['id']?>"><h2><?= $entries['titulo'] ?></h2></a>
     
      <span><?= $entries['nombre']?></span>
      <p><?= $entries ['descripcion'] ?></p>
    </article>

        <?php  endwhile; endif; endif; ?>
      

      </section>
     
  </div>
    </main>



  <?php include 'includes/footer.php'?>
</body>
</html>