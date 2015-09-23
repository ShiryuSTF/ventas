<?php 
	class DistritosController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Distrito.id'=>'asc'
				)
		);	
		
		public function index(){
			$this->Distrito->recursive = 0;

			$this->paginate['Distrito']['limit']=10;
			$this->paginate['Distrito']['order']=array('Distrito.id'=>'asc');
			$this->paginate['Distrito']['conditions']=array('Distrito.estado'=>'a');

			$this->set('distritos',$this->paginate());		
			
		}
	}
?>