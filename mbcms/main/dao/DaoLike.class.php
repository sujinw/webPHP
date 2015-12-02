<?php
require_once 'DaoBase.class.php';
/**
 * like表操作类
 */
class DaoLike extends DaoBase {
	protected $table_name = 'mb_like';

	/**
	 * 插入一条记录
	 * @AuthorHTL
	 * @DateTime  2015-11-05T18:07:52+0800
	 * @param     [type]                   $arr [description]
	 */
	public function addLike($arr){
		return $this->insert($arr);
	}

	/**
	 * 通过文章id查询like值
	 * @AuthorHTL
	 * @DateTime  2015-11-05T18:12:36+0800
	 * @param     [type]                   $aid [description]
	 * @return    [array]                        [description]
	 */
	public function getLikeByAid($aid){
		$filed = array(
			'id',
			'uid',
			'like',
			'time'
		);
		$where = array(
			'aid' => $aid
		);
		$endWith = " order by time desc";

		return $this->select($filed, $where, $endWith);
	}

	public function updataByAid($arr, $aid){
		$where = array(
			'aid' => $aid
		);

		return $this->update($arr, $where);
	}
}
