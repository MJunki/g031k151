<?php
	if(empty($this->request->data)){
		echo $this->Form->create();
		echo "投稿内容";
		echo $this->Form->textarea("comment");
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}else{
		echo $this->request->data["Board"]["comment"];
		echo $this->Form->create("board",array("action"=>"add_data"));
		echo $this->Form->hidden("comment",array("value"=>$this->request->data["Board"]["comment"]));
		echo "この内容で投稿してよろしいですか？<br>";
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}
?>