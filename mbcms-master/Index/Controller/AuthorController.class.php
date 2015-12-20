<?php
/**
* 自动验证类
*/
class AuthorController extends CommonController{
	
	function __init(){
		//注册文章标签
		$this->registerPlu("block","arclist","arclist");
		//注册网站配置标签
		$this->registerPlu("function","config","config");

		$this->registerPlu("block","alist","alist");
		//注册栏目标签
		$this->registerPlu('block',"chanal","chanal");
		//注册上一篇下一篇标签
		$this->registerPlu('block','pagenext','pagenext');


	}

	
	
}
?>