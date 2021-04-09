<?php

class Funciones{
    
    private $nombre;
    private $horarioInicio;
    private $duracionObra;
    private $precio;
    
    public function __construct($nombre,$horarioInicio,$duracionObra,$precio){
        $this->nombre = $nombre;
        $this->horarioInicio = $horarioInicio;
        $this->duracionObra = $duracionObra;
        $this->precio = $precio;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setHorarioInicio($horarioInicio){
        $this->horarioInicio = $horarioInicio;
    }
    
    public function getHorarioInicio(){
        return $this->horarioInicio;
    }
    
    public function setDuracionObra($duracionObra){
        $this->duracionObra = $duracionObra;
    }
    
    public function getDuracionObra(){
        return $this->duracionObra;
    }
    
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    
    public function getPrecio(){
        return $this->precio;
    }
    
    public function cambiarNombre($nuevoNombre,$numFuncion){
        $nombreFuncion = $this->getNombre();
        $nombreFuncion[$numFuncion - 1] = $nuevoNombre;
        $this->setNombre($nombreFuncion);
    }
    
    public function cambiarPrecio($nuevoPrecio,$numFuncion){
        $precioFuncion = $this->getPrecio();
        $precioFuncion[$numFuncion - 1] = $nuevoPrecio;
        $this->setPrecio($precioFuncion);
    }
    
    public function __toString() {
        
        $funciones = "";
        
        for ($j=0;$j<count($this->getNombre());$j++){
            $funciones = $funciones."Funcion Nº".($j+1)." :".$this->getNombre()[$j].
                         "\nHorario de Inicio: ".$this->getHorarioInicio()[$j]." / Duración: ".$this->getDuracionObra()[$j].
                         "min \nPrecio: $".$this->getPrecio()[$j]."\n"."-------------------------------------------\n";
        }
        
        return $funciones;
    }
                
}
