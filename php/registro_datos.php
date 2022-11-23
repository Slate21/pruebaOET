<?php
//Llamamos a la base de datos
include("DB.php");

//Obtener Accion a realizar
$action = $_POST['action'];

//validar cual de los dos formulario se envió

if ($action == 1) {

    try {

        //Obtener los datos de vehiculo POST
        $placa = mysqli_real_escape_string($conexion, $_POST['Placa']);
        $color = mysqli_real_escape_string($conexion, $_POST['color']);
        $marca = mysqli_real_escape_string($conexion, $_POST['marca']);
        $cedula_conductor = mysqli_real_escape_string($conexion, $_POST['CC_Conductor']);
        $cedula_propietario = mysqli_real_escape_string($conexion, $_POST['CC_propietario']);
        $tipo_de_vehiculo = mysqli_real_escape_string($conexion, $_POST['selectTipoV']);

        echo $placa . $color . $cedula_conductor . $cedula_propietario . $tipo_de_vehiculo;

        // Consultando si la cedula del conductor se encuentra en la base de datos
        $busqueda_conductor = "SELECT nombres FROM conductor WHERE numero_cedulaC = $cedula_conductor";
        $ejecutar = mysqli_query($conexion, $busqueda_conductor);

        // Contamos el número de filas para comprobar la existencia del conductor
        $resultado = mysqli_num_rows($ejecutar);

        if (!$resultado) header('location: ../index.php?numeroVista=1&aviso=1&c=' . $cedula_conductor);


        // Consultando si la cedula del propietario se encuentra en la base de datos
        $busqueda_propietario = "SELECT nombres FROM propietario WHERE numero_cedula = $cedula_propietario";
        $ejecutar = mysqli_query($conexion, $busqueda_propietario);

        // Contamos el número de filas para comprobar la existencia del propietario
        $resultado = mysqli_num_rows($ejecutar);

        if (!$resultado) header('location: ../index.php?numeroVista=1&aviso=1&c=' . $cedula_propietario);

        //Consultando si hay otro vehiculo con esa placa

        $busqueda_propietario = "SELECT placa FROM vehiculo WHERE placa = '$placa'";
        $ejecutar = mysqli_query($conexion, $busqueda_propietario);

        // Contamos el número de filas para comprobar la existencia de la placa
        $resultado = mysqli_num_rows($ejecutar);

        if ($resultado){ 
            header('location: ../index.php?numeroVista=1&aviso=3&c=' . $placa);
            return false;
        }

        // Se insertan los datos a la base de datos
        $query = "INSERT INTO vehiculo VALUES('',$tipo_de_vehiculo,$cedula_propietario,$cedula_conductor,'$placa','$color',$marca)";
        $ejecutar = mysqli_query($conexion, $query);
        header('location: ../index.php?numeroVista=1&aviso=0&c=');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
} else {

    //Obtener los datos de persona por POST
    $cedula_persona = mysqli_real_escape_string($conexion, $_POST['CC_Persona']);
    $nombre_persona = mysqli_real_escape_string($conexion, $_POST['name_persona']);
    $apellido_persona = mysqli_real_escape_string($conexion, $_POST['lastname_persona']);
    $direccion_persona = mysqli_real_escape_string($conexion, $_POST['location_persona']);
    $numero_persona = mysqli_real_escape_string($conexion, $_POST['numberP']);
    $tipo_persona = mysqli_real_escape_string($conexion, $_POST['selectTipoP']);
    $ciudad = mysqli_real_escape_string($conexion, $_POST['city']);

    // Funcion para ingresar el propietario
    function ingresarPropietario($conexion, $cedula_persona, $nombre_persona, $apellido_persona, $direccion_persona, $numero_persona, $ciudad)
    {

        // Comprobando que el usuario no exista en la tabla
        $busqueda_persona = "SELECT nombres FROM propietario WHERE numero_cedula = $cedula_persona";
        $ejecutar = mysqli_query($conexion, $busqueda_persona);

        $resultado = mysqli_num_rows($ejecutar);

        if ($resultado) header('location: ../index.php?numeroVista=1&aviso=2&c=' . $cedula_persona);

        try {

            // Realizando inserción a la base de datos
            $query = "INSERT INTO propietario VALUES($cedula_persona,'$nombre_persona','$apellido_persona', '$direccion_persona', $numero_persona, '$ciudad')";
            $ejecucion = mysqli_query($conexion, $query);

            header('location: ../index.php?numeroVista=1&c=');
        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }

    // Funcion para ingresar el propietario
    function ingresarConductor($conexion, $cedula_persona, $nombre_persona, $apellido_persona, $direccion_persona, $numero_persona, $ciudad)
    {

        // Comprobando que el usuario no exista en la tabla
        $busqueda_persona = "SELECT nombres FROM conductor WHERE numero_cedulaC = $cedula_persona";
        $ejecutar = mysqli_query($conexion, $busqueda_persona);

        $resultado = mysqli_num_rows($ejecutar);

        if ($resultado) header('location: ../index.php?numeroVista=1&aviso=2&c=' . $cedula_persona);

        try {

            // Realizando inserción a la base de datos
            $query = "INSERT INTO conductor VALUES($cedula_persona,'$nombre_persona','$apellido_persona', '$direccion_persona', $numero_persona, '$ciudad')";
            echo $query;
            $ejecucion = mysqli_query($conexion, $query);

            header('location: ../index.php?numeroVista=1&c=');
        } catch (Exception $e) {

            echo $e->getMessage();
        }

        echo $ciudad;
    }

    // Validación para diferenciar si se ingresa un conductor o un propietario
    switch ($tipo_persona) {
        case 1:
            ingresarPropietario($conexion, $cedula_persona, $nombre_persona, $apellido_persona, $direccion_persona, $numero_persona, $ciudad);
            break;
        case 2:
            ingresarConductor($conexion, $cedula_persona, $nombre_persona, $apellido_persona, $direccion_persona, $numero_persona, $ciudad);
            break;
        default:
            echo "Opcion Invalida";
            break;
    }
}
