<?php 
if(empty($user)): /* 未ログインの場合はFormヘルパーを使って認証ボタンを表示 */ ?>
    <?php echo $this->Form->create('Fbconnects',
        array('action'=>'facebook'));?>
    <?php echo $this->Form->end(__('facebook で Login'));?>
<?php else: /* ログイン済みの場合はログアウトアクションへのリンクを表示 */ ?>
    ログイン済みです。
    <?php echo $user['NewUser']['username']; ?>
    <strong><?php //echo $this->Html->link(__('Logout'), array('action' => 'logout')); ?> </strong>
<?php endif ; ?>