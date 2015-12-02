<?php
require_once 'DaoBase.class.php';
class DaoUser extends DaoBase {
	protected $table_name = "mb_user";

	public function getUserInfoByUsernameAndPassWord($user_name,$password){
		$filed = array('user_id','user_nickname');
		$where = array('user_name = ' => $user_name,
					   'user_password = ' => md5($password)
				);
		return $this->select($filed,$where);
	}

	public function getUserInfoByUserId($user_id){
		$filed = array('user_id',
						'user_nickname',
						'user_name',
						'user_qm',
						'user_level',
						'user_inTime');
		$where = array('user_id ' => $user_id,
					'user_isDelete ' => 0,
				);
		return $this->select($filed,$where);
	}
	public function addUser($data){
		return $this->insert($data);
	}

	public function getUser(){
		$filed = array('user_id','user_nickname','user_qm','user_name','user_inTime','user_level');
		$where = array('user_isDelete ' => 0);
		$endWith = " order by user_inTime desc";
		return $this->select($filed,$where,$endWith);
	}
	public function getUserCount(){
		$where = array('user_isDelete ' => 0);

		return $this->getCount($where);
	}
	public function getUserInfoByUsername($user_name){
		$filed = array('user_id','user_nickname');
		$where = array('user_name ' => $user_name);
		$result =  $this->select($filed,$where);

		if($result){
			return "1";
		}else{
			return "0";
		}
	}
}