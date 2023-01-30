<?php
    class Producto {
        
        private $id=0;
        private $descripcion="";
        private $nombre="";
        private $precio=0.0;
        private $imagen="";
        function __construct(int $id,string $descripcion,string $nombre,float $precio,string $imagen){
            $this->id=$id; 
            $this->$descripcion=$descripcion; 
            $this->nombre=$nombre; 
            $this->precio=$precio; 
            $this->imagen=$imagen;

        }
        
        function __set($campo, $value){
            $this->$campo = $value;
        }

        function __get($campo){
            return $this->$campo;
        }
    }