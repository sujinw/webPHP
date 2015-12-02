<?php
/**
* 回复控制器
* 
*/ 
require_once 'ActionBase.class.php';
require_once DIR.'/main/model/replyModel.class.php';
class reply extends ActionBase{
	//具体相应动作
	public function action(){
		$reply = new replyModel();
		$result = $reply->getResult();

		$this->tpl->assign('action',"view&type=article&articleid=".$result['params']['safe']['articleId']);
		$this->tpl->assign('tips','回复成功，3s后跳会到文章页面！');

		$this->tpl->display('tips.tpl');
	}
}