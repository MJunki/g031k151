<?php
	class BoardsController extends AppController {
		public $name = 'Boards';
		public $uses = array('Board','User');
		public $layout = 'Board';
		public $components = array(
		            'DebugKit.Toolbar', 
		            'Auth' => array( 
		                'authenticate' => array(
		                    'Form' => array(
		                        'userModel' => 'User',
		                        'fields' => array('username' => 'name','password' => 'password')
		                    )
		                ),
		                'loginRedirect' => array('controller' => 'boards', 'action' => 'index'),
		                'logoutRedirect' => array('controller' => 'boards', 'action' => 'login'),
		                'loginAction' => array('controller' => 'boards', 'action' => 'login'),
		                'authError' => 'あなたのお名前とパスワードを入力して下さい。',
		            )
		        );
		public function beforeFilter(){
             $this->Auth->allow('login'/*,'logout'*/,'useradd');
             $this->set('user',$this->Auth->user()); 
        }
		public function index(){
			if(!isset($this->request->data['board'])){
				$this->set('data',$this->Board->find('all',array("order"=>"Board.id DESC")));
			}else{
				$this->set('data',$this->Board->find('all',array(
                	'conditions' => array('Board.comment like' => "%".$this->request->data['board']['word']."%"),
                	'order'=>'Board.id '.$this->request->data['board']['sort'],
                	'limit'=>$this->request->data['board']['case']
                )));
			}
		}
		public function input(){
			if(isset($this->request->params["pass"][0])){
				$this->set('user_id',$this->request->params["pass"][0]);
			}
			if(isset($this->request->data["board"]["comment"])){
				$this->set("data_input",$this->request->data["board"]["comment"]);
				$this->set('data_id',$this->request->data["board"]["id"]);
			}
			
		}
		public function updata(){
			if(isset($this->request->params["pass"][0])){
				$this->set('data',$this->Board->find("first",array("conditions"=>array("Board.id"=>$this->request->params["pass"][0]))));
			}
			if(isset($this->request->data["board"]["comment"])){
				$this->set('data_updata',$this->request->data["board"]["comment"]);
				$this->set('data_id',$this->request->data["board"]["id"]);
			}
		}
		public function del(){
				$this->Board->delete($this->request->params["pass"][0]);
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
		public function login(){
			$h=$this->Session->read('logon');
			if(isset($h)){
        		$this->redirect(array('action' => 'index'));
        	}
            if($this->request->is('post')){
                if($this->Auth->login()){
                    $this->Session->delete('Auth.redirect');
                    $this->Session->write('logon','on');
                    return $this->redirect($this->Auth->redirect());
                }else{
                    $this->Session->setFlash(__('ユーザ名かパスワードが違います'), 'default', array(), 'auth');
                }
            }
        }
 
        public function logout(){
            $this->Auth->logout();
            $this->Session->destroy();
            $this->Session->setFlash(__('ログアウトしました'));
            $this->redirect(array('action' => 'login'));
        }
 
        public function useradd(){
        	$h=$this->Session->read('logon');
			if(isset($h)){
        		$this->redirect(array('action' => 'index'));
        	}
            if($this->request->is('post')) {
                if($this->request->data['User']['pass_check'] == $this->request->data['User']['password']){   
                	$this->User->set($this->request->data);
                    if(!$this->User->findByName($this->request->data['User']['name'])){
                    	if($this->User->validates()){
                    		$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
               				$this->request->data['User']['pass_check'] = AuthComponent::password($this->request->data['User']['pass_check']);
               				$this->User->create();
                			$mse = ($this->User->save($this->request->data))? '新規ユーザーを追加しました' : 'ユーザ名がおかしいです。パスワードも入力しなおしてください。';
                		}
               	 	}else{
            			$mse ='その名前は既に使用されています';
            		}
            	}else{
                	$this->Session->setFlash(__('パスワード確認の値が一致しません．'));
           		}
                if(isset($mse)){
                	$this->Session->setFlash(__($mse));
	                if($mse=="ユーザ名がおかしいです。パスワードも入力しなおしてください。"){  
	                	//$this->redirect(array('action' => 'useradd'));
	            	}elseif($mse=='新規ユーザーを追加しました'){
	            		$this->redirect(array('action' => 'login'));
	            	}elseif($mse ='その名前は既に使用されています'){
	            		//$this->redirect(array('action' => 'useradd'));
	            	}
           		}
            }
        }
	}
?>