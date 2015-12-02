<?php

/**
 * 框架配置项
 */
return array(
	"DEFAULT_TIMES_ZONE" => "PRC",
	"SESSION_AUTO_START" => true,
	"VAR_CONTROLLER"     => "c",
	"VAR_ACTION"         => "a",
	"SAVE_LOG"           => true,
	"AUTO_LOAD_FILE"     => array(),
	"ERROR_URL"          => '',
	"ERROR_MSG"          =>'网站出错了。。。请稍后再试',

	/*===========================================================
	数据库连接相关配置*/
	'DB_CHARSET'	=>	'utf8',
	'DB_HOST'		=>	'127.0.0.1',
	'DB_PORT'		=>  3306,
	'DB_USER'		=> 'root',
	'DB_PASSWORD'	=> '',
	'DB_DATABASE'	=> '',
	'DB_PREFIX'		=> '',
    'DB_DEBUG'              =>  true, // 开启调试模式 记录SQL日志

	/*=============================================================
	smarty配置*/
	"SMARTY_ON"      => true,
	"LEFT_DELIMITER" => '{#',
	"RIGHT_DELIMITER"=> '#}',
	"CACHE_ON"       => false,
	"CACHE_TIME"     => 0,
	/*=============================================================
	验证码配置*/
    'CODE_FONT'                     => MYPHP_DATA_PATH . '/Font/font.ttf', //字体
    'CODE_STR'                      => '23456789abcdefghjkmnpqrstuvwsyz', //验证码种子
    'CODE_WIDTH'                    => 120,         //宽度
    'CODE_HEIGHT'                   => 35,          //高度
    'CODE_BG_COLOR'                 => '#ffffff',   //背景颜色
    'CODE_LEN'                      => 4,           //文字数量
    'CODE_FONT_SIZE'                => 20,          //字体大小
    'CODE_FONT_COLOR'               => '',   //字体颜色
    /********************************URL设置********************************/
    'HTTPS'                         => FALSE,       //基于https协议
    'URL_REWRITE'                   => FALSE,       //url重写模式
    'URL_TYPE'                      => 2,           //类型 1:PATHINFO模式 2:普通模式 3:兼容模式
    'PATHINFO_DLI'                  => '/',         //URL分隔符 URL_TYPE为1、3时起效
    'PATHINFO_VAR'                  => 'q',         //兼容模式get变量
    'HTML_SUFFIX'                   => '',          //伪静态扩展名
    'VAR_GROUP'                     => 'g',         //模块组URL变量
    'VAR_MODULE'                    => 'm',         //模块URL变量
    'VAR_CONTROLLER'                => 'c',         //控制器URL变量
    'VAR_ACTION'                    => 'a',         //动作URL变量
    'DENY_MODULE'                   => array('Common','Temp','Addons'),//禁止使用的模块
    'DEFAULT_MODULE'                => 'Index',     //默认模块
    'DEFAULT_CONTROLLER'            => 'Index',     //默认控制器
    'DEFAULT_ACTION'                => 'index',     //默认方法
    'CONTROLLER_FIX'                => 'Controller',//控制器文件后缀
    'MODEL_FIX'                     => 'Model',     //模型文件名后缀
   /********************************URL路由********************************/
    'ROUTE'                         => array(),
    /********************************分页处理********************************/
    'PAGE_VAR'                      => 'page',      //分页GET变量
    'PAGE_ROW'                      => 10,          //页码数量
    'PAGE_SHOW_ROW'                 => 10,          //每页显示条数
    'PAGE_STYLE'                    => 2,           //页码风格
    'PAGE_DESC'                     => array('pre' => '上一页', 'next' => '下一页',//分页文字设置
                                            'first' => '首页', 'end' => '尾页', 'unit' => '条'),
/********************************RBAC权限控制********************************/
    'RBAC_TYPE'                     => 1,           //1时时认证｜2登录认证
    'RBAC_SUPER_ADMIN'              => 'admin', //超级管理员SESSION名
    'RBAC_USERNAME_FIELD'           => 'admin_username',  //用户名字段
    'RBAC_PASSWORD_FIELD'           => 'admin_pwd',  //密码字段
    'RBAC_AUTH_KEY'                 => 'uid',       //用户SESSION名
    'RBAC_NO_AUTH'                  => array(),     //不需要验证的控制器或方法如:array('index/index')表示index控制器的index方法不需要验证
    'RBAC_USER_TABLE'               => 'user',      //用户表
    'RBAC_ROLE_TABLE'               => 'role',      //角色表
    'RBAC_NODE_TABLE'               => 'node',      //节点表
    'RBAC_ROLE_USER_TABLE'          => 'role_user', //角色与用户关联表
    'ACCESS_TABLE'                  => 'access',    //权限分配表  
/***********************************==================*/
    'RBAC_SUPERADMIN'               =>'admin',     //超级管理员
    'ADMIN_AUTH_KEY'                =>'superadmin',//超级管理员识别
    'USER_AUTH_ON'                  =>true,       //是否开启验证
    'USER_AUTH_TYPE'                =>1,          //1登录验证，2时时验证 
    'USER_AUTH_KEY'                 =>'uid',        //用户认证识别号
    'NOT_AUTH_MODULE'               =>"",          //无需验证的控制器
    'NOT_AUTH_ACTION'               =>"",           //无需认证的动作方法
);