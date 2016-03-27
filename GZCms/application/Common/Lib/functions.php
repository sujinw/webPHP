<?php 
/**
 * [gzSeo description]
 * @Author   Rukic
 * @DateTime 2016-01-31T16:00:50+0800
 * @param    [array]                   $seo [keywords des title]
 * @return   [string]                       [description]
 */
function gzSeo($seo){
	$str = '<meta name="keywords" content=" '. $seo['keywords'] .' ">'.
		   '<meta name="description" content=" '. $seo['des'] .' ">'.
		   '<title>'. $seo['title'] .'</title>';
	return $str;
}

/**
 * [node_merge 递归重组节点信息为多维数组]
 * @Author   Rukic
 * @DateTime 2015-11-28T22:37:50+0800
 * @param    [type]                   $node [要处理的节点数组]
 * @param    integer                  $pid  [父级ID]
 * @return   [type]                         [description]
 */
function node_merge($node,$access=NULL,$pid=0){
	$arr = array();
	foreach ($node as $v) {
		if(is_array($access)){
			$v['access'] = in_array($v['id'],$access) ? 1:0; 
		}
		if($v['pid'] == $pid){
			$v['child'] = node_merge($node,$access,$v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}


function sub_day($endday,$staday,$range='')
{
	$value = $endday - $staday;
	if($value < 0)
	{
		return '';
	}
	elseif($value >= 0 && $value < 59)
	{
		return ($value+1)."秒";
	}
	elseif($value >= 60 && $value < 3600)
	{
		$min = intval($value / 60);
		return $min."分钟";
	}
	elseif($value >=3600 && $value < 86400)
	{
		$h = intval($value / 3600);
		return $h."小时";
	}
	elseif($value >= 86400 && $value < 86400*30)
	{
		$d = intval($value / 86400);
		return intval($d)."天";
	}
	elseif($value >= 86400*30 && $value < 86400*30*12)
	{
		$mon  = intval($value / (86400*30));
		return $mon."月";
	}
	else{	
		$y = intval($value / (86400*30*12));
		return $y."年";
	}
}
function daterange($endday,$staday='',$format='Y-m-d',$color='',$range=3)
{
	if (empty($staday)){
		$value = SYS_TIME - $endday;
	}else{
		$value = $endday - $staday;
	}
	if($value < 0)
	{
		return '';
	}
	elseif($value >= 0 && $value < 59)
	{
		$return=($value+1)."秒前";
	}
	elseif($value >= 60 && $value < 3600)
	{
		$min = intval($value / 60);
		$return=$min."分钟前";
	}
	elseif($value >=3600 && $value < 86400)
	{
		$h = intval($value / 3600);
		$return=$h."小时前";
	}
	elseif($value >= 86400)
	{
		$d = intval($value / 86400);
		if ($d>$range)
		{
		return date($format,$staday);
		}
		else
		{
		$return=$d."天前";
		}
	}
	if ($color)
	{
	$return="<span style=\"color:{$color}\">".$return."</span>";
	}
	return $return;	 
}
function dateaway($fortime)
{
	$value = SYS_TIME - $fortime;
	// p($value);
	if ($value < 0) {
		return '刚刚';
	} elseif($value >= 0 && $value < 59) {
		$return=($value+1)."秒前";
	} elseif($value >= 60 && $value < 3600) {
		$min = intval($value / 60);
		$return=$min."分钟前";
	} elseif($value >=3600 && $value < 86400) {	
		$h = intval($value / 3600);
		$return=$h."小时前";
	} elseif($value >= 86400) {	
		$d = intval($value / 86400);
		// p($d);
		if ($d>3){
			if (date("Y",$fortime) != date("Y",SYS_TIME)){
				$return=date("Y-m-d",$fortime);
			}else{
				$return=date("m-d",$fortime);
			}
		}else{
			$return=$d."天前";
		}
	}
	return $return;	 
}

function maildate($date){
	// 2014年10月28日(星期二) 晚上8:2
	$str="";
	$str .= date('Y'.'年'.'m月d日',$date);
	$w = date('w',$date);
	switch ($w) {
		case '0':
			$str .= "(星期一)";
			break;
		case '1':
			$str .= "(星期二)";
			break;
		case '2':
			$str .= "(星期三)";
			break;
		case '3':
			$str .= "(星期四)";
			break;
		case '4':
			$str .= "(星期五)";
			break;
		case '5':
			$str .= "(星期六)";
			break;
		case '6':
			$str .= "(星期天)";
			break;
	}
	$t = (int)(date('G',$date));
	// p($t);die;
	if(0<=$t && $t<3){
		$str .= "午夜".$t.':'.date('i',$date);
	}elseif(3<=$t && $t<6){
		$str .= "凌晨".$t.':'.date('i',$date);
	}elseif(6<=$t && $t<12){
		$str .= "上午".$t.':'.date('i',$date);
	}elseif(12<=$t && $t<18){
		$str .= "下午".($t-12).':'.date('i',$date);
	}elseif(18<=$t && $t<23){
		$str .= "晚上".($t-12).':'.date('i',$date);
	}

	// p($str);
	return $str;
}
?>