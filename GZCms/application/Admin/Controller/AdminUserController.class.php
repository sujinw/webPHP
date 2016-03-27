<?php
/**
* 管理员操作类
*/
class AdminUserController extends AdminController{
	
	//角色列表
	public function adminList(){
		$role = K('AdminType')->getRole();

		if(!$role){
			$role = 0;
		}
		$this->assign('role',$role);

		$this->display();
	}

	//角色添加
	public function addAdminType(){
		if(IS_AJAX){
			$name = $_POST['name'];
			$res = K('AdminType')->validate($name);
			if($res){
				echo 1;
			}else{
				echo 0;
			}
			return;
		}elseif(IS_POST){
			$data = $_POST;

			$res = K('AdminType')->addType($data);

			if($res){
				$this->success('管理员类型添加成功',U('adminList'));
			}else{
				$this->error('管理员添加失败',U('addAdminType'));
			}

			return;
		}

		$this->display();
	}

	//节点管理
	public function nodeList(){
		$res = K('Node')->getNode();
		if(!$res){
			$res = 0;
		}
		$res = node_merge($res);
		$this->assign('node',$res);
		$this->display();
	}
	// 权限配置管理
	public function access(){
		if(IS_POST){
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
				$this->success('权限修改成功',U('adminList'));
			}else{
				$this->error('权限修改失败',U('access'));
			}

			return;
		}

		$rid = isset($_GET['rid']) ? $_GET['rid'] : 0;
		$res = K('Node')->getNode();
		$acc = M('access')->where('role_id='.$rid)->all();
		if(!$res){
			$res = 0;
		}
		$role = array();
		foreach ($acc as $v) {
			$role[] = $v['node_id'];
		}
		$res = node_merge($res,$role);
		$this->assign('node',$res);
		$this->assign('rid',$rid);
		$this->display();
	}
	//添加节点
	public function addNode(){
		$pid = isset($_GET['pid']) ? $_GET['pid'] : 0;
		$level = isset($_GET['level']) ? $_GET['level'] : 1;
		if(IS_AJAX){
			if(K('Node')->validate($_POST['name'])){
				echo 1;
			}else{
				echo 0;
			}
			return;
		}elseif(IS_POST){
			$data = $_POST;
			if(K('Node')->addNode($data)){
				$this->success('节点添加成功',U('nodeList'));
			}else{
				$this->error('节点添加失败',U('addNode',array('pid'=>$pid,'level'=>$level)));
			}
			return;
		}

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
}
?>