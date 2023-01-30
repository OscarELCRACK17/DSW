<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        body {
            text-align: center;
        }

        table {
            margin: auto;
        }

        h1 {
            text-decoration: underline;
        }

        td:nth-child(1) {
            text-align: left;
            font-weight: bold;
        }

        td {
            border: solid black 1px;
            text-align: right;
        }

        th:nth-child(1) {
            text-align: left;
        }

        th {
            border: solid black 1px;
            background-color: #f08080;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #add8e6;
        }

        tr:nth-child(odd) {
            background-color: #d3d3d3;
        }

        .modificar {
            background-color: blue;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .eliminar {
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .insertar {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 2;
        }
        
    </style>
</head>

<body>
    <h1>Mantenimiento de productos</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Descripcion</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
        <?php

        //vista
        require_once("./DAOProducto.php");
        $producto = new DAOProdcuto;
      
        $pag = $_GET['pag']; 
        $tamPag= $_GET['tamPag'];

        if ($pag == null) {
            $pag = 1;
            
            
        }
        if ($tamPag == null) {
            $tamPag=5;
            
        }
        $productos = $producto->selectPag($pag, $tamPag);
        $productos['id'];
        
        
        echo "<form action='./addProducto' method='POST' id='form'>Pág:
            <select name='pag' id='pags'>";
        for ($i=$productos['id']+1; $i < count($productos)+1; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select> Tamaño de la Pagina:<select name='tamPag' id='pags'>";
        for ($i = 5; $i <= 50; $i += 5) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>
        </form>";

        foreach ($productos as $producto) {
           

            echo "<form action='./addProducto.php' method='POST' id='form'> 
            <tr>
            <td><input type='text' name='id' value='".$producto['id']."' required='true'></td>
            <td><input type='text' name='description' value='".$producto['descripcion']."' required='true'></td>
            <td><input type='text' name='name' value='".$producto['nombre']."' required='true'></td>
            <td><input type='number' name='price' value='".$producto['precio']."' required='true'></td>
            <td><input type='text' name='image' value='".$producto['imagen']."' required='true'></td>
            <td><input type='submit' name='action' value='Eliminar' class='eliminar'></td>
            <td><input type='submit' name='action' value='Modificar' class='modificar'></td>
            
        </tr></form>";
        }
        
        echo "<form action='./addProducto.php' method='POST' id='form'> <tr>
        <td></td>
        <td><input type='text' name='description' required='true'></td>
        <td><input type='text' name='name' required='true'></td>
        <td><input type='number' name='price' required='true'></td>
        <td><input type='text' name='image' required='true'></td>
        <td class='insertar' colspan='2'><input type='submit' name='action' value='Insertar' class='modificar'></td>
        
    </tr></form>";
        ?>
    </table>
    <script src="./pagination.js"></script>
</body>

</html>