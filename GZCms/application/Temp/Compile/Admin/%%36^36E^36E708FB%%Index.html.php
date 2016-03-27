<?php /* Smarty version 2.6.26, created on 2016-03-19 18:37:45
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Index/Index.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/inc/head.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--开始：以下内容则可删除，仅为素材引用参考-->
<!--左右分栏：右侧栏-->
<div class="indexall" style="background: url(<?php echo @__PUBLIC__; ?>
/images/indexBanner.png) no-repeat; height:550px;width:100%;">
	<div class="gz-welcome">
		<h3>上午好！slade管理员！</h3>
		<p class="gz-rchead">格子原创平台系统文章信息统计</p>
		<ul>
			<li class="gz-rc" style="background: #19a97b;color:#f8f8f8"><span>今日文章数/<?php echo $this->_tpl_vars['date']['tnum']; ?>
</span></li>
			<li class="gz-rc" style="background: #19A9BC;color:#f8f8f8"><span>昨日文章数/<?php echo $this->_tpl_vars['date']['ynum']; ?>
</span></li>
			<li class="gz-rc" style="background: #19A83B;color:#f8f8f8"><span>总文章数/<?php echo $this->_tpl_vars['date']['anum']; ?>
</span></li>
		</ul>
	</div>
	<div class="cont_col_lt" style="width: 1000px;background: #f8f8f8;">
		<table class="table fl">
			<tr>
				<th>名称</th>
				<th>描述</th>
			</tr>
			<tr>
				<td class="center">版本</td>
				<td>GZcms v0.0.1</td>
			</tr>
			<tr>
				<td class="center">作者</td>
				<td>半朵昙花（sujinw@qq.com）</td>
			</tr>
			<tr>
				<td class="center">网址</td>
				<td>zukmb.cn</td>
			</tr>
		</table>
	</div>
</div>
</section>
</body>
</html>