<?php
/**
* 用户表操作模型
*/
class UserModel extends Model{
	public $table = 'user';
	public $atable = 'article';
	public $rtable = 'article_reply';

	public function adminCheck($data){
		// p($data);die;
		$field = array('id','username','password');
		$gzData =$this->field($field)->where("username='".$data['username']."'")->one();
		if(empty($gzData)){
			$error_code = 1;
		}else{
			if($data['password'] == $gzData['password']){
				$_SESSION['uid'] = $gzData['id'];
				$_SESSION['uname'] = $gzData['username'];
				$error_code = 2;				
			}else{
				$error_code = 3;
			}		
		}
		return $error_code;
	}

	/**
	 * [validate 验证Login]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T13:53:54+0800
	 * @param    [type]                   $username [description]
	 * @param    [type]                   $password [description]
	 * @return   [type]                             [description]
	 */
	public function validate($username,$password){
		//用户名不能为空
		if(!$username) return false;
		$userInfo = $this->where('username="' . $username . '"')->find();
		// p($userInfo);exit;
		//用户名不存在
		if(!$userInfo) return false;
		//密码错误
		if($userInfo['password'] != md5($password)) return false;
		return $userInfo;
	}


	//获取全部会员
	public function getUserLimit($limit){
		return $this->limit($limit)->all();
	}

	//通过username确认是否存在记录
	public function valid($username){
		$data = $this->where("username='".$username."'")->one();
		// p($data);
		if(empty($data)){
			return false;
		}else{
			return true;
		}
	}

	//添加用户
	public function addUser($data){
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

	// 通过id获取信息
	public function getInfoById($id){
		return $this->where("id='".$id."'")->one();
	}

	public function userCenter($uid){
		$data = array();

		$user = $this->where("id='".$uid."'")->one();

		$asql = "SELECT * FROM ".C('DB_PREFIX').$this->atable." WHERE uid='".$uid."' ORDER BY create_time DESC";
		$article = $this->query($asql);

		$rsql = "SELECT * FROM ".C('DB_PREFIX').$this->rtable." WHERE uid='".$uid."' ORDER BY create_time DESC";
		$reply = $this->query($rsql);

		$data['userinfo'] = $user;
		$data['article'] = $article;
		$data['reply'] = $reply;
		$data['article_num'] = count($article);
		$data['reply_num'] = count($reply);

		return $data;
	}

	// 确认是否是作者
	public function isAuthor($uid){
		$res = $this->field(array('is_author'))->where("id='".$uid."'")->one();
		if($res && $res['is_author'] == 1){
			return true;
		}else{
			return false;
		}
	}

	//根据uid和aid查询出会员评论列表
	public function userReply($uid){
		$sql = "SELECT r.rid,r.aid,r.uid,r.rcontent,r.create_time,a.author,a.title FROM ".C('DB_PREFIX').$this->rtable." AS r, ". C('DB_PREFIX').$this->atable." AS a WHERE r.uid=a.aid AND r.uid=".$uid." ORDER BY r.create_time";
		#p($sql);die;
		$res = $this->query($sql);
		if($res){
			return $res;
		}else{
			return false;
		}
	}
}
?>