<?php
/**
* 回复model
*/ 

require_once 'ModelBase.class.php';
require_once DIR.'/main/dao/DaoReply.class.php';

class replyModel extends ModelBase{

	 //执行逻辑
    public  function preform(){
    	$DaoReply = new DaoReply();
    	$data = array(
    		'aid'   =>  $this->result['params']['safe']['articleId'],
    		'uid'   =>	$this->user_info['user_id'],
    		'reply' => 	$this->result['params']['safe']['reply'],
    		'time'  => 	time()
    		);
    	// print_r($this->result);
    	$result = $DaoReply -> addReply($data);
    	print_r($result);
    }


	//检测参数
    public function checkparams(){

    }
}