<?php
/*沃のQQ790131300*/
class danger{
/*过滤字符,防注入*/
function fangzhuru($content){
$content=str_replace('insert','',$content);
$content=str_replace('update','',$content);
$content=str_replace('select','',$content);
$content=str_replace('delete','',$content);
$content=str_replace('load_file','',$content);
$content=str_replace('outfile','',$content);
$content=str_replace('INSERT','',$content);$content=str_replace('UPDATE','',$content);
$content=str_replace('SELECT','',$content);
$content=str_replace('DELETE','',$content);
$content=str_replace('LOAD_FILE','',$content);
$content=str_replace('OUTFILE','',$content);
$content=str_replace('UNION','',$content);
$content=str_replace('union','',$content);
$content=str_replace("\.\/",'',$content);
$content=str_replace("./../",'',$content);
$content=str_replace("../",'',$content);
$content=str_replace("\.'.\/",'',$content);
$content=str_replace("\*",'',$content);
$content=str_replace("\/\*",'',$content);
$content=str_replace("\'",'',$content);
$content=str_replace('%5C','',$content);
$content=str_replace('mysql','ｍｙｓｑｌ',$content);
$content=str_replace('sql','ｓｑｌ',$content);
$content=str_replace('SQL','ＳＱＬ',$content);
;
$content=str_replace('show','',$content);
;
$content=str_replace('SHOW','',$content);
$content=str_replace('&nbsp;',' ',$content);
$content=str_replace('or','',$content);
$content=str_replace('and','',$content);
$content=str_replace('&','',$content);
$content=str_replace('|','',$content);
$content=str_replace('(','',$content);
$content=str_replace('&#233;','e',$content);
$content=str_replace('&#234;','e',$content);
$content=str_replace('&#235;','e',$content);
$content=str_replace('&#236;','i',$content);
$content=str_replace('&#237;','i',$content);
$content=str_replace('&#238;','i',$content);
$content=str_replace('&#239;','i',$content);
$content=str_replace('&#240;','o',$content);
$content=str_replace('&#241;','n',$content);
$content=str_replace('&#242;','o',$content);
$content=str_replace('&#243;','o',$content);
$content=str_replace('&#244;','o',$content);
$content=str_replace('&#245;','o',$content);
$content=str_replace('&#246;','o',$content);
$content=str_replace('&#224;','a',$content);
$content=str_replace('&#225;','a',$content);
$content=str_replace('&#226;','a',$content);
$content=str_replace('&#227;','a',$content);
$content=str_replace('&#228;','a',$content);
$content=str_replace('&#229;','a',$content);
$content=str_replace('&#249;','u',$content);
$content=str_replace('&#250;','u',$content);
$content=str_replace('&#251;','u',$content);
$content=str_replace('&#252;','u',$content);
$content=htmlspecialchars($content);
$content=str_replace('{br}','<br/>',$content);$content=str_replace("{br/}",'<br/>',$content);
$content=mysql_real_escape_string($content);
return $content;
}
function yueduimg($content){
$gold_preg='%\{img\}(.*?)\{\/img\}%';
preg_match_all($gold_preg,$content,$gold);for($i=0;$i<count($gold)-1;$i++){
return $content=str_replace($gold[0][$i],"<img src='".$gold[1][$i]."' class=\"img\">",$gold[0][$i]);
}}}
/*
*ubb标题函数
*$a=栏目
*$b=栏目id_0全部
*$c=排序0随1新2热3精
*$d=条数
*$e=字符长度
*$伪静态 0开
*/
function ubbtitle($a,$b,$c,$d,$e,$伪静态){
$hosturl="http://".$_SERVER['HTTP_HOST'];
if($a==""){
$a="bbs";
}
if($b!="0"){
$sqlcontent="classify='$b' and sh='yes'";
}else{
$sqlcontent="sh='yes'";
}
if($c=="0"){
$sqlpai="rand()";
}elseif($c=="1"){
$sqlpai="`id` desc";
}else{
$sqlpai="`rq` desc";
}
echo "<ul id=\"ul\">";
$sql = "select `id`,`title`,`rq` from `".$a."` where ".$sqlcontent." order by ".$sqlpai." limit 0,".$d;
$res=mysql_query($sql);
while($row=mysql_fetch_assoc($res)){
if($伪静态=="0" and $a=="article"){
$url="<a href=\"".$hosturl."/".$a."/guigushi.php/".$row['id'].".html\"><li id=\"li\">".mb_substr($row['title'],0,$e,'utf-8')."</li></a>";
}else{
$url="<a href=\"".$hosturl."/".$a."/guigushi.php?id=".$row['id']."\"><li id=\"li\">".mb_substr($row['title'],0,$e,'utf-8')."</li></a>";
}
echo $url;
}
mysql_free_result($res);
echo "</ul>";
}
function ubb($content){
preg_match_all('/\{([^\{]+)=([^\{]+)_([^\{]+)_([^\{]+)_([^\{]+)_([^\{]+)\}/',$content,$m,PREG_SET_ORDER);
foreach($m as $v){
$content=str_replace($v[0],ubbtitle($v[1],$v[2],$v[3],$v[4],$v[5],$v[6]),$content);
}
}
/*获取文字长度*/
function strlenutf8($string=null){
preg_match_all("/./us",$string,$match);
return count($match[0]);
}
/*获取网址*/
$hosturl="http://".$_SERVER['HTTP_HOST'];
?>