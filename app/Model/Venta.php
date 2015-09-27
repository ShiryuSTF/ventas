<?php 

class Venta extends AppModel{

	public $belongsTo=array(	
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'cliente_id'
				)
			);
	public $hasMany=array(
				'Detalleventa'=>array(
					'className'=>'Detalleventa',
					'foreignKey'=>'venta_id',					
					'depend'=>false
				)
			);
}

?>