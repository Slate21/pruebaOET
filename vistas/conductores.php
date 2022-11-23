<div class="divTbltitulos">
  <h2>Tabla de Conductores</h2>
</div>
<!-- Imprimer los datos que se encuentren en la base de datos vehiculo
     Las variables se obtienen por medio de un modelo que es llamado en el controlador -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Nombre Completo</th>
      <th scope="col">Direccion</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ciudad</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($conductores = mysqli_fetch_array($ejecucion)) {
    ?>
      <tr>
        <th scope="row"><?php echo $conductores['numero_cedulaC']; ?></th>
        <td><?php echo $conductores['nombres'] . ' ' . $conductores['apellidos']; ?></td>
        <td><?php echo $conductores['direccion']; ?></td>
        <td><?php echo $conductores['telefono']; ?></td>
        <td><?php echo $conductores['ciudad']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>