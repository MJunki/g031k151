<?php
	echo $this->Session->flash('Auth');
	echo "<h2>掲示板</h2>";
	echo "<h3>".$user['name']."さん！ようこそ！</h3>";
	echo $this->Html->link("ログアウト","logout")."<br><br>";
	echo $this->Html->link("投稿","input/".$user['id'])."<br>";
	echo $this->Form->create("board",array("action"=>"index"));
	echo $this->Form->input('word',array('label'=>'検索ワード'));
	echo "検索件数<br>";
    $option1 = array(1,2,3,4,5,10,20,30);
    echo $this->Form->select('case', $option1, array('empty' => false));
	$option2 = array('ASC' => '昇順', 'DESC' => '降順'); 
	$option3 = array('legend' => false, 'value' => 'DESC');
	echo $this->Form->label('sort','並び順'); 
	echo $this->Form->radio('sort',$option2,$option3);
	echo $this->Form->submit("検索");
	echo $this->Form->end();
	$i=1;
	foreach ($data as $board) {
		echo "$i.UserName: ".$board['User']['name']."[".$board['User']['email']."]<br>";
		echo $board["Board"]["comment"]."[".$board["Board"]["modified"]."]";
		if($user['id']==$board['Board']['user_id']){
			echo $this->Html->link("編集","updata/".$board["Board"]["id"]).$this->Html->link("×","del/".$board["Board"]["id"]);
		}
		echo "<br><br>";
		$i++;
	}
	echo $this->Html->link("過去ログ一覧","index/")."<br>";
?>