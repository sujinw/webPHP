<?php
require_once 'DaoBase.class.php';
class DaoArticle extends DaoBase {
	protected $table_name = "mb_article";
	protected $table_name2 = "mb_user";
	

	public function insertArticle($data){
		return $this->insert($data);
	}

	public function getUserBlogListByUserId($user_id){
		$filed = array(
			'id',
			'title',
			'feilei_id',
			'show',
			'contents',
			'uid',
			'time',
			);
		$where = array('uid = ' => $user_id,
					   'is_deleted = ' => 0,
				);
		$endWith = " order by create_time desc";
		return $this->select($filed,$where,$endWith);
	}

	public function getBlogByID($id){
		$filed = array(
			'id',
			'title',
			'contents',
			'show',
			'feilei_id',
			'uid',
			'time',
			);
		$where = array('id = ' => $id,
					   'is_deleted = ' => 0,
				);
		return $this->select($filed,$where,$endWith);
	}

	public function updateArticle($data,$where){
		return $this->update($data,$where);
	}

	public function getBlogList(){
		$filed = array(
			'id',
			'uid',
			'title',
			'contents',
			'fenlei_id',
			'fm_img',
			'time',
			'is_show'
			);
		$where = array('is_deleted ' => 0);
		$endWith = " order by time desc";
		return $this->select($filed,$where,$endWith);
	}

	//delete blog
	public function deleteArticle($where){
		return $this->delete($where);
	}
	public function getArticleCount(){
		$where = array('is_deleted ' => 0);

		return $this->getCount($where);
	}

	public function getArticleByUser(){
		$filed  = array(
			'a.id',
			'a.uid',
			'a.title',
			'a.contents',
			'a.fenlei_id',
			'a.fm_img',
			'a.time',
			'a.is_show',
			'u.user_name'
			);
		$where = array(
			"a.uid"=> "u.user_id",
			"is_deleted" => 0
			);
		$endWith = " order by time desc";
		return $this->selectTwo($filed,$where,$endWith);
	}

	/**
	*通过分类的id获取文章
	*/
	public function getArticleByFenlei($fenlei){
		$filed = array(
			'id',
			'uid',
			'title',
			'contents',
			'fm_img',
			'time'
			);
		$where = array(
			'fenlei_id' => $fenlei,
			'is_show' => 0,
			'is_deleted' => 0
			);
		$endWith = " order by time desc";

		return $this->select($filed,$where,$endWith);
	}
	//通过文章id获取文章详情
	public function getArticleInfoById($id){
		$filed  = array(
			'a.id',
			'a.uid',
			'a.title',
			'a.contents',
			'a.fenlei_id',
			'a.fm_img',
			'a.link',
			'a.time',
			'u.user_name'
			);
		$where = array(
			"a.id"=>$id,
			"a.uid"=> "u.user_id",
			"is_deleted" => 0,
			"is_show"=>0
			);
		$endWith = " order by time desc";
		return $this->selectTwo($filed,$where,$endWith);
	}
}