<?php
/**
 * 
 * @authors Your Name (you@example.org)
 * @date    2015-04-06 18:17:15
 */
session_start(); 
class User{
	public static function _setUserInfo($userInfo){
		$_SESSION['user_id'] = $userInfo['user_id'];
		$_SESSION['user_nickname'] = $userInfo['user_nickname'];
	}
	public static function _getUserInfo(){
		if(empty($_SESSION['user_id'])) return false;
		$userInfo['user_id'] = $_SESSION['user_id'];
		$userInfo['user_nickname'] = $_SESSION['user_nickname'];
		return $userInfo;
	}
	public static function _setAdminUserInfo($adminUserInfo){
		$_SESSION['admin_name'] = $adminUserInfo['admin_name'];
		$_SESSION['admin_id'] = $adminUserInfo['admin_id'];
	}
	public static function _getAdmintUserInfo(){
		if(empty($_SESSION['admin_id']) or empty($_SESSION['admin_name'])) return false;
		$adminUserInfo['admin_name'] = $_SESSION['admin_name'];
		$adminUserInfo['admin_id'] = $_SESSION['admin_id'];
		return $adminUserInfo;
	}
}
 