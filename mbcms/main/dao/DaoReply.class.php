<?php
/**
* @回复数据表操作类
*/ 

require_once 'DaoBase.class.php';

class DaoReply extends DaoBase{
	protected $table_name = "mb_reply";
	protected $table_name2 = "mb_user";

	//插入一条记录
	public function addReply($arr){
		return $this->insert($arr);
	}

	//通过articleId查询

	public function selectReplyByArticleId($articleId){
		$filed  = array(
			'a.id',
			'a.uid',
			'a.reply',
			'a.time' ,
			'u.user_name' ,
			'u.user_nickname',
			'u.user_img'
		);
		$where = array(
			'a.aid' => $articleId,
			"a.uid"=> "u.user_id",
			'a.is_delete' => 0 ,

		);
		$endWith = " order by time desc";

		return $this->selectTwo($filed, $where, $endWith);
	}
}