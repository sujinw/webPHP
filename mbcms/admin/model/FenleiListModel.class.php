<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';
require_once '/../Dao/DaoFenlei.class.php';
require_once "/../main/lib/Tools.class.php";

class FenleiListModel extends ModelBase {
	
    //执行逻辑
    public function preform(){
        $DaoFenlei = new DaoFenlei();
        $result = $DaoFenlei->getFenleiInfo();

        $limit=7;

        $pageInfo = Tools::_pageInfo($this->params['safe']['page'],count($result),$limit);
        if(is_array($result)){
            $result = array_slice($result, $pageInfo['start'],$pageInfo['limit']);//10
        }
        

        $this->result['data']['list'] = $result;
        $DaoFenlei->getFenleiCount()/$limit > 1  ? $this->result['count'] = 1 : $this->result['count'] = $DaoFenlei->getFenleiCount()/$limit;
        $this->result['page'] = $this->params['safe']['page'];
    }

    //检测参数
    public function checkparams(){
    	$this->params['safe']['page'] = empty($this->params['safe']['page']) ? 1 : $this->params['safe']['page'];
        if(empty($this->user_info)){
            throw new Exception("error_name", 1);
            
        }

    }
}