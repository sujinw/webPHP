<?php

//后台User操作
require_once '/../main/dao/DaoBase.class.php';
/**
* adminUser
*/
class DaoAdminUser extends DaoBase{
	protected $table_name = "mb_adminuser";
	
	public function getAdminUserByName($adminUser){
		$filed = array('admin_id','admin_name');
		$where = array('admin_name ' => $adminUser);
		$result =  $this->select($filed,$where);

		if($result){
			return "1";
		}else{
			return "0";
		}
	}

	public function getAdminUserInfoByUsernameAndPassWord($admin_name,$admin_password){
		$filed = array('admin_id','admin_name');
		$where = array('admin_name ' => $admin_name,
					   'admin_password 	' => $admin_password
				);
		return $this->select($filed,$where);
	}
}