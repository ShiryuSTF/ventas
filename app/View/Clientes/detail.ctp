<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?php echo $cliente['Cliente']['nombrecompleto']; ?></strong></h3>
    </div>
    <div class="panel-body">
        <strong>DNI: </strong><?php echo $cliente['Cliente']['dni']; ?>
        <hr>
        <strong>Teléfono: </strong><?php echo $cliente['Cliente']['telefono']; ?>
        <hr>
        <strong>Fecha de Nacimiento: </strong><?php echo $this->Time->format('d/m/Y',$cliente['Cliente']['fechanacimiento']); ?>
        <hr>
        <strong>E-mail: </strong><?php echo $cliente['Cliente']['email']; ?>
        <hr>
        <strong>Dirección: </strong><?php echo $cliente['Cliente']['domicilio']; ?>
        <hr>
        <strong>Departamento de: </strong><?php echo $cliente['Departamento']['departamento'].' - '; ?>
        <strong>Provincia de: </strong><?php echo $cliente['Provincia']['provincia'].' - '; ?>
        <strong>Distrito de: </strong><?php echo $cliente['Distrito']['distrito']; ?>
        <hr>
        <strong>Fecha de Registro: </strong><?php echo $this->Time->format('d/m/Y',$cliente['Cliente']['created']); ?>
        <hr>
        <strong>Fecha de Actualización: </strong><?php echo $this->Time->format('d/m/Y',$cliente['Cliente']['modified']); ?>
        <hr>
    </div>
</div>