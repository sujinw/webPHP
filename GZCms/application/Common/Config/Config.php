<?php 
/*
 * 应用内配置文件
 */
$common = array(
	// '配置项' => "配置值"
	/*===========================================================
	数据库连接相关配置*/
	'DB_DEBUG'              =>  true, // 开启调试模式 记录SQL日志
    "AUTO_LOAD_FILE"     => array('functions.php','smartyPluTag.php','Images.php'),

    /********************************RBAC权限控制********************************/
    'RBAC_TYPE'                     => 1,           //1时时认证｜2登录认证
    'RBAC_SUPER_ADMIN'              => 'admin', 	//超级管理员SESSION名
    'RBAC_USERNAME_FIELD'           => 'username',  //用户名字段
    'RBAC_PASSWORD_FIELD'           => 'password',  //密码字段
    'RBAC_AUTH_KEY'                 => 'id',       //用户SESSION名
    'RBAC_NO_AUTH'                  => array('Login/login','Index/index','Index/welcome'),     //不需要验证的控制器或方法如:array('index/index')表示index控制器的index方法不需要验证
    'RBAC_USER_TABLE'               => 'user',      //用户表
    'RBAC_ROLE_TABLE'               => 'role',      //角色表
    'RBAC_NODE_TABLE'               => 'node',      //节点表
    'RBAC_ROLE_USER_TABLE'          => 'role_user', //角色与用户关联表
    'ACCESS_TABLE'                  => 'access',    //权限分配表

    'COOKIE_EXPIRE'                 => 1000000,             // Coodie有效期
    'COOKIE_DOMAIN'                 => '',                  // Cookie有效域名
    'COOKIE_PATH'                   => '/',                 // Cookie路径
    'COOKIE_PREFIX'                 => 'gz_',               // Cookie前缀 避免冲突);
);
return array_merge($common,include 'db.inc.php');