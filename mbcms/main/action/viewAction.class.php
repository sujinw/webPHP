<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once DIR . "/main/model/viewModel.class.php";

class view extends ActionBase {
	
    public function action(){
    	//页面展示
    	$viewModel = new viewModel();
    	$result = $viewModel->getResult();

    	$info = $result['info']['article'][0];
        $reply = $result['info']['reply'];
        // $like = $result['info']['like'][0];

        $this->tpl->assign('reply',$reply);
    	$this->tpl->assign('info',$info);
        //$this->tpl->assign('like',$like);

    	$this->tpl->display('view.tpl');
    	
    }
}