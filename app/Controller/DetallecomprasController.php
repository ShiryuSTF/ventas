<?php 
	class DetallecomprasController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Detallecompra.created'=>'desc'
				)
		);	
		
		public function index(){
			$this->Detallecompra->recursive = 0;

			$this->paginate['Detallecompra']['limit']=10;
			$this->paginate['Detallecompra']['order']=array('Detallecompra.created'=>'desc');
			$this->paginate['Detallecompra']['conditions']=array('Detallecompra.estado'=>'a');

			$this->set('detallecompras',$this->paginate());		
			
		}
	}
?>