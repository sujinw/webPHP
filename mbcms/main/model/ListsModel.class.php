<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-03 20:20:56
 */

require_once 'ModelBase.class.php';
require_once DIR.'/main/dao/DaoArticle.class.php';
require_once DIR . "/main/lib/Tools.class.php";
class ListsModel extends ModelBase {

    //执行逻辑
    public  function preform(){
    	$DaoArticle = new DaoArticle();
    	$result = $DaoArticle->getArticleByFenlei($this->result['params']['safe']['fenleiId']?$this->result['params']['safe']['fenleiId']:1);
    	$pageInfo = Tools::_pageInfo($this->params['safe']['page'],count($result),$limit=5);
    	if(is_array($result)){
            $result = array_slice($result, $pageInfo['start'],$pageInfo['limit']);//10
        }
    	if(empty($result)){
    		$this->result['data']['list'] = array(
    			'code' => 0
    			);
    	}else{
    		$this->result['data']['list'] = $result;
    		$this->result['pageInfo'] = $pageInfo;
    	}
    }


	//检测参数
    public function checkparams(){
    	$this->params['safe']['page'] = empty($this->params['safe']['page']) ? 1 : $this->params['safe']['page'];
    }
}