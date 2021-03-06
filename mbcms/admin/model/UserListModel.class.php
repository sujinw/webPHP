<?php
/**
 * 
 * @authors Rukic
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';
require_once '/../main/dao/DaoUser.class.php';
require_once "/../main/lib/Tools.class.php";


class UserListModel extends ModelBase {

    //执行逻辑
    public function preform(){
//        echo "WebSiteSittingModel.class.php";
         $DaoUser = new DaoUser();
        $result = $DaoUser->getUser();
        $limit=7;

        $pageInfo = Tools::_pageInfo($this->params['safe']['page'],count($result),$limit);
        if(is_array($result)){
            $result = array_slice($result, $pageInfo['start'],$pageInfo['limit']);//10
        }


       $this->result['data']['list'] = $result;
       $this->result['count'] = $DaoUser->getUserCount()/$limit;
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