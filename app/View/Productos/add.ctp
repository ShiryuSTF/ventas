<h2>Agregar Producto</h2><?php //el novalidate es para que valide directamente por lo especificado en el modelo ?>
<?php echo $this->Form->create('Producto', array('role' => 'form','novalidate'=>'novalidate','class'=>'col-sm-10')); ?>

<div class="form-group col-sm-7">
	<?php echo $this->Form->input('descripcion',array('label'=>'Descripción','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-7">
	<?php echo $this->Form->input('precio',array('label'=>'Precio','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-7">
	<?php echo $this->Form->input('stock',array('label'=>'Stock','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-7">
	<?php echo $this->Form->input('categoria_id', array('class' => 'form-control', 'label' => 'Categorias', 'type' => 'select')); ?>
</div>

<div class="col-sm-10">
	<?php echo $this->Form->button('Guardar Registro',array('class'=>'btn btn-primary'));?>
</div>
<?php echo $this->Form->end();?>