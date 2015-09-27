<?php 
	
	class Producto extends AppModel{
	
		public $validate=array(
					'descripcion'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						)
					),
					'precio'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo es obligatorio.'
						),
						'numeric'=>array(
							'rule'=>'numeric',
							'message'=>'Solo se permiten números'
						),
						'mayor' => array(
							'rule' => array('comparison', '>=', 0),
							'message' => 'El precio debe ser mayor que 0'
						)
					),
					'stock'=>array(
						'notEmpty'=>array(
							'rule'=>'notEmpty',
							'message'=>'Este campo no puede estar vacio.'
						),
						'numeric'=>array(
							'rule'=>'numeric',
							'message'=>'Solo se permiten números'
						),
						'mayor' => array(
							'rule' => array('comparison', '>=', 0),
							'message' => 'El stock no puede ser negativo'
						)
					)
				);
		public $belongsTo=array(			
					'Categoria'=>array(
						'className'=>'Categoria',
						'foreignKey'=>'categoria_id'
					)
				);
		public $hasMany=array(
					'Detalleventa'=>array(
						'className'=>'Detalleventa',
						'foreignKey'=>'producto_id',					
						'depend'=>false
					)
				);
	}
?>