<?php
    class User extends Model{
        public $name = 'User';
 
        public $validate = array(
            'name' => array(
                'rule' => array('custom','/^[a-z]{1,10}$/i'),
                'required' => true,
                'allowEmpty' => false,
                'message' => '半角英字10文字以内で必ず入力して下さい'
            ),
            'email' => array(
                'rule' => 'email',
                'required' => true,
                'allowEmpty' => false,
                'message' => 'メールアドレスの形式で必ず入力して下さい'
            ),
            'sex' => array(
                'rule'=>'notEmpty',
                'message' => '性別に必ずチェックを入れて下さい'
            ),
            'password' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'allowEmpty' => false,
                'message' => '必ず入力して下さい'
            )
        );
    }
?>