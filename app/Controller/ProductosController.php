<?php 
	class ProductosController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Producto.categoria_id'=>'asc'
				)
		);	
		
		public function index(){
			$this->Producto->recursive = 0;

			$this->paginate['Producto']['limit']=10;
			$this->paginate['Producto']['order']=array('Producto.categoria_id'=>'asc');
			$this->paginate['Producto']['conditions']=array('Producto.estado'=>'a');

			$this->set('productos',$this->paginate());		
			
		}
		public function add(){
			if($this->request->is('post')){
				$ds = $this->Producto->getDataSource();
        		$ds->begin();
        		$this->Producto->create();
        		if($this->Producto->save($this->request->data)){
        			$ds->commit();
        			$this->Session->setFlash('Producto registrado correctamente!','default',array('class'=>'alert alert-success'));
        			return $this->redirect(array('action'=>'index'));
        		}
        		else{
        			$this->Session->setFlash('No se pudo registrar el producto!','default',array('class'=>'alert alert-danger'));
        		}
			}
			$categorias=$this->Producto->Categoria->find('list',array('fields'=>array('id','categoria'),'order'=>array('Categoria.id'=>'asc'),'conditions'=>array('Categoria.estado'=>'a')));
			//debug($departamentos);
			$this->set(compact('categorias'));
		}
		public function detail($id=null){
			$condiciones = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id,'Producto.estado'=>'a'));
			$producto=$this->Producto->find('first',$condiciones);
			if(!$producto){
				$this->Session->setFlash('No hay información sobre ésta búsqueda','default',array('class'=>'alert alert-warning'));
				return $this->redirect(array('action'=>'index'));
			}
			if(!$this->Producto->exists($id)){
				$this->Session->setFlash('El dato ingresado es incorrecto!','default',array('class'=>'alert alert-warning'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->set('producto',$producto);
		}
	}
?>