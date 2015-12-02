{{include file='header.tpl'}}
<div id="content">
	<h1>
		<img src="templates/img/icons/posts.png" alt="" />
		添加文章
	</h1>
	<div class="bloc">
		<div class="title">添加文章</div>
		<div class="content">
			<form action="index.php?action=DoAction&type=addArticle" id="formOne" method="post" enctype="multipart/form-data">
				<div class="input medium">
					<label for="input1">标题</label>
					<input type="text" name="title" id="input1"/>
				</div>
				<div class="input">
					<label for="input4">选择发布分类</label>
					<select name="fenlei_id">
						<option value="1">ss</option>
						<option value="2">ww</option>
						<option value="3">tt</option>
					</select>
					<div class="input">
						<label for="input3">封面图片</label>
						<input type="file" name="fm_img" id="input3"/>
					</div>
					<div class="input textarea">
						<label for="textarea2">文章内容</label>
						<textarea name="contents" id="textarea2" rows="7" class="wysiwyg" cols="4"></textarea>
					</div>
					<div class="submit long" style="height:35px;">
        				<input type="submit" value="提交保存" style="height: 100%">
        			</div>
				</form>
			</div>
		</div>
	</div>
</div>
{{include file='footer.tpl'}}