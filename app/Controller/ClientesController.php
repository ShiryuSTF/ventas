<?php 
	class ClientesController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Cliente.apellido'=>'asc'
				)
		);	
		
		public function index(){
			$this->Cliente->recursive = 0;

			$this->paginate['Cliente']['limit']=10;
			$this->paginate['Cliente']['order']=array('Cliente.apellido'=>'asc');
			$this->paginate['Cliente']['conditions']=array('Cliente.estado'=>'a');

			$this->set('clientes',$this->paginate());		
			
		}
		public function add(){
			if($this->request->is('post')){
				$ds = $this->Cliente->getDataSource();
        		$ds->begin();
        		$this->Cliente->create();
        		if($this->Cliente->save($this->request->data)){
        			$ds->commit();
        			$this->Session->setFlash('Cliente registrado correctamente!','default',array('class'=>'alert alert-success'));
        			return $this->redirect(array('action'=>'index'));
        		}
        		else{
        			$this->Session->setFlash('No se pudo registrar al cliente!','default',array('class'=>'alert alert-danger'));
        		}
			}
			//$parametros=array('order'=>array('Departamento.id'=>'asc'),'conditions'=>array('Departamento.estado'=>'a'));
			$departamentos=$this->Cliente->Departamento->find('all',array('order'=>array('Departamento.id'=>'asc'),'conditions'=>array('Departamento.estado'=>'a')));
			$provincias=$this->Cliente->Provincia->find('all',array('order'=>array('Provincia.id'=>'asc'),'conditions'=>array('Provincia.departamento_id'=>1,'Provincia.estado'=>'a')));
			$distritos=$this->Cliente->Distrito->find('all',array('order'=>array('Distrito.id'=>'asc'),'conditions'=>array('Distrito.provincia_id'=>1,'Distrito.estado'=>'a')));
			$this->set(compact('departamentos','provincias','distritos'));
		}
	}
?>