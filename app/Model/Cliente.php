<?php 
	
	class Cliente extends AppModel{

		public $virtualFields=array(
				'nombrecompleto'=>'CONCAT(Cliente.nombre," ",Cliente.apellido)'
				);
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
					'fechanacimiento'=>array(						
						'date'=>array(
							'rule'=>'date',
							'message'=>'La fecha es incorrecta.'
						)
					),					
					'domicilio'=>array(						
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						)
					)/*,
					'email'=>array(						
						'email'=>array(
							'rule'=>'email',
							'message'=>'El email es incorrecto.'
						)
					)*/
				);
		public $belongsTo=array(			
					'Departamento'=>array(
						'className'=>'Departamento',
						'foreignKey'=>'departamento_id'
					),
					'Provincia'=>array(
						'className'=>'Provincia',
						'foreignKey'=>'provincia_id'
					),
					'Distrito'=>array(
						'className'=>'Distrito',
						'foreignKey'=>'distrito_id'
					)
				);
		public $hasMany=array(
					'Venta'=>array(
						'className'=>'Venta',
						'foreignKey'=>'cliente_id',					
						'depend'=>false
					)
				);
	}
?>