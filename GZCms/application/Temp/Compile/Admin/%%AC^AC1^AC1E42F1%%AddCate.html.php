<?php /* Smarty version 2.6.26, created on 2016-03-19 18:37:50
         compiled from E:/WEBPROJECT/PHP/GZCms/application/Admin/Tpl/Article/AddCate.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../Common/inc/head.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<section>
		<h2> <strong style="color:grey;">添加文章分类</strong>
		</h2>
		<ul class="ulColumn2">
			<form action="<?php echo U('addCate') ?>" id="addCate" method="post">
			<li>
				<span class="item_name" style="width:120px;">分类名称：</span>
				<input type="text" name="cname" class="textbox textbox_295" placeholder="分类名称"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">上一级分类：</span>
				<select class="select" name="pid">
						<option value="0">顶级分类</option>
					<?php if ($this->_tpl_vars['data'] == 0): ?>
						
					<?php else: ?>
					<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
						<option value="<?php echo $this->_tpl_vars['v']['cid']; ?>
"><?php echo $this->_tpl_vars['v']['_name']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</select>
			</li>
			<li>
				<span class="item_name" style="width:120px;">seo关键字：</span>
				<input type="text" name="seo_keywords" class="textbox textbox_295" placeholder="seo关键字"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">seo描述：</span>
				<input type="text" name="seo_des" class="textbox textbox_295" placeholder="seo描述"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">seo标题：</span>
				<input type="text" name="seo_title" class="textbox textbox_295" placeholder="seo标题"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;">是否锁定：</span>
				<label class="single_selection">
					<input type="radio" value="1" name="is_lock"/>
					是
				</label>
				<label class="single_selection">
					<input type="radio" value="0" checked name="is_lock"/>
					否
				</label>
			</li>
			<li>
				<span class="item_name" style="width:120px;">分类描述：</span>
				<textarea name="cremark" placeholder="分类描述" class="textarea" style="width:500px;height:100px;"></textarea>
			</li>
			<li>
				<span class="item_name" style="width:120px;">排序：</span>
				<input type="text" name="sort" class="textbox textbox_295" placeholder="排序"/>
			</li>
			<li>
				<span class="item_name" style="width:120px;"></span>
				<input type="submit" class="link_btn"/>
			</li>
			</form>
		</ul>
	</section>
<script type="text/javascript">
$(function(){
  $("#addCate").validate({
    cname:{
      rule:{
        required: true,
        ajax:{
          url:"index.php?m=admin&c=article&a=addCate"
        }
      },
      error:{
        required: "分类名称不能为空",
        ajax:"分类已经存在"
     }
    },
    sort:{
    	num:'0,99999999999'
    }
});
})
</script>