<?php /* Smarty version 3.1.27, created on 2015-12-19 22:28:27
         compiled from "E:\WEBPROJECT\PHP\myPHP\template\default\Index\index.html" */ ?>
<?php
/*%%SmartyHeaderCode:226425675698b8599b4_27184188%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1273dfeca0adbc1874f73f716900a3fb72b279a' => 
    array (
      0 => 'E:\\WEBPROJECT\\PHP\\myPHP\\template\\default\\Index\\index.html',
      1 => 1450534788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226425675698b8599b4_27184188',
  'variables' => 
  array (
    'list' => 0,
    'feild' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5675698bade2c4_50349569',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5675698bade2c4_50349569')) {
function content_5675698bade2c4_50349569 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '226425675698b8599b4_27184188';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; minimum-scale=1.0; maximum-scale=2.0">
	<meta name="keywords" content=" 柯林文章资讯电脑模版示例">
	<meta name="description" content=" 柯林文章资讯电脑模版示例 柯林文章资讯电脑模版示例 xk-web.kelink.com ">
	<meta name="author" content="柯林文章资讯电脑模版示例 xk-web.kelink.com">
	<title> 柯林文章资讯电脑模版示例</title>
	<link rel= "icon" href= "/favicon.ico" type= "image/x-icon" media= "screen" />
	<link rel="shortcut icon" href="/favicon.ico" type= "image/x-icon" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('__TEMPPUBLIC__');?>
/css/style_33_common.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo @constant('__TEMPPUBLIC__');?>
/css/style_33_portal_index.css" />
    
	<?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/jquery.min.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/jquery.SuperSlide.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/pace.js" type="text/javascript"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/common.js?sbf" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/luck.js" type="text/javascript"><?php echo '</script'; ?>
>
	<link rel="stylesheet" href="<?php echo @constant('__TEMPPUBLIC__');?>
/css/starry_web.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo @constant('__TEMPPUBLIC__');?>
/css/default-v2.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo @constant('__TEMPPUBLIC__');?>
/css/luck.css" type="text/css" />
    <?php echo '<script'; ?>
 type="text/javascript">
		//柯林默认js调用接口，不可删除,不可修改，必须放在所有的js文件之前
		var KELINKAPI={siteid:1000,classid:0,classname:'柯林文章资讯电脑模版示例',title:'',id:'',domain:'xk-web.kelink.com',parentid:0,func:'wapindex',filen:'wapindex',userid:0,nickname:'游客15760',money:0,rmb:0.00,myvip:'普通会员',myaction:'领任务需要<a href="http://xk-web.kelink.com/waplogin.aspx?siteid=1000&amp;classid=0&amp;sid=-3-0-0-0-320">先登录网站</a>哦～<br/>',ua:'未选',ua1:'未选',logins:false,sid:{sid1:'',ver:'3',cs:'0',lang:'0',myua:'0',width:'320'}};
	<?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/common.js?v=42" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/function.js?v=42" type="text/javascript"><?php echo '</script'; ?>
>
</head>
<body id="nv_portal" class="pg_index" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div id="headnav" >
  <div id="toptb" class="cl">
    <div class="wp">
      <div class="z"><a href="javascript:;"  onclick="setHomepage('xk-web.kelink.com');">设为首页</a><a href="http://kelink.com"  onclick="addFavorite(this.href, '柯林WAP手机自助建站系统');return false;">收藏本站</a></div>
      
      <!-- 用户信息 -->
      
      <div class="userbox">
        <ul class="usernav user_part">
        
          <a href="javascript:;" class="user_login" id="l" onMouseOver="showMenu({'ctrlid':'l','ctrlclass':'hover','duration':2});" onClick="luck2()">登录</a> <a href="/wapreg.aspx?siteid=1000&classid=400" class="user_login">立即注册</a>
        
         
        </ul>
      </div>
    </div>
  </div>
  <div class="header">
    <div class="wp cl"> 
      
      <!-- 站点LOGO -->
      
      <div class="hd_logo">
        <h2><a href="/" title="柯林CMS建站系统"><img src="<?php echo @constant('__TEMPPUBLIC__');?>
/images/logo.png" alt="柯林CMS建站系统" border="0" /></a></h2>
      </div>
      
      <!-- 导航 -->
      
      <div class="nav">
        <ul>
          <li class="a" id="mn_portal" ><a href="/" hidefocus="true" title="Portal"  >首页<span>Portal</span></a></li>
          <li id="mn_P1" onmouseover="showMenu({'ctrlid':this.id,'ctrlclass':'hover','duration':2})"><a href="/article/book_list.aspx?action=new&siteid=1000&classid=400" hidefocus="true" title="News" >资讯<span>News</span></a></li>
          <li id="mn_home_1" ><a href="/article/book_list.aspx?siteid=1000&classid=401" hidefocus="true" title="Waterfall"  >科技<span>Reviews</span></a></li>
          <li><a href="/article/book_list.aspx?siteid=1000&classid=402" hidefocus="true" title="BBS"  >创业<span>Venture</span></a></li>
          <li><a href="/article/book_list.aspx?siteid=1000&classid=403" hidefocus="true" title="Follow">电商<span>Electronic</span></a></li>
          <li><a href="/article/book_list.aspx?siteid=1000&classid=404" hidefocus="true" title="Group">设计<span>Design</span></a></li>
          <li><a href="/article/book_list.aspx?siteid=1000&classid=405" hidefocus="true" title="Share" >福利<span>Welfare</span></a></li>
          <li><a href="/article/book_list.aspx?siteid=1000&classid=406" hidefocus="true" title="Doing">资源<span>Resources</span></a></li>
        </ul>
      </div>
      <div id="scbar" class="cl">
      <form id="search-form" name="g" method="get" action="/article/book_list.aspx">
        <input type="hidden" name="siteid" value="1000">
        <input type="hidden" name="classid" value="0">
        <input type="hidden" name="action" value="search">
        <input type="hidden" name="type" value="title">
          <table cellspacing="0" cellpadding="0">
            <tr>
              <td class="scbar_txt_td"><input type="text" name="key" id="scbar_txt" placeholder="请输入关键字" class=" xg1"></td>
              <td class="scbar_btn_td"><button type="submit" name="searchsubmit" id="scbar_btn" sc="1" class="pn pnc" value="true"></button></td>
            </tr>
          </table>
        </form>
      </div>
      <?php echo '<script'; ?>
 type="text/javascript">

initSearchmenu('scbar', '');

<?php echo '</script'; ?>
> 
      <?php echo '<script'; ?>
 type="text/javascript">

    jQuery(function(){

jQuery("#scbar #scbar_txt").focus(function(){

  jQuery("#scbar").addClass("bgchange");

}).blur(function(){

  jQuery("#scbar").removeClass("bgchange");

});

    })

<?php echo '</script'; ?>
> 
    </div>
  </div>
</div>
<div class="header_fake"></div>

<!-- 二级导航 -->

<div class="sub_nav">
  <ul class="p_pop h_pop" id="mn_P1_menu" style="display: none">
    <li><a href="/article/book_list.aspx?siteid=1000&classid=407" hidefocus="true" >国内新闻</a></li>
    <li><a href="/article/book_list.aspx?siteid=1000&classid=408" hidefocus="true" >国际资讯</a></li>
    <li><a href="/article/book_list.aspx?siteid=1000&classid=409" hidefocus="true" >娱乐八卦</a></li>
  </ul>
  <div class="p_pop h_pop" id="mn_userapp_menu" style="display: none"></div>
</div>


<ul class="sub_menu" id="l_menu" style="display: none;">
  
  <!-- 第三方登录 -->
  
  <li class="user_list app_login"><a href="#"><i class="i_qq"></i>QQ号登录</a></li>
</ul>
<div class="wp" style="display:none;"> 
  
  <!-- 隐藏导航AD位置 --> 
  
</div>
<div id="wapindexwapindex" class="wapindex wapindex-wapindex wapindex"><div id="wp" class="wp j_wp">
  <style id="diy_style" type="text/css">
</style>
</div>
<div class="wp">
  <div id="diy1" class="area"></div>
</div>
<div class="jeavidesign_con mb30 promo cl">
  <div class="web_info cl">
    <div class="today_info cl">
      <div id="jeavi_today_info" class="area">
        <div id="framerLmN1P" class="frame move-span cl frame-1">
          <div id="framerLmN1P_left" class="column frame-1-c">
            <div id="framerLmN1P_left_temp" class="move-span temp"></div>
            <div id="portal_block_589" class="block move-span">
              <div id="portal_block_589_content" class="dxb_bc">
                <p>文章数/posts<em>188</em></p>
                <p style="display: none;">访问量/shares<em>129</em></p>
                <p style="display: none;">在线数/doings<em>3</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="today_tips">
        <div id="jeavi_today_tips" class="area">
          <div id="framertfWAx" class="frame move-span cl frame-1">
            <div id="framertfWAx_left" class="column frame-1-c">
              <div id="framertfWAx_left_temp" class="move-span temp"></div>
              <div id="portal_block_590" class="block move-span">
                <div id="portal_block_590_content" class="dxb_bc"><a href="#">Powered by Kelink CMS</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tags_box cl">
      <div id="jeavi_tags_box" class="area">
        <div id="frameYK8fC7" class="frame move-span cl frame-1">
          <div id="frameYK8fC7_left" class="column frame-1-c">
            <div id="frameYK8fC7_left_temp" class="move-span temp"></div>
            <div id="portal_block_614" class="block move-span">
              <div id="portal_block_614_content" class="dxb_bc">
                <div class="portal_Tit">
                  <h2>热门板块</h2>
                </div>
                
                <a href="/wapindex.aspx?siteid=1000&classid=406" title="资源下载" target="_blank">资源下载</a>
                
                <a href="/wapindex.aspx?siteid=1000&classid=404" title="平面设计" target="_blank">平面设计</a>
                
                <a href="/wapindex.aspx?siteid=1000&classid=402" title="创业经验" target="_blank">创业经验</a>
                
                <a href="/wapindex.aspx?siteid=1000&classid=403" title="电子商务" target="_blank">电子商务</a>
                
                <a href="/wapindex.aspx?siteid=1000&classid=405" title="福利分享" target="_blank">福利分享</a>
                
                <a href="/wapindex.aspx?siteid=1000&classid=401" title="科技评测" target="_blank">科技评测</a>
                
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="jeavi_slide">
    <div id="jeavi_slide" class="area">
      <div id="frameSfem4K" class="frame move-span cl frame-1">
        <div id="frameSfem4K_left" class="column frame-1-c">
          <div id="frameSfem4K_left_temp" class="move-span temp"></div>
          <div id="portal_block_588" class="block move-span">
            <div id="portal_block_588_content" class="dxb_bc"><a class="prev" href="javascript:void(0)"></a> <a class="next" href="javascript:void(0)"></a>
              <div class="bd">
                <ul>
                  
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=280"  target="_blank" title="孙红雷自黑是大狗 黄渤庆幸没错过《极"><img src="http://vpic.video.qq.com/123/e0016b60m2x.png" alt="孙红雷自黑是大狗 黄渤庆幸没错过《极"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=280"  target="_blank" title="孙红雷自黑是大狗 黄渤庆幸没错过《极">孙红雷自黑是大狗 黄渤庆幸没错过《极</a></h2>
                      <div class="cl">
                        <p class="desc"><br/><br/>上周日（6月14日）首播的《极限挑战》，黄磊、黄渤、孙...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=273"  target="_blank" title="王宝强带伤回归《男子汉》 妻子曾劝其"><img src="http://vpic.video.qq.com/4225018611/n0016b21r9p_ori_1.jpg" alt="王宝强带伤回归《男子汉》 妻子曾劝其"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=273"  target="_blank" title="王宝强带伤回归《男子汉》 妻子曾劝其">王宝强带伤回归《男子汉》 妻子曾劝其</a></h2>
                      <div class="cl">
                        <p class="desc">“他（王宝强）这个人还是挺坚持的，所以我也没办法，我说那好吧！谁让我情...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=274"  target="_blank" title="《花少2》许晴独自玩冲沙 别后重逢或"><img src="http://vpic.video.qq.com/123/h00163diidr.png" alt="《花少2》许晴独自玩冲沙 别后重逢或"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=274"  target="_blank" title="《花少2》许晴独自玩冲沙 别后重逢或">《花少2》许晴独自玩冲沙 别后重逢或</a></h2>
                      <div class="cl">
                        <p class="desc">上周节目中，许晴与“花少团”其他成员之间的关系似乎再度“恶化”，甚至出...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=271"  target="_blank" title="鹿晗加盟《真心英雄》 “小鲜肉”或变"><img src="http://vpic.video.qq.com/123/y0016jgcrex.png" alt="鹿晗加盟《真心英雄》 “小鲜肉”或变"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=271"  target="_blank" title="鹿晗加盟《真心英雄》 “小鲜肉”或变">鹿晗加盟《真心英雄》 “小鲜肉”或变</a></h2>
                      <div class="cl">
                        <p class="desc">继公布六男神阵容后，江苏卫视大型原创推理竞技类真人秀《真心英雄》一改往...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=270"  target="_blank" title="杨坤变身建筑工人搬砖 或与鹿晗陈学冬"><img src="http://vpic.video.qq.com/4222610766/d0016hmng7y_ori_1.jpg" alt="杨坤变身建筑工人搬砖 或与鹿晗陈学冬"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=270"  target="_blank" title="杨坤变身建筑工人搬砖 或与鹿晗陈学冬">杨坤变身建筑工人搬砖 或与鹿晗陈学冬</a></h2>
                      <div class="cl">
                        <p class="desc">由江苏卫视联合合宝娱乐推出的大型原创推理竞技类真人秀《真心英雄》近日曝...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=277"  target="_blank" title="网曝《爸爸回来了2》新成员 杨子汪小"><img src="http://vpic.video.qq.com/4252003160/t0156a0xb39_ori_1.jpg" alt="网曝《爸爸回来了2》新成员 杨子汪小"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=277"  target="_blank" title="网曝《爸爸回来了2》新成员 杨子汪小">网曝《爸爸回来了2》新成员 杨子汪小</a></h2>
                      <div class="cl">
                        <p class="desc"></p>
                      </div>
                    </div>
                  </li>
                  
                  
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=232"  target="_blank" title="广东野生动物论斤卖：孔雀900元山鸡"><img src="http://i3.sinaimg.cn/dy/c/2015-06-16/U12734P1T1D31956740F21DT20150616152451.jpg" alt="广东野生动物论斤卖：孔雀900元山鸡"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=232"  target="_blank" title="广东野生动物论斤卖：孔雀900元山鸡">广东野生动物论斤卖：孔雀900元山鸡</a></h2>
                      <div class="cl">
                        <p class="desc">　　太平一家农贸市场如飞禽走兽动物园 林业部门称正重点盯守<br/>　　...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=244"  target="_blank" title="河北肃宁枪击案全程披露 嫌犯首次曝光"><img src="http://p.v.iask.com/855/271/138277846_1.jpg" alt="河北肃宁枪击案全程披露 嫌犯首次曝光"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=244"  target="_blank" title="河北肃宁枪击案全程披露 嫌犯首次曝光">河北肃宁枪击案全程披露 嫌犯首次曝光</a></h2>
                      <div class="cl">
                        <p class="desc">6月初正是肃宁的麦收时节，乡村的石板路上满眼都是金黄。<br/>　　晒...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=237"  target="_blank" title="王仲伟任国务院参事室主任 陈进玉被免"><img src="http://i0.sinaimg.cn/dy/c/2015-06-16/U11347P1T1D31956484F21DT20150616144730.jpg" alt="王仲伟任国务院参事室主任 陈进玉被免"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=237"  target="_blank" title="王仲伟任国务院参事室主任 陈进玉被免">王仲伟任国务院参事室主任 陈进玉被免</a></h2>
                      <div class="cl">
                        <p class="desc">　　国务院任免国家工作人员。<br/>　　任命王仲伟为国务院参事室主任；...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=248"  target="_blank" title="数据显示高速公路上市公司暴利超银行房"><img src="http://i2.sinaimg.cn/dy/cr/2015/0616/4262251498.jpg" alt="数据显示高速公路上市公司暴利超银行房"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=248"  target="_blank" title="数据显示高速公路上市公司暴利超银行房">数据显示高速公路上市公司暴利超银行房</a></h2>
                      <div class="cl">
                        <p class="desc">不久前，国家交通运输部和广东省交通厅相继晒出2013年和2014年高速...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=234"  target="_blank" title="中国新型1600吨龙门吊开工 可用于"><img src="http://i2.sinaimg.cn/dy/c/p/2015-06-16/U12527P1T1D31956632F21DT20150616145848.jpg" alt="中国新型1600吨龙门吊开工 可用于"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=234"  target="_blank" title="中国新型1600吨龙门吊开工 可用于">中国新型1600吨龙门吊开工 可用于</a></h2>
                      <div class="cl">
                        <p class="desc">2015年6月8日上午，江南造船集团用于江南长兴造船基地四号船坞的16...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=233"  target="_blank" title="李克强:核电装备要在国际市场立中国制"><img src="http://i3.sinaimg.cn/dy/c/2015-06-16/1434441750_NllcgG.jpg" alt="李克强:核电装备要在国际市场立中国制"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=233"  target="_blank" title="李克强:核电装备要在国际市场立中国制">李克强:核电装备要在国际市场立中国制</a></h2>
                      <div class="cl">
                        <p class="desc">　　“我们的高铁在世界上已有口碑，接下来要推出更高水平的核电，要在国际...</p>
                      </div>
                    </div>
                  </li>
                  
                  
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=267"  target="_blank" title="美国中餐馆取名“砍砍中国佬”被停业("><img src="http://i1.sinaimg.cn/dy/w/p/2015-06-09/U10608P1T1D31931689F21DT20150609221122.jpg" alt="美国中餐馆取名“砍砍中国佬”被停业("></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=267"  target="_blank" title="美国中餐馆取名“砍砍中国佬”被停业(">美国中餐馆取名“砍砍中国佬”被停业(</a></h2>
                      <div class="cl">
                        <p class="desc">　　据《芝加哥论坛报》报道，近日，芝加哥一家湖景中餐馆因其备受争议的中...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=261"  target="_blank" title="骨折不误办公:克里住院通过电话处理公"><img src="http://i2.sinaimg.cn/dy/w/p/2015-06-10/U7107P1T1D31935522F21DT20150610161758.jpeg" alt="骨折不误办公:克里住院通过电话处理公"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=261"  target="_blank" title="骨折不误办公:克里住院通过电话处理公">骨折不误办公:克里住院通过电话处理公</a></h2>
                      <div class="cl">
                        <p class="desc">　　中新网6月10日电 据外媒9日报道，日前因为骑车摔骨折的美国国务卿...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=262"  target="_blank" title="日本将举办首场尼姑相亲会 非僧籍男性"><img src="http://i0.sinaimg.cn/dy/w/2015-06-10/U7107P1T1D31936196F21DT20150610211827.jpeg" alt="日本将举办首场尼姑相亲会 非僧籍男性"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=262"  target="_blank" title="日本将举办首场尼姑相亲会 非僧籍男性">日本将举办首场尼姑相亲会 非僧籍男性</a></h2>
                      <div class="cl">
                        <p class="desc">　　<b>参考消息网6月10日报道</b> 台媒称，日本的新潟县三条市...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=266"  target="_blank" title="印度城市出新规除便溺陋习:上一次公厕"><img src="http://i2.sinaimg.cn/dy/w/2015-06-10/1433912359_yPV1BW.jpg" alt="印度城市出新规除便溺陋习:上一次公厕"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=266"  target="_blank" title="印度城市出新规除便溺陋习:上一次公厕">印度城市出新规除便溺陋习:上一次公厕</a></h2>
                      <div class="cl">
                        <p class="desc">　　中国日报网6月10日电(信莲)据外媒6月9日报道，印度西部城市艾哈...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=268"  target="_blank" title="日本电梯为应对地震拟配饮用水和马桶"><img src="http://i0.sinaimg.cn/dy/w/2015-06-10/1433904010_LKpW31.jpg" alt="日本电梯为应对地震拟配饮用水和马桶"></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=268"  target="_blank" title="日本电梯为应对地震拟配饮用水和马桶">日本电梯为应对地震拟配饮用水和马桶</a></h2>
                      <div class="cl">
                        <p class="desc">　　中国日报网6月10日电(信莲) 据日本共同社报道，在5月30日小笠...</p>
                      </div>
                    </div>
                  </li>
                  
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=255"  target="_blank" title="墨西哥军警在仓库查获40.6吨大麻("><img src="http://i3.sinaimg.cn/dy/w/p/2015-06-14/1434248468_ztNN3B.jpg" alt="墨西哥军警在仓库查获40.6吨大麻("></a>
                    <div class="t_box  whitebg">
                      <h2><a href="http://xk-web.kelink.com/article/view.aspx?id=255"  target="_blank" title="墨西哥军警在仓库查获40.6吨大麻(">墨西哥军警在仓库查获40.6吨大麻(</a></h2>
                      <div class="cl">
                        <p class="desc">　　当地时间2015年6月13日，墨西哥军队和警方在一处被用作仓库的房...</p>
                      </div>
                    </div>
                  </li>
                  
                  
                </ul>
              </div>
              <div class="hd  whitebg">
                <ul>
                  <li>●</li>
                  <li>●</li>
                  <li>●</li>
                  <li>●</li>
                  <li>●</li>
                  <li>●</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

  <div class="toady_new">
    <div id="jeavi_toady_new" class="area">
      <div id="framevNpzn6" class="frame move-span cl frame-1">
        <div id="framevNpzn6_left" class="column frame-1-c">
          <div id="framevNpzn6_left_temp" class="move-span temp"></div>
          <div id="portal_block_591" class="block move-span">
            <div id="portal_block_591_content" class="dxb_bc">
              <div class="portal_Tit">
                <h2>最新动态</h2>
                <a href="javascript:void(0)" class="next">换一组</a> </div>
              <div class="bd">
                <ul>
                
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=234" title="中国新型1600吨龙门吊开工 可用于造航母(图)"><img src="http://i2.sinaimg.cn/dy/c/p/2015-06-16/U12527P1T1D31956632F21DT20150616145848.jpg" width="80" height="80" alt="中国新型1600吨龙门吊开工 可用于造航母(图)"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=234" title="中国新型1600吨龙门吊开工 可用于造航母(图)">中国新型1600吨龙门吊开工 可用于造航母(图)</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=236" title="国务院任免工作人员:陈久松任国家信访局副局长"><img src="http://i0.sinaimg.cn/dy/2015/0616/U11283P1DT20150616151749.jpg" width="80" height="80" alt="国务院任免工作人员:陈久松任国家信访局副局长"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=236" title="国务院任免工作人员:陈久松任国家信访局副局长">国务院任免工作人员:陈久松任国家信访局副局长</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=247" title="山西省长李小鹏经中央批准访问美国"><img src="http://i2.sinaimg.cn/dy/c/2015-06-16/U12527P1T1D31955283F21DT20150616081128.jpg" width="80" height="80" alt="山西省长李小鹏经中央批准访问美国"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=247" title="山西省长李小鹏经中央批准访问美国">山西省长李小鹏经中央批准访问美国</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=243" title="卫计委:对感染艾滋病孕产妇提供免费抗病毒治疗"><img src="http://i1.sinaimg.cn/dy/c/2015-06-16/U11347P1T1D31955886F21DT20150616105049.jpg" width="80" height="80" alt="卫计委:对感染艾滋病孕产妇提供免费抗病毒治疗"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=243" title="卫计委:对感染艾滋病孕产妇提供免费抗病毒治疗">卫计委:对感染艾滋病孕产妇提供免费抗病毒治疗</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=232" title="广东野生动物论斤卖：孔雀900元山鸡41元"><img src="http://i3.sinaimg.cn/dy/c/2015-06-16/U12734P1T1D31956740F21DT20150616152451.jpg" width="80" height="80" alt="广东野生动物论斤卖：孔雀900元山鸡41元"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=232" title="广东野生动物论斤卖：孔雀900元山鸡41元">广东野生动物论斤卖：孔雀900元山鸡41元</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=242" title="新疆火焰山地表温度达68℃ 网友：我已七成熟"><img src="http://i0.sinaimg.cn/dy/c/2015-06-16/1434431965_cjS3B4.jpg" width="80" height="80" alt="新疆火焰山地表温度达68℃ 网友：我已七成熟"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=242" title="新疆火焰山地表温度达68℃ 网友：我已七成熟">新疆火焰山地表温度达68℃ 网友：我已七成熟</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=244" title="河北肃宁枪击案全程披露 嫌犯首次曝光(组图)"><img src="http://p.v.iask.com/855/271/138277846_1.jpg" width="80" height="80" alt="河北肃宁枪击案全程披露 嫌犯首次曝光(组图)"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=244" title="河北肃宁枪击案全程披露 嫌犯首次曝光(组图)">河北肃宁枪击案全程披露 嫌犯首次曝光(组图)</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=239" title="媒体探访北京政府搬迁传闻地:村庄拆迁即将开始"><img src="http://i3.sinaimg.cn/dy/c/2015-06-16/U12527P1T1D31956354F21DT20150616135259.jpg" width="80" height="80" alt="媒体探访北京政府搬迁传闻地:村庄拆迁即将开始"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=239" title="媒体探访北京政府搬迁传闻地:村庄拆迁即将开始">媒体探访北京政府搬迁传闻地:村庄拆迁即将开始</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                  <li class="cl">
                    <div class="pic-link"><a href="http://xk-web.kelink.com/article/view.aspx?id=249" title="中国近期将完成南沙部分岛礁陆域吹填工程"><img src="http://p.v.iask.com/521/772/138261677_1.jpg" width="80" height="80" alt="中国近期将完成南沙部分岛礁陆域吹填工程"></a> </div>
                    <div class="desc-box">
                      <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=249" title="中国近期将完成南沙部分岛礁陆域吹填工程">中国近期将完成南沙部分岛礁陆域吹填工程</a></h3>
                      <p class="meta"><span class="meta-date">2015-06-16</span> </p>
                    </div>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 promo cl">
  <div class="wonderful">
    <div class="index_Tit">
      <div id="wonderful-hd" class="area">
        <div id="frameOtyk7V" class="frame move-span cl frame-1">
          <div id="frameOtyk7V_left" class="column frame-1-c">
            <div id="frameOtyk7V_left_temp" class="move-span temp"></div>
            <div id="portal_block_601" class="block move-span">
              <div id="portal_block_601_content" class="dxb_bc">
                <div class="portal_block_summary">
                  <h2>科技评测</h2>
                  <div class="btn"> <a href="javascript:void(0)" class="prev"></a> <a href="javascript:void(0)" class="next"></a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bd JFrame cl">
      <div id="wonderful-c" class="area">
        <div id="frameWLqubd" class="frame move-span cl frame-1">
          <div id="frameWLqubd_left" class="column frame-1-c">
            <div id="frameWLqubd_left_temp" class="move-span temp"></div>
            <div id="portal_block_600" class="block move-span">
              <div id="portal_block_600_content" class="dxb_bc">
                <ul>
                
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=102" title="金立E8评测:1亿象素欲做手机中的显微镜"><i></i><img src="http://upload.chinaz.com/2015/0615/1434347862654.jpg" width="212" height="158" alt="金立E8评测:1亿象素欲做手机中的显微镜"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=102" title="金立E8评测:1亿象素欲做手机中的显微镜" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=102"  title="金立E8评测:1亿象素欲做手机中的显微镜">金立E8评测:1亿象素欲做手机中的显微镜</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=104" title="拍照玩出新花样 nubia Z9多重曝光体验"><i></i><img src="http://upload.chinaz.com/2015/0615/1434353042887.jpg" width="212" height="158" alt="拍照玩出新花样 nubia Z9多重曝光体验"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=104" title="拍照玩出新花样 nubia Z9多重曝光体验" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=104"  title="拍照玩出新花样 nubia Z9多重曝光体验">拍照玩出新花样 nubia Z9多重曝光体验</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=95" title="魅蓝Note2评测：以价格换销量的典型性产品"><i></i><img src="http://upload.chinaz.com/2015/0610/1433943026994.jpg" width="212" height="158" alt="魅蓝Note2评测：以价格换销量的典型性产品"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=95" title="魅蓝Note2评测：以价格换销量的典型性产品" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=95"  title="魅蓝Note2评测：以价格换销量的典型性产品">魅蓝Note2评测：以价格换销量的典型性产品</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=101" title="半年了 小米远远地对着友商报了些数字"><i></i><img src="http://upload.chinaz.com/2015/0611/1433980999756.jpg" width="212" height="158" alt="半年了 小米远远地对着友商报了些数字"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=101" title="半年了 小米远远地对着友商报了些数字" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-24</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=101"  title="半年了 小米远远地对着友商报了些数字">半年了 小米远远地对着友商报了些数字</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=106" title="全新小米路由器：“1024”的最佳伴侣"><i></i><img src="http://upload.chinaz.com/2015/0615/1434361863745.jpg" width="212" height="158" alt="全新小米路由器：“1024”的最佳伴侣"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=106" title="全新小米路由器：“1024”的最佳伴侣" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=106"  title="全新小米路由器：“1024”的最佳伴侣">全新小米路由器：“1024”的最佳伴侣</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=103" title="6020mAh电池 超级续航金立M5深度评测"><i></i><img src="http://upload.chinaz.com/2015/0611/1433986544155.jpg" width="212" height="158" alt="6020mAh电池 超级续航金立M5深度评测"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=103" title="6020mAh电池 超级续航金立M5深度评测" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=103"  title="6020mAh电池 超级续航金立M5深度评测">6020mAh电池 超级续航金立M5深度评测</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=96" title="[图+视频]新老对比：魅蓝Note 2开箱上手+跑分"><i></i><img src="http://upload.chinaz.com/2015/0614/1434268318135.jpg" width="212" height="158" alt="[图+视频]新老对比：魅蓝Note 2开箱上手+跑分"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=96" title="[图+视频]新老对比：魅蓝Note 2开箱上手+跑分" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=96"  title="[图+视频]新老对比：魅蓝Note 2开箱上手+跑分">[图+视频]新老对比：魅蓝Note 2开箱上手+跑分</a></h3>
                  </li>
                   
                  <li>
                    <div class="wonderful-pic"><a href="http://xk-web.kelink.com/article/view.aspx?id=98" title="激光or相位 LGG4/三星S6对焦速度对比"><i></i><img src="http://upload.chinaz.com/2015/0615/1434327081299.jpg" width="212" height="158" alt="激光or相位 LGG4/三星S6对焦速度对比"></a> <a href="http://xk-web.kelink.com/article/view.aspx?id=98" title="激光or相位 LGG4/三星S6对焦速度对比" class="mask"></a> </div>
                    <div class="meta"><span class="meta-date">2015-06-16</span><span class="meta-replay">0</span> </div>
                    <h3><a href="http://xk-web.kelink.com/article/view.aspx?id=98"  title="激光or相位 LGG4/三星S6对焦速度对比">激光or相位 LGG4/三星S6对焦速度对比</a></h3>
                  </li>
                   
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 cl">
  <div id="ad-1" class="area">
    <div id="framevBEEPx" class="frame move-span cl frame-1">
      <div id="framevBEEPx_left" class="column frame-1-c">
        <div id="framevBEEPx_left_temp" class="move-span temp"></div>
        <div id="portal_block_580" class="block move-span">
          <div id="portal_block_580_content" class="dxb_bc">
            <div class="portal_block_summary"><img src="<?php echo @constant('__TEMPPUBLIC__');?>
/images/cad.jpg" width="1190px" /></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 promo cl">
  <div class="con-l cl">
    <div class="index_Tit">
      <div id="tit-1" class="area">
        <div id="frameF83662" class="frame move-span cl frame-1">
          <div id="frameF83662_left" class="column frame-1-c">
            <div id="frameF83662_left_temp" class="move-span temp"></div>
            <div id="portal_block_593" class="block move-span">
              <div id="portal_block_593_content" class="dxb_bc">
                <div class="portal_block_summary">
                  <h2>创业经验</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="selected JFrame cl">
      <div id="jeavi_selected" class="area">
        <div id="frameos676W" class="frame move-span cl frame-1">
          <div id="frameos676W_left" class="column frame-1-c">
            <div id="frameos676W_left_temp" class="move-span temp"></div>
            <div id="portal_block_592" class="block move-span">
              <div id="portal_block_592_content" class="dxb_bc">
                <ul>
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('row'=>8,'order'=>'new','image'=>1)); $_block_repeat=true; echo arclist(array('row'=>8,'order'=>'new','image'=>1), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['feild'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['feild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['feild']->value) {
$_smarty_tpl->tpl_vars['feild']->_loop = true;
$foreach_feild_Sav = $_smarty_tpl->tpl_vars['feild'];
?>                   
                  <li><a href="<?php echo @constant('__APP__');?>
?c=View&type=article&aid=<?php echo $_smarty_tpl->tpl_vars['feild']->value['aid'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
"  target="_blank">
                    <div class="pic-link"><img src="<?php echo $_smarty_tpl->tpl_vars['feild']->value['thumb'];?>
" width="130" height="100" alt="<?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
"></div>
                    <div class="desc-box">
                      <h3><?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
</h3>
                      <p class="desc"><?php echo $_smarty_tpl->tpl_vars['feild']->value['excerpt'];?>
</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>2 人浏览</span></p>
                    </div>
                    </a> </li>
                   <?php
$_smarty_tpl->tpl_vars['feild'] = $foreach_feild_Sav;
}
?>
                  <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo arclist(array('row'=>8,'order'=>'new','image'=>1), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="con-r cl">
    <div class="follow-info mb10 cl">
      <div id="web-info" class="area">
        <div id="framerE0vsS" class="frame move-span cl frame-1">
          <div id="framerE0vsS_left" class="column frame-1-c">
            <div id="framerE0vsS_left_temp" class="move-span temp"></div>
            <div id="portal_block_587" class="block move-span">
              <div id="portal_block_587_content" class="dxb_bc">
                <div class="portal_block_summary">
                  <div class="index_Tit">
                    <h2>关注我们</h2>
                  </div>
                  <div class="bd">
                    <ul>
                      <li><a href="http://t.qq.com/kelinkCom" target="_blank"><em class="toadypost"> <i></i> </em> <span class="info_num">腾讯<br />
                        <p>Ting</p>
                        </span> </a> </li>
                      <li><a href="http://weibo.com/u/1563257394" target="_blank"><em class="allpost"> <i></i> </em> <span class="info_num">新浪<br />
                        <p>Weibo</p>
                        </span> </a> </li>
                      <li><a href="#"> <em class="alluser"> <i></i></em> <span class="info_num">微信<br />
                        <p>WeChat</p>
                        </span> </a>
                        <div class="weixin">
              <div class="box"><img src="<?php echo @constant('__TEMPPUBLIC__');?>
/images/kelinkQR.jpg">
                <p class="box_i">扫描二维码关注我们</p>
                <b class="bubble_trig ui_trigbox ui_trigbox_t" style="left: 68px;"><b class="ui_trig"></b><b class="ui_trig ui_trig_up"></b></b></div>
            </div></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hbody mb10 cl">
      <div class="index_Tit hd cl">
        <div id="hbodytit" class="area">
          <div id="frameL93Zz3" class="frame move-span cl frame-1">
            <div id="frameL93Zz3_left" class="column frame-1-c">
              <div id="frameL93Zz3_left_temp" class="move-span temp"></div>
              <div id="portal_block_583" class="block move-span">
                <div id="portal_block_583_content" class="dxb_bc">
                  <div class="portal_block_summary">
                    <h2>排行榜</h2>
                    <ul>
                      <li>热门</li>
                      <li>最新</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="JFrame bd">
        <ul>
          <div id="hbody" class="area">
            <div id="frameP3arP3" class="frame move-span cl frame-1">
              <div id="frameP3arP3_left" class="column frame-1-c">
                <div id="frameP3arP3_left_temp" class="move-span temp"></div>
                <div id="portal_block_582" class="block move-span">
                  <div id="portal_block_582_content" class="dxb_bc">
                  <?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('row'=>10,'order'=>'hot')); $_block_repeat=true; echo arclist(array('row'=>10,'order'=>'hot'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['feild'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['feild']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_foo'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['feild']->value) {
$_smarty_tpl->tpl_vars['feild']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration']++;
$foreach_feild_Sav = $_smarty_tpl->tpl_vars['feild'];
?>
                    <li><em class="turn"><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration'] : null);?>
.</em><a href="<?php echo @constant('__APP__');?>
?c=View&type=article&aid=<?php echo $_smarty_tpl->tpl_vars['feild']->value['aid'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['feild'] = $foreach_feild_Sav;
}
?>
                  <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo arclist(array('row'=>10,'order'=>'hot'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
   
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </ul>
        <ul>
          <div id="hbody1" class="area">
            <div id="framemaySiK" class="frame move-span cl frame-1">
              <div id="framemaySiK_left" class="column frame-1-c">
                <div id="framemaySiK_left_temp" class="move-span temp"></div>
                <div id="portal_block_581" class="block move-span">
                  <div id="portal_block_581_content" class="dxb_bc">
                  <?php $_smarty_tpl->smarty->_tag_stack[] = array('arclist', array('row'=>10,'order'=>'new')); $_block_repeat=true; echo arclist(array('row'=>10,'order'=>'new'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();
$_from = $_smarty_tpl->tpl_vars['list']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['feild'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['feild']->_loop = false;
$_smarty_tpl->tpl_vars['__foreach_foo'] = new Smarty_Variable(array('iteration' => 0));
foreach ($_from as $_smarty_tpl->tpl_vars['feild']->value) {
$_smarty_tpl->tpl_vars['feild']->_loop = true;
$_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration']++;
$foreach_feild_Sav = $_smarty_tpl->tpl_vars['feild'];
?>
                    <li><em class="turn"><?php echo (isset($_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration']) ? $_smarty_tpl->tpl_vars['__foreach_foo']->value['iteration'] : null);?>
.</em><a href="<?php echo @constant('__APP__');?>
?c=View&type=article&aid=<?php echo $_smarty_tpl->tpl_vars['feild']->value['aid'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['feild']->value['title'];?>
</a></li>
                    <?php
$_smarty_tpl->tpl_vars['feild'] = $foreach_feild_Sav;
}
?>
                  <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo arclist(array('row'=>10,'order'=>'new'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 promo cl">
  <div class="index_Tit">
    <div id="tit-t" class="area">
      <div id="framei4dt0t" class="frame move-span cl frame-1">
        <div id="framei4dt0t_left" class="column frame-1-c">
          <div id="framei4dt0t_left_temp" class="move-span temp"></div>
          <div id="portal_block_596" class="block move-span">
            <div id="portal_block_596_content" class="dxb_bc">
              <div class="portal_block_summary">
                <h2>平面设计</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="p_pic JFrame cl">
    <div class="scroller cl">
      <div id="scroller" class="area">
        <div id="frameR9f9d9" class="frame move-span cl frame-1">
          <div id="frameR9f9d9_left" class="column frame-1-c">
            <div id="frameR9f9d9_left_temp" class="move-span temp"></div>
            <div id="portal_block_595" class="block move-span">
              <div id="portal_block_595_content" class="dxb_bc"><a class="prev" href="javascript:void(0)"></a> <a class="next" href="javascript:void(0)"></a>
                <div class="bd">
                  <ul>
                  
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=222" title="英文字体推荐以及使用指南"><img src="http://upload.chinaz.com/2015/0608/1433751467277.png" width="270" height="357" alt="英文字体推荐以及使用指南"></a>
                      <div class="whitebg">
                        <h3>英文字体推荐以及使用指南</h3>
                        <p>字体是视觉设计中最重要的传达元...</p>
                      </div>
                    </li>
                    
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=231" title="达人推荐九个绝佳国外免费图片素材网站"><img src="http://upload.chinaz.com/2015/0605/1433492927821.jpg" width="270" height="357" alt="达人推荐九个绝佳国外免费图片素材网站"></a>
                      <div class="whitebg">
                        <h3>达人推荐九个绝佳国外免费图片素材网站</h3>
                        <p>有的设计师为了寻找好的图片素材...</p>
                      </div>
                    </li>
                    
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=213" title="AI教程！制作铅笔图案笔刷"><img src="http://upload.chinaz.com/2015/0609/1433839096611.jpg" width="270" height="357" alt="AI教程！制作铅笔图案笔刷"></a>
                      <div class="whitebg">
                        <h3>AI教程！制作铅笔图案笔刷</h3>
                        <p>[img]http://upl...</p>
                      </div>
                    </li>
                    
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=229" title="PS图层教程！把人山人海的旅游照做成极简风格相片"><img src="http://upload.chinaz.com/2015/0610/1433906620488.jpg" width="270" height="357" alt="PS图层教程！把人山人海的旅游照做成极简风格相片"></a>
                      <div class="whitebg">
                        <h3>PS图层教程！把人山人海的旅游照做成极简风格相片</h3>
                        <p>今天这个技巧相当实用，也特别有...</p>
                      </div>
                    </li>
                    
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=227" title="PS抠图教程！Photoshop抽出滤镜快速抠出美女"><img src="http://upload.chinaz.com/2015/0612/1434095187165.jpg" width="270" height="357" alt="PS抠图教程！Photoshop抽出滤镜快速抠出美女"></a>
                      <div class="whitebg">
                        <h3>PS抠图教程！Photoshop抽出滤镜快速抠出美女</h3>
                        <p>本教程主要用Photoshop...</p>
                      </div>
                    </li>
                    
                    <li><a href="http://xk-web.kelink.com/article/view.aspx?id=230" title="ps对齐工具！聊聊界面中常用的对齐形式"><img src="http://upload.chinaz.com/2015/0608/1433732068457.jpg" width="270" height="357" alt="ps对齐工具！聊聊界面中常用的对齐形式"></a>
                      <div class="whitebg">
                        <h3>ps对齐工具！聊聊界面中常用的对齐形式</h3>
                        <p>对齐与间距，无非左右上下的关系...</p>
                      </div>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="p_pic_r cl">
      <div id="p_pic_r1" class="area">
        <div id="frameb24Dpd" class="frame move-span cl frame-1">
          <div id="frameb24Dpd_left" class="column frame-1-c">
            <div id="frameb24Dpd_left_temp" class="move-span temp"></div>
            <div id="portal_block_594" class="block move-span">
              <div id="portal_block_594_content" class="dxb_bc">
                <ul class="cl">
                
                  <li> <img src="http://upload.chinaz.com/2015/0611/1433991947381.jpg" width="197" height="170" alt="PS抠图教程！巧用钢笔工具给人像美腿抠图"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=203" title="PS抠图教程！巧用钢笔工具给人像美腿抠图" >
                    <div class="details-inner">
                      <h3>PS抠图教程！巧用钢笔工具给人像美腿抠图</h3>
                      <p>本教程主要使用Photoshop巧用钢笔工具给人像美腿抠图。新多新手问我：教父老...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0612/1434078329531.jpg" width="197" height="170" alt="国内APP实战！揭秘京东APPLE WATCH V1.0设计全过程"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=200" title="国内APP实战！揭秘京东APPLE WATCH V1.0设计全过程" >
                    <div class="details-inner">
                      <h3>国内APP实战！揭秘京东APPLE WATCH V1.0设计全过程</h3>
                      <p>[img]http://upload.chinaz.com/2015/0612/...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0612/1434096147708.jpg" width="197" height="170" alt="PS字体教程！制作一个萌萌哒端午字效"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=201" title="PS字体教程！制作一个萌萌哒端午字效" >
                    <div class="details-inner">
                      <h3>PS字体教程！制作一个萌萌哒端午字效</h3>
                      <p>端午节就要到了，想必大家都吃了粽子吧，但对一个设计师而言，怎么能仅仅光想着吃呢！...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0610/1433906230624.jpg" width="197" height="170" alt="LOGO设计！7个方法帮你精准判断一个LOGO的好坏"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=205" title="LOGO设计！7个方法帮你精准判断一个LOGO的好坏" >
                    <div class="details-inner">
                      <h3>LOGO设计！7个方法帮你精准判断一个LOGO的好坏</h3>
                      <p>舞者们也许会问自己：“迈克尔 · 杰克逊会怎么看我的舞步呢？”拳击手们会自问：“...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0615/1434349874829.jpg" width="197" height="170" alt="PS字体教程！制作清新的端午节棕叶字"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=195" title="PS字体教程！制作清新的端午节棕叶字" >
                    <div class="details-inner">
                      <h3>PS字体教程！制作清新的端午节棕叶字</h3>
                      <p>制作棕叶字方法非常简单。思路：先找好文字和棕叶素材;用变形工具把棕叶分段贴到文字...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0615/1434336593272.jpg" width="197" height="170" alt="BANNER设计！3个方法教你设计顶尖电商BANNER"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=194" title="BANNER设计！3个方法教你设计顶尖电商BANNER" >
                    <div class="details-inner">
                      <h3>BANNER设计！3个方法教你设计顶尖电商BANNER</h3>
                      <p>当用户访问电商网站的时候，第一屏的信息展示是非常重要的，很大程度上影响了用户是否...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0616/1434422593428.png" width="197" height="170" alt="输密码的正确姿势！简化密码设计的三个小秘籍"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=193" title="输密码的正确姿势！简化密码设计的三个小秘籍" >
                    <div class="details-inner">
                      <h3>输密码的正确姿势！简化密码设计的三个小秘籍</h3>
                      <p>编者按：今天这篇重磅推荐一下，全文近6000字，从网页动画的简史、种类到实现都有...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                  <li> <img src="http://upload.chinaz.com/2015/0616/1434441234664.jpg" width="197" height="170" alt="PS磨皮教程！高低频快速给高清人像磨皮"> <a class="details" href="http://xk-web.kelink.com/article/view.aspx?id=223" title="PS磨皮教程！高低频快速给高清人像磨皮" >
                    <div class="details-inner">
                      <h3>PS磨皮教程！高低频快速给高清人像磨皮</h3>
                      <p>像作者这样的高手，快速做好效果也就几分钟。不过新手就不要急于去完成效果；要把作者...<span>查看全文</span></p>
                    </div>
                    </a> </li>
                    
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 cl">
  <div id="ad-3" class="area">
    <div id="frameVp2Cc7" class="frame move-span cl frame-1">
      <div id="frameVp2Cc7_left" class="column frame-1-c">
        <div id="frameVp2Cc7_left_temp" class="move-span temp"></div>
        <div id="portal_block_584" class="block move-span">
          <div id="portal_block_584_content" class="dxb_bc">
            <div class="portal_block_summary"><img src="<?php echo @constant('__TEMPPUBLIC__');?>
/images/cad.jpg" width="1190px" /></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30 promo cl">
  <div class="con-l cl">
    <div class="index_Tit">
      <div id="tit-12" class="area">
        <div id="frameaLu6hc" class="frame move-span cl frame-1">
          <div id="frameaLu6hc_left" class="column frame-1-c">
            <div id="frameaLu6hc_left_temp" class="move-span temp"></div>
            <div id="portal_block_597" class="block move-span">
              <div id="portal_block_597_content" class="dxb_bc">
                <div class="portal_block_summary">
                  <h2>电子商务</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="selected JFrame cl">
      <div id="jeavi_selected2" class="area">
        <div id="frameg64T4X" class="frame move-span cl frame-1">
          <div id="frameg64T4X_left" class="column frame-1-c">
            <div id="frameg64T4X_left_temp" class="move-span temp"></div>
            <div id="portal_block_598" class="block move-span">
              <div id="portal_block_598_content" class="dxb_bc">
                <ul>
                
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=167" title="拆解电商与社交的本质关系">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0615/1434339949846.jpg" width="130" height="100" alt="拆解电商与社交的本质关系"></div>
                    <div class="desc-box">
                      <h3>拆解电商与社交的本质关系</h3>
                      <p class="desc">[img]http://upload.c...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>20 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=172" title="三个问题+3000字回答：搞懂京东跨境底牌">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0615/1434337944829.jpg" width="130" height="100" alt="三个问题+3000字回答：搞懂京东跨境底牌"></div>
                    <div class="desc-box">
                      <h3>三个问题+3000字回答：搞懂京东跨境底牌</h3>
                      <p class="desc">【编者按】京东一向有股“狠劲儿”，从垂直...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>16 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=189" title="决战616：洋码头和聚美杠上了？">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0612/1434097440248.jpg" width="130" height="100" alt="决战616：洋码头和聚美杠上了？"></div>
                    <div class="desc-box">
                      <h3>决战616：洋码头和聚美杠上了？</h3>
                      <p class="desc">6月12日消息，京东618店庆开启在即，...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>56 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=191" title="当当网也要做跨境电商 成立专门业务部">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0612/1434095913208.jpeg" width="130" height="100" alt="当当网也要做跨境电商 成立专门业务部"></div>
                    <div class="desc-box">
                      <h3>当当网也要做跨境电商 成立专门业务部</h3>
                      <p class="desc">5月19日，当当网宣布正式成立跨境电商业...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>58 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=156" title="15大品牌入驻极有家 淘宝家装宠儿在路上">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0616/1434437107683.jpg" width="130" height="100" alt="15大品牌入驻极有家 淘宝家装宠儿在路上"></div>
                    <div class="desc-box">
                      <h3>15大品牌入驻极有家 淘宝家装宠儿在路上</h3>
                      <p class="desc">6月16日消息，亿邦动力网了解到，近日，...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>14 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=183" title="笨熊外卖王亚军：我靠屌丝做“无店铺麦当劳之王”">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0612/1434095732905.png" width="130" height="100" alt="笨熊外卖王亚军：我靠屌丝做“无店铺麦当劳之王”"></div>
                    <div class="desc-box">
                      <h3>笨熊外卖王亚军：我靠屌丝做“无店铺麦当劳之王”</h3>
                      <p class="desc">这是专注AB轮猎掌门推出的餐饮外卖O2O...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>111 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=155" title="五问土巴兔：家装O2O，“量”大就有理？">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0616/1434425023387.jpg" width="130" height="100" alt="五问土巴兔：家装O2O，“量”大就有理？"></div>
                    <div class="desc-box">
                      <h3>五问土巴兔：家装O2O，“量”大就有理？</h3>
                      <p class="desc">土巴兔有多火？在最近的新电商投资论坛上，...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>14 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                  <li><a href="http://xk-web.kelink.com/article/view.aspx?id=157" title="天猫年中大促“承包”微博各处广告 电商大战好戏开演">
                    <div class="pic-link"><img src="http://upload.chinaz.com/2015/0616/1434439902290.jpg" width="130" height="100" alt="天猫年中大促“承包”微博各处广告 电商大战好戏开演"></div>
                    <div class="desc-box">
                      <h3>天猫年中大促“承包”微博各处广告 电商大战好戏开演</h3>
                      <p class="desc"><b>站长之家6月16日消息</b> 6...</p>
                      <p class="meta"> <span>0 人回复</span><span>|</span><span>18 人浏览</span></p>
                    </div>
                    </a> </li>
                    
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="con-r cl">
    <div class="portal_hot pframe cl">
      <div id="portal_hot" class="area">
        <div id="framefY9EyX" class="frame move-span cl frame-1">
          <div id="framefY9EyX_left" class="column frame-1-c">
            <div id="framefY9EyX_left_temp" class="move-span temp"></div>
            <div id="portal_block_599" class="block move-span">
              <div id="portal_block_599_content" class="dxb_bc">
                <div class="index_Tit">
                  <h2>精选帖子</h2>
                  <a href="#" class="more">更多</a> </div>
                <div class="JFrame cl">

                  <ul>
                  
                    <li class="top" id="xk-portal-1">
                      <h3 class="t"><i>1</i><a href="http://xk-web.kelink.com/article/view.aspx?id=155" title="五问土巴兔：家装O2O，“量”大就有理？">五问土巴兔：家装O2O，“量”大就有理？</a></h3>
                      <p>土巴兔有多火？在最近的新电商投资论坛上，亿邦动力网目睹土巴兔CEO王国彬在演讲前...<a href="http://xk-web.kelink.com/article/view.aspx?id=155"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-2">
                      <h3 class="t"><i>2</i><a href="http://xk-web.kelink.com/article/view.aspx?id=156" title="15大品牌入驻极有家 淘宝家装宠儿在路上">15大品牌入驻极有家 淘宝家装宠儿在路上</a></h3>
                      <p>6月16日消息，亿邦动力网了解到，近日，阿里巴巴旗下家装020平台极有家宣布，1...<a href="http://xk-web.kelink.com/article/view.aspx?id=156"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-3">
                      <h3 class="t"><i>3</i><a href="http://xk-web.kelink.com/article/view.aspx?id=184" title="京东1.7亿美元投资金蝶原因：布局企业ERP市场">京东1.7亿美元投资金蝶原因：布局企业ERP市场</a></h3>
                      <p>金蝶软件今日（5月18日）发布公告称，公司与京东集团达成合作协议，京东将出资约1...<a href="http://xk-web.kelink.com/article/view.aspx?id=184"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-4">
                      <h3 class="t"><i>4</i><a href="http://xk-web.kelink.com/article/view.aspx?id=163" title="淘宝直通车必杀技:教你如何练就“不死”神功">淘宝直通车必杀技:教你如何练就“不死”神功</a></h3>
                      <p>[img]http://upload.chinaz.com/2015/0615/...<a href="http://xk-web.kelink.com/article/view.aspx?id=163"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-5">
                      <h3 class="t"><i>5</i><a href="http://xk-web.kelink.com/article/view.aspx?id=178" title="5.19投融资日报:生鲜电商"食行生鲜"融资1.8亿元">5.19投融资日报:生鲜电商"食行生鲜"融资1.8亿元</a></h3>
                      <p>5月19日，国内电商、在线教育、汽车养护等多领域投融资市场表现异常活跃，具体投融...<a href="http://xk-web.kelink.com/article/view.aspx?id=178"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-6">
                      <h3 class="t"><i>6</i><a href="http://xk-web.kelink.com/article/view.aspx?id=159" title="58到家陈小华：到家O2O如何从0到1？">58到家陈小华：到家O2O如何从0到1？</a></h3>
                      <p>究竟怎样才能做好到家O2O服务？近日，58到家CEO陈小华在第四届湖南省电子商务...<a href="http://xk-web.kelink.com/article/view.aspx?id=159"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-7">
                      <h3 class="t"><i>7</i><a href="http://xk-web.kelink.com/article/view.aspx?id=176" title="直通车推广技巧：直通车如何设置才能获得更多利润">直通车推广技巧：直通车如何设置才能获得更多利润</a></h3>
                      <p>跨境电商的火热，吸引了一大批新的卖家跃跃欲试，其中关于如何通过直通车提高店铺转化...<a href="http://xk-web.kelink.com/article/view.aspx?id=176"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-8">
                      <h3 class="t"><i>8</i><a href="http://xk-web.kelink.com/article/view.aspx?id=173" title="在一个“做电子书必亏钱”的市场，当当要怎么玩儿">在一个“做电子书必亏钱”的市场，当当要怎么玩儿</a></h3>
                      <p>越来越多的巨头公司正在以迅猛之势冲进移动阅读市场。根据相关数据显示，国内移动阅读...<a href="http://xk-web.kelink.com/article/view.aspx?id=173"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-9">
                      <h3 class="t"><i>9</i><a href="http://xk-web.kelink.com/article/view.aspx?id=169" title="一张图读懂淘宝企业店铺和个人店铺">一张图读懂淘宝企业店铺和个人店铺</a></h3>
                      <p>上周，淘宝企业店铺正式上线，对于广大卖家来说，大部分身上都带着企业标签，可以说此...<a href="http://xk-web.kelink.com/article/view.aspx?id=169"> <span>查看全文</span></a></p>
                    </li>
                    
                    <li class="top" id="xk-portal-10">
                      <h3 class="t"><i>10</i><a href="http://xk-web.kelink.com/article/view.aspx?id=168" title="为决战618 淘宝网暂停预计时效服务">为决战618 淘宝网暂停预计时效服务</a></h3>
                      <p>6月15日消息，亿邦动力网获悉，淘宝发布预计时效物流服务618暂停公告，决定于6...<a href="http://xk-web.kelink.com/article/view.aspx?id=168"> <span>查看全文</span></a></p>
                    </li>
                    
                  </ul>
                  <?php echo '<script'; ?>
 type="text/javascript" language="javascript">
				  	document.getElementById('xk-portal-1').className += ' on';
				  <?php echo '</script'; ?>
>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="jeavidesign_con mb30  promo cl">
  <div class="index_Tit hd cl">
    <div id="linktit" class="area">
      <div id="frameAODxQH" class="frame move-span cl frame-1">
        <div id="frameAODxQH_left" class="column frame-1-c">
          <div id="frameAODxQH_left_temp" class="move-span temp"></div>
          <div id="portal_block_585" class="block move-span">
            <div id="portal_block_585_content" class="dxb_bc">
              <div class="portal_block_summary">
                <h2>友情链接</h2>
                <a href="#" class="more">申请</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="index_link JFrame cl">
    <div id="index_link" class="area">
      <div id="frameCS5Qxj" class="frame move-span cl frame-1">
        <div id="frameCS5Qxj_left" class="column frame-1-c">
          <div id="frameCS5Qxj_left_temp" class="move-span temp"></div>
          <div id="portal_block_586" class="block move-span">
            <div id="portal_block_586_content" class="dxb_bc">
              <ul class="cl">
                <li><a href="http://kelink.com"  target="_blank">联速科技</a></li>
                <li><a href="#" >招固</a></li>
                <li><a href="#" >招固</a></li>
                <li><a href="#" >招固</a></li>
                <li><a href="#" >招固</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div></div>
<?php echo '<script'; ?>
 type="text/javascript">

jQuery(".jeavi_slide").slide({ mainCell:".bd ul",titCell:".hd li",effect:"fold",autoPlay:true,

startFun:function(i){jQuery(".jeavi_slide .t_box").eq(i).find("h2").css({display:"none",bottom:0}).animate({opacity:"show",bottom:"30px"},300);jQuery(".jeavi_slide .t_box").eq(i).find(".desc").css({display:"none",bottom:0}).animate({opacity:"show",bottom:"10px"},300);}});

jQuery(".scroller").slide({ mainCell:".bd ul",titCell:".hd ul",effect:"leftLoop",autoPlay:true,autoPage:true});

jQuery(document).ready(function(){var a=0;var b=setInterval(function(){jQuery(".today_info p:eq("+a+")").fadeIn(1000).siblings().hide();if(a<3){a++}else{a=0}},3000)});

jQuery(".hbody").slide({ titCell:".hd li", mainCell:".bd",delayTime:0 });

jQuery(".toady_new").slide({ mainCell:".bd ul", effect:"topLoop", delayTime:0,interTime:4000,vis:3,scroll:3,autoPlay:"true",trigger:"click"});

jQuery(".portal_hot li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });

jQuery(".wonderful").slide({ mainCell:".bd ul", effect:"leftLoop",easing:"easeInOutQuint",delayTime:500, vis:5, scroll:1,autoPlay:true });

<?php echo '</script'; ?>
>
</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">

_attachEvent(window, 'load', getForbiddenFormula, document);

function getForbiddenFormula() {

var toGetForbiddenFormulaFIds = function () {

ajaxget('plugin.php?id=cloudsearch&formhash=55b6b145');

};

var a = document.body.getElementsByTagName('a');

for(var i = 0;i < a.length;i++){

if(a[i].getAttribute('sc')) {

a[i].setAttribute('mid', hash(a[i].href));

a[i].onmousedown = function() {toGetForbiddenFormulaFIds();};

}

}

var btn = document.body.getElementsByTagName('button');

for(var i = 0;i < btn.length;i++){

if(btn[i].getAttribute('sc')) {

btn[i].setAttribute('mid', hash(btn[i].id));

btn[i].onmousedown = function() {toGetForbiddenFormulaFIds();};

}

}

}

<?php echo '</script'; ?>
>

<div id="footer" class="cl">
  <div id="ft" class="wp cl">
    <div class="widget" style="text-align: right;"> 
      
      <!-- 底部logo -->
      
      <p class="ftlogo"><img src="<?php echo @constant('__TEMPPUBLIC__');?>
/images/ftlogo.png" alt="" border="0"></p>
      
      <!-- 底部logo --> 
      
      
    </div>
    <div class="widget-2 last widget">
      <h4 class="widget-title">大道至简</h4>
      <p><a href="/wapindex.aspx?siteid=1000&classid=0&sid=-2-0-0-0-320">手机版</a> <a href="#" target="_blank">粤ICP备 8888888号</a> <a href="#">站长统计</a></p>
      <p>Powered by <a href="http://kelink.com" target="_blank">Kelink CMS</a> <em>V12</em> &copy; 2015 <a href="http://www.kelink.com" target="_blank">联速科技.</a></p>
      <p class="xs0"> GMT+8, 2015-12-18 11:9<span id="debuginfo"></span> </p>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo @constant('__TEMPPUBLIC__');?>
/js/nav.js" type="text/javascript"><?php echo '</script'; ?>
>
<div id="scrolltop"> <span hidefocus="true"><a title="返回顶部" onclick="window.scrollTo('0','0')" class="scrolltopa" ><b>返回顶部</b></a></span> </div>
<?php echo '<script'; ?>
 type="text/javascript">_attachEvent(window, 'scroll', function () { showTopLink(); });checkBlind();<?php echo '</script'; ?>
>
<div id="discuz_tips" style="display:none;"></div>
</body>
</html><?php }
}
?>