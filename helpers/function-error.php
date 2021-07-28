 <?php 

 function functionError($error){
  $text = '';
  if (!empty($error)) {
    $text = '<div class="alert"> <b class="error">' . $error .  '</b></div>';
  }
  return $text;
 }
 
function deleteError(){
  $delete =  false;

  //error de validaciones
  if (isset($_SESSION['error'])) {
    $_SESSION['error'] = null;
    unset($_SESSION['error']);
  }

  if (isset($_SESSION['errors'])) {
    $_SESSION['errors'] = null;
    unset($_SESSION['errors']);
  }

  if (isset($_SESSION['success'])) {
    $_SESSION['success'] = null;
    unset($_SESSION['success']);
  }


  return $delete;
}


function mostrarCategorias($db){
$query = 'SELECT * FROM categorias ORDER BY id DESC';
$category = mysqli_query($db, $query);


$result = [];
if ($category) {
$result = $category;
} 
return $result;
}




function getLastCategories($db, $limit = null, $busqueda = null){
  $query = "SELECT e.*, c.nombre FROM entradas e 
INNER JOIN categorias c ON c.id = e.categorias_id ";

if ($busqueda) {
  $query.= "WHERE titulo LIKE '%$busqueda%'";
}

$query.= 'order by e.id DESC';

if($limit){ 
  $query .= ' LIMIT 6;';
}

// var_dump($query);
// die();
  $entry = mysqli_query($db, $query);
  $result = false;
  if ($entry) {
    $result = $entry;
  }

  return $result;
}


function getEntry($db, $id){
  $query = "SELECT e.*, c.nombre, CONCAT(u.nombre , ' ' ,  u.apellido) AS 'usuarios' FROM entradas e
   INNER JOIN categorias c ON c.id = e.categorias_id
   INNER JOIN usuarios u ON u.id = e.usuarios_id
    WHERE e.id = $id"
   ;
  $consult = mysqli_query($db, $query);

  $array = [];
  if ($consult) {
    $array = mysqli_fetch_assoc($consult);

  }
  return $array;

}


 ?>
 