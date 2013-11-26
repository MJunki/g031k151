<?php
	if(!isset($data_updata)){
		echo $this->Form->create("board",array("action"=>"updata"));
		echo "編集";
		echo $this->Form->textarea("comment",array("value"=>$data["Board"]["comment"]));
		echo $this->Form->hidden("id",array("value"=>$data["Board"]["id"]));
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}else{
		echo $data_updata;
		echo $this->Form->create("board",array("action"=>"edit_data"));
		echo $this->Form->hidden("comment",array("value"=>$data_updata));
		echo $this->Form->hidden("id",array("value"=>$data_id));
		echo "この内容で投稿してよろしいですか？<br>";
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}
?>