<?php

//Inicializacion de variables
$seguir = true;

//Menu de opciones
do{
    $opcion = menu();

    if ($opcion == 4){
        $seguir = false;
    }
    else{
        main($opcion);

        echo "Desea realizar otra operación? SI / NO: ";
        $pregunta = trim(fgets(STDIN));

        if ($pregunta == "NO"){
            $seguir = false;
        }
    }
    
}while($seguir == true);
//Evalua la opción elegida y ejecuta la sentencia correspondiente

/*
 * Módulo donde se muestra un menú por pantalla
 * @return int
 */

function menu(){
    
    echo "1) Ver cantidad de botellas y precio promedio de los vinos Malbec \n";
    echo "2) Ver cantidad de botellas y precio promedio de los vinos Cabernet Sauvignon \n";
    echo "3) Ver cantidad de botellas y precio promedio de los vinos Merlot \n";
    echo "4) Salir";
    
    echo "\n";
    
    echo "Ingrese una opción: ";
    $opcion = trim(fgets(STDIN));
    
    //Se controla que la opción ingresada sea válida
    do{
        if ($opcion < 1 || $opcion > 4){
            echo "El valor ingresado no es válido. Vuelva a introducirlo: ";
            $opcion = trim(fgets(STDIN));
        }
    }while ($opcion < 1 || $opcion > 4);
   
    return $opcion;
}

/*
 * Módulo principal
 * Muestra por pantalla la informacion del vino seleccionado
 * @param $opcion
 */
//Se cargan los arreglos en el main
function main($opcion){
    
    //Carga de arreglos
    $vinos = array();
    $vinos['Malbec'] = array(
        "variedad" => ["Dulce", "Semiseco", "Seco"],
        "cantidad" => [463, 590, 498],
        "año" => [1888, 1875, 1899],
        "precio" => [3393, 4545, 3709]
    );
    
    $vinos['Cabernet Sauvignon'] = array(
        "variedad" => ["Dulce", "Semiseco", "Seco"],
        "cantidad" => [517,671,371],
        "año" => [1875, 1859, 1896],
        "precio" => [4106, 3813, 4163]
    );
    
    $vinos['Merlot'] = array(
        "variedad" => ["Dulce", "Semiseco", "Seco"],
        "cantidad" => [419, 398, 311],
        "año" => [1912, 1896, 1876],
        "precio" => [3577, 4259, 2624]
    );
    
    //Llama al módulo para calcular la cantidad de botellas y el precio promedio del vino seleccionado
    if ($opcion == 1){
        $infoVino = datosVino($vinos['Malbec']["cantidad"], $vinos['Malbec']["precio"]);
        echo "La cantidad de botellas de Malbec son: ",$infoVino[0]," y el precio promedio es de: ",round($infoVino[1]);
        echo "\n\n";
    }
    else if ($opcion == 2){
        $infoVino = datosVino($vinos['Cabernet Sauvignon']["cantidad"], $vinos['Cabernet Sauvignon']["precio"]);
        echo "La cantidad de botellas de Cabernet Sauvignon son: ",$infoVino[0]," y el precio promedio es de: ",round($infoVino[1]);
        echo "\n\n";
    }
    else if ($opcion == 3){
        $infoVino = datosVino($vinos['Merlot']["cantidad"], $vinos['Merlot']["precio"]);
        echo "La cantidad de botellas de Merlot son: ",$infoVino[0]," y el precio promedio es de: ",round($infoVino[1]);
        echo "\n\n";
    }
      
}

/*
 * Obtiene los datos de cantidad de botellas
 * y precio de botella del vino seleccionado
 * @param array $cantBotellas
 * @param array $precioBotellas
 * @return array
 */

function datosVino($cantBotellas,$precioBotellas){
    
    $infoVino = [];
    $totalBotellas = 0;
    $precioProm = 0;
    
    for ($i=0; $i<3; $i++){
        $totalBotellas = $totalBotellas + $cantBotellas[$i];
        $precioProm = $precioProm + $precioBotellas[$i];
    }
    
    $precioProm = $precioProm / $i;
    
    $infoVino[0] = $totalBotellas;
    $infoVino[1] = $precioProm;
    
    return $infoVino;
}