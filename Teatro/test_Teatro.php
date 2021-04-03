<?php

include "Teatro.php";

//Creacion del objeto y carga de datos
$teatro = new Teatro("Araca Teatro", "Gral. Conrado Villegas 90",[
                    0 => ["nombre" => "Hamlet", "precio" => 250],
                    1 => ["nombre" => "Romeo y Julieta", "precio" => 350],
                    2 => ["nombre" => "La Mascara del Zorro", "precio" => 225],
                    3 => ["nombre" => "El Rey Leon", "precio" => 150]]);

//Declaracion de variables
$seguir = true;

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
            echo "A cual funcion desea cambiarle el nombre? (1 al 4): ";
            $funcionNumero = trim(fgets(STDIN));
            
            //Bucle que verifica que la opcion ingresada sea valida.
            do{
                if ($funcionNumero < 1 || $funcionNumero > 4){
                    echo "La funcion seleccionada no es valida.\n"
                    . "Seleccione una funcion del 1 al 4: ";
                    $funcionNumero = trim(fgets(STDIN));
                    echo "\n";
                }
            }while($funcionNumero < 1 || $funcionNumero > 4);
            
            echo "Cual es el nuevo nombre de la función?: ";
            $nombreFuncion = trim(fgets(STDIN));
            
            //Bucle que verifica que el nombre de la funcion nueva sea diferente a la actual.
            do{
                if (strtolower($nombreFuncion) == strtolower($teatro->getFuncion()[$funcionNumero-1]["nombre"])){
                    echo "La funcion seleccionada ya posee el nombre nuevo elegido.\n"
                    . "Escriba un nuevo nombre para la funcion seleccionada: ";
                    $nombreFuncion = trim(fgets(STDIN));
                    echo "\n";
                }
            }while(strtolower($nombreFuncion) == strtolower($teatro->getFuncion()[$funcionNumero-1]["nombre"]));
            
            $teatro ->cambiarFuncion($funcionNumero, $nombreFuncion);
            echo "\n";
          break;
        case 5: //Opcion para cambiar el precio de una funcion.
            echo "A cual funcion desea cambiarle el precio? (1 al 4): ";
            $funcionNumero = trim(fgets(STDIN));
            
            //Bucle que verifica que la opcion ingresada sea valida.
            do{
                if ($funcionNumero < 1 || $funcionNumero > 4){
                    echo "La funcion seleccionada no es valida.\n"
                    . "Seleccione una funcion del 1 al 4: ";
                    $funcionNumero = trim(fgets(STDIN));
                    echo "\n";
                }
            }while($funcionNumero < 1 || $funcionNumero > 4);
            
            echo "Cual es el nuevo precio de la función?: ";
            $precioFuncion = trim(fgets(STDIN));
            
            //Bucle que verifica que el precio nuevoa sea diferente al actual.
            do{
                if ($precioFuncion == $teatro->getFuncion()[$funcionNumero - 1]["precio"]){
                    echo "El precio ingresado es igual al existente.\n"
                    . "Ingrese un nuevo precio: ";
                    $precioFuncion = trim(fgets(STDIN));
                }    
            }while($precioFuncion == $teatro->getFuncion()[$funcionNumero - 1]["precio"]);
            
            $teatro ->cambiarPrecio($funcionNumero, $precioFuncion);
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
    
    echo "1) Ver lista de funciones.\n";
    echo "2) Cambiar el nombre del teatro.\n";
    echo "3) Cambiar la direccion del teatro.\n";
    echo "4) Cambiar nombre de la funcion.\n";
    echo "5) Cambiar precio de una funcion.\n";
    echo "6) Salir.\n";
    
    echo "Seleccione una opcion: ";
    $opcion = trim(fgets(STDIN));
    
    do{
        if ($opcion < 1 || $opcion > 6){
            echo "La opcion elegida no es valida. Seleccione una opcion nuevamente: ";
            $opcion = trim(fgets(STDIN));
        }
    }while ($opcion < 1 || $opcion > 6);
    
    echo "\n";
    
    return $opcion;
}