<?php
/*QQ790431300*/
$filel="image";//路径
if(!is_dir($filel)){
mkdir($filel);
}
function filename($file_name){ 
$extend =explode("." , $file_name); 
return end($extend); 
}
$type=array("jpg","png","jpeg","gif","bmp");
$time=date('Y-m-d H:i:s');
$arr=@$_FILES['file'];
$url=array();
$fs=array();
for($i=0;$i<count($arr['name']);$i++){
$fs[$i]['name']=filename($arr['name'][$i]);
$fs[$i]['type']=$arr['type'][$i];
$fs[$i]['tmp_name']=$arr['tmp_name'][$i];
$fs[$i]['error']=$arr['error'][$i];
$fs[$i]['size']=round($arr['size'][$i]/1024);
$filename=md5($i.$time);
$fileurl="{$filel}/{$filename}.{$fs[$i]['name']}";
if($fs[$i]['error']>"0" and $fs[$i]['error']>="6"){
echo "上传失败";
exit();
}elseif(!in_array(filename($fs[$i]['name']),$type)){
echo "<div ='text'>上传失败,类型错了</div>";
exit();
}elseif($fs[$i]['size']>2000){
echo "<div ='text'>上传文件不能大于2m</div>";
exit();
}elseif(file_exists("$fileurl")){
echo "文件已存在";
exit();
}else{
$url[]=@$fileurl;
if(move_uploaded_file($fs[$i]['tmp_name'],"$fileurl")){
/*上传成功*/
}else{
echo "上传出错!";
exit();
}}}
echo $url=@implode("|",$url);
if($fs!=""){
if($url==""){
echo "上传不能为空";
}else{
echo "上传文件成功";
}
}
?>
