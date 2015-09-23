<?php 

class Distrito extends AppModel{

	public $hasMany=array(
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'cliente_id',					
					'depend'=>false
				)
			);
}

?>