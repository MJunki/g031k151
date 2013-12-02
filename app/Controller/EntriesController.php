<?php
	 class EntriesController extends AppController {
	    public $name = "Entries";
	    public $uses = array('User');
	    public $components = array('DebugKit.Toolbar');
	    public $layout = 'bootstrap';
	 
	    function index(){
	        $this->set("data",$this->User->find('all'));
	    }
	 
	    function result(){
	        if(!empty($this->request->data['User'])){
	            $this->User->set($this->request->data);
	            if($this->User->validates()){
	                $this->User->save($this->request->data);
	            }else{
	                $this->render('index');
	            }
	        }
	    }
	 }
?>