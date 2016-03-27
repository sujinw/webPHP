<?php /* Smarty version 2.6.26, created on 2016-03-19 18:27:46
         compiled from E:/WEBPROJECT/PHP/GZCms/Template/default/View/Article.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'E:/WEBPROJECT/PHP/GZCms/Template/default/View/Article.html', 7, false),array('block', 'pagenext', 'E:/WEBPROJECT/PHP/GZCms/Template/default/View/Article.html', 16, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../../Template/default/Common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<div class="article-container mt10">
			<div class="article-header">
				<h3 class="title"><?php echo $this->_tpl_vars['article']['title']; ?>
</h3>
				<div class="article-info">
					<span class="info-item">作者:<?php echo $this->_tpl_vars['article']['author']; ?>
</span>
					<span class="info-item">发表时间:<?php echo ((is_array($_tmp=$this->_tpl_vars['article']['create_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y-%m-%d') : smarty_modifier_date_format($_tmp, '%Y-%m-%d')); ?>
</span>
					<span class="info-item">分类:</span>
					<span class="info-item">文章点击:<?php echo $this->_tpl_vars['article']['hits']; ?>
</span>
				</div>
			</div>
			<div class="article-content">
				<div class="content"><?php echo $this->_tpl_vars['article']['details']; ?>

				</div>
				<div class="articlepage">
					<?php $this->_tag_stack[] = array('pagenext', array('style' => 'all')); $_block_repeat=true;pagenext($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo pagenext($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
				</div>
				<div class="article-reply clear">
					<div id="comments">
						<div class="comment-post" id="comment-post">
							<h3 style="margin-bottom:-20px;margin-top:5px">发表评论</h3>
							<form name="re" action="<?php echo U('addReply'); ?>" method="post">
								<p class="num">文明评论，重在参与</p>
								<p>
									<textarea name="rcontent" rows="10" class="post-area" placeholder="快来发表你的看法和意见吧!" style="width:99%"></textarea>
								</p>			
								<div class="gdpl">
									<div title="评论" class="face">
										<a href="javascript:void(0);">评论(0)</a>
									</div>
									<input type="hidden" name="aid" value="<?php echo $_GET['aid']; ?>
">
									<?php if ($this->_tpl_vars['uid'] == 0): ?><a href="<?php echo U('Index/Login/login'); ?>" id="submit">登录/注册</a><?php else: ?>
									<input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
">
									<input type="submit" name="go" class="open2" id="submit" value="发表评论"><?php endif; ?></div>
							</form>
						</div>
					</div>
				</div>
				<div class="pjlist">
					<?php if ($this->_tpl_vars['rep'] == 0): ?>暂无评论，赶紧抢沙发吧~~<?php else: ?>
					<?php $_from = $this->_tpl_vars['rep']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<div class="social-feed-box">
						<div class="social-avatar">
							<a href="" class="pull-left">
								<img alt="image" src="<?php echo $this->_tpl_vars['v']['user_img']; ?>
"></a>
							<div class="media-body">
								<a href="#"><?php echo $this->_tpl_vars['v']['nickname']; ?>
</a>
								<small class="text-muted"><?php echo $this->_tpl_vars['v']['time']; ?>
</small>
							</div>
						</div>
						<div class="social-body">

							<div class="pull-right">
								<!-- <a class="btn btn-xs btn-white" href="javascript:;" onclick="articleZan(this,<?php echo $this->_tpl_vars['v']['rid']; ?>
)"> <i class="fa fa-thumbs-up"></i>
									(<?php echo $this->_tpl_vars['v']['zan']; ?>
)赞
								</a> -->
								<a class="btn btn-xs btn-white"> <i class="fa fa-heart"></i>
									收藏
								</a>
								<a class="btn btn-xs btn-primary">
									<i class="fa fa-pencil"></i>
									评论
								</a>
							</div>
							<p><?php echo $this->_tpl_vars['v']['rcontent']; ?>
</p>
						</div>
					</div>
					<?php endforeach; endif; unset($_from); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../../Template/default/Common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>