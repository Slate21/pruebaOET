<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('php/DB.php');
    ob_start();
    if (!isset($_GET['numeroVista']) || !isset($_GET['c']) || !isset($_GET['aviso'])) header('location: index.php?numeroVista=1&aviso=0&c=');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Vehiculos</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="Css/estilos.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="nav navCss">
        <h2>ACME S.A</h2>
        <a class="nav-link" href="index.php?numeroVista=1&aviso=0&c=">Lista de Vehiculos</a>
        <a class="nav-link" href="index.php?numeroVista=2&aviso=0&c=">Lista de Propietarios</a>
        <a class="nav-link" href="index.php?numeroVista=4&aviso=0&c=">Lista de Conductores</a>
    </nav>
    <!-- Contenedor principal -->
    <main class="main_index">
        <div class="divRegistrarDatos">
            <h1>Registro de datos</h1>

            <button class="btn btn-light btnCss" id="btnVehiculos">Vehiculos</button>
            <button class="btn btn-light btnCss" id="btnConPro">Conductores o Propietario</button><br>

            <small>Para cerrar el formulario nuevamente, darle clic encima del boton del formulario que esté abierto</small><br>

            <!-- Aviso si no se encuentra el usuario, si el usuario ya está en la base de datos, o si la placa ya está registrada -->
            <small style="color: red;">
                <?php

                if ($_GET['aviso'] == 1) {

                    echo 'No se ha encontrado un usuario con la cedula introducida. Cedula: ' . $_GET['c'] .
                        '<br> Por favor, verifica que la cedula pertenezca a un propietario/conductor, o si esta existe';

                } elseif ($_GET['aviso'] == 2) {

                    echo 'La persona que está intentando registrar ya existe';

                } elseif ($_GET['aviso'] == 3) {

                    echo 'La placa ' . $_GET['c'] . ' ya existe';

                }
                
                ?>
            </small>
        </div>

        <!-- Formularios de ingreso de datos, aparecen o desaparecen según el boton que se seleccione -->
        <!-- Formulario de Registro de Vehiculos -->
        <div class="divFormulario" id="div_reguistrarVehiculo">
            <h2>Registrar vehiculo</h2>
            <hr>
            <form action="php/registro_datos.php" method="post" id="form_vehiculos">

                <!-- Input determina si se registra un vehiculo o una persona -->
                <input type="text" style="display: none;" value="1" name="action">

                <div class="form-group">
                    <label for="Placa">
                        <h4>Placa</h4>
                    </label>
                    <input type="text" class="form-control" id="Placa" name="Placa" placeholder="Ingresa la placa del vehiculo">
                </div>

                <div class="form-group">
                    <label for="color">
                        <h4>Color</h4>
                    </label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="Ingresa el color del vehiculo">
                </div>

                <label for="selectTipoV">
                    <h4>Selecciona el Tipo de Vehiculo</h4>
                </label>
                <select class="form-control" id="selectTipoV" name="selectTipoV" required>
                    <option value="1" selected>Particular</option>
                    <option value="2">Publico</option>
                </select>

                <label for="selectTipoM">
                    <h4>Selecciona la marca</h4>
                </label>
                <select class="form-control" id="selectTipoM" name="marca" required>
                    <?php

                    //    Consulta para imprimir la lista de marcas
                    $consulta = "SELECT * FROM marca";
                    $ejecutar = mysqli_query($conexion, $consulta);

                    // Imprimir resultado de la consulta
                    while ($data = mysqli_fetch_array($ejecutar)) {

                    ?>

                        <option value="<?php echo $data['id_marca'] ?>"><?php echo $data['nombre_marca'] ?></option>

                    <?php } ?>
                </select>

                <div class="form-group">
                    <label for="CC_Conductor">
                        <h4>Ingresa la cedula del conductor</h4>
                    </label>
                    <input type="number" class="form-control" id="CC_Conductor" name="CC_Conductor" placeholder="Cedula...">
                </div>

                <div class="form-group">
                    <label for="CC_propietario">
                        <h4>Ingresa la cedula del propietario</h4>
                    </label>
                    <input type="number" class="form-control" id="CC_propietario" name="CC_propietario" placeholder="Cedula...">
                </div>
                <br>
                <button type="submit" id="registrar_vehiculo" class="btn btn-primary btnregistrarCss">Registrar</button>

            </form>

        </div>

        <!-- Formulario de Registro de Conductores y propietarios -->
        <div class="divFormulario" id="div_reguistrarPersona">
            <h2>Registrar Persona</h2>
            <hr>
            <form action="php/registro_datos.php" method="post" id="form_persona">

                <!-- Input determina si se registra un vehiculo o una persona -->
                <input type="text" style="display: none;" value="2" name="action">

                <div class="form-group">
                    <label for="CC_Persona">
                        <h4>Cedula de la persona</h4>
                    </label>
                    <input type="number" class="form-control" name="CC_Persona" id="CC_Persona" placeholder="cedula">
                </div>

                <div class="form-group">
                    <label for="name_persona">
                        <h4>Nombre de la persona</h4>
                    </label>
                    <input type="text" class="form-control" id="name_persona" name="name_persona" placeholder="Ingresa el Nombre">
                </div>

                <div class="form-group">
                    <label for="lastname_persona">
                        <h4>Apellido de la persona</h4>
                    </label>
                    <input type="text" class="form-control" id="lastname_persona" name="lastname_persona" placeholder="Ingresa el Apellido">
                </div>

                <div class="form-group">
                    <label for="location_persona">
                        <h4>Direccion</h4>
                    </label>
                    <input type="text" class="form-control" id="location_persona" name="location_persona" placeholder="Ingresa la direccion">
                </div>

                <div class="form-group">
                    <label for="city">
                        <h4>Ingrese la Ciudad</h4>
                    </label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ciudad">
                </div>

                <div class="form-group">
                    <label for="numberP">
                        <h4>Ingrese el número de contacto</h4>
                    </label>
                    <input type="number" class="form-control" id="numberP" name="numberP" placeholder="Número de contacto">
                </div>

                <label for="selectTipoP">
                    <h4>
                        <h4>Tipo de Persona</h4>
                </label>
                <select class="form-control" id="selectTipoP" name="selectTipoP">
                    <option value="1" selected>Propietario</option>
                    <option value="2">Conductor</option>
                </select>
                <br>
                <button type="submit" class="btn btn-primary btnregistrarCss">Registrar</button>

            </form>

        </div>

        <section class="secTabla">
            <?php
            require("php/controladorVista.php"); 
            ?>
        </section>
    </main>
    <script src="JS/validacion_formulario.js" defer></script>
</body>

</html>