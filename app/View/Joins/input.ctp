<?php
	echo "ユーザー登録フォーム";
	echo $this->Form->create('User_status',array("type"=>"post","url"=>"show"));
	echo "名字";
	echo $this->Form->text("User_last");
	echo "名前";
	echo $this->Form->text("User_first");
	echo $this->Html->tag("br");
	echo "性別";
	echo $this->Html->tag("br");
	echo $this->Form->radio("User_sex",array("0"=>"男性","1"=>"女性"),array("value"=>"1","legend"=>false));
	echo $this->Html->tag("br");
	echo "学年";
	echo $this->Html->tag("br");
	echo $this->Form->select("User_rank",
		array(
		"学部1年"=>"学部1年",
		"学部2年"=>"学部2年",
		"学部3年"=>"学部3年",
		"学部4年"=>"学部4年"),
		array("default"=>"学部2年"));
	echo $this->Html->tag("br");
	echo "好きなもの";
	echo $this->Html->tag("br");
	echo $this->Form->checkbox("User_like1",array("value"=>"運動",'checked'=>true));
	echo $this->Form->label("User_like1","運動");
	echo $this->Form->checkbox("User_like2",array("value"=>"漫画"));
	echo $this->Form->label("User_like2","漫画");
	echo $this->Form->checkbox("User_like3",array("value"=>"女の子",'checked'=>true));
	echo $this->Form->label("User_like3","女の子");
	echo "コメント";
	echo $this->Form->text("User_com");
	echo "パスワード";
	echo $this->Form->password("User_pass");
	echo $this->Form->hidden("time",array("value"=>date("h.i.s")));
	echo $this->Form->submit();
	echo $this->Form->end();
?>