<?php 

class Detallecompra extends AppModel{

	public $belongsTo=array(	
				'Cliente'=>array(
					'className'=>'Cliente',
					'foreignKey'=>'cliente_id'
				)		
				'Producto'=>array(
					'className'=>'Producto',
					'foreignKey'=>'producto_id'
				)
			);
}

?>