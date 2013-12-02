<?php
	if(!isset($data_input)){
		echo $this->Form->create("board",array("action"=>"input"));
		echo "投稿内容";
		echo $this->Form->textarea("comment");
		echo $this->Form->hidden("id",array("value"=>$user_id));
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}else{
		echo $data_input;
		echo $this->Form->create("board",array("action"=>"add_data"));
		echo $this->Form->hidden("comment",array("value"=>$data_input));
		echo $this->Form->hidden("user_id",array("value"=>$data_id));
		echo "この内容で投稿してよろしいですか？<br>";
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}
?>