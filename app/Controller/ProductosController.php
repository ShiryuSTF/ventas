<?php 
	class ProductosController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Producto.descripcion'=>'asc'
				)
		);	
		
		public function index(){
			$this->Producto->recursive = 0;

			$this->paginate['Producto']['limit']=10;
			$this->paginate['Producto']['order']=array('Producto.descripcion'=>'asc');
			$this->paginate['Producto']['conditions']=array('Producto.estado'=>'a');

			$this->set('productos',$this->paginate());		
			
		}
	}
?>