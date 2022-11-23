<div class="divTbltitulos">
    <h2>Informe Vehiculo</h2>
</div>

<section class="secinforme">
    <!-- Obteniendo los daots para imprimirlos en el informe -->
    <?php $data = mysqli_fetch_array($ejecucion) ?>

    <div>
        <div class="divsubtitulo">
            <b>Placa del Vehiculo: </b>
            <?php echo $data['placa'] ?>
        </div>
        <div class="divsubtitulo">
            <b>Marca: </b>
            <?php echo $data['marca'] ?>
        </div>
    </div>

    <div>
        <div class="divsubtitulo">
            <b>Nombre Completo Propietario: </b><br>
            <?php echo $data['nombre_propietario'] . ' ' . $data['apllido_propietario']; ?>
        </div>
        <div class="divsubtitulo">
            <b>Nombre Completo Conductor: </b><br>
            <?php echo $data['nombre_conductor'] . ' ' . $data['apellido_conductor'];  ?>
        </div>
    </div>

</section>