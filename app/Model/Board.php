<?php
	class Board extends Model{
		public $name = 'Board';
		public function add($data_add){
			if(!empty($data_add)){
				$data["Board"]["comment"] = $data_add["board"]["comment"];
				$this->save($data);
			}
		}	
		public function edit($data_edit){
			if(!empty($data_edit)){
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