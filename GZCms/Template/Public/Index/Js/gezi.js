function articleZan(obj,id){
	// console.log($(obj));
	$.post('index.php?m=index&c=view&a=ajaxzan',{'rid':id},function(data){
		d = JSON.parse(data);
		console.log(typeof d)
		if(typeof d == 'object'){
			$(obj).text('('+d['zan']+')赞');
			
		}else{
			$(".pop_bg").fadeIn();
		}
	})
	//弹出：确认按钮
		$(".trueBtn").click(function(){
			 $(".pop_bg").fadeOut();
		});
}

