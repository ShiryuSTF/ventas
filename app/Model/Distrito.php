<?php 

class Distrito extends AppModel{

	public $hasMany=array(
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'distrito_id',					
					'depend'=>false
				)
			);
}

?>