<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-03-21 17:29:12
 */
require_once 'ModelBase.class.php';
require_once DIR ."/main/dao/DaoArticle.class.php";
require_once DIR ."/main/dao/DaoUser.class.php";
require_once DIR ."/main/dao/DaoComment.class.php";
require_once DIR . "/main/lib/Tools.class.php";

class IndexModel extends ModelBase {
    //执行逻辑
    public  function preform(){
    	$DaoBlog = new DaoArticle();
    	$list = $DaoBlog->getBlogList();
    	$pageInfo = Tools::_pageInfo($this->params['safe']['page'],count($list),$limit=10);
        //=============
        if(is_array($list)){
            $list = array_slice($list, $pageInfo['start'],$pageInfo['limit']);//10
        }

        $DaoUser = new DaoUser();
        $hot_user = $DaoUser->getUser();    	
        $this->result['hot_user'] = $hot_user;


    	$this->result['data']['list'] = $list;
    	$this->result['pageInfo'] = $pageInfo;
    }


	//检测参数
    public function checkparams(){
    	$this->params['safe']['page'] = empty($this->params['safe']['page']) ? 1 : $this->params['safe']['page'];
        // if (empty($this->user_info)) {
        //     # code...
        // }
    }
}