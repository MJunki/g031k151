<?php
	if(empty($this->request->data)){
		echo $this->Form->create();
		echo "編集";
		echo $this->Form->textarea("comment",array("value"=>$data["Board"]["comment"]));
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}else{
		echo $this->request->data["Board"]["comment"];
		echo $this->Form->create("board",array("action"=>"edit_data"));
		echo $this->Form->hidden("comment",array("value"=>$this->request->data["Board"]["comment"]));
		echo $this->Form->hidden("id",array("value"=>$this->request->params["pass"][0]));
		echo "この内容で投稿してよろしいですか？<br>";
		echo $this->Form->submit("投稿する");
		echo $this->Form->end();
	}
?>