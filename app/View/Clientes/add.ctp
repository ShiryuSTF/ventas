<?php 
	$hoy=date("Y-m-d");
?>

<h2>Agregar Cliente</h2><?php //el novalidate es para que valide directamente por lo especificado en el modelo ?>
<?php echo $this->Form->create('Cliente', array('role' => 'form','novalidate'=>'novalidate','class'=>'col-sm-10')); ?>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('nombre',array('label'=>'Nombres','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('apellido',array('label'=>'Apellidos','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('dni',array('label'=>'DNI','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('telefono',array('label'=>'Teléfono','class'=>'form-control'));?>	
</div>

<div class="form-group col-sm-5"><?php //'min'=>'1996-12-31' con esto en el input se especifica la fecha minima ?>
	<label for="ClienteFechanacimiento">Fecha de Nacimiento</label>
	<?php echo $this->Form->date('fechanacimiento',array('class'=>'form-control','value'=>$hoy));?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('email',array('label'=>'E-mail','class'=>'form-control'));?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('departamento_id', array('class' => 'form-control', 'label' => 'Departamento', 'type' => 'select')); ?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('provincia_id', array('class' => 'form-control', 'label' => 'Provincia', 'type' => 'select')); ?>
</div>

<div class="form-group col-sm-5">
	<?php echo $this->Form->input('distrito_id', array('class' => 'form-control', 'label' => 'Distrito', 'type' => 'select')); ?>
</div>

<div class="form-group col-sm-5">
	<label id="msgerror"></label>
</div>

<div class="form-group col-sm-10">
	<?php echo $this->Form->input('domicilio', array('label'=>'Dirección','class' => 'form-control')); ?>
</div>

<div class="col-sm-10">
	<?php echo $this->Form->button('Guardar Registro',array('class'=>'btn btn-primary'));?>
</div>
<?php echo $this->Form->end();//finaliza el formulario con un boton?>

<script>

    $(document).on('ready',function(){

		var depa=$('#ClienteDepartamentoId').val();
		var prov=0;
		ajaxdepa(depa);			

        $('#ClienteDepartamentoId').on('keyup change',function(event){
			depa=$(this).val();
			
			ajaxdepa(depa);
		});

        function ajaxdepa(depa){
			$.ajax({
				type:'POST',
				url:basePath+'clientes/ajaxprovincias',
				data:{					
					depa:depa
				},
				dataType:'json',
				success: function(data){
					$('#ClienteProvinciaId').html('');					
					$('#ClienteProvinciaId').append(data.contenido);

					var prov=$('#ClienteProvinciaId').val();
					ajaxprov(prov);
				},
				error:function(){
					$('#msgerror').html('Error con ajax Provincias');
				}
			});
		};		

		$('#ClienteProvinciaId').on('keyup change',function(event){
			prov=$(this).val();
			
			ajaxprov(prov);
		});

        function ajaxprov(prov){
			$.ajax({
				type:'POST',
				url:basePath+'clientes/ajaxdistritos',
				data:{					
					prov:prov
				},
				dataType:'json',
				success: function(data){
					$('#ClienteDistritoId').html('');					
					$('#ClienteDistritoId').append(data.contenido);
				},
				error:function(){
					$('#msgerror').html('Error con ajax Distritos');
				}
			});
		};

    });

</script>
