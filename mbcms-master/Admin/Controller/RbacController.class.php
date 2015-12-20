<?php
/**
* Rbac权限控制
*/
class RbacController extends CommonController{
	
	//用户列表
	public function user(){
		// p(__ACTION__);exit;
		$db = M('user');
		$total = $db->count(); 
		$params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'', #(必须)
            'parameter' =>'index.php?p=?',  #(必须)
            'now_page'  =>$_GET['p'],  #(必须)
            'list_rows' =>5, #(可选) 默认为15
		);
		$page = new Page($params);
		$now = ((int)$_GET['p']-1) * (int)$params['list_rows'];
		$end = $params['list_rows'];
		$data = $db->order('id desc')->limit($now.','.$end)->all();
		// p($data);die;
		$arr = array();
		foreach ($data as $v) {
			// p($v);die;
			$v['admin_loginip'] = ntoip($v['admin_loginip']);
			// p($v);die;
			$arr[] = $v;
		}
		// p($arr);die;

		$this->assign('user',$arr);
		$this->assign('page',$page->show(1));
		$this->display();
	}
	//用户编辑
	public function userEdit(){
		if(isset($_GET['uid'])){
			$uid = $_GET['uid'];
			$user = M('user')->where('id='.$uid)->one();
			$role = M('role')->all();
			$this->assign('uid',$uid);
			$this->assign('user',$user);
			$this->assign('role',$role);
			$this->display();
		}		
	}
	public function editUserHander(){
		$user=K('AdminUser');
		$user->vali();
		if($user->update_admin('id='.$_POST['uid'],$data)){
			$roleUser = array(
				'role_id' => $_POST['role_id'],
			);
			if(M('role_user')->where('user_id='.$_POST['uid'])->update($roleUser)){
				$this->success('修改用户信息成功',__CONTROLLER__.'&a=user&p=1');
			}else{
				$this->error('修改失败');
			}
		}
	}
	//节点列表
	public function node(){
		$field = array('id','name','title','pid','status');
		$node = M('node')->field($field)->all();
		$node = node_merge($node);
		// p($node);die;
		$this->assign('node',$node);
		$this->display();
	}
	//角色列表
	public function role(){
		$role = M('role')->all();
		$this->assign('role',$role);
		$this->display();
	}
	//添加用户
	public function AddUser(){
		$role = M('role')->all();
		$this->assign('role',$role);
		$this->display();
	}
	//添加用户表单处理
	public function addUserHander(){
		$user=K('AdminUser');
		$user->vali();
		if($uid = $user->add($data)){
			$roleUser = array(
				'role_id' => $_POST['role_id'],
				'user_id' => $uid
			);
			if(M('role_user')->add($roleUser)){
				$this->success('添加用户成功',__CONTROLLER__.'&a=user&p=1');
			}else{
				$this->error('添加失败');
			}
		}
	}
	//添加节点
	public function AddNode(){
		// p($_GET);die;
		$pid = isset($_GET['pid']) ? $_GET['pid'] : 0;
		$level = isset($_GET['level']) ? $_GET['level'] : 1;
		switch ($level) {
			case 1:
				$this->assign('type','应用');
				break;
			case 2:
				$this->assign('type','控制器');
				break;
			case 3:
				$this->assign('type','动作方法');
				break;
		}
		$this->assign('pid',$pid);
		$this->assign('level',$level);
		$this->display();
	}
	//添加角色
	public function AddRole(){
		// p(__CONTROLLER__);
		$this->display();
	}
	//添加角色表单处理
	public function AddRoleHander(){
		$role = M('role');
		if($role->add($_POST)){
			$this->success('提交成功',__CONTROLLER__.'&a=role');
		}else{
			$this->error('添加失败');
		}
	}
	//添加节点表单处理
	public function AddNodeHander(){
		// p($_POST);
		$node = M('node');
		$n = $node->where("name='".$_POST['name']."'")->one();
		if(!empty($n)){
			$this->error('名称已经存在！');;
		}
		if($node->add($_POST)){
			$this->success('提交成功',__CONTROLLER__.'&a=node');
		}else{
			$this->error('添加失败');
		}
	}
	//给角色配置权限
	public function access(){
		$rid = isset($_GET['rid']) ? $_GET['rid'] : 0;
		$field = array('id','name','title','pid','status');
		$node = M('node')->field($field)->all();
		$acc = M('access')->where('role_id='.$rid)->all();
		$role = array();
		foreach ($acc as $v) {
			$role[] = $v['node_id'];
		}
		$node = node_merge($node,$role);
		// p($node);die;
		$this->assign('node',$node);
		$this->assign('rid',$rid);
		$this->display();
	}
	//配置权限表单处理
	public function accessHander(){
		// p($_POST);die;
		$rid = isset($_POST['rid']) ? $_POST['rid'] : 0;
		$arr = array();
		$acc = M('access');
		$acc->where('role_id='.$rid)->delete();
		foreach ($_POST['access'] as $v) {
			$tmp = explode('_',$v);
			// p($tmp);
			$arr[] = array(
				'role_id' => $rid,
				'node_id' => $tmp[0],
				'level'   => $tmp[1]
			);
		}
		// p($arr);die;
		$res = $acc->addAll($arr);
		if($res){
			$this->success('权限修改成功',__CONTROLLER__.'&a=role');
		}else{
			$this->error('权限修改失败');
		}
	}
}
?>