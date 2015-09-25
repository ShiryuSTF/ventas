<?php 

class Departamento extends AppModel{

	public $hasMany=array(
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'departamento_id',					
					'depend'=>false
				)
			);
}

?>