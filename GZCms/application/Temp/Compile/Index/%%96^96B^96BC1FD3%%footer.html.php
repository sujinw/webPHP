<?php /* Smarty version 2.6.26, created on 2016-03-19 18:24:57
         compiled from ../../../../Template/default/Common/footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'arclist', '../../../../Template/default/Common/footer.html', 16, false),)), $this); ?>
		<section class="right-container">
			<div class="bdsharebuttonbox bdshare-button-style1-32" data-bd-bind="1453799975156">
				<a href="javascript:void(0);" rel="nofollow" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
				<a href="javascript:void(0);" rel="nofollow" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
				<a href="javascript:void(0);" rel="nofollow" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
				<a href="javascript:void(0);" rel="nofollow" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
				<a href="javascript:void(0);" rel="nofollow" class="bds_sqq" data-cmd="sqq" title="分享到QQ好友"></a>
			</div>
			<div class="wander">
				<div class="gezi-title"><h4>精彩推荐</h4></div>
				<div class="ad-280-280">侧边栏第一个广告<br>(萌萌哒广告位，虚位以待！)</div>
			</div>
			<div class="wander">
				<div class="gezi-title"><h4>精彩推荐</h4></div>
				<div class="list-2">
					<ul><?php $this->_tag_stack[] = array('arclist', array('row' => 4,'order' => 'tj','name' => 'pic')); $_block_repeat=true;arclist($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
						<li class="list-item">[$pic.link]</li>
						<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo arclist($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
					</ul>
				</div>
			</div>
			<div class="wander">
				<div class="gezi-title"><h4>精彩推荐</h4></div>
				<div class="ad-280-280">侧边栏第一个广告<br>(萌萌哒广告位，虚位以待！)</div>
			</div>
		</section>
		</div>
<footer class="footer mt10" style="text-align: center; color:#FFF; padding-top: 0px">
	<p style="line-height: 30px;color: #fff; height:90px;">Copyright © 2016 WWW.ZUMKMB.COM 格子原创平台 版权所有并保留所有权 <span style="display:inline; height:100%"><img style="height:100%;display:inline" src="<?php echo @__TPUBLIC__; ?>
/image/gz.jpg"></span></p>
</footer>
<script>
$(function(){
	var li = $(".chanal");

	// console.log(li)
	for(var i=0; i<=li.length;i++){
		// console.log(li)
		if(li.eq(i).attr('cid') == li.eq(i).attr('gcid')){
			// console.log(1)
			li.eq(i).addClass('select');
		}
	}

	//right=left
//	console.log($('.left-container').height())
	if($('.left-container').height() <= 10){
		$('.right-container').hide();
		$('.left-container').html("该分类下没有文章呢");
	}else{
		if($('.left-container').height() < $('.right-container').height()){
			$('.left-container').height($('.right-container').height());
		}
	}

	$(".user-main").click(function(){
		var link = $('.user-link');
		if(link.css('display') != 'none'){
			link.hide();
		}else{
			link.show();
		}
	})

})

</script>
		<script>
			var gz = {
						'm' : <?php if (isset ( $_GET['m'] )): ?>'<?php echo $_GET['m']; ?>
'<?php else: ?>'index'<?php endif; ?>,
						'c' : <?php if (isset ( $_GET['c'] )): ?>'<?php echo $_GET['c']; ?>
'<?php else: ?>'index'<?php endif; ?>,
						'a' : <?php if (isset ( $_GET['a'] )): ?>'<?php echo $_GET['a']; ?>
'<?php else: ?>'index<?php endif; ?>'
			}
			window._bd_share_config = {
				common : {
					bdText : $('head')['title'],
					bdDesc : '',
					bdUrl : '<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']; ?>',
					bdPic : '自定义分享图片'
				},
				/*share : [{
					"bdSize" : 47
				}],*/
				slide : [{
					bdImg : 0,
					bdPos : "right",
					bdTop : 100
				}],
				image : [{
					viewType : 'list',
					viewPos : 'top',
					viewColor : 'black',
					viewSize : '47',
					//viewList : ['qzone','tsina','huaban','tqq','renren']
				}],
				selectShare : [{
					"bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
				}]
			}
			with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
		</script>
</body>
</html>