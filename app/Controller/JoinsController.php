<?php
	class JoinsController extends AppController{
		public $name = "Joins";
		public $components = array('DebugKit.Toolbar');
		public function index(){
		}
		public function show(){
			$result = $this->Join->kakou($this->request->data);
			$this->set("result",$result);
		}
		public function input(){
		}
	}
?>