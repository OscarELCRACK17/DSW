<?php
declare(strict_types=1);
//controlador
require_once("./DAOProducto.php");
require_once("./Producto.php");
$prod = new DAOProdcuto();


if (isset($_POST['action'])) {
    if ($_POST['action']=='Eliminar') {
        $eliminar = $prod->deleteProductoById($_POST['id']);
    }elseif ($_POST['action']=='Modificar') {
        $id = $_POST['id'];
        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];
        $precio = $_POST['price'];
        $imagen = $_POST['image'];
        $modificar = $prod->updateProducto($id, $descripcion, $nombre, $precio, $imagen);
    }elseif ($_POST['action']=='Insertar') {
        
        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];
        $precio = $_POST['price'];
        $imagen = $_POST['image'];
        $insertar = $prod->insertProducto( $descripcion, $nombre, $precio, $imagen);
    }
}
if(isset($_POST['pag']) && isset($_POST['tamPag'])){
    $pag = $_POST['pag'];
    $tamPag = $_POST['tamPag'];
    var_dump($pag);
    $productos = $producto->selectPag($pag,$tamPag);
    
}

?>
