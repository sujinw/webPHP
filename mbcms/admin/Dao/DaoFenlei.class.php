<?php

/**
* 分类数据操作
*/
require_once '/../main/dao/DaoBase.class.php';

class DaoFenlei extends DaoBase{
	protected $table_name = "mb_fenlei";
	
	public function getFenleiInfo(){
		$filed = array('id','name','fenlei_img','time');
		$where = array('is_deleted ' => 0);
		$result =  $this->select($filed,$where);
		return $result;
	}

	public function getFenleiCount(){
		$where = array('is_deleted ' => 0);

		return $this->getCount($where);
	}
	public function getFenleiInfoByName($name){
		$filed = array('name','fenlei_img');
		$where = array('name ' => $name,
						'is_deleted' => '0');
		$result =  $this->select($filed,$where);

		return $result;
	}

	public function addFenlei($data){
		return $this->insert($data);
	}
}