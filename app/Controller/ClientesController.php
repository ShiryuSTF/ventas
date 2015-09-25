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
			$departamentos=$this->Cliente->Departamento->find('list',array('fields'=>array('id','departamento'),'order'=>array('Departamento.id'=>'asc'),'conditions'=>array('Departamento.estado'=>'a')));
			$provincias=$this->Cliente->Provincia->find('list',array('fields'=>array('id','provincia'),'order'=>array('Provincia.id'=>'asc'),'conditions'=>array('Provincia.departamento_id'=>0,'Provincia.estado'=>'a')));
			$distritos=$this->Cliente->Distrito->find('list',array('fields'=>array('id','distrito'),'order'=>array('Distrito.id'=>'asc'),'conditions'=>array('Distrito.provincia_id'=>0,'Distrito.estado'=>'a')));
			//debug($departamentos);
			$this->set(compact('departamentos','provincias','distritos'));
		}
		public function detail($id=null){
			$condiciones = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id,'Cliente.estado'=>'a'));
			$cliente=$this->Cliente->find('first',$condiciones);
			if(!$cliente){
				$this->Session->setFlash('No hay información sobre ésta búsqueda','default',array('class'=>'alert alert-warning'));
				return $this->redirect(array('action'=>'index'));
			}
			if(!$this->Cliente->exists($id)){
				$this->Session->setFlash('El dato ingresado es incorrecto!','default',array('class'=>'alert alert-warning'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->set('cliente',$cliente);
		}
		public function ajaxprovincias(){
			if($this->request->is('ajax')){				
				$contenido='';
				$id=$this->request->data['depa'];
				$provincias=$this->Cliente->Provincia->find('all',array('fields'=>array('id','provincia'),'order'=>array('Provincia.id'=>'asc'),'conditions'=>array('Provincia.departamento_id'=>$id,'Provincia.estado'=>'a')));				
				foreach($provincias as $provincia){
					$valor=$provincia['Provincia']['id'];
					$texto=$provincia['Provincia']['provincia'];
					$contenido=$contenido.'<option value="'.$valor.'">'.$texto.'</option>';										
				}
			}			
			echo json_encode(compact('contenido'));
			$this->autoRender=false;
		}		
		public function ajaxdistritos(){
			if($this->request->is('ajax')){
				$contenido='';
				$id=$this->request->data['prov'];
				$distritos=$this->Cliente->Distrito->find('all',array('fields'=>array('id','distrito'),'order'=>array('Distrito.id'=>'asc'),'conditions'=>array('Distrito.provincia_id'=>$id,'Distrito.estado'=>'a')));				
				foreach($distritos as $distrito){
					$valor=$distrito['Distrito']['id'];
					$texto=$distrito['Distrito']['distrito'];
					$contenido=$contenido.'<option value="'.$valor.'">'.$texto.'</option>';										
				}
			}			
			echo json_encode(compact('contenido'));
			$this->autoRender=false;
		}
	}
?>