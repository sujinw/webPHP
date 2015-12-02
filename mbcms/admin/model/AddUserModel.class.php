<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';
require_once '/../main/lib/User.class.php';
require_once '/../main/lib/uploadedFile.class.php';

class AddUserModel extends ModelBase {
	
    //执行逻辑
    public function preform(){
    	// $uploadFile = new FileUpload();
    	// $uploadFile -> set("path", "./images/");
    	// $uploadFile -> set("maxsize", 2000000);
    	// $uploadFile -> set("allowtype", array("gif", "png", "jpg","jpeg"));
    	// $uploadFile -> set("israndname", false);

    }

    //检测参数
    public function checkparams(){
    	if(empty($this->params['safe']['admin_name'])){
    		throw new Exception("error_name", 1);
    	}

    }
}