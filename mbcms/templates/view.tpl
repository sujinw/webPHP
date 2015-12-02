{{include file="header.tpl"}}
<div class="cromb">
	<div class="crombLink">
		<a href="">首页</a>
	</div>
	<div class="crombLink">
		<a href="">栏目</a>
	</div>
</div>
<section>
	<div class="article_view_contents">
		<div class="article_header">
			<h2 class="article_title">{{$info.title}}</h2>
			<div class="article_subtitle">
				<div class="left">
					<span>作者：{{$info.user_name}}</span>
					<span>
						版块：
						<a href="">XXXX</a>
					</span>
				</div>
				<div class="right">
					<span>阅读：{{$info.link}}</span>
					<span>喜欢: </span>
					<span class="time">{{$info.time|date_format:"%Y-%m-%d"}}</span>
				</div>
			</div>
		</div>
		<div class="article_content_box">
			<div class="article_content">{{$info.contents}}</div>
			<div class="article_foot">
				<div class="article_foot_left">
					<span class="heart"></span>
				</div>
				<div class="article_foot_right">
					<span>222</span>
				</div>
			</div>
		</div>
		<div class="article_reply">
			<form action="index.php?action=reply" method="POST">
				<textarea name="reply" placeholder="输入评论内容"  class="replay_textarea"></textarea>
				<input type="hidden" name="articleId" value="{{$info.id}}">
				<input type="submit" name="submit" class="reply_sub" value="提交评论"></form>
			<div class="reply-box">
				<div class="reply-list-title">评论列表</div>
				<div class="reply-list">
					<ul>
					{{foreach from=$reply key=k item=list}}
						<li class="reply_item">
							<div class="replay-item-left">
								<img src="{{$list.user_img}}" class="reply-user-img" alt="username" />
								<p class="reply-user-name">{{$list.user_nickname}}</p>
							</div>
							<div class="reply-item-right">
								<div class="reply-cont">{{$list.reply}}</div>
								<div class="reply_time">{{$list.time|date_format:"%Y-%m-%d"}}</div>
							</div>

						</li>
					{{/foreach}}	
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>
{{include file="foot.tpl"}}