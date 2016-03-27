# Host: localhost  (Version: 5.5.40)
# Date: 2016-03-19 18:40:00
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Data for table "gz_access"
#

INSERT INTO `gz_access` (`role_id`,`node_id`,`level`,`module`) VALUES (1,3,3,NULL),(1,2,2,NULL),(1,1,1,NULL),(1,3,3,NULL),(1,2,2,NULL),(1,1,1,NULL),(1,3,3,NULL),(1,2,2,NULL),(1,1,1,NULL),(1,3,3,NULL),(1,2,2,NULL),(1,1,1,NULL);

#
# Data for table "gz_article"
#

INSERT INTO `gz_article` (`aid`,`cid`,`title`,`tags`,`highlight`,`recommend`,`author`,`source`,`image`,`thumb`,`excerpt`,`details`,`weight`,`hits`,`digest`,`display`,`modified`,`create_time`,`like`,`uid`) VALUES (1,1,'默认文章展示标题','原创,格子',0,0,'admin','格子原创','','Upload/ArticleImages/2016/03/19/67901458383974.jpg','默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题','<blockquote style=\"display:block; border-left: 5px solid #d0e5f2; padding:0 0 0 10px; margin:0; line-height:1.4; font-size: 100%;\">默认文<strike>章展示标题默认文章展示标题默认文章</strike>展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题</blockquote><p>默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题默认文章展示标题<img src=\"Upload/ArticleImages/2016/03/19/22611458383971.png\" style=\"line-height: 1; max-width: 100%;\" wangeditor_img_max_width_mark=\"1\"><br></p>',0,0,0,1,0,1458383974,0,NULL);

#
# Data for table "gz_article_category"
#

INSERT INTO `gz_article_category` (`cid`,`cname`,`cremark`,`seo_title`,`seo_keywords`,`seo_des`,`is_lock`,`is_delete`,`create_time`,`sort`,`pid`) VALUES (1,'默认分类','默认分类默认分类默认分类默认分类默认分类默认分类','默认分类','默认分类','默认分类',0,0,1458383894,2,0);

#
# Data for table "gz_article_reply"
#


#
# Data for table "gz_config"
#

INSERT INTO `gz_config` (`id`,`title`,`name`,`value`,`show_type`,`message`,`option`) VALUES (1,'网站名称','webname','格子原创平台-用心写自己的故事',1,'网站名称',''),(2,'ICP','icp','京ICP备12048441号-3',1,'ICP',''),(3,'QQ','qq','634630789',1,'QQ',''),(4,'站长邮箱','email','sujinw@qq.com',1,'站长邮箱',''),(5,'网站开启状态','web_status','1',2,'网站开启状态','1|开启,0|关闭'),(6,'网站关闭提示','close_message','网站升级中...，请1小时后访问，感谢您的支持，你的支持是我们前进的动力！！！！',3,'网站关闭提示',''),(7,'是否开启注册','web_register','1',2,'是否开启注册','1|开启,0|关闭'),(8,'网站关闭注册提示','close_register','网站关闭注册，请联系管理员处理。。。。',3,'网站关闭注册提示','');

#
# Data for table "gz_message_receiver"
#

INSERT INTO `gz_message_receiver` (`rid`,`mid`,`to_uid`,`to_username`,`is_readed`,`is_deleted`,`to_nickname`) VALUES (1,5,2,'slade',1,0,'slade'),(2,6,2,'slade',1,0,'slade'),(3,7,2,'slade',1,0,'slade');

#
# Data for table "gz_message_sender"
#

INSERT INTO `gz_message_sender` (`mid`,`from_uid`,`from_username`,`title`,`content`,`from_deleted`,`date`,`is_delete`,`is_send`,`from_nickname`) VALUES (5,1,'admin','测试发送站内信','\t                            <h2>H+ 后台主题</h2>\r\n\t                            <p>H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本，当然，也集成了很多功能强大，用途广泛的国内外jQuery插件及其他组件，她可以用于所有的Web应用程序，如<b>网站管理后台</b>，<b>网站会员中心</b>，<b>CMS</b>，<b>CRM</b>，<b>OA</b>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p>\r\n\t                            <p>\r\n\t                                <b>当前版本：</b>v4.0.0\r\n\t                            </p>\r\n\t                            <p>\r\n\t                                <b>定价：</b><span class=\"label label-warning\">¥988（不开发票）</span>\r\n\t                            </p>\r\n\t\t\t\t\t\t\t',0,1455713239,0,1,'半朵昙花'),(6,1,'admin','测试发送站内信','\t                            <h2>H+ 后台主题</h2>\r\n\t                            <p>H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本，当然，也集成了很多功能强大，用途广泛的国内外jQuery插件及其他组件，她可以用于所有的Web应用程序，如<b>网站管理后台</b>，<b>网站会员中心</b>，<b>CMS</b>，<b>CRM</b>，<b>OA</b>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p>\r\n\t                            <p>\r\n\t                                <b>当前版本：</b>v4.0.0\r\n\t                            </p>\r\n\t                            <p>\r\n\t                                <b>定价：</b><span class=\"label label-warning\">¥988（不开发票）</span>\r\n\t                            </p>\r\n\t\t\t\t\t\t\t',0,1455713283,0,1,'半朵昙花'),(7,1,'admin','测试发送站内信','\t                            <h2>H+ 后台主题</h2>\r\n\t                            <p>H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本，当然，也集成了很多功能强大，用途广泛的国内外jQuery插件及其他组件，她可以用于所有的Web应用程序，如<b>网站管理后台</b>，<b>网站会员中心</b>，<b>CMS</b>，<b>CRM</b>，<b>OA</b>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p>\r\n\t                            <p>\r\n\t                                <b>当前版本：</b>v4.0.0\r\n\t                            </p>\r\n\t                            <p>\r\n\t                                <b>定价：</b><span class=\"label label-warning\">¥988（不开发票）</span>\r\n\t                            </p>\r\n\t\t\t\t\t\t\t',0,1455713329,0,1,'半朵昙花');

#
# Data for table "gz_node"
#

INSERT INTO `gz_node` (`id`,`name`,`title`,`status`,`remark`,`sort`,`pid`,`level`) VALUES (1,'Index',NULL,1,'前台展示应用',NULL,0,1),(2,'Index',NULL,1,'前台展示控制器',NULL,1,2),(3,'index',NULL,1,'前台默认展示方法',NULL,2,3),(4,'Admin',NULL,1,'后台应用',NULL,0,1),(5,'Index',NULL,1,'后台首页控制器',NULL,4,2),(6,'Article',NULL,1,'后台文章管理控制器',NULL,4,2),(7,'User',NULL,1,'后台用户管理控制器',NULL,4,2),(8,'AdminUser',NULL,1,'后台权限管理控制器',NULL,4,2),(9,'articleList',NULL,1,'文章列表方法',NULL,6,3),(10,'articleCate',NULL,1,'文章分类管理',NULL,6,3),(11,'addArticle',NULL,1,'添加文章',NULL,6,3),(12,'listUser',NULL,1,'用户列表',NULL,7,3),(13,'addUser',NULL,1,'添加用户',NULL,7,3),(14,'userLever',NULL,1,'用户等级',NULL,7,3),(15,'adminList',NULL,1,'管理角色列表',NULL,8,3),(16,'nodeList',NULL,1,'节点列表',NULL,8,3);

#
# Data for table "gz_role"
#

INSERT INTO `gz_role` (`id`,`name`,`pid`,`status`,`remark`) VALUES (1,'Manager',NULL,0,'普通管理员'),(2,'SuperManager',NULL,0,'超级管理员');

#
# Data for table "gz_role_user"
#

INSERT INTO `gz_role_user` (`role_id`,`user_id`) VALUES (2,'1');

#
# Data for table "gz_template"
#

INSERT INTO `gz_template` (`tid`,`tname`,`tremark`,`tsign`,`tversion`,`thumb`,`tconfig`,`selected`,`tauthor`,`tcopyright`,`create_time`) VALUES (1,'格子原创平台系统默认前台风格','格子默认前端样式','default','1.0.0','Upload/TemplateImages/77241454936061.jpg','template/default/config.php',1,'slade','格子原创平台',1454936061),(2,'是是是','是是是','所属','是是是','Upload/TemplateImages/77241454936061.jpg','所属',0,'是是是','是是是',1454936061);

#
# Data for table "gz_user"
#

INSERT INTO `gz_user` (`id`,`username`,`password`,`admin`,`is_author`,`lever`,`nickname`,`yearold`,`sex`,`is_lock`,`create_time`,`super`,`user_img`,`user_des`,`hobby`,`like_color`,`licke_sport`,`self_des`) VALUES (1,'admin','7fef6171469e80d32c0559f88b377245',1,1,1,'格子超级管理员',22,1,0,1458383591,1,NULL,'格子超级管理员账户','折腾格子','黄色','搞格子','我只是喜欢搞格子');

#
# Data for table "gz_userlever"
#

INSERT INTO `gz_userlever` (`lever_id`,`lever_name`,`lever_des`) VALUES (1,'新手','新手'),(2,'打新手','大的'),(3,'速度多少','大叔大婶'),(4,'是滴是滴','大叔大婶'),(5,'sss',NULL),(6,'sss',NULL),(7,'是是是',NULL),(8,'是是',NULL),(9,'是是是',NULL),(10,'所属','所属');

#
# Data for table "gz_userlogin"
#

INSERT INTO `gz_userlogin` (`uid`,`login_time`,`login_ip`) VALUES (1,1458092521,0),(2,1457440242,2130706433);

#
# Data for table "gz_zan"
#

INSERT INTO `gz_zan` (`id`,`uid`,`zid`,`create_time`,`zantype`,`zan`) VALUES (1,1,3,1455242114,3,1);
