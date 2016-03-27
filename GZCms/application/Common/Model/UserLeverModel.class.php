<?php
/**
* 用户等级表操作模型
*/
class UserLeverModel extends Model{
	public $table = 'userlever';
	
	public function addLever($data){
		$res = $this->add($data);

		if($res){
			$path = APP_CACHE_PATH . '/DataBase_id';
			$dir = new Dir();
			if(!is_dir($path)){
				$dir->create($path);
			}
			
			if(file_put_contents($path .'/'. $this->table . '.txt',$res)){
				return true;
			}else{
				return false;
			}
		}
	}
	//获取全部会员
	public function getUserLever($limit){
		return $this->limit($limit)->all();
	}

	//验证是否存在
	public function validate($name){
		$data = $this->where("lever_name='".$name."'")->find();

		if(empty($data)){
			return true;
		}else{
			return false;
		}
	}
}
?>