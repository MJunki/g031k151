<?php
	class MushupsController extends AppController{
		public $name = "Mushups";
		public $components = array('DebugKit.Toolbar');
		public function index(){
			$result = $this->Mushup->api();
			$this->set("result",$result);
		}
	}
?>