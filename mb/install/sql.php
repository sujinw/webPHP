<?php
/*沃のQQ790131300*/
$my="drop table lm";
mysql_query($my);
/*用户*/
$wd="CREATE TABLE `name` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`mm` varchar(32) DEFAULT NULL,
	`sj` varchar(32) DEFAULT NULL,
	`name` varchar(32) DEFAULT NULL,
	`qm` varchar(100) DEFAULT NULL,
    `vip` varchar(32) DEFAULT NULL,
    `money` varchar(320) DEFAULT NULL,
    `zan` varchar(32) DEFAULT NULL,
    `ip` varchar(32) DEFAULT NULL,
    `time` varchar(32) DEFAULT NULL,
    `ziliao` text,
    `ci` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=10000 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建用户表成功<br/>";
}else{
echo "失败<br/>";
}

/*注册验证码*/
$wd="CREATE TABLE `code` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`qq` varchar(32) DEFAULT NULL,
	`code` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建验证码表成功<br/>";
}else{
echo "失败<br/>";
}
/*文章*/
$wd="CREATE TABLE `article` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`classify` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
    `content` text,
	`time` varchar(32) DEFAULT NULL,
	`sh` varchar(32) DEFAULT NULL,
    `rq` varchar(32) DEFAULT NULL,
	`uid` varchar(32) DEFAULT NULL,
     `z` varchar(32) DEFAULT NULL,
     `ip` text,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建文章表成功<br/>";
}else{
echo "失败<br/>";
}


/*论坛id,name,classify,title,content,time,sh,rq,uid,url,filetext*/
$wd="CREATE TABLE `bbs` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`classify` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
    `content` text,
	`time` varchar(32) DEFAULT NULL,
	`sh` varchar(32) DEFAULT NULL,
    `rq` varchar(32) DEFAULT NULL,
	`uid` varchar(32) DEFAULT NULL,
     `url` text,
     `filetext` text,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建论坛表成功<br/>";
}else{
echo "论坛表失败<br/>";
}


/*栏目*/
$wd="CREATE TABLE `lm` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
  `content` text,
    `classify` varchar(32) DEFAULT NULL,
    `seotitle` varchar(320) DEFAULT NULL,
    `seokey` varchar(320) DEFAULT NULL,
    `seodes` varchar(520) DEFAULT NULL,
    `sh` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "<br>创建栏目表成功<br/>";
}else{
echo "失败<br/>";
}
/*留言*/
$wd="CREATE TABLE `ly` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`time` varchar(32) DEFAULT NULL,
	`ip` varchar(32) DEFAULT NULL,
    `content` text,
    `sh` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "<br>创建留言表成功<br/>";
}else{
echo "失败<br/>";
}
/*友粘*/
$wd="CREATE TABLE `link` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`classify` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
	`title1` varchar(32) DEFAULT NULL,
	`url` varchar(100) DEFAULT NULL,
	`content` varchar(100) DEFAULT NULL,
	`l` varchar(32) DEFAULT NULL,
	`q` varchar(32) DEFAULT NULL,
	`ls` varchar(32) DEFAULT NULL,
	`qs` varchar(32) DEFAULT NULL,
    `sh` varchar(32) DEFAULT NULL,
    `time` varchar(32) DEFAULT NULL,
    `z` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建友连表成功<br/>";
}else{
echo "失败<br/>";
}
/*举报文章*/
$wd="CREATE TABLE `jb` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
    `content` text,
	`uid` varchar(32) DEFAULT NULL,
    `sh` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "<br>创建举报表成功<br/>";
}else{
echo "失败<br/>";
}
/*评论*/
$wd="CREATE TABLE `pl` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`uid` varchar(32) DEFAULT NULL,
	`name` varchar(32) DEFAULT NULL,
   `classify` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
    `content` text,
    `sh` varchar(32) DEFAULT NULL,
   `zan` varchar(32) DEFAULT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "<br>创建评论表成功<br/>";
}else{
echo "失败<br/>";
}

/*笑话*/
$wd="CREATE TABLE `xiaohua` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`name` varchar(32) DEFAULT NULL,
	`classify` varchar(32) DEFAULT NULL,
	`title` varchar(32) DEFAULT NULL,
    `content` text,
	`time` varchar(32) DEFAULT NULL,
	`sh` varchar(32) DEFAULT NULL,
    `rq` varchar(32) DEFAULT NULL,
	`uid` varchar(32) DEFAULT NULL,
     `zan` varchar(32) DEFAULT NULL,
     `nozan` varchar(32) DEFAULT NULL,
     `ip` text,
	PRIMARY KEY (`id`)
	) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
$mysql_query=mysql_query($wd);
if($mysql_query){
echo "创建笑话表成功<br/>";
}else{
echo "失败<br/>";
}
?>