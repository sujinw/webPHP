<?php
/*
 * 默认控制器
 */
class IndexController extends AdminController{
	public function index(){
		$seo=array(
			'keywords' =>"格子,原创,文学",
			'des'	=>"格子原创平台，写自己的故事!",
			'title' =>"后台管理系统-格子原创平台-写自己的故事"
		);
		$tnum = count(M("article")->field(array('aid'))->where("to_days(date_format(from_UNIXTIME(`create_time`),'%Y-%m-%d')) = to_days(now())")->all());
		$ynum = count(M('article')->field(array('aid'))->where("create_time - 86400 <= 1")->all());
		$anum = count(M('article')->field(array('aid'))->all());

		$data['tnum'] = $tnum;
		$data['ynum'] = $ynum;
		$data['anum'] = $anum;
		// p($data);
		$this->assign('date',$data);
		$this->assign('seo',gzSeo($seo));
		$this->display();
	}
	public function main(){

		$this->display(MODULE_TPL_PATH.'/Common/inc/main.html');
	}
}

?>