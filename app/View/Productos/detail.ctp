<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"><strong><?php echo $producto['Producto']['descripcion']; ?></strong></h3>
    </div>
    <div class="panel-body">
        <strong>Precio: </strong><?php echo $producto['Producto']['precio']; ?>
        <hr>
        <strong>Stock: </strong><?php echo $producto['Producto']['stock']; ?>
        <hr>
        <strong>Categoria: </strong><?php echo $producto['Categoria']['categoria']; ?>
        <hr> 
        <strong>Fecha de Registro: </strong><?php echo $this->Time->format('d/m/Y',$producto['Producto']['created']); ?>
        <hr>
        <strong>Fecha de Actualización: </strong><?php echo $this->Time->format('d/m/Y',$producto['Producto']['modified']); ?>
        <hr>
    </div>
</div>