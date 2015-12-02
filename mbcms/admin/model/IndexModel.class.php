<?php
/**
 * 
 * @authors Black
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';
require_once '/../main/lib/User.class.php';

class AdminIndexModel extends ModelBase {
	
    //执行逻辑
    public function preform(){

        //
        

    }

    //检测参数
    public function checkparams(){
    	if(empty($this->user_info)){
            throw new Exception("error_name", 1);
            
        }

    }
}