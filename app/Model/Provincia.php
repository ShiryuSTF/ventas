<?php 

class Provincia extends AppModel{

	public $hasMany=array(
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'provincia_id',					
					'depend'=>false
				)
			);
}

?>