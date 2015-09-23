<?php 
	
	class Producto extends AppModel{
	
		public $validate=array(
					'nombre'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						)
					),
					'apellido'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						)
					),
					'dni'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						),
						'unique'=>array(
							'rule'=>'isUnique',
							'message'=>'El DNI ya esta registrado.'				
						),
						'minLength'=>array(
							'rule' => array('minLength', '8'),
			            	'message' => 'El DNI es incorrecto'
						),
						'maxLength'=>array(
							'rule' => array('maxLength', '8'),
			            	'message' => 'El DNI es incorrecto.'
						)
					),
					'telefono'=>array(//^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$
						'notEmpty'=>array(
							'rule'=>array('custom','^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$'),
							'message'=>'El teléfono es incorrecto.'
						)
					),
					'fechanacimiento'=>array(						
						'date'=>array(
							'rule'=>'date',
							'message'=>'La fecha es incorrecta.'
						)
					),
					'email'=>array(						
						'email'=>array(
							'rule'=>'email',
							'message'=>'El email es incorrecto.'
						)
					),
				);
		public $belongsTo=array(			
					'Categoria'=>array(
						'className'=>'Categoria',
						'foreignKey'=>'categoria_id'
					)
				);
		public $hasMany=array(
					'Detallecompra'=>array(
						'className'=>'Detallecompra',
						'foreignKey'=>'producto_id',					
						'depend'=>false
					)
				);
	}
?>