<?php
// Obtiene el número de la vista
$vistaA_mostrar = $_GET['numeroVista'];

// Alamaceno la ruta donde se encuentra la vista
$rutavistas = "vistas/";

// Valida qué vista es la que debe mostrar
if ($vistaA_mostrar == 2) vistapropietarios($rutavistas);
if ($vistaA_mostrar == 4) vistaconductores($rutavistas);
if ($vistaA_mostrar == 1) vistavehiculos($rutavistas);
if ($vistaA_mostrar == 3) vistainforme($rutavistas);
if ($vistaA_mostrar == 5) vistaconductores($rutavistas);
if ($vistaA_mostrar == 6) vistapropietarios($rutavistas);

// Funciones que llamaran a los archivos encargados de la consulta y de mostrar la vista
function vistavehiculos($rutavistas)
{
    try{
        require_once('php/consultas.php');
    }catch (Exception $e) {
        $e->getMessage();
    }

}

function vistapropietarios($rutavistas)
{
    try {
        require_once('php/consultas.php');

    } catch (Exception $e) {
        $e->getMessage();
    }
}

function vistaconductores($rutavistas)
{
    try {
        require_once('php/consultas.php');

    } catch (Exception $e) {
        $e->getMessage();
    }
}

function vistainforme($rutavistas)
{
    try{
        require_once('php/consultas.php');
    }catch (Exception $e) {
        $e->getMessage();
    }
}

function vistapersona($rutavistas)
{
    try {
        require_once('php/consultas.php');

    } catch (Exception $e) {
        $e->getMessage();
    }
}
