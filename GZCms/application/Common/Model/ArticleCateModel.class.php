<?php
/**
* 文章分类表 操作模型
*/
class ArticleCateModel extends Model{
	public $table = 'article_category';

	//通过树形结构展示数据
	public function treeData(){
		
		$data = $this->where('is_delete=0')->all();

		$d = Data::tree($data,'cname','cid','pid');
		return $d;
	}

	//添加分类
	public function addCate($data){
		$res = $this->add($data);
		if($res){
			$path = APP_CACHE_PATH . '/DataBase_id';
			if(!is_dir($path)){
				Dir::create($path);
			}

			$file = $path .'/'.$this->table .'.txt';

			if(file_put_contents($file,$res)){
				return true;
			}else{
				return false;
			}
		}
	}

	//验证是否存在分类
	public function validate($name){
		$data = $this->where("cname='".$name."'")->one();

		return empty($data) ? true : false;
	}

	public function getCate($cid){
		$res = $this->where("cid='".$cid."'")->one();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
}
?>