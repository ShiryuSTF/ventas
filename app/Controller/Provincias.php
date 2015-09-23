<?php 
	class ProvinciasController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Provincia.id'=>'asc'
				)
		);	
		
		public function index(){
			$this->Provincia->recursive = 0;

			$this->paginate['Provincia']['limit']=10;
			$this->paginate['Provincia']['order']=array('Provincia.id'=>'asc');
			$this->paginate['Provincia']['conditions']=array('Provincia.estado'=>'a');

			$this->set('provincias',$this->paginate());		
			
		}
	}
?>