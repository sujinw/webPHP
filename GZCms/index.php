<?php
/*if(!is_file("install.lock")){
	 header("Location:install/index.htm");
}*/
define('DEBUG',true);
define('MODEL_LIST','Admin,Index,install');
define('APP_PATH','/application');
define('DIR_SAFE',TRUE);
// echo "string";
require './MyPHP/MyPHP.php';
?>
