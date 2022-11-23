<?php
// Base de datos
include('DB.php');

// Realizar consulta de los vehiculos en la base de datos
$numero = $_GET['numeroVista'];
// Funcion para imprimir el contenido de la tabla vehiculos
function consultaVehiculos($conexion)
{

    // Realizamos la consulta por SELECT a multiples tablas
    $consulta = "SELECT v.idVehiculo AS idv, v.placa AS placa, v.color AS color, t.`nombre_TVehiculo` AS tipo_vehiculo, p.numero_cedula AS propietario_cedula, p.nombres AS propietario_nombre, 

    p.apellidos AS propietario_apellido, c.nombres AS nombre_conductor, c.apellidos AS apellido_conductor, c.numero_cedulaC AS conductor_cedula, m.nombre_marca AS nombre_marca
        
    FROM vehiculo AS v INNER JOIN tipo_vehiculo AS t ON t.`idt_vehiculo` = v.`tipo_vehiculo` 
        
    JOIN propietario AS p ON p.`numero_cedula` =  v.`propietario` JOIN conductor AS c ON c.`numero_cedulaC` = v.`conductor` JOIN marca AS m ON m.`id_marca` = v.`id_marca` ORDER BY v.`idVehiculo` DESC";

    try {
        $ejecucion = mysqli_query($conexion, $consulta);
        include("vistas/vehiculos.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// Funcion para imprimir el contenido de la tabla información del vehiculo
function consultarInformeVehiculo($conexion)
{
    //Obtener el id para consultar el informe
    $idV = $_GET['idV'];

    $consulta = "SELECT v.placa as placa, m.nombre_marca as marca, p.nombres as nombre_propietario, p.`apellidos` as apllido_propietario,

    c.nombres as nombre_conductor, c.`apellidos` as apellido_conductor
    
    FROM vehiculo as v JOIN marca as m on m.`id_marca` = v.`id_marca` JOIN propietario as p on p.`numero_cedula` = v.`propietario`
    
    JOIN conductor as c on c.`numero_cedulaC` = v.`conductor` WHERE v.`idVehiculo` = $idV";

    try {
        $ejecucion = mysqli_query($conexion, $consulta);
        include("vistas/informe.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// Función para imprimir todo lo que contiene la tabla propietarios
function consultarpropietarios($conexion, $numero)
{
    // Validando si el numero de pagina es = a 6 para mostrar la información de una determinada persona

    if ($numero == 6) {

        $idp = $_GET['idp'];
        $consulta = "SELECT * FROM propietario WHERE numero_cedula = $idp";

        try {
            $ejecucion = mysqli_query($conexion, $consulta);
            include("vistas/propietarios.php");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        $consulta = "SELECT * FROM propietario";

        try {
            $ejecucion = mysqli_query($conexion, $consulta);
            include("vistas/propietarios.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

// Función para imprimir todo lo que contiene la tabla propietarios
function consultarconductores($conexion, $numero)
{
    // Validando si el numero de pagina es = a 5 para mostrar la información de una determinada persona
    if ($numero == 5) {

        $idp = $_GET['idp'];
        $consulta = "SELECT * FROM conductor WHERE numero_cedulaC = $idp";

        try {
            $ejecucion = mysqli_query($conexion, $consulta);
            include("vistas/conductores.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {

        $consulta = "SELECT * FROM conductor";

        try {
            $ejecucion = mysqli_query($conexion, $consulta);
            include("vistas/conductores.php");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

// Escoger la función según sea el caso
switch ($numero) {

    case 1:
        consultaVehiculos($conexion);
        break;
    case 2:
        consultarpropietarios($conexion, $numero);
        break;
    case 3:
        consultarInformeVehiculo($conexion);
        break;
    case 4:
        consultarconductores($conexion, $numero);
        break;
    case 5:
        consultarconductores($conexion, $numero);
        break;
    case 6:
        consultarpropietarios($conexion, $numero);
        break;
    default:
        echo "Opción no valida";
        break;
}
