<?php
	class Board extends Model{
		public $name = 'Board';
		public $belongsTo = array('User','NewUser'=>array(/*'className'=>'NewUser',*/'foreignKey'=>'user_id'));
		public $validate = array(
            'comment' => array(
                'rule' => 'notEmpty',
                'message' => '必ず入力して下さい'
            )
        );
		public function add($data_add){
			if(isset($data_add['board']['comment'])){
				$data["Board"]["comment"] = $data_add["board"]["comment"];
				$data["Board"]["user_id"] = $data_add["board"]["user_id"];
				$this->save($data);
			}
		}	
		public function edit($data_edit){
			if(isset($data_edit)){
				$data["Board"]["id"] = $data_edit["board"]["id"];
				$data["Board"]["comment"] = $data_edit["board"]["comment"];
				$this->save($data);
			}
		}
		public function del($data_del){
			if(!empty($data_del)){
				$this->delete($data_del);
			}
		}
	}
?>