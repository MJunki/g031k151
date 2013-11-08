<?php
class HogeController extends AppController{
	public $name = "Hoge";
	public $components = array('DebugKit.Toolbar');
	public function index(){

	}
	public function show(){
		if($this->request->is('POST')){
			$jikan = $this->request->data['Aisatsu']['jikan'];
			if($jiakn == '朝'){
				$mes = 'おはよう';
			}elseif($jikan == '夜'){
				$mes = 'こんばんわ';
			}else{
				$mes = 'こんにちわ';
			}
			$this->set('say',$mes);
		}else{
			$this->flash(
				'inputアクションから来て下さい',
				array(
					'controller' => 'hoge',
					'action' => 'input'
					)
				);
		}
	}
	public function input(){

	}
}
?>