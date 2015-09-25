<?php 
	$this->Paginator->options(array(
			'update'=>'#contenedor-productos',//actualizar tabla
			'before'=>$this->Js->get('#procesando')->effect('fadeIn',array('buffer'=>false)),//muestra una barra de progreso
			'complete'=>$this->Js->get('#procesando')->effect('fadeOut',array('buffer'=>false))//oculta la barra deprogreso
			)
	);
?>

<div id="contenedor-productos">

	<div class="progress oculto" id="procesando">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
		<span class="sr-only">100% Completo</span>
		</div>
	</div>

<table class="table table-hover">
	<th>Categoría</th>
	<th>Descripción</th>
	<th>Precio</th>
	<th>Stock</th>
	<th>Opciones</th>
	<?php
		foreach($productos as $producto):
	?>
	<tr>
		<td><?php echo $producto['Categoria']['categoria']; ?></td>
		<td><?php echo $producto['Producto']['descripcion']; ?></td>
		<td><?php echo $producto['Producto']['precio']; ?></td>
		<td><?php echo $producto['Producto']['stock']; ?></td>
		<td>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>  Ver',array('controller'=>'productos','action'=>'detail',$producto['Producto']['id']),array('class'=>'btn btn-primary',"escape" => false, "title" => "Ver Detalle", "rel" => "tooltip")); ?>
		</td>
	</tr>
	<?php
		endforeach;		
	?>  
</table>
<br>
<p>
	<?php
		echo $this->Paginator->counter(array(
			'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total.')
		));
	?>	
</p>
<div class="pagination">
	<li>
		<?php
			echo $this->Paginator->prev('< ' . __('Anterior'),array('tag'=>false),null ,array('class' => 'prev disabled'));
		?>
	</li>			
		<?php
			echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active'));
		?>			
	<li>
		<?php
			echo $this->Paginator->next(__('Siguiente') . ' >', array('tag'=>false), null, array('class' => 'next disabled'));	
		?>
	</li>								
</div>	
<?php echo $this->Js->writeBuffer();//barra  ?>
</div>