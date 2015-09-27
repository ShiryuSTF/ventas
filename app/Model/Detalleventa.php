<?php 

class Detalleventa extends AppModel{

	public $belongsTo=array(	
				'Venta'=>array(
					'className'=>'Venta',
					'foreignKey'=>'venta_id'
				),	
				'Producto'=>array(
					'className'=>'Producto',
					'foreignKey'=>'producto_id'
				)
			);
}

?>