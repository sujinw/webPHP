<?php require("head.php");
if(@$_GET['my'] != 1){
?>
<div class="title">安装沃の程序</div>
		<p>请填写MySql的连接参数。（可从服务器提供商处获得）
</p>
					<form action="?my=1" method="POST">
						  <p>主机地址：<input type="text" name="host" id="p" value="localhost"/></p>
						  <p>用 户 名：<input type="text" name="user" id="p" value="root"/></p>
						  <p>密　　码：<input type="text" name="password" id="p" value="root"/></p>
						  <p>数据库名：<input type="text" name="name" id="p" value=""/></p>
					 <p><input type="submit" name="submit" value="确定" id="b"/>
</p>
					</form><p>
沃の文章程序，安装后删除install目录，程序免费，确定请安装。QQ790431300，<br>官方网站：<a href="http://guigs.cn">http://guigs.cn</a>
	
</p>



<?php
exit();
}
$host=trim($_POST['host']);
$user=trim($_POST['user']);
$password=trim($_POST['password']);
$name=trim($_POST['name']);
$link=@mysql_connect($host,$user,$password);
if(!$link){
echo("<div class='title'>数据库服务器连接失败！请返回上一步检查连接参数
<br>
主机地主:$host
<br/>用户名:$user
<br/>密码:$password
<br/>数据库名:$name
<br/><a href='index.php'>上一步</a></div>");
exit();
}
if(!mysql_select_db($name, $link)){
echo ("数据库不存在！请返回上一步检查连接参数。<p><a href='index.php'>上一步</a></p>");

exit();
}
$file="sjk.txt";
$line=file_exists($file);
if($line){
echo "安装过了";
exit();
}else{
$files="sjk.php";
$config_str = "<?php";
$config_str .= "\n";
$config_str .= '$db_host= "' .$host. '";';
$config_str .= "\n";
$config_str .= '$db_user= "' .$user. '";';
$config_str .= "\n";
$config_str .= '$db_password= "' .$password. '";';
$config_str .= "\n";
$config_str .= '$db_name= "' .$name. '";';
$config_str .= "\n";
$config_str .= '?>';
$fp=fopen($files,"w");
fwrite($fp,$config_str);
fclose($fp);
$str="沃のPHP程序";
$fp=fopen($file,"w");
fwrite($fp,$str);
fclose($fp);
require_once("sql.php");
}
?>
</body>
</html>