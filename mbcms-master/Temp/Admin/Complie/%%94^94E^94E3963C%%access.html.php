<?php /* Smarty version 2.6.26, created on 2015-11-29 22:29:51
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Rbac/access.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>RBAC权限控制管理</li>
    <li class="active">节点列表</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <form class="form-inline" action="<?php echo @__APP__; ?>
?c=Rbac&a=accessHander" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">节点列表</div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="30%">节点名称</th>
                        <th width="20%">节点描述</th>
                        <th width="10%">节点状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_tpl_vars['node']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['app']['id']; ?>
</td>
                        <td>
                        	<?php echo $this->_tpl_vars['app']['name']; ?>

                        	<div class="checkbox">
                        		<label>
                        			<input type="checkbox" name="access[]" value="<?php echo $this->_tpl_vars['app']['id']; ?>
_1" id='<?php echo $this->_tpl_vars['app']['id']; ?>
'  <?php if ($this->_tpl_vars['app']['access'] == 1): ?> checked = "checked" <?php endif; ?>></label>
                        	</div>
                        </td>
                        <td><?php echo $this->_tpl_vars['app']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['app']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['app']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['action']['id']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['action']['name']; ?>

                        <div class="checkbox">
                        		<label>
                        			<input type="checkbox" name="access[]" value="<?php echo $this->_tpl_vars['action']['id']; ?>
_2" id='<?php echo $this->_tpl_vars['app']['id']; ?>
_<?php echo $this->_tpl_vars['action']['id']; ?>
' app="<?php echo $this->_tpl_vars['app']['id']; ?>
" action='true' <?php if ($this->_tpl_vars['action']['access'] == 1): ?> checked = "checked" <?php endif; ?>></label>
                        	</div>
                        </td>
                        <td><?php echo $this->_tpl_vars['action']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['action']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                    </tr>
                    <?php $_from = $this->_tpl_vars['action']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['method']):
?>
                    <tr>
                        <td><?php echo $this->_tpl_vars['method']['id']; ?>
</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─<?php echo $this->_tpl_vars['method']['name']; ?>

                        <div class="checkbox">
                        		<label>
                        			<input type="checkbox" name="access[]" value="<?php echo $this->_tpl_vars['method']['id']; ?>
_3" id="<?php echo $this->_tpl_vars['app']['id']; ?>
_<?php echo $this->_tpl_vars['action']['id']; ?>
_<?php echo $this->_tpl_vars['method']['id']; ?>
" app="<?php echo $this->_tpl_vars['app']['id']; ?>
" action="<?php echo $this->_tpl_vars['action']['id']; ?>
"<?php if ($this->_tpl_vars['method']['access'] == 1): ?> checked = "checked" <?php endif; ?>></label>
                        </div>
                        </td>
                        <td><?php echo $this->_tpl_vars['method']['title']; ?>
</td>
                        <td><?php if ($this->_tpl_vars['method']['status'] == 0): ?>正常<?php else: ?>禁用<?php endif; ?></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                    <?php endforeach; endif; unset($_from); ?>
                   </tbody>
                </table>
            </div>
        </div>
        <input type="hidden" name="rid" value="<?php echo $this->_tpl_vars['rid']; ?>
" />
       <button type="submit" class="btn btn-primary">提交保存</button>

    </form>
</div>
<script type="text/javascript">
(function(){
	var check = $('input[type=checkbox]');
	check.click(function(){
		var thisid = $(this).attr('id').split('_');
		if(thisid.length == 1){
			// var inputs = $('*[id*='+ thisid[0] +']');
			var inputs = $('input[app='+ thisid[0] +']')
			console.log(inputs)
			if(!$(this).prop('checked')){
				$(this).prop('checked',false);
				inputs.prop('checked',false);
				// inputs.removeAttr('checked');
				console.log(1)
			}else{
				$(this).prop('checked','checked');
				inputs.prop('checked','checked');
				console.log(2)
			}		
		}else if(thisid.length == 2){
			// var inputs = $('*[id*='+ thisid[0] +']');
			var inputs = $('input[action='+ thisid[1] +']')
			console.log(inputs)
			if(!$(this).prop('checked')){
				$(this).prop('checked',false);
				inputs.prop('checked',false);
				// inputs.removeAttr('checked');
				console.log(1)
			}else{
				$(this).prop('checked','checked');
				inputs.prop('checked','checked');
				console.log(2)
			}
						
		}
	});
	

})()

</script>
</body>
</html>