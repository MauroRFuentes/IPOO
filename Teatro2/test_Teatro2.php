<?php

include "teatro2.php";
include "funciones.php";

//Declaracion de variables
$seguir = true;
$horaApertura = "08:00";

//Carga inicial de la informacion del teatro
echo "Ingrese el nombre del teatro: ";
$nombreTeatro = trim(fgets(STDIN));
echo "Ingrese la direccion del teatro: ";
$direccionTeatro = trim(fgets(STDIN));
echo "\n";
            
echo "Cuantas funciones posee el teatro?: ";
$cantFunciones = trim(fgets(STDIN));
            
for ($i=0;$i<$cantFunciones;$i++){
    echo "Ingrese el nombre de la funcion Nº".($i+1).": ";
    $nombreFuncion[$i] = trim(fgets(STDIN));
    
    if ($i != 0){
        $horaSeparada = explode(":",$horarioInicioFuncion[$i-1]);
        $minTotal = $horaSeparada[0]*60 + $horaSeparada[1] + $duracionFuncion[$i-1] + 10;
        
        //Conversion de minutos a horas
        $hora = floor($minTotal / 60); $min = $minTotal % 60;
        
        if ($hora < 10){
            $hora = "0".$hora;
        }
        if ($min < 10){
            $min = "0".$min;
        }
        
        $horaApertura = $hora.":".$min;
        
        echo "Ingrese un horario para la funcion desde las ".$horaApertura."(hh:mm): ";   
        $horarioInicioFuncion[$i] = trim(fgets(STDIN));
        
        do{
            if ($horarioInicioFuncion[$i] < $horaApertura){
                echo "El horario ingresado no es válido. Ingreselo nuevamente: ";
                $horarioInicioFuncion[$i] = trim(fgets(STDIN));
            }
        }while($horarioInicioFuncion[$i] < $horaApertura);
        
    }
    else{
        echo "Ingrese un horario para la funcion desde las ".$horaApertura."(hh:mm): ";
        $horarioInicioFuncion[$i] = trim(fgets(STDIN));
        
        do{
            if ($horarioInicioFuncion[$i] < $horaApertura){
                echo "El horario ingresado no es válido. Ingreselo nuevamente: ";
                $horarioInicioFuncion[$i] = trim(fgets(STDIN));
            }
        }while($horarioInicioFuncion[$i] < $horaApertura);
        
    }
    echo "Ingrese la duración de la obra (en minutos): ";
    $duracionFuncion[$i] = numeroValido(trim(fgets(STDIN)));
    echo "Ingrese el precio de la funcion: ";
    $precioFuncion[$i] = numeroValido(trim(fgets(STDIN)));
                
    echo "\n";
}
            
//Creacion de objetos
$funciones = new Funciones($nombreFuncion,$horarioInicioFuncion,$duracionFuncion,$precioFuncion);
$teatro = new Teatro($nombreTeatro,$direccionTeatro,$funciones);

/*
 * Switch, que dependiendo la seleccion dentro del menu, va a ejecutar algo distinto
 */
do{
    switch(menu()){
        case 1: //Muestra por pantalla la informacion del Teatro
            echo $teatro."\n\n";
          break;
        case 2: //Opcion para cambiar el nombre del teatro.
            echo "Ingrese el nuevo nombre del Teatro: ";
            $nuevoNombre = trim(fgets(STDIN));
            
            //Bucle que verifica que el nombre nuevo sea diferente al actual.
            do{
                if (strtolower($nuevoNombre) == strtolower($teatro->getNombre())){
                    echo "El nombre ingresado ya existe. Ingrese otro: ";
                    $nuevoNombre = trim(fgets(STDIN));
                }
            }while(strtolower($nuevoNombre) == strtolower($teatro->getNombre()));
                
            $teatro->cambiarNombre($nuevoNombre);
            echo "\n";
          break;
        case 3: //Opcion para cambiar la direccion del teatro.
            echo "Ingrese la nueva direccion del Teatro: ";
            $nuevaDireccion = trim(fgets(STDIN));

            //Bucle que verifica que la direccion nueva sea direfente a la actual.
            do{
                if (strtolower($nuevaDireccion) == strtolower($teatro->getDireccion())){
                    echo "La direccion ingresada ya existe. Ingrese otra: ";
                    $nuevaDireccion = trim(fgets(STDIN));
                }
            }while(strtolower($nuevaDireccion) == strtolower($teatro->getDireccion()));
            
            $teatro->cambiarDireccion($nuevaDireccion);
            echo "\n";
          break;
        case 4: //Opcion para cambiarle el nombre a una funcion.
            echo "A cual funcion desea cambiarle el nombre? (1 al ".$cantFunciones."):";
            //Comprueba que el valor ingresado sea válido
            $funcionNumero = funcionValida(trim(fgets(STDIN)), $cantFunciones);
            
            //Se solicita un nuevo nombre para la funcion seleccionada
            echo "Cual es el nuevo nombre de la función?: ";
            $nombreFuncion = trim(fgets(STDIN));
            
            //Se llama al método para comprobar que el nuevo nombre no sea el mismo que el actual
            $nombreNuevo = nombreIgualFuncion($funciones->getNombre()[$funcionNumero - 1], $nombreFuncion);
            
            $funciones->cambiarNombre($nombreNuevo, $funcionNumero);
            echo "\n";
          break;
        case 5: //Opcion para cambiar el precio de una funcion.
            echo "A cual funcion desea cambiarle el nombre? (1 al ".$cantFunciones."):";            
            //Comprueba que el valor ingresado sea válido
            $funcionNumero = funcionValida(trim(fgets(STDIN)), $cantFunciones);
            
            //Se solicita un nuevo precio para la funcion seleccionada
            echo "Cual es el nuevo precio de la función?: ";
            $precioFuncion = trim(fgets(STDIN));
            
            //Se llama al método para comprobar que el nuevo precio no sea el mismo que el actual
            $precioNuevo = precioIgualFuncion($funciones->getPrecio()[$funcionNumero - 1], $precioFuncion);
            
            $funciones->cambiarPrecio($precioNuevo, $funcionNumero);
            echo "\n";
          break;
        case 6: //Opcion de salida.
          echo "Que tenga un buen dia.";
          $seguir = false;
    }
}while($seguir);

/*
 * Método para visualizar un menu y seleccionar una opcion
 * @return int
 */

function menu(){
    echo "1) Ver informacion del teatro.\n";
    echo "2) Cambiar el nombre del teatro.\n";
    echo "3) Cambiar la direccion del teatro.\n";
    echo "4) Cambiar nombre de la funcion.\n";
    echo "5) Cambiar precio de una funcion.\n";
    echo "6) Salir.\n";
    
    echo "Seleccione una opcion: ";
    $opcion = trim(fgets(STDIN));
    
    do{
        if ($opcion < 1 || $opcion > 7){
            echo "La opcion elegida no es valida. Seleccione una opcion nuevamente: ";
            $opcion = trim(fgets(STDIN));
        }
    }while ($opcion < 1 || $opcion > 6);
    
    echo "\n";
    
    return $opcion;
}

//Método que compara el nombre actual con el nuevo que se intenta ingresar
function nombreIgualFuncion($nombreActual,$nombreNuevo){
    
    do{
        if (strtolower($nombreActual) == strtolower($nombreNuevo)){
            echo "La funcion seleccionada ya posee el nombre nuevo elegido.\n"
            . "Escriba un nuevo nombre para la funcion seleccionada: ";
            $nombreNuevo = trim(fgets(STDIN));
            echo "\n";
        }
    }while(strtolower($nombreActual) == strtolower($nombreNuevo));
    
    return $nombreNuevo;
}

//Método que compara el precio actual con el nuevo que se intenta ingresar
function precioIgualFuncion($precioActual,$precioNuevo){
    do{
        if ($precioActual == $precioNuevo){
            echo "El precio ingresado es igual al existente.\n"
            . "Ingrese un nuevo precio: ";
            $precioNuevo = trim(fgets(STDIN));
            }    
        }while($precioActual == $precioNuevo);
        
    return $precioNuevo;
}

//Método que se asegura que la funcion elegida exista
function funcionValida($funcionElegida,$cantFunciones){
    do{
        if ($funcionElegida < 1 || $funcionElegida > $cantFunciones){
            echo "La funcion seleccionada no es valida.\n"
            . "Seleccione una funcion del 1 al 4: ";
            $funcionElegida = trim(fgets(STDIN));
            echo "\n";
            }
        }while($funcionElegida < 1 || $funcionElegida > $cantFunciones);
        
    return $funcionElegida;
}

//Método que se asegura que el valor ingresado sea numerico
function numeroValido($numero){
    do{
        if (!is_numeric($numero)){
            echo "El número ingresado no es válido.\nIngreselo nuevamente: ";
            $numero = trim(fgets(STDIN));
        }
    }while(!is_numeric($numero));
    
    return $numero;
}