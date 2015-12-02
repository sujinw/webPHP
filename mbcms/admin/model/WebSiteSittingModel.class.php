<?php
/**
 * 
 * @authors Black
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';

class webSiteSittingModel extends ModelBase {
	
    //执行逻辑
    public function preform(){
        
        $filesname = 'websitesitting.txt';
        if(file_exists($filesname) && filesize($filesname) > 0){
            $this->result['data']['list'] = unserialize(file_get_contents($filesname));
        }
    }

    //检测参数
    public function checkparams(){
    	if(empty($this->user_info)){
    		throw new Exception("error_name", 1);
    	}

    }
}