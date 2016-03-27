<?php

/**
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
    // echo $url;die;
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
 * @param String $path 访问url Admin/Index/index(admin模块下的index控制器下的index方法)
 * @param array $args GET参数
 *                     <code>
 *                     $args = "nid=2&cid=1"
 *                     $args=array("nid"=>2,"cid"=>1)
 *                     </code>
 * @return string
 */
function U($path, $args = array()){
    $pArr = explode('/',$path);
    $url = "";
    if(!empty($args)){
        foreach ($args as $key => $value) {
            $url .= '&'.$key .'='.$value.'&';
        }   
    }
    if(count($pArr) == 3){
        $u = "m=".$pArr[0].'&c='.$pArr[1].'&a='.$pArr[2].rtrim($url,'&');
    }else if(count($pArr) == 2){
        $u = "m=" . MODULE . '&c='.$pArr[0].'&a='.$pArr[1].rtrim($url,'&');
    }else{
        $u = "m=" . MODULE . '&c='.CONTROLLER.'&a='.$path.rtrim($url,'&');
    }
    return __APP__.'?'.$u; 
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
 * cookie处理
 * @param        $name   名称
 * @param string $value 值
 * @param mixed $option 选项
 * @return mixed
 */
function cookie($name, $value = '', $option = array())
{
    // 默认设置
    $config = array('prefix' => C('COOKIE_PREFIX'), // cookie 名称前缀
        'expire' => C('COOKIE_EXPIRE'), // cookie 保存时间
        'path' => C('COOKIE_PATH'), // cookie 保存路径
        'domain' => C('COOKIE_DOMAIN'), // cookie 有效域名
    );
    // 参数设置(会覆盖黙认设置)
    if (!empty($option)) {
        if (is_numeric($option))
            $option = array('expire' => $option);
        elseif (is_string($option))
            parse_str($option, $option);
        $config = array_merge($config, array_change_key_case($option));
    }
    // 清除指定前缀的所有cookie
    if (is_null($name)) {
        if (empty($_COOKIE)) return;
        // 要删除的cookie前缀，不指定则删除config设置的指定前缀
        $prefix = empty($value) ? $config['prefix'] : $value;
        if (!empty($prefix)) { // 如果前缀为空字符串将不作处理直接返回
            foreach ($_COOKIE as $key => $val) {
                if (0 === stripos($key, $prefix)) {
                    setcookie($key, '', time() - 3600, $config['path'], $config['domain']);
                    unset($_COOKIE[$key]);
                }
            }
        }
        return $_COOKIE;
    }
    $name = $config['prefix'] . $name;
    if ('' === $value) {
        // 获取指定Cookie
        return isset($_COOKIE[$name]) ? json_decode(MAGIC_QUOTES_GPC ? stripslashes($_COOKIE[$name]) : $_COOKIE[$name]) : null;
    } else {
        if (is_null($value)) {
            setcookie($name, '', time() - 3600, $config['path'], $config['domain']);
            unset($_COOKIE[$name]);
            // 删除指定cookie
        } else {
            // 设置cookie
            $value = json_encode($value);
            $expire = !empty($config['expire']) ? time() + intval($config['expire']) : 0;
            setcookie($name, $value, $expire, $config['path'], $config['domain']);
            $_COOKIE[$name] = $value;
        }
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
}
?>