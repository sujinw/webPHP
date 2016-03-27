<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/15
 * Time: 20:19
 */
class MessageController extends ValiloginController{

	//发送信息
	public function nread($uid){
		$data = K('Message')->returnnread($uid);
		// p($data);
		if($data){
			$data['num'] = count($data);
			return $data;
		}else{
			return false;
		}
	}

	//ajax读取未读
	public function ajaxnread(){
		$uid = isset($_POST['uid']) ? $_POST['uid'] : 0;
		// p($uid);die;
		$res = $this->nread($uid);
		if($res){
			echo $res['num'];
		}else{
			echo '0';
		}
	}

}