{{include file='header.tpl'}}
<div id="content" class="white">
	<h1><img src="templates/img/icons/posts.png" alt=""> 添加分类</h1>
	<div class="bloc">
		<div class="title">user inputs<a href="#" class="toggle"></a></div>
	<div class="content">
		<form action="index.php?action=DoAction&type=addfenlei" id="formOne" method="post" enctype="multipart/form-data" onsubmit="checkFenlei()">
			<div class="input medium">
            <label for="input1">分类名称</label>
            <input type="text" name="name" id="input1" onblur="checkFenleiName()">
            <span class="error-message" id='error1' style="opacity: 0; display: none;"></span>
        </div>
        <div class="input medium">
            <label for="input5">分类封面图片</label>
            <input type="file" name="fenlei_img" id="input5">
            <span class="error-message" id='error5' style="opacity: 0; display: none;"></span>
        </div>
        <div class="submit medium">
            <input type="submit" class="submit" id="input6" value="提交保存">
        </div>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	var name = $('#input1'),
		error1 = $('#error1');
function checkFenleiName(){
	var flag = true;
	error1.hide();

	if(!$('#input1').val()){
		error1.animate({
                'opacity' : 1,
            }).show();
            error1.text('请填写分类名称');
            flag = false;
	}else{

	$.ajax({
		url: 'index.php?action=AdminAjax&type=fenlei',
		type: 'GET',
		data: {'fenleiName':$('#input1').val()},
		success:function(data){
			if (data == 1) {
                error1.animate({
                    'opacity' : 1,
                }).show();
                error1.text('分类名称已经存在');
                flag = false;
			};
		}
	})
}
}
function checkFenlei(){
	if(checkName()){
		$('#formOne').submit();
	}
}
</script>