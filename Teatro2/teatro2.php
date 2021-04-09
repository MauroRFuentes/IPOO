<?php

class Teatro{
    
    private $nombre;
    private $direccion;
    private $funcion;
    
    public function __construct($nombre, $direccion, $funcion){
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->funcion = $funcion;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    
    public function getDireccion(){
        return $this->direccion;
    }
    
    public function setFuncion($funcion){
        $this->funcion = $funcion;
    }
    
    public function getFuncion(){
        return $this->funcion;
    }
    
    public function cambiarNombre($nombreNuevo){
        $this->setNombre($nombreNuevo);
    }
    
    public function cambiarDireccion($nuevaDireccion){
        $this->setDireccion($nuevaDireccion);
    }
    
    public function __toString(){
        return "Nombre del Teatro: ".$this->getNombre().
               "\nDirección: ".$this->getDireccion().
               "\n".$this->getFuncion();
    }

}