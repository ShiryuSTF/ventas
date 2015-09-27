<?php 
	class VentasController extends AppController{
		public $paginate =array(
			'limit'=>10,
			'order'=>array(
				'Venta.created'=>'desc'
				)
		);	
		
		public function index(){
			$this->Venta->recursive = 0;

			$this->paginate['Venta']['limit']=10;
			$this->paginate['Venta']['order']=array('Venta.created'=>'desc');
			$this->paginate['Venta']['conditions']=array('Venta.estado'=>'a');

			$this->set('ventas',$this->paginate());		
			
		}
		public function buy(){

		}
		public function ajaxbuscadni(){			
			if($this->request->is('ajax')){
				$exito=true;		
				$dni=$this->request->data['dni'];
				$condiciones = array('conditions' => array('Cliente.dni'=>$dni));
				$cliente=$this->Venta->Cliente->find('first',$condiciones);
				if(!$cliente){
					$exito=false;					
				}else{
					$idcliente=$cliente['Cliente']['id'];
					$nombre=$cliente['Cliente']['nombrecompleto'];
				}
			}			
			echo json_encode(compact('dni','nombre','idcliente','exito'));
			$this->autoRender=false;
		}
	}
?>