<div class="divTbltitulos">
  <h2>Tabla de vehiculos</h2>
  <small>Si se desea ver los detalles de la persona, hacer clic encima de ella.</small>
</div>
<!-- Imprimer los datos que se encuentren en la base de datos vehiculo
     Las variables se obtienen por medio de un modelo que es llamado en el controlador -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipo</th>
      <th scope="col">Propietario</th>
      <th scope="col">Conductor</th>
      <th scope="col">Placa</th>
      <th scope="col">Color</th>
      <th scope="col">Marca</th>
      <th scope="col">Informe</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($vehiculos = mysqli_fetch_array($ejecucion)) {
    ?>
      <tr>
        <th scope="row"><?php echo $vehiculos['idv']; ?></th>
        <td><?php echo $vehiculos['tipo_vehiculo']; ?></td>
        <td><a href="index.php?numeroVista=6&aviso=0&c=&idp=<?php echo $vehiculos['propietario_cedula']; ?>"><?php echo $vehiculos['propietario_nombre'] . ' ' . $vehiculos['propietario_apellido']; ?></a></td>
        <td><a href="index.php?numeroVista=5&aviso=0&c=&idp=<?php echo $vehiculos['conductor_cedula']; ?>"><?php echo $vehiculos['nombre_conductor'] . ' ' . $vehiculos['apellido_conductor']; ?></a></td>
        <td><?php echo $vehiculos['placa']; ?></td>
        <td><?php echo $vehiculos['color']; ?></td>
        <td><?php echo $vehiculos['nombre_marca']; ?></td>
        <td><a href="index.php?numeroVista=3&aviso=0&c=&idV=<?php echo $vehiculos['idv']; ?>">Informe</a></td>
      </tr>
    <?php } ?>
  </tbody>
</table>