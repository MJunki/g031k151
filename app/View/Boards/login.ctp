<div class="hero-unit">
	<?php echo "<h2>掲示板</h2>";?>
    <?php echo $this->Session->flash('Auth'); ?>
    <?php echo $this->Form->create('User', array('url' => 'login')); ?>
    <?php echo $this->Form->input('User.name', array('label' => 'お名前')); ?>
    <?php echo $this->Form->input('User.password', array('label' => 'パスワード')); ?>
    <?php echo $this->Form->end('ログイン'); ?>
    <?php echo $this->html->link('twitterでlogin',array('controller'=>'TwLogins','action'=>'login')); ?>
    <?php echo $this->html->link('facebookでlogin',array('controller'=>'Fbconnects','action'=>'facebook')); ?>
    <a href="useradd" id="switch" class="label btn-primary">新規登録</a>
</div>