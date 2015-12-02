<?php
/**
 * 
 * @authors Rukic
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/AddArticleModel.class.php";
require_once '/../main/lib/User.class.php';

class addArticle extends ActionBase {
	
    public function action(){
    	//页面展示
    	$IndexModel = new AddArticleModel();
    	
    	$result = $IndexModel->getResult($this->user_info);
  
        $this->tpl->assign('admin_name',$this->user_info['admin_name']);

        $this->tpl->assign($result);
    	$this->tpl->display('admin_article_add.tpl');

    }

}