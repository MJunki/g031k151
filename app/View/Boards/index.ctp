<?php
	//debug($data);
	echo "<h2>掲示板</h2>";
	echo $this->Html->link("投稿","input")."<br>";
	foreach ($data as $board) {
		echo $board["Board"]["comment"]."[".$board["Board"]["created"]."]".$this->Html->link("編集","updata/".$board["Board"]["id"]).$this->Html->link("×","del/".$board["Board"]["id"])."<br>";
	}

?>