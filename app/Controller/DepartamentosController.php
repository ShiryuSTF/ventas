<?php 
	class DepartamentosController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Departamento.id'=>'asc'
				)
		);	
		
		public function index(){
			$this->Departamento->recursive = 0;

			$this->paginate['Departamento']['limit']=10;
			$this->paginate['Departamento']['order']=array('Departamento.id'=>'asc');
			$this->paginate['Departamento']['conditions']=array('Departamento.estado'=>'a');

			$this->set('departamentos',$this->paginate());		
			
		}
	}
?>