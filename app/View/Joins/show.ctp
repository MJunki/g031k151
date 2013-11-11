<?php
if(isset($result["flag"])){
	echo "この情報で登録して大丈夫ですか？";
	echo $this->Html->tag("br");
	echo "名前:".$result["name"];
	echo $this->Html->tag("br");
	echo "性別:".$result["sex"];
	echo $this->Html->tag("br");
	echo "学年:".$result["rank"];
	echo $this->Html->tag("br");
	echo "好きなもの↓";
	echo $this->Html->tag("br");
	for($i=1;$i<4;$i++){
		if(isset($result["like"][$i])){
		echo $result["like"][$i];
		echo $this->Html->tag("br");
		}
	}
	echo "コメント:".$result["com"];
	echo $this->Html->tag("br");
	echo "パスワード:".$result["pass"];
	echo $this->Html->tag("br");
	echo "登録時間:".$result["time"];
	echo $this->Form->create('sign',array("type"=>"post","url"=>"show"));
	echo $this->Form->submit();
	echo $this->Form->end();
}else{
	echo "ありがとうございました";
	echo $this->Html->tag("br");
	echo $this->Html->link("最初に戻る","input");
}
?>