<?php /* Smarty version 2.6.26, created on 2016-03-19 18:24:57
         compiled from E:/WEBPROJECT/PHP/GZCms/Template/default/Index/Index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'arclist', 'E:/WEBPROJECT/PHP/GZCms/Template/default/Index/Index.html', 6, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../../Template/default/Common/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- 推荐文章轮播图 -->
	<div class="recomend">
		<div class="rec-smallpic">
			<ul><?php $this->_tag_stack[] = array('arclist', array('row' => 4,'order' => 'hot','name' => 'pic','images' => '1')); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<li class="rec-smallpic-item">
					<a href="#">
						<img src="[$pic.thumb]" alt=""></a>
				</li>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			</ul>
		</div>
		<div class="rec-bigpic">
			<ul>
				<?php $this->_tag_stack[] = array('arclist', array('row' => 4,'order' => 'rand','name' => 'pic','images' => '1')); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<li>
					<a href="[$pic.url]">
						<img src="[$pic.thumb]" alt="[$pic.title]" /></a>
					<p class="rec-title">[$pic.title]</p>

				</li>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			</ul>
		</div>
	</div>
	<!-- 660*45 AD -->
	<div class="ad-660-45">首页幻灯片下方广告(萌萌的广告位，虚位以待！)</div>
	<div class="hot-article">
		<div class="gezi-title">
			<h3>热门排行</h3>
		</div>
		<div class="hot-list">
			<ul><?php $this->_tag_stack[] = array('arclist', array('row' => 4,'order' => 'hot','name' => 'pic','reply' => true)); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
				<li>
					<div class="hot-article-cont"> <i class="hot-num">[$pic._index_1]</i>
						[$pic.link]
					</div>
					<div class="hot-article-fun">
						<span class="reply-num">[$pic.rnum]条评论</span>
						<span class="article-like">
							<span class="fui-heart"></span>
							1喜欢
						</span>
					</div>
				</li>
				<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			</ul>
		</div>
	</div>
	<div class="list-1">
		<ul><?php $this->_tag_stack[] = array('arclist', array('row' => 4,'order' => 'new','name' => 'pic')); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<li class="list-item">
				<a href="[$pic.url]">
					<img src="[$pic.thumb]" alt="[$pic.title]">
					<p class="list-title">
						<span class="ml-icon">目录一</span>
						[$pic.title]
					</p>
					<div class="list-des">[$pic.excerpt]</div>
					<div class="list-icon">
						<span>
							<span class="fui-time"></span>
							[$pic.create_time]
						</span>
						<span>
							<span class="fui-chat"></span>
							暂无评论
						</span>
						<span>
							<span class="fui-heart"></span>
							1人喜欢
						</span>
					</div>
				</a>
			</li>
			<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		</ul>
	</div>
</section>
	<script>
		var smpic = $('.rec-smallpic li');
		var bigpic = $('.rec-bigpic ul');
		var timer = null;

		smpic.eq(0).addClass('selected');

		smpic.click(function(){
			timer = null;
			$(this).addClass('selected').siblings().removeClass('selected');
			var index = smpic.index(this);
			bigpic.css({'transform':'translateY('+(-270)*index+'px)',
						'-webkit-transform':'translateY('+(-270)*index+'px)',
						'-moz-transform':'translateY('+(-270)*index+'px)',
						'-o-transform':'translateY('+(-270)*index+'px)',
						'transition': 'all .8s ease',
						'-moz-transition': 'all .8s ease',
						'-webkit-transition':'all .8s ease',
						'-o-transition': 'all .8s ease'
			});
		});
		function auto(){
			var i = smpic.index($('.selected'));
			var length = smpic.length;
			var index;
			
			smpic.removeClass("selected");
			i++;
			if(i < 0){
				index = length-1;
			}else if( i >= length){
				index = 0;
			}else{
				index = i;
			}

			bigpic.css({'transform':'translateY('+(-270)*index+'px)',
						'-webkit-transform':'translateY('+(-270)*index+'px)',
						'-moz-transform':'translateY('+(-270)*index+'px)',
						'-o-transform':'translateY('+(-270)*index+'px)',
						'transition': 'all .8s ease',
						'-moz-transition': 'all .8s ease',
						'-webkit-transition':'all .8s ease',
						'-o-transition': 'all .8s ease'
			});
			smpic.eq(index).addClass('selected');
			console.log(index)
		}
		timer=setInterval(auto,2000);
		
	</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../../../Template/default/Common/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>