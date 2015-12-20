<?php
/**
 * 错误日志类
 */
class Log{
	/**
	 * [write 错误写入函数]
	 * @Author   Rukic
	 * @DateTime 2015-11-10T23:30:57+0800
	 * @param    [string || array]        $msg   [错误信息]
	 * @param    string                   $level [错误等级]
	 * @param    integer                  $type  [写入形式]
	 * @param    [type]                   $dest  [目标文件路径]
	 * @return   [type]                          [description]
	 */
	public static function write($msg, $level = 'ERROR', $type = 3, $dest = NULL){
		if(!C('SAVE_LOG')) return;
		if(is_null($dest)){
			$dest = MYPHP_LOG_PATH . '/' . date('Y_m_d') . '.log'; 
		}

		if(is_dir(MYPHP_LOG_PATH)) error_log("[TIME]:".date("Y-m-d H:i:s"). "{$level}:{$msg} \r\n", $type,$dest );

	}
}/**
 * 框架公用函数文件
 *
 *===================================================*/

/**
 * [p 框架内打印函数]
 * @AuthorHTL
 * @DateTime  2015-11-06T16:02:08+0800
 * @param     [type]                   $arr [description]
 * @return    [type]                        [description]
 */
function p($arr){
	if(is_bool($arr)){
		var_dump($arr);
	}elseif(is_null($arr)){
		var_dump(NULL);
	}else{
		echo "<pre style='padding:10px;font-size:16px;color:#333;background:honeydew;border:1px solid #DDD;border-radius:8px;'>";
		print_r($arr);
		echo "</pre>";
	}
}

/**
 * [C 配置项函数]
 * @Author Rukic
 * @DateTime  2015-11-06T16:02:42+0800
 * //1.加载配置项            C($sysConfig) C($userConfig);
 * //2.读取配置项            C('CODE_LEN') 
 * //3.临时动态改变配置项    C('CODE_LEN',20); 
 * //4.读取所有的配置项      C();                 
 */
function C($var = NULL, $value = NULL){
	static $config = array();

	//加载配置项
	if(is_array($var)){
		//把传过来的array和当前的array进行合并
		$config = array_merge($config, array_change_key_case($var, CASE_UPPER));
		return;
	}

	//读取或者动态改变配置项
	if(is_string($var)){
		$var = strtoupper($var);
		if(!is_null($value)){
			$config[$var] = $value;
			return;
		}
		return isset($config[$var]) ? $config[$var] : NULL;
	}

	//返回所有配置项
	if(is_null($var) && is_null($value)){
		return $config;
	}
}

function go($url, $time = 0, $msg = ''){
	if(!headers_sent()){
		$time == 0 ? header("Location:". $url) : header("Refresh:{$time},url=".$url);
		die($msg);
	}else{
		echo "<meta http-equiv='Refresh' content='{$time}, url='{$url}'";
		if($time)die($msg);
	}
}
/**
 * [halt 终止]
 * @Author   Rukic
 * @DateTime 2015-11-13T18:48:15+0800
 * @return   [type]                   [description]
 */
function halt($error, $level="ERROR",$type=3,$dest=NULL){
	if(is_array($error)){
		Log::write($error['message'],$level,$type,$dest);
	}else{
		Log::write($error,$level,$type,$dest);
	}

	$e = array();
	//开启DEBUG
	if(DEBUG){
		if(!is_array($error)){
			$trace = debug_backtrace(); //文件来源，追踪引导
			$e['message'] = $error;
			$e['file'] = $trace[0]['file'];
			$e['line'] = $trace[0]['line'];
			$e['class'] = isset($trace[0]['line']) ? $trace[0]['line'] : "";
			$e['function'] = isset($trace[0]['function']) ? $trace[0]['function'] : "";

			ob_start();
			debug_print_backtrace();
			$e['trace'] = htmlspecialchars(ob_get_clean());
		}else{
			$e = $error;
		}
	}else{
		if($url = C('ERROR_URL')){
			go($url);
		}else{
			$e['message'] = C('ERROR_MSG');
		}
	}

	include MYPHP_TPL_PATH .'/halt.html';
	die;
}
/**
 * [print_const 打印自定义常量]
 * @return [type] [description]
 */
function print_const(){
	$var = get_defined_constants(true);
	p($var['user']);
}
/**
 * [M 实例化模型类]
 */
function M($table){
	$obj = new Model($table);
	return $obj;
}
/**
 * 获得扩展模型
 * @param       $name  模型名不加Model后缀
 * @param bool $full 是否为全表名
 * @param array $param 参数
 * @return mixed
 */
// function K($name, $full = null, $param = array(), $driver = null)
// {
//     $class = ucfirst($name) . "Model";
//     return new $class(strtolower($name), $full, $param);
// }
function K($model){
    $model .= 'Model';
    return new $model;
}
/**
 * 获得控制器对象
 */
function getControl($Control)
{
    return new $Control;
}
/**
 * 获得浏览器版本
 */
function browser_info()
{
    $agent = strtolower($_SERVER["HTTP_USER_AGENT"]);
    $browser = null;
    if (strstr($agent, 'msie 9.0')) {
        $browser = 'msie9';
    } else if (strstr($agent, 'msie 8.0')) {
        $browser = 'msie8';
    } else if (strstr($agent, 'msie 7.0')) {
        $browser = 'msie7';
    } else if (strstr($agent, 'msie 6.0')) {
        $browser = 'msie6';
    } else if (strstr($agent, 'firefox')) {
        $browser = 'firefox';
    } else if (strstr($agent, 'chrome')) {
        $browser = 'chrome';
    } else if (strstr($agent, 'safari')) {
        $browser = 'safari';
    } else if (strstr($agent, 'opera')) {
        $browser = 'opera';
    }
    return $browser;
}
/**
 * [getOS 获取操作系统]
 * @Author   Rukic
 * @DateTime 2015-11-24T20:02:53+0800
 * @return   [type]                   [description]
 */
/**
 * 获取客户端操作系统信息包括win10
 * @param  null
 * @author  Jea杨
 * @return string 
 */
function get_os(){
$agent = $_SERVER['HTTP_USER_AGENT'];
    $os = false;
 
    if (preg_match('/win/i', $agent) && strpos($agent, '95'))
    {
      $os = 'Windows 95';
    }
    else if (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90'))
    {
      $os = 'Windows ME';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/98/i', $agent))
    {
      $os = 'Windows 98';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent))
    {
      $os = 'Windows Vista';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent))
    {
      $os = 'Windows 7';
    }
	  else if (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent))
    {
      $os = 'Windows 8';
    }else if(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent))
    {
      $os = 'Windows 10';#添加win10判断
    }else if (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent))
    {
      $os = 'Windows XP';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent))
    {
      $os = 'Windows 2000';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent))
    {
      $os = 'Windows NT';
    }
    else if (preg_match('/win/i', $agent) && preg_match('/32/i', $agent))
    {
      $os = 'Windows 32';
    }
    else if (preg_match('/linux/i', $agent))
    {
      $os = 'Linux';
    }
    else if (preg_match('/unix/i', $agent))
    {
      $os = 'Unix';
    }
    else if (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent))
    {
      $os = 'SunOS';
    }
    else if (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent))
    {
      $os = 'IBM OS/2';
    }
    else if (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent))
    {
      $os = 'Macintosh';
    }
    else if (preg_match('/PowerPC/i', $agent))
    {
      $os = 'PowerPC';
    }
    else if (preg_match('/AIX/i', $agent))
    {
      $os = 'AIX';
    }
    else if (preg_match('/HPUX/i', $agent))
    {
      $os = 'HPUX';
    }
    else if (preg_match('/NetBSD/i', $agent))
    {
      $os = 'NetBSD';
    }
    else if (preg_match('/BSD/i', $agent))
    {
      $os = 'BSD';
    }
    else if (preg_match('/OSF1/i', $agent))
    {
      $os = 'OSF1';
    }
    else if (preg_match('/IRIX/i', $agent))
    {
      $os = 'IRIX';
    }
    else if (preg_match('/FreeBSD/i', $agent))
    {
      $os = 'FreeBSD';
    }
    else if (preg_match('/teleport/i', $agent))
    {
      $os = 'teleport';
    }
    else if (preg_match('/flashget/i', $agent))
    {
      $os = 'flashget';
    }
    else if (preg_match('/webzip/i', $agent))
    {
      $os = 'webzip';
    }
    else if (preg_match('/offline/i', $agent))
    {
      $os = 'offline';
    }
    else
    {
      $os = '未知操作系统';
    }
    return $os;  
}
/**
 * 获得客户端IP地址
 * @param int $type 类型
 * @return int
 */
function ip_get_client($type = 0)
{
    $type = intval($type);
    //保存客户端IP地址
    if (isset($_SERVER)) {
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else {
            $ip = getenv("REMOTE_ADDR");
        }
    }
    $long = ip2long($ip);
    $clientIp = $long ? array($ip, $long) : array("0.0.0.0", 0);
    return $clientIp[$type];
}
function getIP(){
    if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
}
/**
 * [ipton ip转数字]
 * @Author   Rukic
 * @DateTime 2015-11-25T17:22:37+0800
 * @param    [type]                   $ip [description]
 * @return   [type]                       [description]
 */
function ipton($ip){
    $ipstr = '';
    $ip_arr=explode('.',$ip);//分隔ip段
    foreach ($ip_arr as $value)
    {
        $iphex=dechex($value);//将每段ip转换成16进制
        if(strlen($iphex)<2)//255的16进制表示是ff，所以每段ip的16进制长度不会超过2
        {
            $iphex='0'.$iphex;//如果转换后的16进制数长度小于2，在其前面加一个0
        //没有长度为2，且第一位是0的16进制表示，这是为了在将数字转换成ip时，好处理
        }
        $ipstr.=$iphex;//将四段IP的16进制数连接起来，得到一个16进制字符串，长度为8
    }
    return hexdec($ipstr);//将16进制字符串转换成10进制，得到ip的数字表示
}
 
/**
 * [ntoip ipton函数的逆向过程]
 * @Author   Rukic
 * @DateTime 2015-11-25T17:22:13+0800
 * @param    [type]                   $n [description]
 * @return   [type]                      [description]
 */
function ntoip($n)
{
    $iphex=dechex($n);//将10进制数字转换成16进制
    $len=strlen($iphex);//得到16进制字符串的长度
    if(strlen($iphex)<8)
    {
        $iphex='0'.$iphex;//如果长度小于8，在最前面加0
        $len=strlen($iphex); //重新得到16进制字符串的长度
    }
    //这是因为ipton函数得到的16进制字符串，如果第一位为0，在转换成数字后，是不会显示的
    //所以，如果长度小于8，肯定要把第一位的0加上去
    //为什么一定是第一位的0呢，因为在ipton函数中，后面各段加的'0'都在中间，转换成数字后，不会消失
    for($i=0,$j=0;$j<$len;$i=$i+1,$j=$j+2)
    {//循环截取16进制字符串，每次截取2个长度
        $ippart=substr($iphex,$j,2);//得到每段IP所对应的16进制数
        $fipart=substr($ippart,0,1);//截取16进制数的第一位
        if($fipart=='0')
        {//如果第一位为0，说明原数只有1位
            $ippart=substr($ippart,1,1);//将0截取掉
        }
        $ip[]=hexdec($ippart);//将每段16进制数转换成对应的10进制数，即IP各段的值
    }
    // $ip = array_reverse($ip);
     
    return implode('.', $ip);//连接各段，返回原IP值
}
/**
 * 是否为AJAX提交
 * @return boolean
 */
function ajax_request()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        return true;
    return false;
}
/**
 * 加密方法
 * @param      $data 加密字符串
 * @param null $key 密钥
 * @return mixed|string
 */
function encrypt($data, $key = null)
{
    return encry::encrypt($data, $key);
}

/**
 * 解密方法
 * @param string $data 解密字符串
 * @param null $key 密钥
 * @return mixed
 */
function decrypt($data, $key = null)
{
    return encry::decrypt($data, $key);
}
/**
 * 获得几天前，几小时前，几月前
 * @param int $time 时间戳
 * @param array $unit 时间单位
 * @return bool|string
 */
function date_before($time, $unit = null)
{
    $time = intval($time);
    $unit = is_null($unit) ? array("年", "月", "星期", "天", "小时", "分钟", "秒") : $unit;
    switch (true) {
        case $time < (NOW - 31536000) :
            return floor((NOW - $time) / 31536000) . $unit[0] . '前';
        case $time < (NOW - 2592000) :
            return floor((NOW - $time) / 2592000) . $unit[1] . '前';
        case $time < (NOW - 604800) :
            return floor((NOW - $time) / 604800) . $unit[2] . '前';
        case $time < (NOW - 86400) :
            return floor((NOW - $time) / 86400) . $unit[3] . '前';
        case $time < (NOW - 3600) :
            return floor((NOW - $time) / 3600) . $unit[4] . '前';
        case $time < (NOW - 60) :
            return floor((NOW - $time) / 60) . $unit[5] . '前';
        default :
            return floor(NOW - $time) . $unit[6] . '前';
    }
}
/**
 * 根据配置文件的URL参数重新生成URL地址
 * @param String $path 访问url
 * @param array $args GET参数
 *                     <code>
 *                     $args = "nid=2&cid=1"
 *                     $args=array("nid"=>2,"cid"=>1)
 *                     </code>
 * @return string
 */
function U($path, $args = array())
{
    return Route::getUrl($path, $args);
}
/**
* 返回数组的维度
* @param [type] $arr [description]
* @return [type] [description]
*/
function arrayLevel($arr){
    $al = array(0);
    
    aL($arr,$al);
    return max($al);
}
function aL($arr,&$al,$level=0){
    if(is_array($arr)){
        $level++;
        $al[] = $level;
        foreach($arr as $v){
            aL($v,$al,$level);
        }
    }
}
/**
 * session处理
 * @param string|array $name 数组为初始session
 * @param string $value 值
 * @return mixed
 */
function session($name = '', $value = '')
{
    if (is_array($name)) {
        ini_set('session.auto_start', 0);
        if (isset($name['name']))
            session_name($name['name']);
        if (isset($_REQUEST[session_name()]))
            session_id($_REQUEST[session_name()]);
        if (isset($name['path']))
            session_save_path($name['path']);
        if (isset($name['domain']))
            ini_set('session.cookie_domain', $name['domain']);
        if (isset($name['expire'])) {
            ini_set('session.gc_maxlifetime', $name['expire']);
            session_set_cookie_params($name['expire']);
        }
        if (isset($name['use_trans_sid']))
            ini_set('session.use_trans_sid', $name['use_trans_sid'] ? 1 : 0);
        if (isset($name['use_cookies']))
            ini_set('session.use_cookies', $name['use_cookies'] ? 1 : 0);
        if (isset($name['cache_limiter']))
            session_cache_limiter($name['cache_limiter']);
        if (isset($name['cache_expire']))
            session_cache_expire($name['cache_expire']);
        if (isset($name['type'])) {
            $class = 'Session' . ucwords($name['type']);
            require_cache(HDPHP_DRIVER_PATH . '/Session/' . $class . '.class.php');
            $hander = new $class();
            $hander->run();
        }
        //自动开启SESSION
        if (C("SESSION_AUTO_START")) {
            session_start();
        }
    } elseif ($name === '') {
        return $_SESSION;
    } elseif (is_null($name)) {
        $_SESSION = array();
        session_unset();
        session_destroy();
    } elseif ($value === '') {
        if ('[pause]' == $name) { // 暂停
            session_write_close();
        } elseif ('[start]' == $name) { //开启
            session_start();
        } elseif ('[destroy]' == $name) { //销毁
            $_SESSION = array();
            session_unset();
            session_destroy();
        } elseif ('[regenerate]' == $name) { //生成id
            session_regenerate_id();
        } elseif (0 === strpos($name, '?')) { // 检查session
            $name = substr($name, 1);
            return isset($_SESSION[$name]);
        } elseif (is_null($name)) { // 清空session
            $_SESSION = array();
        } else {
            return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
        }
    } elseif (is_null($value)) { // 删除session
        if (isset($_SESSION[$name]))
            unset($_SESSION[$name]);
    } else { //设置session
        $_SESSION[$name] = $value;
    }
}
/**
 * 将数组中的值全部转为大写或小写
 * @param array $arr
 * @param int $type 类型 1值大写 0值小写
 * @return array
 */
function array_change_value_case($arr, $type = 0)
{
    $function = $type ? 'strtoupper' : 'strtolower';
    $newArr = array(); //格式化后的数组
    foreach ($arr as $k => $v) {
        if (is_array($v)) {
            $newArr[$k] = array_change_value_case($v, $type);
        } else {
            $newArr[$k] = $function($v);
        }
    }

    return $newArr;
}
/**
 * 不区分大小写检测数据键名是否存在
 */
function array_key_exists_d($key, $arr)
{
    return array_key_exists(strtolower($key), array_change_key_case_d($arr));
}
/**
 * 将数组键名变成大写或小写
 * @param array $arr 数组
 * @param int $type 转换方式 1大写   0小写
 * @return array
 */
function array_change_key_case_d($arr, $type = 0)
{
    $function = $type ? 'strtoupper' : 'strtolower';
    $newArr = array(); //格式化后的数组
    if (!is_array($arr) || empty($arr))
        return $newArr;
    foreach ($arr as $k => $v) {
        $k = $function($k);
        if (is_array($v)) {
            $newArr[$k] = array_change_key_case_d($v, $type);
        } else {
            $newArr[$k] = $v;
        }
    }
    return $newArr;
}
/**
 * 错误中断
 * @param $error 错误内容
 */
function error($error)
{
    halt($error);
}/**
 * Project:     Smarty: the PHP compiling template engine
 * File:        Smarty.class.php
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 * For questions, help, comments, discussion, etc., please join the
 * Smarty mailing list. Send a blank e-mail to
 * smarty-discussion-subscribe@googlegroups.com
 *
 * @link      http://www.smarty.net/
 * @copyright 2015 New Digital Group, Inc.
 * @copyright 2015 Uwe Tews
 * @author    Monte Ohrt <monte at ohrt dot com>
 * @author    Uwe Tews
 * @author    Rodney Rehm
 * @package   Smarty
 * @version   3.1.27
 */

/**
 * define shorthand directory separator constant
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * set SMARTY_DIR to absolute path to Smarty library files.
 * Sets SMARTY_DIR only if user application has not already defined it.
 */
if (!defined('SMARTY_DIR')) {
    define('SMARTY_DIR', dirname(__FILE__) . DS);
}

/**
 * set SMARTY_SYSPLUGINS_DIR to absolute path to Smarty internal plugins.
 * Sets SMARTY_SYSPLUGINS_DIR only if user application has not already defined it.
 */
if (!defined('SMARTY_SYSPLUGINS_DIR')) {
    define('SMARTY_SYSPLUGINS_DIR', SMARTY_DIR . 'sysplugins' . DS);
}
if (!defined('SMARTY_PLUGINS_DIR')) {
    define('SMARTY_PLUGINS_DIR', SMARTY_DIR . 'plugins' . DS);
}
if (!defined('SMARTY_MBSTRING')) {
    define('SMARTY_MBSTRING', function_exists('mb_get_info'));
}
if (!defined('SMARTY_RESOURCE_CHAR_SET')) {
    // UTF-8 can only be done properly when mbstring is available!
    /**
     * @deprecated in favor of Smarty::$_CHARSET
     */
    define('SMARTY_RESOURCE_CHAR_SET', SMARTY_MBSTRING ? 'UTF-8' : 'ISO-8859-1');
}
if (!defined('SMARTY_RESOURCE_DATE_FORMAT')) {
    /**
     * @deprecated in favor of Smarty::$_DATE_FORMAT
     */
    define('SMARTY_RESOURCE_DATE_FORMAT', '%b %e, %Y');
}

/**
 * Try loading the Smarty_Internal_Data class
 * If we fail we must load Smarty's autoloader.
 * Otherwise we may have a global autoloader like Composer
 */
if (!class_exists('Smarty_Autoloader', false)) {
    if (!class_exists('Smarty_Internal_Data', true)) {
        require_once 'Autoloader.php';
        Smarty_Autoloader::registerBC();
    }
}

/**
 * Load always needed external class files
 */

if (!class_exists('Smarty_Internal_Data', false)) {
    require_once SMARTY_SYSPLUGINS_DIR . 'smarty_internal_data.php';
}
require_once SMARTY_SYSPLUGINS_DIR . 'smarty_internal_templatebase.php';
require_once SMARTY_SYSPLUGINS_DIR . 'smarty_internal_template.php';
require_once SMARTY_SYSPLUGINS_DIR . 'smarty_resource.php';
require_once SMARTY_SYSPLUGINS_DIR . 'smarty_variable.php';
require_once SMARTY_SYSPLUGINS_DIR . 'smarty_template_source.php';

/**
 * This is the main Smarty class
 *
 * @package Smarty
 */
class Smarty extends Smarty_Internal_TemplateBase
{
    /**#@+
     * constant definitions
     */

    /**
     * smarty version
     */
    const SMARTY_VERSION = '3.1.27';

    /**
     * define variable scopes
     */
    const SCOPE_LOCAL = 0;

    const SCOPE_PARENT = 1;

    const SCOPE_ROOT = 2;

    const SCOPE_GLOBAL = 3;

    /**
     * define caching modes
     */
    const CACHING_OFF = 0;

    const CACHING_LIFETIME_CURRENT = 1;

    const CACHING_LIFETIME_SAVED = 2;

    /**
     * define constant for clearing cache files be saved expiration datees
     */
    const CLEAR_EXPIRED = - 1;

    /**
     * define compile check modes
     */
    const COMPILECHECK_OFF = 0;

    const COMPILECHECK_ON = 1;

    const COMPILECHECK_CACHEMISS = 2;

    /**
     * define debug modes
     */
    const DEBUG_OFF = 0;

    const DEBUG_ON = 1;

    const DEBUG_INDIVIDUAL = 2;

    /**
     * modes for handling of "<?php ... ?>" tags in templates.
     */
    const PHP_PASSTHRU = 0; //-> print tags as plain text

    const PHP_QUOTE = 1; //-> escape tags as entities

    const PHP_REMOVE = 2; //-> escape tags as entities

    const PHP_ALLOW = 3; //-> escape tags as entities

    /**
     * filter types
     */
    const FILTER_POST = 'post';

    const FILTER_PRE = 'pre';

    const FILTER_OUTPUT = 'output';

    const FILTER_VARIABLE = 'variable';

    /**
     * plugin types
     */
    const PLUGIN_FUNCTION = 'function';

    const PLUGIN_BLOCK = 'block';

    const PLUGIN_COMPILER = 'compiler';

    const PLUGIN_MODIFIER = 'modifier';

    const PLUGIN_MODIFIERCOMPILER = 'modifiercompiler';

    /**#@-*/

    /**
     * assigned global tpl vars
     */
    public static $global_tpl_vars = array();

    /**
     * error handler returned by set_error_hanlder() in Smarty::muteExpectedErrors()
     */
    public static $_previous_error_handler = null;

    /**
     * contains directories outside of SMARTY_DIR that are to be muted by muteExpectedErrors()
     */
    public static $_muted_directories = array('./templates_c/' => null, './cache/' => null);

    /**
     * Flag denoting if Multibyte String functions are available
     */
    public static $_MBSTRING = SMARTY_MBSTRING;

    /**
     * The character set to adhere to (e.g. "UTF-8")
     */
    public static $_CHARSET = SMARTY_RESOURCE_CHAR_SET;

    /**
     * The date format to be used internally
     * (accepts date() and strftime())
     */
    public static $_DATE_FORMAT = SMARTY_RESOURCE_DATE_FORMAT;

    /**
     * Flag denoting if PCRE should run in UTF-8 mode
     */
    public static $_UTF8_MODIFIER = 'u';

    /**
     * Flag denoting if operating system is windows
     */
    public static $_IS_WINDOWS = false;

    /**#@+
     * variables
     */

    /**
     * auto literal on delimiters with whitspace
     *
     * @var boolean
     */
    public $auto_literal = true;

    /**
     * display error on not assigned variables
     *
     * @var boolean
     */
    public $error_unassigned = false;

    /**
     * look up relative filepaths in include_path
     *
     * @var boolean
     */
    public $use_include_path = false;

    /**
     * template directory
     *
     * @var array
     */
    private $template_dir = array('./templates/');

    /**
     * joined template directory string used in cache keys
     *
     * @var string
     */
    public $joined_template_dir = './templates/';

    /**
     * joined config directory string used in cache keys
     *
     * @var string
     */
    public $joined_config_dir = './configs/';

    /**
     * default template handler
     *
     * @var callable
     */
    public $default_template_handler_func = null;

    /**
     * default config handler
     *
     * @var callable
     */
    public $default_config_handler_func = null;

    /**
     * default plugin handler
     *
     * @var callable
     */
    public $default_plugin_handler_func = null;

    /**
     * compile directory
     *
     * @var string
     */
    private $compile_dir = './templates_c/';

    /**
     * plugins directory
     *
     * @var array
     */
    private $plugins_dir = null;

    /**
     * cache directory
     *
     * @var string
     */
    private $cache_dir = './cache/';

    /**
     * config directory
     *
     * @var array
     */
    private $config_dir = array('./configs/');

    /**
     * force template compiling?
     *
     * @var boolean
     */
    public $force_compile = false;

    /**
     * check template for modifications?
     *
     * @var boolean
     */
    public $compile_check = true;

    /**
     * use sub dirs for compiled/cached files?
     *
     * @var boolean
     */
    public $use_sub_dirs = false;

    /**
     * allow ambiguous resources (that are made unique by the resource handler)
     *
     * @var boolean
     */
    public $allow_ambiguous_resources = false;

    /**
     * merge compiled includes
     *
     * @var boolean
     */
    public $merge_compiled_includes = false;

    /**
     * template inheritance merge compiled includes
     *
     * @var boolean
     */
    public $inheritance_merge_compiled_includes = true;

    /**
     * force cache file creation
     *
     * @var boolean
     */
    public $force_cache = false;

    /**
     * template left-delimiter
     *
     * @var string
     */
    public $left_delimiter = "{";

    /**
     * template right-delimiter
     *
     * @var string
     */
    public $right_delimiter = "}";

    /**#@+
     * security
     */
    /**
     * class name
     * This should be instance of Smarty_Security.
     *
     * @var string
     * @see Smarty_Security
     */
    public $security_class = 'Smarty_Security';

    /**
     * implementation of security class
     *
     * @var Smarty_Security
     */
    public $security_policy = null;

    /**
     * controls handling of PHP-blocks
     *
     * @var integer
     */
    public $php_handling = self::PHP_PASSTHRU;

    /**
     * controls if the php template file resource is allowed
     *
     * @var bool
     */
    public $allow_php_templates = false;

    /**
     * Should compiled-templates be prevented from being called directly?
     * {@internal
     * Currently used by Smarty_Internal_Template only.
     * }}
     *
     * @var boolean
     */
    public $direct_access_security = true;

    /**#@-*/
    /**
     * debug mode
     * Setting this to true enables the debug-console.
     *
     * @var boolean
     */
    public $debugging = false;

    /**
     * This determines if debugging is enable-able from the browser.
     * <ul>
     *  <li>NONE => no debugging control allowed</li>
     *  <li>URL => enable debugging when SMARTY_DEBUG is found in the URL.</li>
     * </ul>
     *
     * @var string
     */
    public $debugging_ctrl = 'NONE';

    /**
     * Name of debugging URL-param.
     * Only used when $debugging_ctrl is set to 'URL'.
     * The name of the URL-parameter that activates debugging.
     *
     * @var string
     */
    public $smarty_debug_id = 'SMARTY_DEBUG';

    /**
     * Path of debug template.
     *
     * @var string
     */
    public $debug_tpl = null;

    /**
     * When set, smarty uses this value as error_reporting-level.
     *
     * @var int
     */
    public $error_reporting = null;

    /**
     * Internal flag for getTags()
     *
     * @var boolean
     */
    public $get_used_tags = false;

    /**#@+
     * config var settings
     */

    /**
     * Controls whether variables with the same name overwrite each other.
     *
     * @var boolean
     */
    public $config_overwrite = true;

    /**
     * Controls whether config values of on/true/yes and off/false/no get converted to boolean.
     *
     * @var boolean
     */
    public $config_booleanize = true;

    /**
     * Controls whether hidden config sections/vars are read from the file.
     *
     * @var boolean
     */
    public $config_read_hidden = false;

    /**#@-*/

    /**#@+
     * resource locking
     */

    /**
     * locking concurrent compiles
     *
     * @var boolean
     */
    public $compile_locking = true;

    /**
     * Controls whether cache resources should emply locking mechanism
     *
     * @var boolean
     */
    public $cache_locking = false;

    /**
     * seconds to wait for acquiring a lock before ignoring the write lock
     *
     * @var float
     */
    public $locking_timeout = 10;

    /**#@-*/

    /**
     * resource type used if none given
     * Must be an valid key of $registered_resources.
     *
     * @var string
     */
    public $default_resource_type = 'file';

    /**
     * caching type
     * Must be an element of $cache_resource_types.
     *
     * @var string
     */
    public $caching_type = 'file';

    /**
     * internal config properties
     *
     * @var array
     */
    public $properties = array();

    /**
     * config type
     *
     * @var string
     */
    public $default_config_type = 'file';

    /**
     * cached template objects
     *
     * @var array
     */
    public $source_objects = array();

    /**
     * cached template objects
     *
     * @var array
     */
    public $template_objects = array();

    /**
     * enable resource caching
     *
     * @var bool
     */
    public $resource_caching = false;

    /**
     * enable template resource caching
     *
     * @var bool
     */
    public $template_resource_caching = true;

    /**
     * check If-Modified-Since headers
     *
     * @var boolean
     */
    public $cache_modified_check = false;

    /**
     * registered plugins
     *
     * @var array
     */
    public $registered_plugins = array();

    /**
     * plugin search order
     *
     * @var array
     */
    public $plugin_search_order = array('function', 'block', 'compiler', 'class');

    /**
     * registered objects
     *
     * @var array
     */
    public $registered_objects = array();

    /**
     * registered classes
     *
     * @var array
     */
    public $registered_classes = array();

    /**
     * registered filters
     *
     * @var array
     */
    public $registered_filters = array();

    /**
     * registered resources
     *
     * @var array
     */
    public $registered_resources = array();

    /**
     * resource handler cache
     *
     * @var array
     */
    public $_resource_handlers = array();

    /**
     * registered cache resources
     *
     * @var array
     */
    public $registered_cache_resources = array();

    /**
     * cache resource handler cache
     *
     * @var array
     */
    public $_cacheresource_handlers = array();

    /**
     * autoload filter
     *
     * @var array
     */
    public $autoload_filters = array();

    /**
     * default modifier
     *
     * @var array
     */
    public $default_modifiers = array();

    /**
     * autoescape variable output
     *
     * @var boolean
     */
    public $escape_html = false;

    /**
     * global internal smarty vars
     *
     * @var array
     */
    public static $_smarty_vars = array();

    /**
     * start time for execution time calculation
     *
     * @var int
     */
    public $start_time = 0;

    /**
     * default file permissions
     *
     * @var int
     */
    public $_file_perms = 0644;

    /**
     * default dir permissions
     *
     * @var int
     */
    public $_dir_perms = 0771;

    /**
     * block tag hierarchy
     *
     * @var array
     */
    public $_tag_stack = array();

    /**
     * required by the compiler for BC
     *
     * @var string
     */
    public $_current_file = null;

    /**
     * internal flag to enable parser debugging
     *
     * @var bool
     */
    public $_parserdebug = false;

    /**
     * Cache of is_file results of loadPlugin()
     *
     * @var array
     */
    public $_is_file_cache = array();

    /**#@-*/

    /**
     * Initialize new Smarty object
     */
    public function __construct()
    {
        if (is_callable('mb_internal_encoding')) {
            mb_internal_encoding(Smarty::$_CHARSET);
        }
        $this->start_time = microtime(true);
        // check default dirs for overloading
        if ($this->template_dir[0] !== './templates/' || isset($this->template_dir[1])) {
            $this->setTemplateDir($this->template_dir);
        }
        if ($this->config_dir[0] !== './configs/' || isset($this->config_dir[1])) {
            $this->setConfigDir($this->config_dir);
        }
        if ($this->compile_dir !== './templates_c/') {
            unset(self::$_muted_directories['./templates_c/']);
            $this->setCompileDir($this->compile_dir);
        }
        if ($this->cache_dir !== './cache/') {
            unset(self::$_muted_directories['./cache/']);
            $this->setCacheDir($this->cache_dir);
        }
        if (isset($this->plugins_dir)) {
            $this->setPluginsDir($this->plugins_dir);
        } else {
            $this->setPluginsDir(SMARTY_PLUGINS_DIR);
        }
        if (isset($_SERVER['SCRIPT_NAME'])) {
            Smarty::$global_tpl_vars['SCRIPT_NAME'] = new Smarty_Variable($_SERVER['SCRIPT_NAME']);
        }

        // Check if we're running on windows
        Smarty::$_IS_WINDOWS = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';

        // let PCRE (preg_*) treat strings as ISO-8859-1 if we're not dealing with UTF-8
        if (Smarty::$_CHARSET !== 'UTF-8') {
            Smarty::$_UTF8_MODIFIER = '';
        }
    }

    /**
     * fetches a rendered Smarty template
     *
     * @param  string $template         the resource handle of the template file or template object
     * @param  mixed  $cache_id         cache id to be used with this template
     * @param  mixed  $compile_id       compile id to be used with this template
     * @param  object $parent           next higher level of Smarty variables
     * @param  bool   $display          true: display, false: fetch
     * @param  bool   $merge_tpl_vars   not used - left for BC
     * @param  bool   $no_output_filter not used - left for BC
     *
     * @throws Exception
     * @throws SmartyException
     * @return string rendered template output
     */
    public function fetch($template = null, $cache_id = null, $compile_id = null, $parent = null, $display = false, $merge_tpl_vars = true, $no_output_filter = false)
    {
        if ($cache_id !== null && is_object($cache_id)) {
            $parent = $cache_id;
            $cache_id = null;
        }
        if ($parent === null) {
            $parent = $this;
        }
        // get template object
        $_template = is_object($template) ? $template : $this->createTemplate($template, $cache_id, $compile_id, $parent, false);
        // set caching in template object
        $_template->caching = $this->caching;
        // fetch template content
        return $_template->render(true, false, $display);
    }

    /**
     * displays a Smarty template
     *
     * @param string $template   the resource handle of the template file or template object
     * @param mixed  $cache_id   cache id to be used with this template
     * @param mixed  $compile_id compile id to be used with this template
     * @param object $parent     next higher level of Smarty variables
     */
    public function display($template = null, $cache_id = null, $compile_id = null, $parent = null)
    {
        // display template
        $this->fetch($template, $cache_id, $compile_id, $parent, true);
    }

    /**
     * Check if a template resource exists
     *
     * @param  string $resource_name template name
     *
     * @return boolean status
     */
    public function templateExists($resource_name)
    {
        // create template object
        $save = $this->template_objects;
        $tpl = new $this->template_class($resource_name, $this);
        // check if it does exists
        $result = $tpl->source->exists;
        $this->template_objects = $save;

        return $result;
    }

    /**
     * Returns a single or all global  variables
     *
     * @param  string $varname variable name or null
     *
     * @return string variable value or or array of variables
     */
    public function getGlobal($varname = null)
    {
        if (isset($varname)) {
            if (isset(self::$global_tpl_vars[$varname])) {
                return self::$global_tpl_vars[$varname]->value;
            } else {
                return '';
            }
        } else {
            $_result = array();
            foreach (self::$global_tpl_vars AS $key => $var) {
                $_result[$key] = $var->value;
            }

            return $_result;
        }
    }

    /**
     * Empty cache folder
     *
     * @param  integer $exp_time expiration time
     * @param  string  $type     resource type
     *
     * @return integer number of cache files deleted
     */
    public function clearAllCache($exp_time = null, $type = null)
    {
        // load cache resource and call clearAll
        $_cache_resource = Smarty_CacheResource::load($this, $type);
        Smarty_CacheResource::invalidLoadedCache($this);

        return $_cache_resource->clearAll($this, $exp_time);
    }

    /**
     * Empty cache for a specific template
     *
     * @param  string  $template_name template name
     * @param  string  $cache_id      cache id
     * @param  string  $compile_id    compile id
     * @param  integer $exp_time      expiration time
     * @param  string  $type          resource type
     *
     * @return integer number of cache files deleted
     */
    public function clearCache($template_name, $cache_id = null, $compile_id = null, $exp_time = null, $type = null)
    {
        // load cache resource and call clear
        $_cache_resource = Smarty_CacheResource::load($this, $type);
        Smarty_CacheResource::invalidLoadedCache($this);

        return $_cache_resource->clear($this, $template_name, $cache_id, $compile_id, $exp_time);
    }

    /**
     * Loads security class and enables security
     *
     * @param  string|Smarty_Security $security_class if a string is used, it must be class-name
     *
     * @return Smarty                 current Smarty instance for chaining
     * @throws SmartyException        when an invalid class name is provided
     */
    public function enableSecurity($security_class = null)
    {
        if ($security_class instanceof Smarty_Security) {
            $this->security_policy = $security_class;

            return $this;
        } elseif (is_object($security_class)) {
            throw new SmartyException("Class '" . get_class($security_class) . "' must extend Smarty_Security.");
        }
        if ($security_class == null) {
            $security_class = $this->security_class;
        }
        if (!class_exists($security_class)) {
            throw new SmartyException("Security class '$security_class' is not defined");
        } elseif ($security_class !== 'Smarty_Security' && !is_subclass_of($security_class, 'Smarty_Security')) {
            throw new SmartyException("Class '$security_class' must extend Smarty_Security.");
        } else {
            $this->security_policy = new $security_class($this);
        }

        return $this;
    }

    /**
     * Disable security
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function disableSecurity()
    {
        $this->security_policy = null;

        return $this;
    }

    /**
     * Set template directory
     *
     * @param  string|array $template_dir directory(s) of template sources
     *
     * @return Smarty       current Smarty instance for chaining
     */
    public function setTemplateDir($template_dir)
    {
        $this->template_dir = array();
        foreach ((array) $template_dir as $k => $v) {
            $this->template_dir[$k] = rtrim($v, '/\\') . DS;
        }
        $this->joined_template_dir = join(' # ', $this->template_dir);
        return $this;
    }

    /**
     * Add template directory(s)
     *
     * @param  string|array $template_dir directory(s) of template sources
     * @param  string       $key          of the array element to assign the template dir to
     *
     * @return Smarty          current Smarty instance for chaining
     * @throws SmartyException when the given template directory is not valid
     */
    public function addTemplateDir($template_dir, $key = null)
    {
        $this->_addDir('template_dir', $template_dir, $key);
        $this->joined_template_dir = join(' # ', $this->template_dir);
        return $this;
    }

    /**
     * Get template directories
     *
     * @param mixed $index index of directory to get, null to get all
     *
     * @return array|string list of template directories, or directory of $index
     */
    public function getTemplateDir($index = null)
    {
        if ($index !== null) {
            return isset($this->template_dir[$index]) ? $this->template_dir[$index] : null;
        }
        return (array) $this->template_dir;
    }

    /**
     * Set config directory
     *
     * @param $config_dir
     *
     * @return Smarty       current Smarty instance for chaining
     */
    public function setConfigDir($config_dir)
    {
        $this->config_dir = array();
        foreach ((array) $config_dir as $k => $v) {
            $this->config_dir[$k] = rtrim($v, '/\\') . DS;
        }
        $this->joined_config_dir = join(' # ', $this->config_dir);
        return $this;
    }

    /**
     * Add config directory(s)
     *
     * @param string|array $config_dir directory(s) of config sources
     * @param mixed        $key        key of the array element to assign the config dir to
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function addConfigDir($config_dir, $key = null)
    {
        $this->_addDir('config_dir', $config_dir, $key);
        $this->joined_config_dir = join(' # ', $this->config_dir);
        return $this;
    }

    /**
     * Get config directory
     *
     * @param mixed $index index of directory to get, null to get all
     *
     * @return array|string configuration directory
     */
    public function getConfigDir($index = null)
    {
        if ($index !== null) {
            return isset($this->config_dir[$index]) ? $this->config_dir[$index] : null;
        }
        return (array) $this->config_dir;
    }

    /**
     * Set plugins directory
     *
     * @param  string|array $plugins_dir directory(s) of plugins
     *
     * @return Smarty       current Smarty instance for chaining
     */
    public function setPluginsDir($plugins_dir)
    {
        $this->plugins_dir = array();
        $this->addPluginsDir($plugins_dir);
        return $this;
    }

    /**
     * Adds directory of plugin files
     *
     * @param $plugins_dir
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function addPluginsDir($plugins_dir)
    {
        // make sure we're dealing with an array
        $this->plugins_dir = (array) $this->plugins_dir;
        foreach ((array) $plugins_dir as $v) {
            $this->plugins_dir[] = rtrim($v, '/\\') . DS;
        }
        $this->plugins_dir = array_unique($this->plugins_dir);
        $this->_is_file_cache = array();
        return $this;
    }

    /**
     * Get plugin directories
     *
     * @return array list of plugin directories
     */
    public function getPluginsDir()
    {
        return (array) $this->plugins_dir;
    }

    /**
     * Set compile directory
     *
     * @param  string $compile_dir directory to store compiled templates in
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function setCompileDir($compile_dir)
    {
        $this->compile_dir = rtrim($compile_dir, '/\\') . DS;
        if (!isset(Smarty::$_muted_directories[$this->compile_dir])) {
            Smarty::$_muted_directories[$this->compile_dir] = null;
        }

        return $this;
    }

    /**
     * Get compiled directory
     *
     * @return string path to compiled templates
     */
    public function getCompileDir()
    {
        return $this->compile_dir;
    }

    /**
     * Set cache directory
     *
     * @param  string $cache_dir directory to store cached templates in
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function setCacheDir($cache_dir)
    {
        $this->cache_dir = rtrim($cache_dir, '/\\') . DS;
        if (!isset(Smarty::$_muted_directories[$this->cache_dir])) {
            Smarty::$_muted_directories[$this->cache_dir] = null;
        }
        return $this;
    }

    /**
     * Get cache directory
     *
     * @return string path of cache directory
     */
    public function getCacheDir()
    {
        return $this->cache_dir;
    }

    /**
     * add directories to given property name
     *
     * @param string       $dirName directory property name
     * @param string|array $dir     directory string or array of strings
     * @param mixed        $key     optional key
     */
    private function _addDir($dirName, $dir, $key = null)
    {
        // make sure we're dealing with an array
        $this->$dirName = (array) $this->$dirName;

        if (is_array($dir)) {
            foreach ($dir as $k => $v) {
                if (is_int($k)) {
                    // indexes are not merged but appended
                    $this->{$dirName}[] = rtrim($v, '/\\') . DS;
                } else {
                    // string indexes are overridden
                    $this->{$dirName}[$k] = rtrim($v, '/\\') . DS;
                }
            }
        } else {
            if ($key !== null) {
                // override directory at specified index
                $this->{$dirName}[$key] = rtrim($dir, '/\\') . DS;
            } else {
                // append new directory
                $this->{$dirName}[] = rtrim($dir, '/\\') . DS;
            }
        }
    }

    /**
     * Set default modifiers
     *
     * @param  array|string $modifiers modifier or list of modifiers to set
     *
     * @return Smarty       current Smarty instance for chaining
     */
    public function setDefaultModifiers($modifiers)
    {
        $this->default_modifiers = (array) $modifiers;

        return $this;
    }

    /**
     * Add default modifiers
     *
     * @param  array|string $modifiers modifier or list of modifiers to add
     *
     * @return Smarty       current Smarty instance for chaining
     */
    public function addDefaultModifiers($modifiers)
    {
        if (is_array($modifiers)) {
            $this->default_modifiers = array_merge($this->default_modifiers, $modifiers);
        } else {
            $this->default_modifiers[] = $modifiers;
        }

        return $this;
    }

    /**
     * Get default modifiers
     *
     * @return array list of default modifiers
     */
    public function getDefaultModifiers()
    {
        return $this->default_modifiers;
    }

    /**
     * Set autoload filters
     *
     * @param  array  $filters filters to load automatically
     * @param  string $type    "pre", "output", … specify the filter type to set. Defaults to none treating $filters'
     *                         keys as the appropriate types
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function setAutoloadFilters($filters, $type = null)
    {
        if ($type !== null) {
            $this->autoload_filters[$type] = (array) $filters;
        } else {
            $this->autoload_filters = (array) $filters;
        }

        return $this;
    }

    /**
     * Add autoload filters
     *
     * @param  array  $filters filters to load automatically
     * @param  string $type    "pre", "output", … specify the filter type to set. Defaults to none treating $filters'
     *                         keys as the appropriate types
     *
     * @return Smarty current Smarty instance for chaining
     */
    public function addAutoloadFilters($filters, $type = null)
    {
        if ($type !== null) {
            if (!empty($this->autoload_filters[$type])) {
                $this->autoload_filters[$type] = array_merge($this->autoload_filters[$type], (array) $filters);
            } else {
                $this->autoload_filters[$type] = (array) $filters;
            }
        } else {
            foreach ((array) $filters as $key => $value) {
                if (!empty($this->autoload_filters[$key])) {
                    $this->autoload_filters[$key] = array_merge($this->autoload_filters[$key], (array) $value);
                } else {
                    $this->autoload_filters[$key] = (array) $value;
                }
            }
        }

        return $this;
    }

    /**
     * Get autoload filters
     *
     * @param  string $type type of filter to get autoloads for. Defaults to all autoload filters
     *
     * @return array  array( 'type1' => array( 'filter1', 'filter2', … ) ) or array( 'filter1', 'filter2', …) if $type
     *                was specified
     */
    public function getAutoloadFilters($type = null)
    {
        if ($type !== null) {
            return isset($this->autoload_filters[$type]) ? $this->autoload_filters[$type] : array();
        }

        return $this->autoload_filters;
    }

    /**
     * return name of debugging template
     *
     * @return string
     */
    public function getDebugTemplate()
    {
        return $this->debug_tpl;
    }

    /**
     * set the debug template
     *
     * @param  string $tpl_name
     *
     * @return Smarty          current Smarty instance for chaining
     * @throws SmartyException if file is not readable
     */
    public function setDebugTemplate($tpl_name)
    {
        if (!is_readable($tpl_name)) {
            throw new SmartyException("Unknown file '{$tpl_name}'");
        }
        $this->debug_tpl = $tpl_name;

        return $this;
    }

    /**
     * creates a template object
     *
     * @param  string  $template   the resource handle of the template file
     * @param  mixed   $cache_id   cache id to be used with this template
     * @param  mixed   $compile_id compile id to be used with this template
     * @param  object  $parent     next higher level of Smarty variables
     * @param  boolean $do_clone   flag is Smarty object shall be cloned
     *
     * @return object  template object
     */
    public function createTemplate($template, $cache_id = null, $compile_id = null, $parent = null, $do_clone = true)
    {
        if ($cache_id !== null && (is_object($cache_id) || is_array($cache_id))) {
            $parent = $cache_id;
            $cache_id = null;
        }
        if ($parent !== null && is_array($parent)) {
            $data = $parent;
            $parent = null;
        } else {
            $data = null;
        }
        $_templateId = $this->getTemplateId($template, $cache_id, $compile_id);
        if (isset($this->template_objects[$_templateId])) {
            if ($do_clone) {
                $tpl = clone $this->template_objects[$_templateId];
                $tpl->smarty = clone $tpl->smarty;
            } else {
                $tpl = $this->template_objects[$_templateId];
            }
            $tpl->parent = $parent;
            $tpl->tpl_vars = array();
            $tpl->config_vars = array();
        } else {
            $tpl = new $this->template_class($template, $this, $parent, $cache_id, $compile_id);
            if ($do_clone) {
                $tpl->smarty = clone $tpl->smarty;
            }
            $tpl->templateId = $_templateId;
        }
        // fill data if present
        if (!empty($data) && is_array($data)) {
            // set up variable values
            foreach ($data as $_key => $_val) {
                $tpl->tpl_vars[$_key] = new Smarty_Variable($_val);
            }
        }
        if ($this->debugging) {
            Smarty_Internal_Debug::register_template($tpl);
        }
        return $tpl;
    }

    /**
     * Takes unknown classes and loads plugin files for them
     * class name format: Smarty_PluginType_PluginName
     * plugin filename format: plugintype.pluginname.php
     *
     * @param  string $plugin_name class plugin name to load
     * @param  bool   $check       check if already loaded
     *
     * @throws SmartyException
     * @return string |boolean filepath of loaded file or false
     */
    public function loadPlugin($plugin_name, $check = true)
    {
        // if function or class exists, exit silently (already loaded)
        if ($check && (is_callable($plugin_name) || class_exists($plugin_name, false))) {
            return true;
        }
        // Plugin name is expected to be: Smarty_[Type]_[Name]
        $_name_parts = explode('_', $plugin_name, 3);
        // class name must have three parts to be valid plugin
        // count($_name_parts) < 3 === !isset($_name_parts[2])
        if (!isset($_name_parts[2]) || strtolower($_name_parts[0]) !== 'smarty') {
            throw new SmartyException("plugin {$plugin_name} is not a valid name format");
        }
        // if type is "internal", get plugin from sysplugins
        if (strtolower($_name_parts[1]) == 'internal') {
            $file = SMARTY_SYSPLUGINS_DIR . strtolower($plugin_name) . '.php';
            if (isset($this->_is_file_cache[$file]) ? $this->_is_file_cache[$file] : $this->_is_file_cache[$file] = is_file($file)) {
                require_once($file);
                return $file;
            } else {
                return false;
            }
        }
        // plugin filename is expected to be: [type].[name].php
        $_plugin_filename = "{$_name_parts[1]}.{$_name_parts[2]}.php";

        $_stream_resolve_include_path = function_exists('stream_resolve_include_path');

        // loop through plugin dirs and find the plugin
        foreach ($this->getPluginsDir() as $_plugin_dir) {
            $names = array($_plugin_dir . $_plugin_filename, $_plugin_dir . strtolower($_plugin_filename),);
            foreach ($names as $file) {
                if (isset($this->_is_file_cache[$file]) ? $this->_is_file_cache[$file] : $this->_is_file_cache[$file] = is_file($file)) {
                    require_once($file);
                    return $file;
                }
                if ($this->use_include_path && !preg_match('/^([\/\\\\]|[a-zA-Z]:[\/\\\\])/', $_plugin_dir)) {
                    // try PHP include_path
                    if ($_stream_resolve_include_path) {
                        $file = stream_resolve_include_path($file);
                    } else {
                        $file = Smarty_Internal_Get_Include_Path::getIncludePath($file);
                    }

                    if ($file !== false) {
                        require_once($file);

                        return $file;
                    }
                }
            }
        }
        // no plugin loaded
        return false;
    }

    /**
     * Compile all template files
     *
     * @param  string $extension     file extension
     * @param  bool   $force_compile force all to recompile
     * @param  int    $time_limit
     * @param  int    $max_errors
     *
     * @return integer number of template files recompiled
     */
    public function compileAllTemplates($extension = '.tpl', $force_compile = false, $time_limit = 0, $max_errors = null)
    {
        return Smarty_Internal_Utility::compileAllTemplates($extension, $force_compile, $time_limit, $max_errors, $this);
    }

    /**
     * Compile all config files
     *
     * @param  string $extension     file extension
     * @param  bool   $force_compile force all to recompile
     * @param  int    $time_limit
     * @param  int    $max_errors
     *
     * @return integer number of template files recompiled
     */
    public function compileAllConfig($extension = '.conf', $force_compile = false, $time_limit = 0, $max_errors = null)
    {
        return Smarty_Internal_Utility::compileAllConfig($extension, $force_compile, $time_limit, $max_errors, $this);
    }

    /**
     * Delete compiled template file
     *
     * @param  string  $resource_name template name
     * @param  string  $compile_id    compile id
     * @param  integer $exp_time      expiration time
     *
     * @return integer number of template files deleted
     */
    public function clearCompiledTemplate($resource_name = null, $compile_id = null, $exp_time = null)
    {
        return Smarty_Internal_Utility::clearCompiledTemplate($resource_name, $compile_id, $exp_time, $this);
    }

    /**
     * Return array of tag/attributes of all tags used by an template
     *
     * @param Smarty_Internal_Template $template
     *
     * @return array  of tag/attributes
     */
    public function getTags(Smarty_Internal_Template $template)
    {
        return Smarty_Internal_Utility::getTags($template);
    }

    /**
     * Run installation test
     *
     * @param  array $errors Array to write errors into, rather than outputting them
     *
     * @return boolean true if setup is fine, false if something is wrong
     */
    public function testInstall(&$errors = null)
    {
        return Smarty_Internal_TestInstall::testInstall($this, $errors);
    }

    /**
     * @param boolean $compile_check
     */
    public function setCompileCheck($compile_check)
    {
        $this->compile_check = $compile_check;
    }

    /**
     * @param boolean $use_sub_dirs
     */
    public function setUseSubDirs($use_sub_dirs)
    {
        $this->use_sub_dirs = $use_sub_dirs;
    }

    /**
     * @param boolean $caching
     */
    public function setCaching($caching)
    {
        $this->caching = $caching;
    }

    /**
     * @param int $cache_lifetime
     */
    public function setCacheLifetime($cache_lifetime)
    {
        $this->cache_lifetime = $cache_lifetime;
    }

    /**
     * @param string $compile_id
     */
    public function setCompileId($compile_id)
    {
        $this->compile_id = $compile_id;
    }

    /**
     * @param string $cache_id
     */
    public function setCacheId($cache_id)
    {
        $this->cache_id = $cache_id;
    }

    /**
     * @param int $error_reporting
     */
    public function setErrorReporting($error_reporting)
    {
        $this->error_reporting = $error_reporting;
    }

    /**
     * @param boolean $escape_html
     */
    public function setEscapeHtml($escape_html)
    {
        $this->escape_html = $escape_html;
    }

    /**
     * @param boolean $auto_literal
     */
    public function setAutoLiteral($auto_literal)
    {
        $this->auto_literal = $auto_literal;
    }

    /**
     * @param boolean $force_compile
     */
    public function setForceCompile($force_compile)
    {
        $this->force_compile = $force_compile;
    }

    /**
     * @param boolean $merge_compiled_includes
     */
    public function setMergeCompiledIncludes($merge_compiled_includes)
    {
        $this->merge_compiled_includes = $merge_compiled_includes;
    }

    /**
     * @param string $left_delimiter
     */
    public function setLeftDelimiter($left_delimiter)
    {
        $this->left_delimiter = $left_delimiter;
    }

    /**
     * @param string $right_delimiter
     */
    public function setRightDelimiter($right_delimiter)
    {
        $this->right_delimiter = $right_delimiter;
    }

    /**
     * @param boolean $debugging
     */
    public function setDebugging($debugging)
    {
        $this->debugging = $debugging;
    }

    /**
     * @param boolean $config_overwrite
     */
    public function setConfigOverwrite($config_overwrite)
    {
        $this->config_overwrite = $config_overwrite;
    }

    /**
     * @param boolean $config_booleanize
     */
    public function setConfigBooleanize($config_booleanize)
    {
        $this->config_booleanize = $config_booleanize;
    }

    /**
     * @param boolean $config_read_hidden
     */
    public function setConfigReadHidden($config_read_hidden)
    {
        $this->config_read_hidden = $config_read_hidden;
    }

    /**
     * @param boolean $compile_locking
     */
    public function setCompileLocking($compile_locking)
    {
        $this->compile_locking = $compile_locking;
    }

    /**
     * Class destructor
     */
    public function __destruct()
    {
        // intentionally left blank
    }

    /**
     * <<magic>> Generic getter.
     * Calls the appropriate getter function.
     * Issues an E_USER_NOTICE if no valid getter is found.
     *
     * @param  string $name property name
     *
     * @return mixed
     */
    public function __get($name)
    {
        $allowed = array('template_dir' => 'getTemplateDir', 'config_dir' => 'getConfigDir',
                         'plugins_dir'  => 'getPluginsDir', 'compile_dir' => 'getCompileDir',
                         'cache_dir'    => 'getCacheDir',);

        if (isset($allowed[$name])) {
            return $this->{$allowed[$name]}();
        } else {
            trigger_error('Undefined property: ' . get_class($this) . '::$' . $name, E_USER_NOTICE);
        }
    }

    /**
     * <<magic>> Generic setter.
     * Calls the appropriate setter function.
     * Issues an E_USER_NOTICE if no valid setter is found.
     *
     * @param string $name  property name
     * @param mixed  $value parameter passed to setter
     */
    public function __set($name, $value)
    {
        $allowed = array('template_dir' => 'setTemplateDir', 'config_dir' => 'setConfigDir',
                         'plugins_dir'  => 'setPluginsDir', 'compile_dir' => 'setCompileDir',
                         'cache_dir'    => 'setCacheDir',);

        if (isset($allowed[$name])) {
            $this->{$allowed[$name]}($value);
        } else {
            trigger_error('Undefined property: ' . get_class($this) . '::$' . $name, E_USER_NOTICE);
        }
    }

    /**
     * Error Handler to mute expected messages
     *
     * @link http://php.net/set_error_handler
     *
     * @param  integer $errno Error level
     * @param          $errstr
     * @param          $errfile
     * @param          $errline
     * @param          $errcontext
     *
     * @return boolean
     */
    public static function mutingErrorHandler($errno, $errstr, $errfile, $errline, $errcontext)
    {
        $_is_muted_directory = false;

        // add the SMARTY_DIR to the list of muted directories
        if (!isset(Smarty::$_muted_directories[SMARTY_DIR])) {
            $smarty_dir = realpath(SMARTY_DIR);
            if ($smarty_dir !== false) {
                Smarty::$_muted_directories[SMARTY_DIR] = array('file'   => $smarty_dir,
                                                                'length' => strlen($smarty_dir),);
            }
        }

        // walk the muted directories and test against $errfile
        foreach (Smarty::$_muted_directories as $key => &$dir) {
            if (!$dir) {
                // resolve directory and length for speedy comparisons
                $file = realpath($key);
                if ($file === false) {
                    // this directory does not exist, remove and skip it
                    unset(Smarty::$_muted_directories[$key]);
                    continue;
                }
                $dir = array('file' => $file, 'length' => strlen($file),);
            }
            if (!strncmp($errfile, $dir['file'], $dir['length'])) {
                $_is_muted_directory = true;
                break;
            }
        }

        // pass to next error handler if this error did not occur inside SMARTY_DIR
        // or the error was within smarty but masked to be ignored
        if (!$_is_muted_directory || ($errno && $errno & error_reporting())) {
            if (Smarty::$_previous_error_handler) {
                return call_user_func(Smarty::$_previous_error_handler, $errno, $errstr, $errfile, $errline, $errcontext);
            } else {
                return false;
            }
        }
    }

    /**
     * Enable error handler to mute expected messages
     *
     * @return void
     */
    public static function muteExpectedErrors()
    {
        /*
            error muting is done because some people implemented custom error_handlers using
            http://php.net/set_error_handler and for some reason did not understand the following paragraph:

                It is important to remember that the standard PHP error handler is completely bypassed for the
                error types specified by error_types unless the callback function returns FALSE.
                error_reporting() settings will have no effect and your error handler will be called regardless -
                however you are still able to read the current value of error_reporting and act appropriately.
                Of particular note is that this value will be 0 if the statement that caused the error was
                prepended by the @ error-control operator.

            Smarty deliberately uses @filemtime() over file_exists() and filemtime() in some places. Reasons include
                - @filemtime() is almost twice as fast as using an additional file_exists()
                - between file_exists() and filemtime() a possible race condition is opened,
                  which does not exist using the simple @filemtime() approach.
        */
        $error_handler = array('Smarty', 'mutingErrorHandler');
        $previous = set_error_handler($error_handler);

        // avoid dead loops
        if ($previous !== $error_handler) {
            Smarty::$_previous_error_handler = $previous;
        }
    }

    /**
     * Disable error handler muting expected messages
     *
     * @return void
     */
    public static function unmuteExpectedErrors()
    {
        restore_error_handler();
    }/**
* 
*/
class SmartyView {
	private static $smarty = NULL;//保存smarty对象
	public function __construct()
	{
		//smarty配置
		if(!is_null(self::$smarty)) return;
			$smarty = new Smarty();

			$smarty->template_dir = APP_TPL_PATH . '/' . CONTROLLER .'/';		//模板目录
			$smarty->compile_dir  = APP_COMPILE_PATH;							//模板编译目录
			$smarty->cache_dir = APP_CACHE_PATH;								//模板缓存目录
			$smarty->left_delimiter = C('LEFT_DELIMITER');						//左边界符号
			$smarty->right_delimiter = C('RIGHT_DELIMITER');					//右边界符
			$smarty->caching = C('CACHE_ON');									//缓存开启
			$smarty->cache_lifetime = C('CACHE_TIME');							//缓存时间
			self::$smarty = $smarty;
	}
	protected function display($tpl){
		return self::$smarty->display($tpl,$_SERVER['REQUEST_URI']);
	}
	protected function assign($var,$value){
		self::$smarty->assign($var,$value);
	}

	protected function is_cached($tpl=NULL){
		if(!C('SMARTY_ON')) halt('请先开启smarty!');
		$tpl = $this->get_tpl($tpl);
		return self::$smarty->is_cached($tpl,$_SERVER['REQUEST_URI']);
	}
	public function registerPlu($plu, $name, $callback){
		return self::$smarty->registerPlugin($plu,$name,$callback); //注册block，这个就是应用标签的基础
	}
}/**
 *  框架核心类
 */
final class Application{
	public static function run(){
		self::_init();	   												//初始化框架
		//解析路由
        // Route::parseUrl();											//设置外部路径

		set_error_handler(array(__CLASS__, 'error'));					//接受php普通错误
		register_shutdown_function(array(__CLASS__, 'fatal_error'));    //接受致命错误
		self::_user_import();											//加载用户自定义扩展
		spl_autoload_register(array(__CLASS__, '_autoload')); 			//设置自动载入
		self::_create_demo();											//创建一个demo
		self::_set_url();		
		self::_app_run();												//让应用默认跑起来
	}
	public static function fatal_error(){
		if($e = error_get_last()){
			self::error($e['type'],$e['message'],$e['file'],$e['line']);
		}
	}
	public static function error($errno,$error,$file,$line){
		switch ($errno) {
			case E_ERROR:
			case E_PARSE:
			case E_CORE_ERROR:
			case E_COMPILE_ERROR:
			case E_USER_ERROR:
				$msg = $error . $file . "{第{$line}行}";
				halt($msg);
				break;
			case E_USER_NOTICE:
			case E_USER_WARNING:
			case E_STRICT:
			default:
				if(DEBUG){
					include MYPHP_DATA_PATH . '/Tpl/notice.html';
				}
				break;
		}
	}
	/**
	 * [_init 初始化框架]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T17:25:08+0800
	 * @return   [type]                   [description]
	 */
	private static function _init(){
		//加载框架配置项
		C(include MYPHP_CONFIG_PATH . '/config.php');

		//加载用户应用内的配置
		$userConfigPath = APP_CONFIG_PATH . '/config.php';
		$commonConfigPath = MYPHP_COMMON_CONKIG_PATH .'/Config.php';
		$userConfig =<<<str
<?php 
/*
 * 应用内配置文件
 */
return array(
	'配置项' => "配置值"
);
str;
		is_file($userConfigPath) || file_put_contents($userConfigPath, $userConfig);
		is_file($commonConfigPath) || file_put_contents($commonConfigPath, $userConfig);

		//加载公共配置项
		C(include $commonConfigPath);

		//加载用户配置项
		C(include $userConfigPath);

		//设置默认时区
		date_default_timezone_set(C('DEFAULT_TIMES_ZONE'));

		//设置SESSION
		C("SESSION_AUTO_START") && session_start();
	}
	/**
	 * [_autoload 框架类自动加载]
	 * @Author   Rukic
	 * @DateTime 2015-11-25T23:30:05+0800
	 * @param    [type]                   $classname [description]
	 * @return   [type]                              [description]
	 */
	private static function _autoload($classname){
		switch (true) {
			case strlen($classname) > 10 && substr($classname, -10) == "Controller":
				$path = APP_CONTROLLER_PATH .'/'. $classname .'.class.php';
				if(!is_file($path)){
					$emptyPath = APP_CONTROLLER_PATH .'/EmptyController.class.php';
					if(is_file($emptyPath)){
						include $emptyPath;
						return;
					}else{
						halt($path.'控制器未找到');
					}
				}
				include $path;
				break;
			case strlen($classname) > 5 && substr($classname, -5) == "Model":
				$path = MYPHP_COMMON_MODEL_PATH . '/' .$classname .'.class.php';
				include $path;
				break;
			default:
				$path = MYPHP_TOOL_PATH .'/'. $classname .'.class.php';
				if(!is_file($path)) halt($path.'类未找到');
				// echo $path;
				include $path;
				break;
		}
	}

	/**
	 * [_create_demo 创建一个demo]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T18:55:38+0800
	 * @return   [type]                   [description]
	 */
	private static function _create_demo(){
		$path = APP_CONTROLLER_PATH .'/IndexController.class.php';

		$demoStr =<<<str
<?php
/*
 * 默认控制器
 */
class IndexController extends Controller{
	public function index(){
		header('Content-type:text/html;charset=utf-8');
		echo '<h2>欢迎使用myPHP框架 (:!</h2>';
	}
}

?>
str;
		is_file($path) || file_put_contents($path, $demoStr);
	}

	/**
	 * [_app_run 默认让应用跑起来]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T19:20:17+0800
	 * @return   [type]                   [description]
	 */
	private static function _app_run(){
		$c = isset($_GET[C('VAR_CONTROLLER')]) ?  $_GET[C('VAR_CONTROLLER')] : 'Index';
		$a = isset($_GET[C('VAR_ACTION')]) 	  ?  $_GET[C('VAR_ACTION')] : 'index';

		define('CONTROLLER', $c);
		define('ACTION', $a);
		define("APP",APP_NAME);
		
		define('__CONTROLLER__',__APP__ .'?'.C('VAR_CONTROLLER').'='.$c);
		define('__ACTION__',__CONTROLLER__.'&'.C('VAR_ACTION').'='.$a);

		$c .= 'Controller';
		if(class_exists($c)){
			$obj= new $c();
			if(!method_exists($obj, $a)){
				if(method_exists($obj,'__empty')){
					$obj->__empty();
				}else{
					halt($c .'控制器中的'.$a.'方法未找到呢~~~');
				}
			}else{
				$obj->$a();
			}
		}else{
			$obj=new EmptyController();
			$obj->index();
		}
	}
	/**
	 * [_user_import 自动加载用户自定义扩展]
	 * @Author   Rukic
	 * @DateTime 2015-11-13T14:15:54+0800
	 * @return   [type]                   [description]
	 */
	private static function _user_import(){
		$fileArr =  C("AUTO_LOAD_FILE");
		foreach ($fileArr as $v) {
			require_once MYPHP_COMMON_LIB_PATH  . '/' . $v;  
		}
	}
	
	/**
	 * [_set_url 设置外部路径]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T18:42:06+0800
	 */
	private static function _set_url(){

		$path = 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
		$path = str_replace('\\', '/', $path);

		define('__APP__',$path);									//项目入口路径
		define('__WEB__',$path);									//项目入口路径
		define('__ROOT__', dirname($path));							//项目个路径
		define('__TPL__',__ROOT__ .'/'. APP_NAME .'/Tpl'); 			//应用模板路径
		define('__PUBLIC__',__TPL__ .'/Public');					//应用公共资源路径
		define('__COMMON_PUBLIC__',__ROOT__.'/Common/Public');		//公共配置里的Public路径

	}
}/**
* 控制器父类
*/
class Controller extends SmartyView{
	public function __construct(){
		if(C("SMARTY_ON")){
			parent::__construct();
		}

		if(method_exists($this, '__init')){
			$this->__init();
		}
		if(method_exists($this, '__auto')){
			$this->__auto();
		}
		if(method_exists($this, '__sinit')){
			$this->__auto();
		}
	}
	/**
	 * [success 操作成功]
	 * @Author   Rukic
	 * @DateTime 2015-11-10T22:59:14+0800
	 * @return   [type]                   [description]
	 */
	protected function success($msg, $url = NULL, $time=3){
		if (IS_AJAX) {
            $this->ajax(array('status' => 1, 'message' => $msg));
        }else{
			$url = $url ? 'window.location.href="'. $url .'"' : 'window.history.back(-1)';
			include(APP_TPL_PATH .'/success.html');
		}
		exit;
	}
	/**
	 * [error 错误提示]
	 * @Author   Rukic
	 * @DateTime 2015-11-10T23:10:01+0800
	 * @return   [type]                   [description]
	 */
	protected function error($msg, $url = NULL, $time = 3){
		if (IS_AJAX) {
            $this->ajax(array('status' => 0, 'message' => $msg));
        }else{
			$url = $url ? 'window.location.href="'. $url .'"' : 'window.history.back(-1)';
			include(APP_TPL_PATH .'/error.html');

		}
		exit;
	}
	/**
	 * [success 操作提示]
	 * @Author   Rukic
	 * @DateTime 2015-11-10T22:59:14+0800
	 * @return   [type]                   [description]
	 */
	protected function notice($msg, $url = NULL, $time=3){
		$url = $url ? 'window.location.href="'. $url .'"' : 'window.history.back(-1)';
		include(APP_TPL_PATH .'/notice.html');
	}
	/**
	 * [get_tpl 组合模板路径]
	 * @param  [type] $tpl [description]
	 * @return [type]      [description]
	 */
	protected function get_tpl($tpl = NULL){
		if(is_null($tpl)){
			$path = APP_TPL_PATH .'/'. CONTROLLER .'/'. ACTION .'.html';
		}else{
			$suffix = strrchr($tpl, '.');
			$tpl = empty($suffix) ? $tpl . '.html' : $tpl;
			$path = $tpl;
		}
		return $path;
	}
	/**
	 * [display 展示模板方法]
	 * @param  [type] $tpl [description]
	 * @return [type]      [description]
	 */
	protected function display($tpl = NULL){
		$path = $this->get_tpl($tpl);
		if(!is_file($path)) halt($path . '模板文件不存在');

		if(C('SMARTY_ON')){
			parent::display($path);
		}else{
			extract($this->var);
			include $path;
		}
	}
	/**
	 * [assign 变量赋值]
	 * @param  [type] $var   [description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	protected function assign($var,$value){
		if(C('SMARTY_ON')){
			parent::assign($var,$value);
		}else{
			$this->var[$var] = $value;
		}
	}
	 /**
     * Ajax输出
     * @param $data 数据
     * @param string $type 数据类型 text html xml json
     */
    protected function ajax($data, $type = "JSON")
    {
        $type = strtoupper($type);
        switch ($type) {
            case "HTML" :
            case "TEXT" :
                $_data = $data;
                break;
            case "XML" :
                //XML处理
                $_data = Xml::create($data, "root", "UTF-8");
                break;
            default :
                //JSON处理
                $_data = json_encode($data);
        }
        echo $_data;
        exit;
    }
}