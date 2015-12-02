<?php
/*
 * ====================================
 *后台首页
 * ====================================
 */
header("Content-type: text/html; charset=utf-8"); 
define("ADMINDIR",__DIR__);

run();
function run(){
	$action = $_GET['action'];
	$action = empty($action)? "index" : $action;
	$action_file = ADMINDIR .'/action/'. ucfirst($action) ."Action.class.php";
    // echo $action_file;
// $path1 = "mbcms/main/dao/DaoUser.class.php";
//     $path2 = "mbcms/admin/index.php";
//     echo getRelativePath($path1,$path2);
	
	if(!file_exists($action_file)){
		echo "action error";die;
	}
	require_once $action_file;
	$action_class = new $action;
	$action_class->action();
}

/** 计算path1 相对于 path2 的路径,即在path2引用paht1的相对路径 
* @param  String $path1 
* @param  String $path2 
* @return String 
*/  
function getRelativePath($path1, $path2){  
    $arr1 = explode('/', $path1);  
    $arr2 = explode('/', $path2);  
  
    // 获取相同路径的部分  
    $intersection = array_intersect_assoc($arr1, $arr2);  
  
    $depth = 0;  
  
    for($i=0,$len=count($intersection); $i<$len; $i++){  
        if(!isset($intersection[$i])){  
            $depth = $i;  
            break;  
        }  
    }  
  
    // 将path2的/ 转为 ../，path1获取后面的部分，然后合拼  
    $tmp = array_merge(array_fill(0, count($arr2)-$depth-1, '..'), array_slice($arr1, $depth));  
  
    $relativePath = implode('/', $tmp);  
  
    return $relativePath;  
}
