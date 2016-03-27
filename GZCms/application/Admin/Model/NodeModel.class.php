<?php
/**
* 权限节点表操作模型
*/
class NodeMOdel extends Model{
	
	public $table = 'node';

	public function getNode(){
		$res = $this->where("status='1'")->all();
		if ($res) {
			$res = Data::tree($res,'name','id','pid');
		}		

		return $res;

	}

	//验证是否存在
	public function validate($name){
		$res = $this->where("name='".$name."'")->one();
		if($res){
			return false;
		}else{
			return true;
		}
	}

	//添加节点
	public function addNode($data){
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
}
?>