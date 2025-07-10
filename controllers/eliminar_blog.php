<?php


include "../models/blog.php";
//blog
$eliminar = new blog();
$respuesta = $eliminar -> Eliminar($_GET["codigo"]);
if($respuesta instanceof Exception){
    echo "<script>
            alert('Error de servidor, reintente más tarde'); 
            location.href='../views/index.html';   
    </script>";
}
else{
    echo "<script>
            alert('Eliminación correcta');
            location.href='../views/editar_blog.php';    
    </script>";
}// vamos

?>