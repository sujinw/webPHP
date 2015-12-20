<?php
/**
 * 网站总体扩展函数库
 */
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
/**
 * [column_merge 重组栏目信息]
 * @Author   Rukic
 * @DateTime 2015-12-06T14:59:07+0800
 * @param    [type]                   $column [description]
 * @return   [type]                           [description]
 */
function alread_column($column){
	$arr = array();
	if(is_array($column)){
		foreach ($column as $v) {
			$arr[] = $v;
		}
	}
	return $arr;
}
/**
 * [arr_to_string 将数组的值转成string并用&符号连成一条]
 * @Author   Rukic
 * @DateTime 2015-12-04T17:38:13+0800
 * @param    [type]                   $arr [description]
 * @return   [type]                        [description]
 */
function arr_to_string($arr = NULL){
	if(is_null($arr))halt('arr_to_string参数不能为空');
	$str = "";
	foreach ($arr as $v) {
		$str .= $v ."&";
	}
	$str = trim($str,"&");
	return $str;
}
/**
 * [string_to_arr arr_to_string反向转化]
 * @Author   Rukic
 * @DateTime 2015-12-06T11:27:20+0800
 * @param    [type]                   $str [description]
 * @return   [type]                        [description]
 */
function string_to_arr($str){
	if(is_null($str))halt('string_to_arr参数不能为空');
	$arr = array();
	$arr = explode('&',$str);
	return $arr;
}
/**
 * [article_data_ready 文章数据重组返回展示]
 * @Author   Rukic
 * @DateTime 2015-12-10T19:32:56+0800
 * @param    [type]                   $data [description]
 * @return   [type]                         [description]
 */
function article_data_ready($data){
	$article = array();
	//处理文章内容  
	foreach ($data as $v) {
		//处理图片
		if(!empty($v['image'])){
			$image = unserialize(file_get_contents($v['image']));
	 		if(count($image) == 1){
	 			$v['details'] = preg_replace('<baseImg\/>', $image[0], $v['details']);
	 		}else{
	 			foreach ($image as $k => $img) {
	 				$v['details'] = preg_replace('<baseImg\/>', $image[$k], $v['details'],1);
	 			}
	 		}	
	 		$article[]=$v;
		}
	 } 
	return $article;	
}
/**
 * 对字段数据处理
 * a) 规范链接
 * b) 图片地址等
 * @param $field 文章数据
 * @return array
 */
/*function content_field($field)
{
    $cache = S('field' . $field['mid']);
    foreach ($field as $name => $value) {
        if (!isset($cache[$name])) {
            continue;
        }
        switch ($cache[$name]['field_type']) {
            case 'thumb':
                $field[$name] = $field[$name] ? __ROOT__ . '/' . $field[$name] : __ROOT__ . '/HDCMS/Static/image/thumb.jpg';
                break;
            case 'image':
                $field[$name] = $field[$name] ? __ROOT__ . '/' . $field[$name] : '';
                break;
            case 'images':
                $images = unserialize($field[$name]);
                if (is_array($images)) {
                    foreach ($images as $id => $data) {
                        $images[$id]['url'] = __ROOT__ . '/' . $data['path'];
                    }
                }
                $field[$name] = $images;
                break;
            case 'files':
                $files = unserialize($field[$name]);
                if (is_array($files)) {
                    foreach ($files as $id => $data) {
                        if (!empty($data['path'])) {
                            $pathinfo=pathinfo(basename($data['path']));
                            $files[$id]['url'] =U("Index/Download/download",array('cid'=>$field['cid'],'filename'=>$pathinfo['filename']));
                        }
                    }
                }
                $field[$name] = $files;
                break;
        }
    }
    //头像
    if (empty($field['icon'])) {
        $field['icon'] = __STATIC__ . "/image/user.png";
    }
    //URL地址
    $field['url'] = Url::content($field);
    //栏目图片
    if (empty($field['catimage'])) {
        $field['catimage'] = __ROOT__ . '/' . $field['catimage'];
    }
    //栏目url
    $field['caturl'] = Url::category($field);
    //发表时间
    $field['time'] = date("Y-m-d", $field['addtime']);
    //多久前发表
    $field['date_before'] = date_before($field['addtime']);
    return $field;
}*/
?>