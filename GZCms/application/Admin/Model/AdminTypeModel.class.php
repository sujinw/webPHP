<?php
/**
* 管理员角色表操作模型
*/
class AdminTypeModel extends Model{
	
	public $table = 'role';

	public function validate($name){
		$result = $this->where("name='".$name."'")->one();

		if($result){
			return false;
		}else{
			return true;
		}
	}

	public function addType($data){
		$res = $this->add($data);
		if($res){
			$path = APP_CACHE_PATH .'/DataBase_id';
			if(!is_dir($path)){
				Dir::create($path);
			}

			$file = $path .'/'. $this->table .'.txt';

			if(file_put_contents($file,$res)){
				return true;
			}else{
				return false;
			}
		}
	}

	public function getRole(){
		return $this->all();
	}
}
?>