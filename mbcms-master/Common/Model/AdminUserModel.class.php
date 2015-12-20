<?php
/**
* 后台管理员表模型类
*/
class AdminUserModel extends Model{
	public $table = "user";

	public function selcet(){
		$data = $this->all();
		return $data;
	}
	/**
	 * [validate 验证后台用户名]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T13:53:54+0800
	 * @param    [type]                   $username [description]
	 * @param    [type]                   $password [description]
	 * @return   [type]                             [description]
	 */
	public function validate($username,$password){
		//用户名不能为空
		if(!$username) return false;
		$userInfo = $this->where('admin_username="' . $username . '"')->find();
		// p($userInfo);exit;
		//用户名不存在
		if(!$userInfo) return false;
		//密码错误
		if($userInfo['admin_pwd'] != md5($password)) return false;
		return $userInfo;
	}
	public function vali(){
		$data = array(
			'admin_username' => $_POST['admin_username'],
			'admin_pwd'      => md5($_POST['admin_pwd']),
			'admin_islock'	 => $_POST['admin_islock']
		);
		$u = $this->where("admin_username='".$data['admin_username']."'")->one();
		// p($u);die;
		if(!empty($u)){
			error('用户名已经存在！');
		}
	}
	public function update_admin($where,$data = null){
		if(is_null($data)) return false;
		return $this->where($where)->update($data);
	}
	public function addUser($data){
		return $this->add($data);
	}
	public function get_admin($id){
		if(is_null($id))return false;
		$data = $this->where('id='.$id)->one();
		return $data;
	}
}
?>