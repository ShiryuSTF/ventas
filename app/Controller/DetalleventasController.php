<?php 
	class DetalleventasController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Detalleventa.created'=>'desc'
				)
		);	
		
		public function index(){
			$this->Detalleventa->recursive = 0;

			$this->paginate['Detalleventa']['limit']=10;
			$this->paginate['Detallecompra']['order']=array('Detalleventa.created'=>'desc');
			$this->paginate['Detallecompra']['conditions']=array('Detalleventa.estado'=>'a');

			$this->set('detalleventas',$this->paginate());		
			
		}				
	}
?>