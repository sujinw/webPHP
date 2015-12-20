<?php /* Smarty version 2.6.26, created on 2015-12-06 20:09:35
         compiled from E:/WEBPROJECT/PHP/myPHP/Admin/Tpl/Article/addCategory.html */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../Common/header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--路径导航-->
<ol class="breadcrumb breadcrumb_nav">
    <li>首页</li>
    <li>文章管理</li>
    <li class="active">添加分类</li>
</ol>
<!--路径导航-->

<div class="page-content">
    <div class="panel panel-default">
        <div class="panel-heading">添加分类</div>
        <div class="panel-body">
            <form action="<?php echo @__APP__; ?>
?c=Article&a=addCategoryHander" method="post">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <?php if ($this->_tpl_vars['column'] == 0): ?>还没有栏目，请先添加<?php else: ?>
                            <div class="form-group clearfix">
                                <label>所属栏目</label>
                                <select class="form-control pull-left" name="column_id">
                                    <?php $_from = $this->_tpl_vars['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                                    <option value="<?php echo $this->_tpl_vars['v']['id']; ?>
"><?php echo $this->_tpl_vars['v']['_name']; ?>
</option>
                                    }
                                    <?php endforeach; endif; unset($_from); ?>
                                </select>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="name">分类名称</label>
                                <input type="text" class="form-control" id="cate_name" name="cname" placeholder="" required></div>
                            <div class="form-group">
                                <label for="seo_title">SEO标题</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="" required></div>
                            <div class="form-group">
                                <label for="seo_keyword">SEO关键词</label>
                                <input type="text" class="form-control" id="seo_keyword" name="seo_keywords" placeholder="" required></div>
                            <div class="form-group">
                                <label>SEO描述</label>
                                <textarea class="form-control" rows="3" name="seo_des" required></textarea>
                            </div>

                            <div class="form-group">
                                <label>分类描述</label>
                                <textarea class="form-control" rows="3" name="cremark" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label >分类状态</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="display" id="hidden1" value="1" checked>显示</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="display" id="hidden2" value="0">隐藏</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">提交保存</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>