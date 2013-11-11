<?php
	class Join extends AppModel{
		public $name = "Join";
		public $useTable = false;
		public function kakou($data){
			if(isset($data['User_status'])){
				$result = array();
				$result["name"] = $data['User_status']['User_last']." ".$data['User_status']['User_first'];
				$result["sex"] = $data['User_status']['User_sex'] == 0?"男性":"女性";
				$result["rank"] = $data['User_status']['User_rank'];
					for($i=1;$i<4;$i++){
						if($data['User_status']["User_like$i"] != "0"){
							$result["like"][$i] = $data['User_status']["User_like$i"];
						}
					}
				$result["com"] = $data['User_status']['User_com'];
				$result["pass"] = $data['User_status']['User_pass'];
				$result["time"] = $data['User_status']['time'];
				$result["flag"] = "1";
				return $result;
			}
		}
	}
?>