<?php 
/**
* 文章表操作模型
*/
class ArticleModel extends Model{
	
	public $table = 'article';
	public $ctable = 'article_category';

	//添加文章
	public function addArticle($data){
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
		return false;
	}

	//查询文章
	public function getArticleLimit($limit){
		$sql = "SELECT * FROM ".$this->table ." AS a,".C('DB_PREFIX').$this->ctable ." AS c WHERE c.cid = a.cid AND a.display=1 LIMIT ".$limit;
		return $this->query($sql);
	}

	//更新点击
	public function saveHits($aid){
		$sql = "UPDATE ".$this->table." SET `hits`=hits+1 WHERE aid=".$aid;
		$res = $this->exe($sql);

		if($res){
			$zan = $this->field(array('hits'))->where("aid='".$aid."'")->one();
			return $zan;
		}else{
			return false;
		}	
	}

	// 获取文章详情
	public function getArticle($aid){
		return $this->where("aid='".$aid."'")->one();
	}
}
?>