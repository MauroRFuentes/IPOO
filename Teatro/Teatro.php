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
    
    public function cambiarFuncion($funcionNumero, $nombreFuncion){
        //$this->funcion[$funcionNumero - 1]["nombre"] = $nombreFuncion;
        $cambioFuncion = $this->getFuncion();
        $cambioFuncion[$funcionNumero - 1]["nombre"] = $nombreFuncion;
        $this->setFuncion($cambioFuncion);
    }
    
    public function cambiarPrecio($funcionNumero, $precioFuncion){
        //$this->funcion[$funcion - 1]["precio"] = $precioFuncion;
        $cambioPrecio = $this->getFuncion();
        $cambioPrecio[$funcionNumero - 1]["precio"] = $precioFuncion;
        $this->setFuncion($cambioPrecio);
    }
    
    public function __toString(){
        return "Nombre del Teatro: ".$this->getNombre().
               "\nDirección: ".$this->getDireccion().
               "\nFuncion 1: ".$this->getFuncion()[0]["nombre"]." / Precio: $".$this->getFuncion()[0]["precio"].
               "\nFuncion 2: ".$this->getFuncion()[1]["nombre"]." / Precio: $".$this->getFuncion()[1]["precio"].
               "\nFuncion 3: ".$this->getFuncion()[2]["nombre"]." / Precio: $".$this->getFuncion()[2]["precio"].
               "\nFuncion 4: ".$this->getFuncion()[3]["nombre"]." / Precio: $".$this->getFuncion()[3]["precio"];
    }

}