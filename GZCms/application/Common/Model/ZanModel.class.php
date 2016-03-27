<?php
/**
* 点赞表操作模型
*/
class ZanModel extends Model{
	
	public $table = 'zan';

	// 根据类型id点赞
	public function saveZan($uid,$zid,$type){
		$res = $this->field(array('zan'))->where("uid='".$uid."' AND zid='".$zid."' AND zantype=".$type)->all();
		if(!$res){
			return $this->add(array(
				'zan'=>1,
				'uid'=>$uid,
				'zid'=>$zid,
				'zantype'=>$type,
				'create_time'=>time()
				));
		}else{
			$sql = "UPDATE ".$this->table." SET `zan`=zan+1 WHERE uid='".$uid."' AND zid='".$zid."' AND zantype='".$type."'";
			$r = $this->exe($sql);
			if($r){
				return $this->field(array('zan'))->where("uid='".$uid."' AND zid='".$zid."' AND zantype=".$type)->one();
			}else{
				return false;
			}
		}
	}
}
?>