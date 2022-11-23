<div class="divTbltitulos">
  <h2>Tabla de Propietarios</h2>
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
    while ($propietarios = mysqli_fetch_array($ejecucion)) {
    ?>
      <tr>
        <th scope="row"><?php echo $propietarios['numero_cedula']; ?></th>
        <td><?php echo $propietarios['nombres'] . ' ' . $propietarios['apellidos']; ?></td>
        <td><?php echo $propietarios['direccion']; ?></td>
        <td><?php echo $propietarios['telefono']; ?></td>
        <td><?php echo $propietarios['ciudad']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>