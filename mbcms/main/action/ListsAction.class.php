<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once DIR . "/main/model/ListsModel.class.php";

class Lists extends ActionBase {
	
    public function action(){
    	//页面展示
    	$IndexModel = new ListsModel();
    	$result = $IndexModel->getResult();

    	// print_r($result);

    	$page = $result['pageInfo']['page'] == $result['pageInfo']['page_max'] ? $result['pageInfo']['page_max'] :$result['pageInfo']['page'] + 1;

        $this->tpl->assign('listData',$result['data']['list']);
        $this->tpl->assign('nextPage','index.php?action=lists&type=article&fenleiId='.$result['params']['safe']['fenleiId'].'&page='.$page);
    	$this->tpl->display('list.tpl');
    	
    }
}