<?php 

class Categoria extends AppModel{

	public $hasMany=array(
				'Producto'=>array(
					'className'=>'Producto',
					'foreignKey'=>'categoria_id',					
					'depend'=>false
				)
			);
}

?>