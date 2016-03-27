-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?03 �?19 �?13:25
-- 服务器版本: 5.5.40
-- PHP 版本: 5.5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `gzcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `gz_access`
--

CREATE TABLE IF NOT EXISTS `gz_access` (
  `role_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `node_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '节点ID',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '权限等级',
  `module` varchar(50) DEFAULT NULL COMMENT '权限描述',
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='权限控制表';

-- --------------------------------------------------------

--
-- 表的结构 `gz_article`
--

CREATE TABLE IF NOT EXISTS `gz_article` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL DEFAULT '1' COMMENT '分类id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标签',
  `highlight` int(4) NOT NULL DEFAULT '0' COMMENT '是否高亮标题',
  `recommend` int(4) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `author` varchar(16) NOT NULL DEFAULT '' COMMENT '作者',
  `source` varchar(255) NOT NULL DEFAULT '' COMMENT '文章来源',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '文章内的图片',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `excerpt` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `details` text NOT NULL COMMENT '文章内容',
  `weight` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `digest` int(4) NOT NULL DEFAULT '0' COMMENT '置顶',
  `display` int(4) NOT NULL DEFAULT '0' COMMENT '显示',
  `modified` int(11) NOT NULL DEFAULT '0' COMMENT '上一次修改时间',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '发表时间',
  `like` int(11) DEFAULT '0' COMMENT '喜欢',
  `uid` int(11) DEFAULT NULL COMMENT '发表用户id',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章表' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_article_category`
--

CREATE TABLE IF NOT EXISTS `gz_article_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(255) NOT NULL DEFAULT '' COMMENT '分类名称',
  `cremark` varchar(255) NOT NULL DEFAULT '' COMMENT '分类的描述',
  `seo_title` varchar(255) DEFAULT NULL COMMENT '分类的seo标题',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT '分类的seo关键字',
  `seo_des` varchar(255) DEFAULT NULL COMMENT '分类的seo描述',
  `is_lock` int(4) NOT NULL DEFAULT '1' COMMENT '是否锁定',
  `is_delete` int(4) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级id',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='文章分类表' AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_article_reply`
--

CREATE TABLE IF NOT EXISTS `gz_article_reply` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL COMMENT '文章id',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `rcontent` varchar(255) DEFAULT NULL COMMENT '评论内容',
  `float` int(11) DEFAULT NULL COMMENT '本评论楼层',
  `tofloat` int(11) DEFAULT NULL COMMENT '回复第几层',
  `zan` int(11) DEFAULT '0' COMMENT '被赞次数',
  `create_time` int(10) DEFAULT NULL COMMENT '回复时间',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章评论表' AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_config`
--

CREATE TABLE IF NOT EXISTS `gz_config` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `name` char(30) NOT NULL DEFAULT '',
  `value` char(100) NOT NULL DEFAULT '',
  `show_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 文本框    2  单选框',
  `message` varchar(255) NOT NULL DEFAULT '',
  `option` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网站配置表' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_message_receiver`
--

CREATE TABLE IF NOT EXISTS `gz_message_receiver` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL DEFAULT '0' COMMENT '发件表的id',
  `to_uid` int(11) NOT NULL DEFAULT '0' COMMENT '收件人id',
  `to_username` varchar(32) NOT NULL DEFAULT '' COMMENT '收件人用户名',
  `is_readed` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否已读',
  `is_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否删除',
  `to_nickname` varchar(50) DEFAULT NULL COMMENT '接受昵称',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='站内信收件人信息表' AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_message_sender`
--

CREATE TABLE IF NOT EXISTS `gz_message_sender` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `from_uid` int(11) NOT NULL COMMENT '发信人',
  `from_username` varchar(32) NOT NULL DEFAULT '' COMMENT '发件人用户名',
  `title` varchar(200) NOT NULL COMMENT '信息标题',
  `content` text NOT NULL COMMENT '信息内容',
  `from_deleted` tinyint(3) NOT NULL DEFAULT '0' COMMENT '发件人是否删除',
  `date` int(10) NOT NULL COMMENT '发送日期',
  `is_delete` smallint(3) DEFAULT '0' COMMENT '用户是否删除',
  `is_send` smallint(3) DEFAULT '1' COMMENT '是否发送',
  `from_nickname` varchar(50) DEFAULT NULL COMMENT '发送昵称',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户站内信发件人信息表' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_node`
--

CREATE TABLE IF NOT EXISTS `gz_node` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '节点ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '节点名称',
  `title` varchar(50) DEFAULT NULL COMMENT '节点描述',
  `status` tinyint(1) DEFAULT '0' COMMENT '节点状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '节点详细描述',
  `sort` smallint(6) unsigned DEFAULT NULL COMMENT '节点排序',
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '节点等级',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `name` (`name`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='权限节点表' AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_role`
--

CREATE TABLE IF NOT EXISTS `gz_role` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '角色名称',
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL COMMENT '角色状态',
  `remark` varchar(255) DEFAULT NULL COMMENT '角色描述',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`),
  KEY `status` (`status`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='权限角色表' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_role_user`
--

CREATE TABLE IF NOT EXISTS `gz_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL,
  KEY `group_id` (`role_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED COMMENT='用户和角色关联表';

-- --------------------------------------------------------

--
-- 表的结构 `gz_template`
--

CREATE TABLE IF NOT EXISTS `gz_template` (
  `tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '模板样式id',
  `tname` varchar(50) NOT NULL DEFAULT '' COMMENT '模板名称',
  `tremark` varchar(255) NOT NULL DEFAULT '' COMMENT '模板描述',
  `tsign` varchar(30) NOT NULL DEFAULT '' COMMENT '模板的唯一标记',
  `tversion` varchar(255) NOT NULL DEFAULT '' COMMENT '模板版本标记',
  `thumb` varchar(255) DEFAULT '' COMMENT '模板样式的缩略图',
  `tconfig` varchar(255) NOT NULL DEFAULT '' COMMENT '模板配置文件路径',
  `selected` smallint(4) NOT NULL DEFAULT '0' COMMENT '选中模板标记',
  `tauthor` varchar(50) NOT NULL DEFAULT '' COMMENT '模板作者',
  `tcopyright` varchar(255) DEFAULT '' COMMENT '模板版权说明',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='网站模板表' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_user`
--

CREATE TABLE IF NOT EXISTS `gz_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `admin` smallint(4) DEFAULT '0' COMMENT '后台权限',
  `is_author` smallint(4) DEFAULT '0' COMMENT '是否为原创作者',
  `lever` int(11) DEFAULT '1' COMMENT '用户等级',
  `nickname` varchar(150) DEFAULT NULL COMMENT '用户昵称',
  `yearold` smallint(4) DEFAULT '0' COMMENT '年龄',
  `sex` smallint(4) DEFAULT '1' COMMENT '1为男2为女',
  `is_lock` smallint(4) DEFAULT '0' COMMENT '是否锁定',
  `create_time` int(10) DEFAULT '0' COMMENT '注册时间',
  `super` smallint(4) DEFAULT '0' COMMENT '超级管理员权限',
  `user_img` varchar(255) DEFAULT NULL COMMENT '会员头像',
  `user_des` varchar(200) DEFAULT '' COMMENT '会员签名',
  `hobby` varchar(255) DEFAULT NULL COMMENT '爱好',
  `like_color` varchar(255) DEFAULT NULL COMMENT '喜欢的颜色',
  `licke_sport` varchar(255) DEFAULT NULL COMMENT '喜欢的运动',
  `self_des` varchar(255) DEFAULT NULL COMMENT '自我介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='格子用户表' AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_userlever`
--

CREATE TABLE IF NOT EXISTS `gz_userlever` (
  `lever_id` int(11) NOT NULL AUTO_INCREMENT,
  `lever_name` varchar(100) NOT NULL DEFAULT '' COMMENT '等级名称',
  `lever_des` varchar(255) DEFAULT NULL COMMENT '等级说明',
  PRIMARY KEY (`lever_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='格子用户等级表' AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_userlogin`
--

CREATE TABLE IF NOT EXISTS `gz_userlogin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `login_time` int(10) DEFAULT '0' COMMENT '登录的时间',
  `login_ip` int(11) DEFAULT '0' COMMENT '登录的ip',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='格子用户登录信息记录表' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `gz_zan`
--

CREATE TABLE IF NOT EXISTS `gz_zan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `zid` int(11) DEFAULT NULL COMMENT '用来存储aid或者rid',
  `create_time` int(10) DEFAULT NULL COMMENT '点赞的时间',
  `zantype` smallint(6) DEFAULT '0' COMMENT '1，表示文章点赞，2、表示回复点赞，3、表示会员点赞',
  `zan` int(11) DEFAULT NULL COMMENT '赞',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='点赞表' AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
