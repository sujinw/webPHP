<?php
/**
 * [arclist 文章标签解析]
 * @Author   Rukic
 * @DateTime 2015-12-11T14:27:56+0800
 * @param    [type]                   $model   [文章数据表名不用前缀]
 * @param    [type]                   $args    [标签]
 * @param    [type]                   $content [内容]
 * @param    [type]                   &$smarty [smarty对象]
 * @return   [type]                            [description]
 */
//文章标签解析
// aid 指定文章 aid 如：aid='1,2,3'
// cid 指定栏目 cid 如 :cid='1,2,3'
// row 显示行数
// titlelen 标题长度
// infolen 内容简介长度
// order
// 	排序方式
// 		hot 热门文章
// 		new 最新文章
// 		rand 随机排序
// 自定义如 :order='aid desc'
// flag 文章属性 id( 如推荐 , 置顶等 )
// noflag 排除的 flag 属性（与 flag 含义相反）
// relative 相关文章 1 是 0 否（按 flag 获得，只能在内容页使用）
function arclist($attr, $content, &$smarty){
	$model = 'article';
	// p($attr);die;
	//获得指定文章
	$aid =intval(isset($attr['aid'])?$attr['aid']:0); 
	//获得指定栏目文章
	$cid =intval(isset($attr['cid'])?$attr['cid']:0);
	//显示条数
	$row = isset($attr['row'])?$attr['row']:10;
	//标题长度
	$titlelen = isset($attr['titlelen'])?$attr['titlelen']:'10';
	//简介长度
	$infolen = isset( $attr['infolen'] ) ? intval( $attr['infolen'] ) : 80;
	//是否只获取有缩略图的文章 1获得只有图片的  0 有没有都行
	$image = intval(isset($attr['image'])?$attr['image']:0);
	//排序		//显示类型   hot 热门文章   new  最新文章
	$order = isset( $attr['order'] ) ? strtolower( trim( $attr['order'] ) )
		: '';
	//对快进行命名
	$bname = isset($attr['name'])?$attr['name']:"field";

	// echo $image;die;
	/*==========================语句重组===============================*/
	$adb = M($model); //实例化一个数据库模型
	//---------------------------where-------------------------------
	if($aid){//指定文章id
		$adb->where("aid=".$aid);
	}
	if($cid){
		$adb->where("column_id=".$cid);
	}
	if($image){
		$adb->where("thumb <> ''");
	}
	//---------------------------order-------------------------------
    if($order){
        switch($order){
            case 'hot':
                //查看次数最多
                $order='hits DESC';
                break;
            case 'rand':
                //随机排序
                $order='rand()';
                break;
            case 'new':
                //最新文章
                $order='create_time DESC';
                break;
            default:
               // \$order= str_replace(array('aid','cid'), array(\$db->table.'.aid','category.cid'), \$order);
        }
    }else{
        $order='aid DESC';
    }
    //---------------------------查询条件-------------------------------
	//---------------------------limit-------------------------------
    $result = $adb->order($order)->limit($row)->all();
	//---------------------------重组文章数据-------------------------------
    $article = array();
    $str="";
    $result = article_data_ready($result);
    foreach ($result as $index => $field) {
    	// $field=article_data_ready($field);
        $field['_index']=$index;
        $field['_first']=$index==0?true:false;
        $field['_last']=$index==(count($result)-1)?true:false;
        $field['title']=mb_substr($field['title'],0,$titlelen,'utf8');
        $field['title']=$field['highlight']?"<span style='color:red'>".$field['title']."</span>":$field['title'];
        $field['excerpt']=mb_substr($field['excerpt'],0,$infolen,'utf-8');
         /*if($field['new_window'] || $field['redirecturl']){
        	$field['link']='<a href="'.$field['url'].'" target="_blank">'.$field['title'].'</a>';
		}else{
			$field['link']='<a href="'.$field['url'].'">'.$field['title'].'</a>';
		}*/
		$article[]=$field;
		$fieldName = array_keys($field);
   		$temp=$content;

		foreach ($fieldName as $name) {

			$temp = str_replace("[\$".$bname.".".$name."]",$field[$name],$temp);
		}
		$str .=$temp;
    }

	$smarty->assign("list",$article);
	return $str;
}
/**
 * [chanal 栏目标签解析函数]
 * @Author   Rukic
 * @DateTime 2015-12-20T12:05:37+0800
 * @return   [type]                   [description]
 */
/*
 * cid   指定id栏目
 * type  self   同级栏目
 * 		 son    子栏目
 * 		 top     顶级栏目
 */
function chanal($attr, $content, &$smarty){
	$cid = isset($attr['cid'])?$attr['cid']:0; 
	$type = isset($attr['type'])?$attr['type']:'self';   //默认显示同级栏目
	$bname = isset($attr['name'])?$attr['name']:'field';   //给块命名
    $db = M('column');
    switch ($type) {
    		case 'self'://显示同级栏目需要cid
    			if(!$cid){
    				$content = "需要栏目cid";
    				return $content;
    			}else{
    				$where = $db->where('id='.$cid);
    			}
    			# code...
    			break;
    		case 'son'://显示子类栏目需要cid
    			if(!$cid){
    				$content = "需要栏目cid";
    				return $content;
    			}else{
    				$where = $db->where('parent_id='.$cid);
    			}
    			break;  		
    		case 'top':
    			$where = $db->where('parent_id=0');
    			break;
    	}
    	$result = $db->all();
    	$str = "";
    	foreach ($result as $res) {
    		$res['url'] = __ROOT__.'?c=list&type=column&cid='.$res['id'];
    		$fieldName = array_keys($res);
    		$tmp = $content;
    		foreach ($fieldName as $name) {
    			$tmp = str_replace("[\$".$bname.".".$name."]",$res[$name],$tmp);
    		}
    		$str .= $tmp;
    	}
	return $str;    	
}
/**
 * [pagenext 上一篇、下一篇标签解析函数]
 * @Author   Rukic
 * @DateTime 2015-12-20T12:47:32+0800
 * @param    [type]                   $attr    [description]
 * @param    [type]                   $content [description]
 * @param    [type]                   &$smarty [description]
 * @return   [type]                            [description]
 */
function pagenext($attr, $content, &$smarty){
	$pre = isset($attr['pre'])?$attr['pre']:'上一篇：';
	$next = isset($attr['next'])?$attr['next']:'下一篇：';
	$bname = isset($attr['name'])?$attr['name']:"field";
	$aid = isset($_GET['aid'])?$_GET['aid']:0;
	$db = M('article');
	if(!$aid){
		$content = "请在文章浏览页面使用本标签";
	}else{
		if($pre){
			$aid = $aid-1 != 0 ? $aid-1 : 1;
			$db->where('aid='.$aid);
			$result = $db->order('aid desc')->one();
			if(empty($result)){
				$content = "好像没有了~~";

			}else{
				$result['url']=__ROOT__.'?c=View&type=article&aid='.$aid;
				$html = "<div class='pages_pre'>".$pre."<a href='".$result['url']."'>".$result['title']."</a></div>";
				$content = str_replace('[$pagepre]',$html,$content);
			}
		}
		if($next){
			$dbid = file_get_contents(MYPHP_TEMP_PATH.'/dbid/article/article/dbid.txt');
			$aid = $aid+1 == $dbid ? $dbid :$aid+1;
			$db->where('aid='.$aid);
			$result = $db->order('aid desc')->one();
			if(empty($result)){
				$content = "好像没有了~~";
			}else{			
				$result['url']=__ROOT__.'?c=View&type=article&aid='.$aid;
				$html = "<div class='pages_next'>".$next."<a href='".$result['url']."'>".$result['title']."</a></div>";
				$content = str_replace('[$pagenext]',$html,$content);
			}
		}
	}
	return $content;

}
/**
 * [config 解析网站配置标签]
 * @Author   Rukic
 * @DateTime 2015-12-13T13:26:36+0800
 * @param    [type]                   $attr    [description]
 * @param    [type]                   $content [description]
 * @param    [type]                   &$smarty [description]
 * @return   [type]                            [description]
 */
/*{#config c=webname#}
 * 随c的值，c可以写任意的字母代替
 * webname =》网站标题
 * icp =》网站icp
 * qq =》站长qq
 * email=》站长email
 * web_status =》网站开启状态
 * close_message =》网站关闭提示信息
 * web_register =》网站注册开启状态
 * close_register =》网站注册关闭提示
 */
function config($attr, &$smarty){
    $field = array('name','value');
	$conf = M('config')->field($field)->all();

	foreach ($conf as $v) {
		foreach ($attr as $k) {
			if(in_array($k,$v)){
				return $v['value'] == 1 ? '开启' : $v['value'];
			}
		}
	}
}
function alist($attr, $content, &$smarty){
	$row = isset($attr['row'])?$attr['row']:"";

	$rows = M('article')->limit($row)->all();
	$str="";
	foreach ($rows as $row) {
		$tmp = $content;
		$fieldName = array_keys($row);
		foreach ($fieldName as $name) {
			$tmp=str_replace("[\$field.".$name."]",$row[$name],$tmp);
		}
		$str.=$tmp;
	}
	return $str;

}
?>