<?php
/**
* 前台模板表操作模型
*/
class Templatemodel extends Model{
	
	public $table = 'template';

	public function ajaxvali($data){
		$res = $this->where($data)->one();
		// p($res);
		if(empty($res)){
			return true;
		}else{
			return false;
		}
	}

	public function addTemplate($date){
		$res = $this->add($date);
		if($res){
			$path = APP_CACHE_PATH . '/DataBase_id';
			$Dir = new Dir();
			if(!is_dir($path)){
				$file = $Dir->create($path) ? $path .'/'. $this->table . '.txt' : NULL;
			}else{
				$file = $path .'/'. $this->table . '.txt';
			}
			
			if(!is_null($file)){
				if(file_put_contents($file, $res)){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}

		} 
	}

	public function template(){
		return $this->all();
	}

	public function selectTemp($where,$data){
		return $this->where($where)->update($data);
	}

	public function getTemp(){
		return $this->where("selected=1")->one();
	}
}
?>