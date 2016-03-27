<?php
/**
* 文章评论表操作模型
*/
class ReplyModel extends Model{
	
	public $table = 'article_reply';
	public $utable = 'user';

	//添加评论
	public function addReply($data){
		$res = $this->add($data);
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

	//针对每一篇文章查询评论
	public function selectReply($aid){
		$sql = "SELECT r.rid,r.aid,r.uid,r.rcontent,r.create_time,r.zan,u.user_img,u.nickname FROM ".$this->table." AS r,".C('DB_PREFIX').$this->utable." AS u where r.aid='".$aid."' AND r.uid=u.id ORDER BY r.create_time DESC";
		$res = $this->query($sql);

		$result = array();
		if($res){
			foreach ($res as $v) {
				$v['time'] = dateaway($v['create_time']);
				$data[] = $v;
			}
		// p($data);
			return $data;
		}else{
			return false;
		}
	}

	//ajax点赞
	public function saveZan($rid){
		$sql = "UPDATE ".$this->table." SET `zan`=zan+1 WHERE rid=".$rid;
		$res = $this->exe($sql);

		if($res){
			$zan = $this->field(array('zan'))->where("rid='".$rid."'")->one();
			return $zan;
		}else{
			return false;
		}
	}


}
?>