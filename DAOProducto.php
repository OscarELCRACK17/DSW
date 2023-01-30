<?php

declare(strict_types=1);
//modelo
require_once("./BaseDAO.php");
require_once("./Producto.php");
class DAOProdcuto
{

    public function insertProducto($descripcion, $nombre, $precio, $imagen): bool
    {
        $c = conectar();
        $consulta = "INSERT INTO producto (descripcion, nombre, precio, imagen) VALUES ('$descripcion', '$nombre', '$precio', '$imagen');";
        if (!consulta($consulta)) {
            echo "Error al insertar";
            $c->close();
            return false;
        } else {
            echo "Producto insertado";
            $c->close();
            return true;
        }
    }
    public function updateProducto($id, $descripcion, $nombre, $precio, $imagen): bool
    {
        $c = conectar();
        $consulta = "UPDATE producto SET descripcion='$descripcion', nombre='$nombre', precio='$precio', imagen='$imagen' WHERE id='$id';";
        if (!consulta($consulta)) {
            echo "Error al modificar";
            $c->close();
            return false;
        } else {
            echo "Producto modificado";
            $c->close();
            return true;
        }
    }
    public function deleteProductoById($productoId): bool
    {
        $c = conectar();
        $consulta = "DELETE FROM producto WHERE id=$productoId;";
        if (!consulta($consulta)) {
            echo "Error al eliminar";
            $c->close();
            return false;
        } else {
            echo "Producto eliminado";
            $c->close();
            return true;
        }
    }
    public function selectProductoById($productoId)
    {
        $c = conectar();
        $query = "SELECT id,descripcion, nombre, precio, imagen FROM producto WHERE id=$productoId;";
        $result = $c->query($query);
        if ($result) {
            return $result->fetch_array();
        } else {
            echo "Producto no encontrado";
        }
    }
    public function selectPag($pag, $tamPag)
    {
        
        $c = conectar();
        // Contar el total de productos
        
        $query = "SELECT COUNT(*) as total FROM producto;";
        $result = $c->query($query);
        $totalProductos = $result->fetch_assoc()['total'];
       
        // Calcular el número de páginas necesarias
        $numPags = ceil($totalProductos / $tamPag);
        // Si el número de página seleccionado es mayor al número de páginas necesarias
        if ($pag > $numPags) {
            // Redirigir al usuario a la última página o mostrar un mensaje de error
            header("Location: index.php?pag=$numPags&tamPag=$tamPag");
            exit();
        }
        // Calcular el offset para la consulta SQL
        $offset = ($pag - 1) * $tamPag;
        $query = "SELECT * FROM producto LIMIT $offset,$tamPag ;";
        $result = $c->query($query);
        $productos = [];
        while ($producto = $result->fetch_assoc()) {
            array_push($productos, $producto);
        }
        $c->close();
        return $productos;
    }

    public function selectAll()
    {
        $c = conectar();
        $query = "SELECT id,descripcion, nombre, precio, imagen FROM producto ORDER by id;";
        $result = $c->query($query);
        $productos = [];
        while ($producto = $result->fetch_assoc()) {
            array_push($productos, $producto);
        }
        $c->close();
        return $productos;
    }
    public function parseProducto(array $array)
    {
        return new Producto($array["id"], $array["nombre"], $array["precio"], $array["descripcion"], $array["imagen"]);
    }
}
