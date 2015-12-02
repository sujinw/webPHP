<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-03 20:20:56
 */

require_once 'ModelBase.class.php';
require_once DIR ."/main/dao/DaoArticle.class.php";
require_once DIR ."/main/dao/DaoUser.class.php";
require_once DIR ."/main/dao/DaoComment.class.php";
require_once DIR . "/main/lib/Tools.class.php";
class UserCenterModel extends ModelBase {

    //执行逻辑
    public  function preform(){
    	$DaoUser = new DaoUser();
    	$result = $DaoUser -> getUserInfoByUserId($this->params['safe']['uid']);
    	$this->result['data'] = $result;
    	//print_r($result);
    }


	//检测参数
    public function checkparams(){

    }
}