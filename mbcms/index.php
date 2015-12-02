<?php
/**
 * 首页文件
 * ============================================================================
 */

define("DIR",__DIR__);
run();
function run(){
	$action = empty($_GET['action']) ? "index" : $_GET['action'];
	$action_file = DIR .'/main/action/'. ucfirst($action) ."Action.class.php";
	
	if(!file_exists($action_file)){
		echo "action error";die;
	}
	require_once $action_file;
	$action_class = new $action;
	$action_class->action();
}