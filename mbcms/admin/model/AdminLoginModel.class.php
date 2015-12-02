<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';

class AdminLoginModel extends ModelBase {
	
    //执行逻辑
    public function preform(){

    }

    //检测参数
    public function checkparams(){
    	// if(empty($this->params['safe']['admin_name'])){
    	// 	throw new Exception("error_name", 1);
    	// }

    }
}