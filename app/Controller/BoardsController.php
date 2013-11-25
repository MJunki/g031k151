<?php
	class BoardsController extends AppController {
		public $name = 'Boards';
		public $uses = array('Board');
		public $components = array('DebugKit.Toolbar');
		public $layout = 'Board';

		public function index(){
			$this->set('data',$this->Board->find('all',array("order"=>"id DESC")));
		}
		public function input(){
		}
		public function updata(){
			if(!empty($this->request->pass)){
				$this->set("data",$this->Board->find("first",array("conditions"=>array("Board.id"=>$this->request->params["pass"][0]))));
			}
		}
		public function del(){
				$this->Board->del($this->request->params["pass"][0]);
				$this->redirect("index");
		}
		public function add_data(){
			$this->Board->add($this->request->data);
			$this->redirect("index");
		}
		public function edit_data(){
			$this->Board->edit($this->request->data);
			$this->redirect("index");
		}
	}
?>