<?php
/**
* 网站配置控制器
*/
class ConfigController extends AdminController{
	//模型对象
	private $_db;
	//构造函数
	public function __init(){
		$this->_db= K("Config");
	}
	//设置配置项
	public function set_config(){
		if(IS_POST){
			if($this->_db->update_config()){
				go(__APP__.'?m=admin&c=Config&a=config');
			}
		}else{
			$this->config= $this->_db->get_config();
			$this->display();
		}
	}
	
	public function config(){
		$config = $this->_db->get_config();
		// p($config);die;	
		$this->assign('config',$config);
		$this->display();
	}
}
?>