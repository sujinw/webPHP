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
}/**
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
			$dest = APP_LOG_PATH . '/' . date('Y_m_d') . '.log'; 
		}

		if(is_dir(APP_LOG_PATH)) error_log("[TIME]:".date("Y-m-d H:i:s"). "{$level}:{$msg} \r\n", $type,$dest );

	}
}/**
 *  框架核心类
 */
final class Application{
	public static function run(){
		self::_init();
		//解析路由
        // Route::parseUrl();											//设置外部路径

		set_error_handler(array(__CLASS__, 'error'));					//接受php普通错误
		register_shutdown_function(array(__CLASS__, 'fatal_error'));    //接受致命错误
		self::_user_import();											//加载用户自定义扩展
		spl_autoload_register(array(__CLASS__, '_autoload')); 			//设置自动载入
		self::_app_run();												//让应用默认跑起来
		// self::_set_url();		
		self::_create_demo();											//创建一个demo
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
		$m = explode(',',MODEL_LIST);
		foreach ($m as $v) {
			$userConfigPath =ROOT_PATH.APP_PATH.'/'.$v .APP_CONFIG_PATH . '/config.php';
			$commonConfigPath = APP_COMMON_CONKIG_PATH .'/Config.php';
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
		}
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
				$path = MODULE_PATH.'/Controller/'. ucfirst($classname) .'.class.php';
				// echo $path;die;
				if(!is_file($path)){
					$emptyPath = MODULE_PATH.'/Controller/' .'/EmptyController.class.php';
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
				$commonPath = APP_COMMON_MODEL_PATH . '/' .$classname .'.class.php';
				$modulePath = MODULE_MODEL_PATH.'/'.$classname .'.class.php';
				if(is_file($modulePath) && is_file($commonPath)) halt("Model的类同Common/Model类名相同！");
				if(!is_file($modulePath) && !is_file($commonPath)) halt("Model和Common/Model未找到操作模型！");
				// echo $modulePath;
				$path = is_file($modulePath) ? $modulePath : $commonPath;
				// echo $path;
				include $path;
				break;
			default:
				$path = MYPHP_TOOL_PATH .'/'. $classname .'.class.php';
				if(!is_file($path)) halt($path.'类未找到');
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
		$m = explode(',',MODEL_LIST);
		foreach ($m as $v) {
			$path = ROOT_PATH.APP_PATH.'/'.$v.'/'.APP_CONTROLLER_PATH .'/IndexController.class.php';

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
	}

	/**
	 * [_app_run 默认让应用跑起来]
	 * @Author   Rukic
	 * @DateTime 2015-11-06T19:20:17+0800
	 * @return   [type]                   [description]
	 */
	private static function _app_run(){
		$c = isset($_GET[C('VAR_CONTROLLER')]) ?  $_GET[C('VAR_CONTROLLER')] : 'Index';
		$a = isset($_GET[C('VAR_ACTION')]) 	   ?  $_GET[C('VAR_ACTION')]     : 'index';
		$m = isset($_GET[C('VAR_MODULE')])     ?  $_GET[C('VAR_MODULE')]     : 'Index';

		//定义模块内的常量		
		define('MODULE'		, ucfirst($m));
		define('CONTROLLER' , ucfirst($c));
		define('ACTION'		, ucfirst($a));

		define('MODULE_PATH', ROOT_PATH.APP_PATH.'/'.MODULE);
		
		define('MODULE_CONTROLLER_PATH'	,  		MODULE_PATH.'/Controller');
		define('MODULE_MODEL_PATH'		, 		MODULE_PATH.'/Model');
		define('MODULE_CONFIG_PATH'		,  		MODULE_PATH.'/Config');
		define('MODULE_TPL_PATH'		,  		MODULE_PATH.'/Tpl');
		define('MODULE_PUBLIC_PATH'		,  		MODULE_TPL_PATH.'/Public');

		//设置路径
		self::_set_url();
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
			require_once APP_COMMON_LIB_PATH  . '/' . $v;  
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
		define('__APP__',$path);															//项目入口路径
		define('__WEB__',$path);															//项目入口路径
		define('__ROOT__', dirname($path));													//项目个路径
		define('__TPL__',__ROOT__ .APP_PATH.'/'. MODULE .'/Tpl'); 				//应用模板路径
		define('__PUBLIC__',__TPL__ .'/Public');											//应用公共资源路径
		define('__CSS__',__PUBLIC__ .'/Css');											//应用公共资源路径
		define('__JS__',__PUBLIC__ .'/Js');											//应用公共资源路径
		define('__COMMON_PUBLIC__',__ROOT__.APP_PATH.'/Common/Public');								//公共配置里的Public路径
        //来源URL
        define("__HISTORY__",isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:null);
	}
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
 *
 * For questions, help, comments, discussion, etc., please join the
 * Smarty mailing list. Send a blank e-mail to
 * smarty-discussion-subscribe@googlegroups.com 
 *
 * @link http://www.smarty.net/
 * @copyright 2001-2005 New Digital Group, Inc.
 * @author Monte Ohrt <monte at ohrt dot com>
 * @author Andrei Zmievski <andrei@php.net>
 * @package Smarty
 * @version 2.6.26
 */

/* $Id: Smarty.class.php 3163 2009-06-17 14:39:24Z monte.ohrt $ */

/**
 * DIR_SEP isn't used anymore, but third party apps might
 */
if(!defined('DIR_SEP')) {
    define('DIR_SEP', DIRECTORY_SEPARATOR);
}

/**
 * set SMARTY_DIR to absolute path to Smarty library files.
 * if not defined, include_path will be used. Sets SMARTY_DIR only if user
 * application has not already defined it.
 */

if (!defined('SMARTY_DIR')) {
    define('SMARTY_DIR', MYPHP_ORG_PATH . '/Smarty/');
}

if (!defined('SMARTY_CORE_DIR')) {
    define('SMARTY_CORE_DIR', SMARTY_DIR . 'internals' . DIRECTORY_SEPARATOR);
}

define('SMARTY_PHP_PASSTHRU',   0);
define('SMARTY_PHP_QUOTE',      1);
define('SMARTY_PHP_REMOVE',     2);
define('SMARTY_PHP_ALLOW',      3);

/**
 * @package Smarty
 */
class Smarty
{
    /**#@+
     * Smarty Configuration Section
     */

    /**
     * The name of the directory where templates are located.
     *
     * @var string
     */
    var $template_dir    =  'templates';

    /**
     * The directory where compiled templates are located.
     *
     * @var string
     */
    var $compile_dir     =  'templates_c';

    /**
     * The directory where config files are located.
     *
     * @var string
     */
    var $config_dir      =  'configs';

    /**
     * An array of directories searched for plugins.
     *
     * @var array
     */
    var $plugins_dir     =  array('plugins');

    /**
     * If debugging is enabled, a debug console window will display
     * when the page loads (make sure your browser allows unrequested
     * popup windows)
     *
     * @var boolean
     */
    var $debugging       =  false;

    /**
     * When set, smarty does uses this value as error_reporting-level.
     *
     * @var integer
     */
    var $error_reporting  =  null;

    /**
     * This is the path to the debug console template. If not set,
     * the default one will be used.
     *
     * @var string
     */
    var $debug_tpl       =  '';

    /**
     * This determines if debugging is enable-able from the browser.
     * <ul>
     *  <li>NONE => no debugging control allowed</li>
     *  <li>URL => enable debugging when SMARTY_DEBUG is found in the URL.</li>
     * </ul>
     * @link http://www.foo.dom/index.php?SMARTY_DEBUG
     * @var string
     */
    var $debugging_ctrl  =  'NONE';

    /**
     * This tells Smarty whether to check for recompiling or not. Recompiling
     * does not need to happen unless a template or config file is changed.
     * Typically you enable this during development, and disable for
     * production.
     *
     * @var boolean
     */
    var $compile_check   =  true;

    /**
     * This forces templates to compile every time. Useful for development
     * or debugging.
     *
     * @var boolean
     */
    var $force_compile   =  false;

    /**
     * This enables template caching.
     * <ul>
     *  <li>0 = no caching</li>
     *  <li>1 = use class cache_lifetime value</li>
     *  <li>2 = use cache_lifetime in cache file</li>
     * </ul>
     * @var integer
     */
    var $caching         =  0;

    /**
     * The name of the directory for cache files.
     *
     * @var string
     */
    var $cache_dir       =  'cache';

    /**
     * This is the number of seconds cached content will persist.
     * <ul>
     *  <li>0 = always regenerate cache</li>
     *  <li>-1 = never expires</li>
     * </ul>
     *
     * @var integer
     */
    var $cache_lifetime  =  3600;

    /**
     * Only used when $caching is enabled. If true, then If-Modified-Since headers
     * are respected with cached content, and appropriate HTTP headers are sent.
     * This way repeated hits to a cached page do not send the entire page to the
     * client every time.
     *
     * @var boolean
     */
    var $cache_modified_check = false;

    /**
     * This determines how Smarty handles "<?php ... ?>" tags in templates.
     * possible values:
     * <ul>
     *  <li>SMARTY_PHP_PASSTHRU -> print tags as plain text</li>
     *  <li>SMARTY_PHP_QUOTE    -> escape tags as entities</li>
     *  <li>SMARTY_PHP_REMOVE   -> remove php tags</li>
     *  <li>SMARTY_PHP_ALLOW    -> execute php tags</li>
     * </ul>
     *
     * @var integer
     */
    var $php_handling    =  SMARTY_PHP_PASSTHRU;

    /**
     * This enables template security. When enabled, many things are restricted
     * in the templates that normally would go unchecked. This is useful when
     * untrusted parties are editing templates and you want a reasonable level
     * of security. (no direct execution of PHP in templates for example)
     *
     * @var boolean
     */
    var $security       =   false;

    /**
     * This is the list of template directories that are considered secure. This
     * is used only if {@link $security} is enabled. One directory per array
     * element.  {@link $template_dir} is in this list implicitly.
     *
     * @var array
     */
    var $secure_dir     =   array();

    /**
     * These are the security settings for Smarty. They are used only when
     * {@link $security} is enabled.
     *
     * @var array
     */
    var $security_settings  = array(
                                    'PHP_HANDLING'    => false,
                                    'IF_FUNCS'        => array('array', 'list',
                                                               'isset', 'empty',
                                                               'count', 'sizeof',
                                                               'in_array', 'is_array',
                                                               'true', 'false', 'null'),
                                    'INCLUDE_ANY'     => false,
                                    'PHP_TAGS'        => false,
                                    'MODIFIER_FUNCS'  => array('count'),
                                    'ALLOW_CONSTANTS'  => false,
                                    'ALLOW_SUPER_GLOBALS' => true
                                   );

    /**
     * This is an array of directories where trusted php scripts reside.
     * {@link $security} is disabled during their inclusion/execution.
     *
     * @var array
     */
    var $trusted_dir        = array();

    /**
     * The left delimiter used for the template tags.
     *
     * @var string
     */
    var $left_delimiter  =  '{';

    /**
     * The right delimiter used for the template tags.
     *
     * @var string
     */
    var $right_delimiter =  '}';

    /**
     * The order in which request variables are registered, similar to
     * variables_order in php.ini E = Environment, G = GET, P = POST,
     * C = Cookies, S = Server
     *
     * @var string
     */
    var $request_vars_order    = 'EGPCS';

    /**
     * Indicates wether $HTTP_*_VARS[] (request_use_auto_globals=false)
     * are uses as request-vars or $_*[]-vars. note: if
     * request_use_auto_globals is true, then $request_vars_order has
     * no effect, but the php-ini-value "gpc_order"
     *
     * @var boolean
     */
    var $request_use_auto_globals      = true;

    /**
     * Set this if you want different sets of compiled files for the same
     * templates. This is useful for things like different languages.
     * Instead of creating separate sets of templates per language, you
     * set different compile_ids like 'en' and 'de'.
     *
     * @var string
     */
    var $compile_id            = null;

    /**
     * This tells Smarty whether or not to use sub dirs in the cache/ and
     * templates_c/ directories. sub directories better organized, but
     * may not work well with PHP safe mode enabled.
     *
     * @var boolean
     *
     */
    var $use_sub_dirs          = false;

    /**
     * This is a list of the modifiers to apply to all template variables.
     * Put each modifier in a separate array element in the order you want
     * them applied. example: <code>array('escape:"htmlall"');</code>
     *
     * @var array
     */
    var $default_modifiers        = array();

    /**
     * This is the resource type to be used when not specified
     * at the beginning of the resource path. examples:
     * $smarty->display('file:index.tpl');
     * $smarty->display('db:index.tpl');
     * $smarty->display('index.tpl'); // will use default resource type
     * {include file="file:index.tpl"}
     * {include file="db:index.tpl"}
     * {include file="index.tpl"} {* will use default resource type *}
     *
     * @var array
     */
    var $default_resource_type    = 'file';

    /**
     * The function used for cache file handling. If not set, built-in caching is used.
     *
     * @var null|string function name
     */
    var $cache_handler_func   = null;

    /**
     * This indicates which filters are automatically loaded into Smarty.
     *
     * @var array array of filter names
     */
    var $autoload_filters = array();

    /**#@+
     * @var boolean
     */
    /**
     * This tells if config file vars of the same name overwrite each other or not.
     * if disabled, same name variables are accumulated in an array.
     */
    var $config_overwrite = true;

    /**
     * This tells whether or not to automatically booleanize config file variables.
     * If enabled, then the strings "on", "true", and "yes" are treated as boolean
     * true, and "off", "false" and "no" are treated as boolean false.
     */
    var $config_booleanize = true;

    /**
     * This tells whether hidden sections [.foobar] are readable from the
     * tempalates or not. Normally you would never allow this since that is
     * the point behind hidden sections: the application can access them, but
     * the templates cannot.
     */
    var $config_read_hidden = false;

    /**
     * This tells whether or not automatically fix newlines in config files.
     * It basically converts \r (mac) or \r\n (dos) to \n
     */
    var $config_fix_newlines = true;
    /**#@-*/

    /**
     * If a template cannot be found, this PHP function will be executed.
     * Useful for creating templates on-the-fly or other special action.
     *
     * @var string function name
     */
    var $default_template_handler_func = '';

    /**
     * The file that contains the compiler class. This can a full
     * pathname, or relative to the php_include path.
     *
     * @var string
     */
    var $compiler_file        =    'Smarty_Compiler.class.php';

    /**
     * The class used for compiling templates.
     *
     * @var string
     */
    var $compiler_class        =   'Smarty_Compiler';

    /**
     * The class used to load config vars.
     *
     * @var string
     */
    var $config_class          =   'Config_File';

/**#@+
 * END Smarty Configuration Section
 * There should be no need to touch anything below this line.
 * @access private
 */
    /**
     * where assigned template vars are kept
     *
     * @var array
     */
    var $_tpl_vars             = array();

    /**
     * stores run-time $smarty.* vars
     *
     * @var null|array
     */
    var $_smarty_vars          = null;

    /**
     * keeps track of sections
     *
     * @var array
     */
    var $_sections             = array();

    /**
     * keeps track of foreach blocks
     *
     * @var array
     */
    var $_foreach              = array();

    /**
     * keeps track of tag hierarchy
     *
     * @var array
     */
    var $_tag_stack            = array();

    /**
     * configuration object
     *
     * @var Config_file
     */
    var $_conf_obj             = null;

    /**
     * loaded configuration settings
     *
     * @var array
     */
    var $_config               = array(array('vars'  => array(), 'files' => array()));

    /**
     * md5 checksum of the string 'Smarty'
     *
     * @var string
     */
    var $_smarty_md5           = 'f8d698aea36fcbead2b9d5359ffca76f';

    /**
     * Smarty version number
     *
     * @var string
     */
    var $_version              = '2.6.26';

    /**
     * current template inclusion depth
     *
     * @var integer
     */
    var $_inclusion_depth      = 0;

    /**
     * for different compiled templates
     *
     * @var string
     */
    var $_compile_id           = null;

    /**
     * text in URL to enable debug mode
     *
     * @var string
     */
    var $_smarty_debug_id      = 'SMARTY_DEBUG';

    /**
     * debugging information for debug console
     *
     * @var array
     */
    var $_smarty_debug_info    = array();

    /**
     * info that makes up a cache file
     *
     * @var array
     */
    var $_cache_info           = array();

    /**
     * default file permissions
     *
     * @var integer
     */
    var $_file_perms           = 0644;

    /**
     * default dir permissions
     *
     * @var integer
     */
    var $_dir_perms               = 0771;

    /**
     * registered objects
     *
     * @var array
     */
    var $_reg_objects           = array();

    /**
     * table keeping track of plugins
     *
     * @var array
     */
    var $_plugins              = array(
                                       'modifier'      => array(),
                                       'function'      => array(),
                                       'block'         => array(),
                                       'compiler'      => array(),
                                       'prefilter'     => array(),
                                       'postfilter'    => array(),
                                       'outputfilter'  => array(),
                                       'resource'      => array(),
                                       'insert'        => array());


    /**
     * cache serials
     *
     * @var array
     */
    var $_cache_serials = array();

    /**
     * name of optional cache include file
     *
     * @var string
     */
    var $_cache_include = null;

    /**
     * indicate if the current code is used in a compiled
     * include
     *
     * @var string
     */
    var $_cache_including = false;

    /**#@-*/
    /**
     * The class constructor.
     */
    function Smarty()
    {
      $this->assign('SCRIPT_NAME', isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME']
                    : @$GLOBALS['HTTP_SERVER_VARS']['SCRIPT_NAME']);
    }

    /**
     * assigns values to template variables
     *
     * @param array|string $tpl_var the template variable name(s)
     * @param mixed $value the value to assign
     */
    function assign($tpl_var, $value = null)
    {
        if (is_array($tpl_var)){
            foreach ($tpl_var as $key => $val) {
                if ($key != '') {
                    $this->_tpl_vars[$key] = $val;
                }
            }
        } else {
            if ($tpl_var != '')
                $this->_tpl_vars[$tpl_var] = $value;
        }
    }

    /**
     * assigns values to template variables by reference
     *
     * @param string $tpl_var the template variable name
     * @param mixed $value the referenced value to assign
     */
    function assign_by_ref($tpl_var, &$value)
    {
        if ($tpl_var != '')
            $this->_tpl_vars[$tpl_var] = &$value;
    }

    /**
     * appends values to template variables
     *
     * @param array|string $tpl_var the template variable name(s)
     * @param mixed $value the value to append
     */
    function append($tpl_var, $value=null, $merge=false)
    {
        if (is_array($tpl_var)) {
            // $tpl_var is an array, ignore $value
            foreach ($tpl_var as $_key => $_val) {
                if ($_key != '') {
                    if(!@is_array($this->_tpl_vars[$_key])) {
                        settype($this->_tpl_vars[$_key],'array');
                    }
                    if($merge && is_array($_val)) {
                        foreach($_val as $_mkey => $_mval) {
                            $this->_tpl_vars[$_key][$_mkey] = $_mval;
                        }
                    } else {
                        $this->_tpl_vars[$_key][] = $_val;
                    }
                }
            }
        } else {
            if ($tpl_var != '' && isset($value)) {
                if(!@is_array($this->_tpl_vars[$tpl_var])) {
                    settype($this->_tpl_vars[$tpl_var],'array');
                }
                if($merge && is_array($value)) {
                    foreach($value as $_mkey => $_mval) {
                        $this->_tpl_vars[$tpl_var][$_mkey] = $_mval;
                    }
                } else {
                    $this->_tpl_vars[$tpl_var][] = $value;
                }
            }
        }
    }

    /**
     * appends values to template variables by reference
     *
     * @param string $tpl_var the template variable name
     * @param mixed $value the referenced value to append
     */
    function append_by_ref($tpl_var, &$value, $merge=false)
    {
        if ($tpl_var != '' && isset($value)) {
            if(!@is_array($this->_tpl_vars[$tpl_var])) {
             settype($this->_tpl_vars[$tpl_var],'array');
            }
            if ($merge && is_array($value)) {
                foreach($value as $_key => $_val) {
                    $this->_tpl_vars[$tpl_var][$_key] = &$value[$_key];
                }
            } else {
                $this->_tpl_vars[$tpl_var][] = &$value;
            }
        }
    }


    /**
     * clear the given assigned template variable.
     *
     * @param string $tpl_var the template variable to clear
     */
    function clear_assign($tpl_var)
    {
        if (is_array($tpl_var))
            foreach ($tpl_var as $curr_var)
                unset($this->_tpl_vars[$curr_var]);
        else
            unset($this->_tpl_vars[$tpl_var]);
    }


    /**
     * Registers custom function to be used in templates
     *
     * @param string $function the name of the template function
     * @param string $function_impl the name of the PHP function to register
     */
    function register_function($function, $function_impl, $cacheable=true, $cache_attrs=null)
    {
        $this->_plugins['function'][$function] =
            array($function_impl, null, null, false, $cacheable, $cache_attrs);

    }

    /**
     * Unregisters custom function
     *
     * @param string $function name of template function
     */
    function unregister_function($function)
    {
        unset($this->_plugins['function'][$function]);
    }

    /**
     * Registers object to be used in templates
     *
     * @param string $object name of template object
     * @param object &$object_impl the referenced PHP object to register
     * @param null|array $allowed list of allowed methods (empty = all)
     * @param boolean $smarty_args smarty argument format, else traditional
     * @param null|array $block_functs list of methods that are block format
     */
    function register_object($object, &$object_impl, $allowed = array(), $smarty_args = true, $block_methods = array())
    {
        settype($allowed, 'array');
        settype($smarty_args, 'boolean');
        $this->_reg_objects[$object] =
            array(&$object_impl, $allowed, $smarty_args, $block_methods);
    }

    /**
     * Unregisters object
     *
     * @param string $object name of template object
     */
    function unregister_object($object)
    {
        unset($this->_reg_objects[$object]);
    }


    /**
     * Registers block function to be used in templates
     *
     * @param string $block name of template block
     * @param string $block_impl PHP function to register
     */
    function register_block($block, $block_impl, $cacheable=true, $cache_attrs=null)
    {
        $this->_plugins['block'][$block] =
            array($block_impl, null, null, false, $cacheable, $cache_attrs);
    }

    /**
     * Unregisters block function
     *
     * @param string $block name of template function
     */
    function unregister_block($block)
    {
        unset($this->_plugins['block'][$block]);
    }

    /**
     * Registers compiler function
     *
     * @param string $function name of template function
     * @param string $function_impl name of PHP function to register
     */
    function register_compiler_function($function, $function_impl, $cacheable=true)
    {
        $this->_plugins['compiler'][$function] =
            array($function_impl, null, null, false, $cacheable);
    }

    /**
     * Unregisters compiler function
     *
     * @param string $function name of template function
     */
    function unregister_compiler_function($function)
    {
        unset($this->_plugins['compiler'][$function]);
    }

    /**
     * Registers modifier to be used in templates
     *
     * @param string $modifier name of template modifier
     * @param string $modifier_impl name of PHP function to register
     */
    function register_modifier($modifier, $modifier_impl)
    {
        $this->_plugins['modifier'][$modifier] =
            array($modifier_impl, null, null, false);
    }

    /**
     * Unregisters modifier
     *
     * @param string $modifier name of template modifier
     */
    function unregister_modifier($modifier)
    {
        unset($this->_plugins['modifier'][$modifier]);
    }

    /**
     * Registers a resource to fetch a template
     *
     * @param string $type name of resource
     * @param array $functions array of functions to handle resource
     */
    function register_resource($type, $functions)
    {
        if (count($functions)==4) {
            $this->_plugins['resource'][$type] =
                array($functions, false);

        } elseif (count($functions)==5) {
            $this->_plugins['resource'][$type] =
                array(array(array(&$functions[0], $functions[1])
                            ,array(&$functions[0], $functions[2])
                            ,array(&$functions[0], $functions[3])
                            ,array(&$functions[0], $functions[4]))
                      ,false);

        } else {
            $this->trigger_error("malformed function-list for '$type' in register_resource");

        }
    }

    /**
     * Unregisters a resource
     *
     * @param string $type name of resource
     */
    function unregister_resource($type)
    {
        unset($this->_plugins['resource'][$type]);
    }

    /**
     * Registers a prefilter function to apply
     * to a template before compiling
     *
     * @param callback $function
     */
    function register_prefilter($function)
    {
        $this->_plugins['prefilter'][$this->_get_filter_name($function)]
            = array($function, null, null, false);
    }

    /**
     * Unregisters a prefilter function
     *
     * @param callback $function
     */
    function unregister_prefilter($function)
    {
        unset($this->_plugins['prefilter'][$this->_get_filter_name($function)]);
    }

    /**
     * Registers a postfilter function to apply
     * to a compiled template after compilation
     *
     * @param callback $function
     */
    function register_postfilter($function)
    {
        $this->_plugins['postfilter'][$this->_get_filter_name($function)]
            = array($function, null, null, false);
    }

    /**
     * Unregisters a postfilter function
     *
     * @param callback $function
     */
    function unregister_postfilter($function)
    {
        unset($this->_plugins['postfilter'][$this->_get_filter_name($function)]);
    }

    /**
     * Registers an output filter function to apply
     * to a template output
     *
     * @param callback $function
     */
    function register_outputfilter($function)
    {
        $this->_plugins['outputfilter'][$this->_get_filter_name($function)]
            = array($function, null, null, false);
    }

    /**
     * Unregisters an outputfilter function
     *
     * @param callback $function
     */
    function unregister_outputfilter($function)
    {
        unset($this->_plugins['outputfilter'][$this->_get_filter_name($function)]);
    }

    /**
     * load a filter of specified type and name
     *
     * @param string $type filter type
     * @param string $name filter name
     */
    function load_filter($type, $name)
    {
        switch ($type) {
            case 'output':
                $_params = array('plugins' => array(array($type . 'filter', $name, null, null, false)));
                require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
                smarty_core_load_plugins($_params, $this);
                break;

            case 'pre':
            case 'post':
                if (!isset($this->_plugins[$type . 'filter'][$name]))
                    $this->_plugins[$type . 'filter'][$name] = false;
                break;
        }
    }

    /**
     * clear cached content for the given template and cache id
     *
     * @param string $tpl_file name of template file
     * @param string $cache_id name of cache_id
     * @param string $compile_id name of compile_id
     * @param string $exp_time expiration time
     * @return boolean
     */
    function clear_cache($tpl_file = null, $cache_id = null, $compile_id = null, $exp_time = null)
    {

        if (!isset($compile_id))
            $compile_id = $this->compile_id;

        if (!isset($tpl_file))
            $compile_id = null;

        $_auto_id = $this->_get_auto_id($cache_id, $compile_id);

        if (!empty($this->cache_handler_func)) {
            return call_user_func_array($this->cache_handler_func,
                                  array('clear', &$this, &$dummy, $tpl_file, $cache_id, $compile_id, $exp_time));
        } else {
            $_params = array('auto_base' => $this->cache_dir,
                            'auto_source' => $tpl_file,
                            'auto_id' => $_auto_id,
                            'exp_time' => $exp_time);
            require_once(SMARTY_CORE_DIR . 'core.rm_auto.php');
            return smarty_core_rm_auto($_params, $this);
        }

    }


    /**
     * clear the entire contents of cache (all templates)
     *
     * @param string $exp_time expire time
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    function clear_all_cache($exp_time = null)
    {
        return $this->clear_cache(null, null, null, $exp_time);
    }


    /**
     * test to see if valid cache exists for this template
     *
     * @param string $tpl_file name of template file
     * @param string $cache_id
     * @param string $compile_id
     * @return string|false results of {@link _read_cache_file()}
     */
    function is_cached($tpl_file, $cache_id = null, $compile_id = null)
    {
        if (!$this->caching)
            return false;

        if (!isset($compile_id))
            $compile_id = $this->compile_id;

        $_params = array(
            'tpl_file' => $tpl_file,
            'cache_id' => $cache_id,
            'compile_id' => $compile_id
        );
        require_once(SMARTY_CORE_DIR . 'core.read_cache_file.php');
        return smarty_core_read_cache_file($_params, $this);
    }


    /**
     * clear all the assigned template variables.
     *
     */
    function clear_all_assign()
    {
        $this->_tpl_vars = array();
    }

    /**
     * clears compiled version of specified template resource,
     * or all compiled template files if one is not specified.
     * This function is for advanced use only, not normally needed.
     *
     * @param string $tpl_file
     * @param string $compile_id
     * @param string $exp_time
     * @return boolean results of {@link smarty_core_rm_auto()}
     */
    function clear_compiled_tpl($tpl_file = null, $compile_id = null, $exp_time = null)
    {
        if (!isset($compile_id)) {
            $compile_id = $this->compile_id;
        }
        $_params = array('auto_base' => $this->compile_dir,
                        'auto_source' => $tpl_file,
                        'auto_id' => $compile_id,
                        'exp_time' => $exp_time,
                        'extensions' => array('.inc', '.php'));
        require_once(SMARTY_CORE_DIR . 'core.rm_auto.php');
        return smarty_core_rm_auto($_params, $this);
    }

    /**
     * Checks whether requested template exists.
     *
     * @param string $tpl_file
     * @return boolean
     */
    function template_exists($tpl_file)
    {
        $_params = array('resource_name' => $tpl_file, 'quiet'=>true, 'get_source'=>false);
        return $this->_fetch_resource_info($_params);
    }

    /**
     * Returns an array containing template variables
     *
     * @param string $name
     * @param string $type
     * @return array
     */
    function &get_template_vars($name=null)
    {
        if(!isset($name)) {
            return $this->_tpl_vars;
        } elseif(isset($this->_tpl_vars[$name])) {
            return $this->_tpl_vars[$name];
        } else {
            // var non-existant, return valid reference
            $_tmp = null;
            return $_tmp;   
        }
    }

    /**
     * Returns an array containing config variables
     *
     * @param string $name
     * @param string $type
     * @return array
     */
    function &get_config_vars($name=null)
    {
        if(!isset($name) && is_array($this->_config[0])) {
            return $this->_config[0]['vars'];
        } else if(isset($this->_config[0]['vars'][$name])) {
            return $this->_config[0]['vars'][$name];
        } else {
            // var non-existant, return valid reference
            $_tmp = null;
            return $_tmp;
        }
    }

    /**
     * trigger Smarty error
     *
     * @param string $error_msg
     * @param integer $error_type
     */
    function trigger_error($error_msg, $error_type = E_USER_WARNING)
    {
        trigger_error("Smarty error: $error_msg", $error_type);
    }


    /**
     * executes & displays the template results
     *
     * @param string $resource_name
     * @param string $cache_id
     * @param string $compile_id
     */
    function display($resource_name, $cache_id = null, $compile_id = null)
    {
        $this->fetch($resource_name, $cache_id, $compile_id, true);
    }

    /**
     * executes & returns or displays the template results
     *
     * @param string $resource_name
     * @param string $cache_id
     * @param string $compile_id
     * @param boolean $display
     */
    function fetch($resource_name, $cache_id = null, $compile_id = null, $display = false)
    {
        static $_cache_info = array();
        
        $_smarty_old_error_level = $this->debugging ? error_reporting() : error_reporting(isset($this->error_reporting)
               ? $this->error_reporting : error_reporting() & ~E_NOTICE);

        if (!$this->debugging && $this->debugging_ctrl == 'URL') {
            $_query_string = $this->request_use_auto_globals ? $_SERVER['QUERY_STRING'] : $GLOBALS['HTTP_SERVER_VARS']['QUERY_STRING'];
            if (@strstr($_query_string, $this->_smarty_debug_id)) {
                if (@strstr($_query_string, $this->_smarty_debug_id . '=on')) {
                    // enable debugging for this browser session
                    @setcookie('SMARTY_DEBUG', true);
                    $this->debugging = true;
                } elseif (@strstr($_query_string, $this->_smarty_debug_id . '=off')) {
                    // disable debugging for this browser session
                    @setcookie('SMARTY_DEBUG', false);
                    $this->debugging = false;
                } else {
                    // enable debugging for this page
                    $this->debugging = true;
                }
            } else {
                $this->debugging = (bool)($this->request_use_auto_globals ? @$_COOKIE['SMARTY_DEBUG'] : @$GLOBALS['HTTP_COOKIE_VARS']['SMARTY_DEBUG']);
            }
        }

        if ($this->debugging) {
            // capture time for debugging info
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $_debug_start_time = smarty_core_get_microtime($_params, $this);
            $this->_smarty_debug_info[] = array('type'      => 'template',
                                                'filename'  => $resource_name,
                                                'depth'     => 0);
            $_included_tpls_idx = count($this->_smarty_debug_info) - 1;
        }

        if (!isset($compile_id)) {
            $compile_id = $this->compile_id;
        }

        $this->_compile_id = $compile_id;
        $this->_inclusion_depth = 0;

        if ($this->caching) {
            // save old cache_info, initialize cache_info
            array_push($_cache_info, $this->_cache_info);
            $this->_cache_info = array();
            $_params = array(
                'tpl_file' => $resource_name,
                'cache_id' => $cache_id,
                'compile_id' => $compile_id,
                'results' => null
            );
            require_once(SMARTY_CORE_DIR . 'core.read_cache_file.php');
            if (smarty_core_read_cache_file($_params, $this)) {
                $_smarty_results = $_params['results'];
                if (!empty($this->_cache_info['insert_tags'])) {
                    $_params = array('plugins' => $this->_cache_info['insert_tags']);
                    require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
                    smarty_core_load_plugins($_params, $this);
                    $_params = array('results' => $_smarty_results);
                    require_once(SMARTY_CORE_DIR . 'core.process_cached_inserts.php');
                    $_smarty_results = smarty_core_process_cached_inserts($_params, $this);
                }
                if (!empty($this->_cache_info['cache_serials'])) {
                    $_params = array('results' => $_smarty_results);
                    require_once(SMARTY_CORE_DIR . 'core.process_compiled_include.php');
                    $_smarty_results = smarty_core_process_compiled_include($_params, $this);
                }


                if ($display) {
                    if ($this->debugging)
                    {
                        // capture time for debugging info
                        $_params = array();
                        require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
                        $this->_smarty_debug_info[$_included_tpls_idx]['exec_time'] = smarty_core_get_microtime($_params, $this) - $_debug_start_time;
                        require_once(SMARTY_CORE_DIR . 'core.display_debug_console.php');
                        $_smarty_results .= smarty_core_display_debug_console($_params, $this);
                    }
                    if ($this->cache_modified_check) {
                        $_server_vars = ($this->request_use_auto_globals) ? $_SERVER : $GLOBALS['HTTP_SERVER_VARS'];
                        $_last_modified_date = @substr($_server_vars['HTTP_IF_MODIFIED_SINCE'], 0, strpos($_server_vars['HTTP_IF_MODIFIED_SINCE'], 'GMT') + 3);
                        $_gmt_mtime = gmdate('D, d M Y H:i:s', $this->_cache_info['timestamp']).' GMT';
                        if (@count($this->_cache_info['insert_tags']) == 0
                            && !$this->_cache_serials
                            && $_gmt_mtime == $_last_modified_date) {
                            if (php_sapi_name()=='cgi')
                                header('Status: 304 Not Modified');
                            else
                                header('HTTP/1.1 304 Not Modified');

                        } else {
                            header('Last-Modified: '.$_gmt_mtime);
                            echo $_smarty_results;
                        }
                    } else {
                            echo $_smarty_results;
                    }
                    error_reporting($_smarty_old_error_level);
                    // restore initial cache_info
                    $this->_cache_info = array_pop($_cache_info);
                    return true;
                } else {
                    error_reporting($_smarty_old_error_level);
                    // restore initial cache_info
                    $this->_cache_info = array_pop($_cache_info);
                    return $_smarty_results;
                }
            } else {
                $this->_cache_info['template'][$resource_name] = true;
                if ($this->cache_modified_check && $display) {
                    header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');
                }
            }
        }

        // load filters that are marked as autoload
        if (count($this->autoload_filters)) {
            foreach ($this->autoload_filters as $_filter_type => $_filters) {
                foreach ($_filters as $_filter) {
                    $this->load_filter($_filter_type, $_filter);
                }
            }
        }

        $_smarty_compile_path = $this->_get_compile_path($resource_name);

        // if we just need to display the results, don't perform output
        // buffering - for speed
        $_cache_including = $this->_cache_including;
        $this->_cache_including = false;
        if ($display && !$this->caching && count($this->_plugins['outputfilter']) == 0) {
            if ($this->_is_compiled($resource_name, $_smarty_compile_path)
                    || $this->_compile_resource($resource_name, $_smarty_compile_path))
            {
                include($_smarty_compile_path);
            }
        } else {
            ob_start();
            if ($this->_is_compiled($resource_name, $_smarty_compile_path)
                    || $this->_compile_resource($resource_name, $_smarty_compile_path))
            {
                include($_smarty_compile_path);
            }
            $_smarty_results = ob_get_contents();
            ob_end_clean();

            foreach ((array)$this->_plugins['outputfilter'] as $_output_filter) {
                $_smarty_results = call_user_func_array($_output_filter[0], array($_smarty_results, &$this));
            }
        }

        if ($this->caching) {
            $_params = array('tpl_file' => $resource_name,
                        'cache_id' => $cache_id,
                        'compile_id' => $compile_id,
                        'results' => $_smarty_results);
            require_once(SMARTY_CORE_DIR . 'core.write_cache_file.php');
            smarty_core_write_cache_file($_params, $this);
            require_once(SMARTY_CORE_DIR . 'core.process_cached_inserts.php');
            $_smarty_results = smarty_core_process_cached_inserts($_params, $this);

            if ($this->_cache_serials) {
                // strip nocache-tags from output
                $_smarty_results = preg_replace('!(\{/?nocache\:[0-9a-f]{32}#\d+\})!s'
                                                ,''
                                                ,$_smarty_results);
            }
            // restore initial cache_info
            $this->_cache_info = array_pop($_cache_info);
        }
        $this->_cache_including = $_cache_including;

        if ($display) {
            if (isset($_smarty_results)) { echo $_smarty_results; }
            if ($this->debugging) {
                // capture time for debugging info
                $_params = array();
                require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
                $this->_smarty_debug_info[$_included_tpls_idx]['exec_time'] = (smarty_core_get_microtime($_params, $this) - $_debug_start_time);
                require_once(SMARTY_CORE_DIR . 'core.display_debug_console.php');
                echo smarty_core_display_debug_console($_params, $this);
            }
            error_reporting($_smarty_old_error_level);
            return;
        } else {
            error_reporting($_smarty_old_error_level);
            if (isset($_smarty_results)) { return $_smarty_results; }
        }
    }

    /**
     * load configuration values
     *
     * @param string $file
     * @param string $section
     * @param string $scope
     */
    function config_load($file, $section = null, $scope = 'global')
    {
        require_once($this->_get_plugin_filepath('function', 'config_load'));
        smarty_function_config_load(array('file' => $file, 'section' => $section, 'scope' => $scope), $this);
    }

    /**
     * return a reference to a registered object
     *
     * @param string $name
     * @return object
     */
    function &get_registered_object($name) {
        if (!isset($this->_reg_objects[$name]))
        $this->_trigger_fatal_error("'$name' is not a registered object");

        if (!is_object($this->_reg_objects[$name][0]))
        $this->_trigger_fatal_error("registered '$name' is not an object");

        return $this->_reg_objects[$name][0];
    }

    /**
     * clear configuration values
     *
     * @param string $var
     */
    function clear_config($var = null)
    {
        if(!isset($var)) {
            // clear all values
            $this->_config = array(array('vars'  => array(),
                                         'files' => array()));
        } else {
            unset($this->_config[0]['vars'][$var]);
        }
    }

    /**
     * get filepath of requested plugin
     *
     * @param string $type
     * @param string $name
     * @return string|false
     */
    function _get_plugin_filepath($type, $name)
    {
        $_params = array('type' => $type, 'name' => $name);
        require_once(SMARTY_CORE_DIR . 'core.assemble_plugin_filepath.php');
        return smarty_core_assemble_plugin_filepath($_params, $this);
    }

   /**
     * test if resource needs compiling
     *
     * @param string $resource_name
     * @param string $compile_path
     * @return boolean
     */
    function _is_compiled($resource_name, $compile_path)
    {
        if (!$this->force_compile && file_exists($compile_path)) {
            if (!$this->compile_check) {
                // no need to check compiled file
                return true;
            } else {
                // get file source and timestamp
                $_params = array('resource_name' => $resource_name, 'get_source'=>false);
                if (!$this->_fetch_resource_info($_params)) {
                    return false;
                }
                if ($_params['resource_timestamp'] <= filemtime($compile_path)) {
                    // template not expired, no recompile
                    return true;
                } else {
                    // compile template
                    return false;
                }
            }
        } else {
            // compiled template does not exist, or forced compile
            return false;
        }
    }

   /**
     * compile the template
     *
     * @param string $resource_name
     * @param string $compile_path
     * @return boolean
     */
    function _compile_resource($resource_name, $compile_path)
    {

        $_params = array('resource_name' => $resource_name);
        if (!$this->_fetch_resource_info($_params)) {
            return false;
        }

        $_source_content = $_params['source_content'];
        $_cache_include    = substr($compile_path, 0, -4).'.inc';

        if ($this->_compile_source($resource_name, $_source_content, $_compiled_content, $_cache_include)) {
            // if a _cache_serial was set, we also have to write an include-file:
            if ($this->_cache_include_info) {
                require_once(SMARTY_CORE_DIR . 'core.write_compiled_include.php');
                smarty_core_write_compiled_include(array_merge($this->_cache_include_info, array('compiled_content'=>$_compiled_content, 'resource_name'=>$resource_name)),  $this);
            }

            $_params = array('compile_path'=>$compile_path, 'compiled_content' => $_compiled_content);
            require_once(SMARTY_CORE_DIR . 'core.write_compiled_resource.php');
            smarty_core_write_compiled_resource($_params, $this);

            return true;
        } else {
            return false;
        }

    }

   /**
     * compile the given source
     *
     * @param string $resource_name
     * @param string $source_content
     * @param string $compiled_content
     * @return boolean
     */
    function _compile_source($resource_name, &$source_content, &$compiled_content, $cache_include_path=null)
    {
        if (file_exists(SMARTY_DIR . $this->compiler_file)) {
            require_once(SMARTY_DIR . $this->compiler_file);
        } else {
            // use include_path
            require_once($this->compiler_file);
        }


        $smarty_compiler = new $this->compiler_class;

        $smarty_compiler->template_dir      = $this->template_dir;
        $smarty_compiler->compile_dir       = $this->compile_dir;
        $smarty_compiler->plugins_dir       = $this->plugins_dir;
        $smarty_compiler->config_dir        = $this->config_dir;
        $smarty_compiler->force_compile     = $this->force_compile;
        $smarty_compiler->caching           = $this->caching;
        $smarty_compiler->php_handling      = $this->php_handling;
        $smarty_compiler->left_delimiter    = $this->left_delimiter;
        $smarty_compiler->right_delimiter   = $this->right_delimiter;
        $smarty_compiler->_version          = $this->_version;
        $smarty_compiler->security          = $this->security;
        $smarty_compiler->secure_dir        = $this->secure_dir;
        $smarty_compiler->security_settings = $this->security_settings;
        $smarty_compiler->trusted_dir       = $this->trusted_dir;
        $smarty_compiler->use_sub_dirs      = $this->use_sub_dirs;
        $smarty_compiler->_reg_objects      = &$this->_reg_objects;
        $smarty_compiler->_plugins          = &$this->_plugins;
        $smarty_compiler->_tpl_vars         = &$this->_tpl_vars;
        $smarty_compiler->default_modifiers = $this->default_modifiers;
        $smarty_compiler->compile_id        = $this->_compile_id;
        $smarty_compiler->_config            = $this->_config;
        $smarty_compiler->request_use_auto_globals  = $this->request_use_auto_globals;

        if (isset($cache_include_path) && isset($this->_cache_serials[$cache_include_path])) {
            $smarty_compiler->_cache_serial = $this->_cache_serials[$cache_include_path];
        }
        $smarty_compiler->_cache_include = $cache_include_path;


        $_results = $smarty_compiler->_compile_file($resource_name, $source_content, $compiled_content);

        if ($smarty_compiler->_cache_serial) {
            $this->_cache_include_info = array(
                'cache_serial'=>$smarty_compiler->_cache_serial
                ,'plugins_code'=>$smarty_compiler->_plugins_code
                ,'include_file_path' => $cache_include_path);

        } else {
            $this->_cache_include_info = null;

        }

        return $_results;
    }

    /**
     * Get the compile path for this resource
     *
     * @param string $resource_name
     * @return string results of {@link _get_auto_filename()}
     */
    function _get_compile_path($resource_name)
    {
        return $this->_get_auto_filename($this->compile_dir, $resource_name,
                                         $this->_compile_id) . '.php';
    }

    /**
     * fetch the template info. Gets timestamp, and source
     * if get_source is true
     *
     * sets $source_content to the source of the template, and
     * $resource_timestamp to its time stamp
     * @param string $resource_name
     * @param string $source_content
     * @param integer $resource_timestamp
     * @param boolean $get_source
     * @param boolean $quiet
     * @return boolean
     */

    function _fetch_resource_info(&$params)
    {
        if(!isset($params['get_source'])) { $params['get_source'] = true; }
        if(!isset($params['quiet'])) { $params['quiet'] = false; }

        $_return = false;
        $_params = array('resource_name' => $params['resource_name']) ;
        if (isset($params['resource_base_path']))
            $_params['resource_base_path'] = $params['resource_base_path'];
        else
            $_params['resource_base_path'] = $this->template_dir;

        if ($this->_parse_resource_name($_params)) {
            $_resource_type = $_params['resource_type'];
            $_resource_name = $_params['resource_name'];
            switch ($_resource_type) {
                case 'file':
                    if ($params['get_source']) {
                        $params['source_content'] = $this->_read_file($_resource_name);
                    }
                    $params['resource_timestamp'] = filemtime($_resource_name);
                    $_return = is_file($_resource_name) && is_readable($_resource_name);
                    break;

                default:
                    // call resource functions to fetch the template source and timestamp
                    if ($params['get_source']) {
                        $_source_return = isset($this->_plugins['resource'][$_resource_type]) &&
                            call_user_func_array($this->_plugins['resource'][$_resource_type][0][0],
                                                 array($_resource_name, &$params['source_content'], &$this));
                    } else {
                        $_source_return = true;
                    }

                    $_timestamp_return = isset($this->_plugins['resource'][$_resource_type]) &&
                        call_user_func_array($this->_plugins['resource'][$_resource_type][0][1],
                                             array($_resource_name, &$params['resource_timestamp'], &$this));

                    $_return = $_source_return && $_timestamp_return;
                    break;
            }
        }

        if (!$_return) {
            // see if we can get a template with the default template handler
            if (!empty($this->default_template_handler_func)) {
                if (!is_callable($this->default_template_handler_func)) {
                    $this->trigger_error("default template handler function \"$this->default_template_handler_func\" doesn't exist.");
                } else {
                    $_return = call_user_func_array(
                        $this->default_template_handler_func,
                        array($_params['resource_type'], $_params['resource_name'], &$params['source_content'], &$params['resource_timestamp'], &$this));
                }
            }
        }

        if (!$_return) {
            if (!$params['quiet']) {
                $this->trigger_error('unable to read resource: "' . $params['resource_name'] . '"');
            }
        } else if ($_return && $this->security) {
            require_once(SMARTY_CORE_DIR . 'core.is_secure.php');
            if (!smarty_core_is_secure($_params, $this)) {
                if (!$params['quiet'])
                    $this->trigger_error('(secure mode) accessing "' . $params['resource_name'] . '" is not allowed');
                $params['source_content'] = null;
                $params['resource_timestamp'] = null;
                return false;
            }
        }
        return $_return;
    }


    /**
     * parse out the type and name from the resource
     *
     * @param string $resource_base_path
     * @param string $resource_name
     * @param string $resource_type
     * @param string $resource_name
     * @return boolean
     */

    function _parse_resource_name(&$params)
    {

        // split tpl_path by the first colon
        $_resource_name_parts = explode(':', $params['resource_name'], 2);

        if (count($_resource_name_parts) == 1) {
            // no resource type given
            $params['resource_type'] = $this->default_resource_type;
            $params['resource_name'] = $_resource_name_parts[0];
        } else {
            if(strlen($_resource_name_parts[0]) == 1) {
                // 1 char is not resource type, but part of filepath
                $params['resource_type'] = $this->default_resource_type;
                $params['resource_name'] = $params['resource_name'];
            } else {
                $params['resource_type'] = $_resource_name_parts[0];
                $params['resource_name'] = $_resource_name_parts[1];
            }
        }

        if ($params['resource_type'] == 'file') {
            if (!preg_match('/^([\/\\\\]|[a-zA-Z]:[\/\\\\])/', $params['resource_name'])) {
                // relative pathname to $params['resource_base_path']
                // use the first directory where the file is found
                foreach ((array)$params['resource_base_path'] as $_curr_path) {
                    $_fullpath = $_curr_path . DIRECTORY_SEPARATOR . $params['resource_name'];
                    if (file_exists($_fullpath) && is_file($_fullpath)) {
                        $params['resource_name'] = $_fullpath;
                        return true;
                    }
                    // didn't find the file, try include_path
                    $_params = array('file_path' => $_fullpath);
                    require_once(SMARTY_CORE_DIR . 'core.get_include_path.php');
                    if(smarty_core_get_include_path($_params, $this)) {
                        $params['resource_name'] = $_params['new_file_path'];
                        return true;
                    }
                }
                return false;
            } else {
                /* absolute path */
                return file_exists($params['resource_name']);
            }
        } elseif (empty($this->_plugins['resource'][$params['resource_type']])) {
            $_params = array('type' => $params['resource_type']);
            require_once(SMARTY_CORE_DIR . 'core.load_resource_plugin.php');
            smarty_core_load_resource_plugin($_params, $this);
        }

        return true;
    }


    /**
     * Handle modifiers
     *
     * @param string|null $modifier_name
     * @param array|null $map_array
     * @return string result of modifiers
     */
    function _run_mod_handler()
    {
        $_args = func_get_args();
        list($_modifier_name, $_map_array) = array_splice($_args, 0, 2);
        list($_func_name, $_tpl_file, $_tpl_line) =
            $this->_plugins['modifier'][$_modifier_name];

        $_var = $_args[0];
        foreach ($_var as $_key => $_val) {
            $_args[0] = $_val;
            $_var[$_key] = call_user_func_array($_func_name, $_args);
        }
        return $_var;
    }

    /**
     * Remove starting and ending quotes from the string
     *
     * @param string $string
     * @return string
     */
    function _dequote($string)
    {
        if ((substr($string, 0, 1) == "'" || substr($string, 0, 1) == '"') &&
            substr($string, -1) == substr($string, 0, 1))
            return substr($string, 1, -1);
        else
            return $string;
    }


    /**
     * read in a file
     *
     * @param string $filename
     * @return string
     */
    function _read_file($filename)
    {
        if ( file_exists($filename) && is_readable($filename) && ($fd = @fopen($filename, 'rb')) ) {
            $contents = '';
            while (!feof($fd)) {
                $contents .= fread($fd, 8192);
            }
            fclose($fd);
            return $contents;
        } else {
            return false;
        }
    }

    /**
     * get a concrete filename for automagically created content
     *
     * @param string $auto_base
     * @param string $auto_source
     * @param string $auto_id
     * @return string
     * @staticvar string|null
     * @staticvar string|null
     */
    function _get_auto_filename($auto_base, $auto_source = null, $auto_id = null)
    {
        $_compile_dir_sep =  $this->use_sub_dirs ? DIRECTORY_SEPARATOR : '^';
        $_return = $auto_base . DIRECTORY_SEPARATOR;

        if(isset($auto_id)) {
            // make auto_id safe for directory names
            $auto_id = str_replace('%7C',$_compile_dir_sep,(urlencode($auto_id)));
            // split into separate directories
            $_return .= $auto_id . $_compile_dir_sep;
        }

        if(isset($auto_source)) {
            // make source name safe for filename
            $_filename = urlencode(basename($auto_source));
            $_crc32 = sprintf('%08X', crc32($auto_source));
            // prepend %% to avoid name conflicts with
            // with $params['auto_id'] names
            $_crc32 = substr($_crc32, 0, 2) . $_compile_dir_sep .
                      substr($_crc32, 0, 3) . $_compile_dir_sep . $_crc32;
            $_return .= '%%' . $_crc32 . '%%' . $_filename;
        }

        return $_return;
    }

    /**
     * unlink a file, possibly using expiration time
     *
     * @param string $resource
     * @param integer $exp_time
     */
    function _unlink($resource, $exp_time = null)
    {
        if(isset($exp_time)) {
            if(time() - @filemtime($resource) >= $exp_time) {
                return @unlink($resource);
            }
        } else {
            return @unlink($resource);
        }
    }

    /**
     * returns an auto_id for auto-file-functions
     *
     * @param string $cache_id
     * @param string $compile_id
     * @return string|null
     */
    function _get_auto_id($cache_id=null, $compile_id=null) {
    if (isset($cache_id))
        return (isset($compile_id)) ? $cache_id . '|' . $compile_id  : $cache_id;
    elseif(isset($compile_id))
        return $compile_id;
    else
        return null;
    }

    /**
     * trigger Smarty plugin error
     *
     * @param string $error_msg
     * @param string $tpl_file
     * @param integer $tpl_line
     * @param string $file
     * @param integer $line
     * @param integer $error_type
     */
    function _trigger_fatal_error($error_msg, $tpl_file = null, $tpl_line = null,
            $file = null, $line = null, $error_type = E_USER_ERROR)
    {
        if(isset($file) && isset($line)) {
            $info = ' ('.basename($file).", line $line)";
        } else {
            $info = '';
        }
        if (isset($tpl_line) && isset($tpl_file)) {
            $this->trigger_error('[in ' . $tpl_file . ' line ' . $tpl_line . "]: $error_msg$info", $error_type);
        } else {
            $this->trigger_error($error_msg . $info, $error_type);
        }
    }


    /**
     * callback function for preg_replace, to call a non-cacheable block
     * @return string
     */
    function _process_compiled_include_callback($match) {
        $_func = '_smarty_tplfunc_'.$match[2].'_'.$match[3];
        ob_start();
        $_func($this);
        $_ret = ob_get_contents();
        ob_end_clean();
        return $_ret;
    }


    /**
     * called for included templates
     *
     * @param string $_smarty_include_tpl_file
     * @param string $_smarty_include_vars
     */

    // $_smarty_include_tpl_file, $_smarty_include_vars

    function _smarty_include($params)
    {
        if ($this->debugging) {
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $debug_start_time = smarty_core_get_microtime($_params, $this);
            $this->_smarty_debug_info[] = array('type'      => 'template',
                                                  'filename'  => $params['smarty_include_tpl_file'],
                                                  'depth'     => ++$this->_inclusion_depth);
            $included_tpls_idx = count($this->_smarty_debug_info) - 1;
        }

        $this->_tpl_vars = array_merge($this->_tpl_vars, $params['smarty_include_vars']);

        // config vars are treated as local, so push a copy of the
        // current ones onto the front of the stack
        array_unshift($this->_config, $this->_config[0]);

        $_smarty_compile_path = $this->_get_compile_path($params['smarty_include_tpl_file']);


        if ($this->_is_compiled($params['smarty_include_tpl_file'], $_smarty_compile_path)
            || $this->_compile_resource($params['smarty_include_tpl_file'], $_smarty_compile_path))
        {
            include($_smarty_compile_path);
        }

        // pop the local vars off the front of the stack
        array_shift($this->_config);

        $this->_inclusion_depth--;

        if ($this->debugging) {
            // capture time for debugging info
            $_params = array();
            require_once(SMARTY_CORE_DIR . 'core.get_microtime.php');
            $this->_smarty_debug_info[$included_tpls_idx]['exec_time'] = smarty_core_get_microtime($_params, $this) - $debug_start_time;
        }

        if ($this->caching) {
            $this->_cache_info['template'][$params['smarty_include_tpl_file']] = true;
        }
    }


    /**
     * get or set an array of cached attributes for function that is
     * not cacheable
     * @return array
     */
    function &_smarty_cache_attrs($cache_serial, $count) {
        $_cache_attrs =& $this->_cache_info['cache_attrs'][$cache_serial][$count];

        if ($this->_cache_including) {
            /* return next set of cache_attrs */
            $_return = current($_cache_attrs);
            next($_cache_attrs);
            return $_return;

        } else {
            /* add a reference to a new set of cache_attrs */
            $_cache_attrs[] = array();
            return $_cache_attrs[count($_cache_attrs)-1];

        }

    }


    /**
     * wrapper for include() retaining $this
     * @return mixed
     */
    function _include($filename, $once=false, $params=null)
    {
        if ($once) {
            return include_once($filename);
        } else {
            return include($filename);
        }
    }


    /**
     * wrapper for eval() retaining $this
     * @return mixed
     */
    function _eval($code, $params=null)
    {
        return eval($code);
    }
    
    /**
     * Extracts the filter name from the given callback
     * 
     * @param callback $function
     * @return string
     */
	function _get_filter_name($function)
	{
		if (is_array($function)) {
			$_class_name = (is_object($function[0]) ?
				get_class($function[0]) : $function[0]);
			return $_class_name . '_' . $function[1];
		}
		else {
			return $function;
		}
	}
  
    /**#@-*/

}

/* vim: set expandtab: *//**
* 
*/
class SmartyView {
	private static $smarty = NULL;//保存smarty对象
	public function __construct()
	{
		//smarty配置
		if(!is_null(self::$smarty)) return;
			$smarty = new Smarty();

			$smarty->template_dir = ROOT_PATH.APP_PATH.'/'.MODULE.APP_TPL_PATH . '/' . CONTROLLER .'/';	//模板目录
			$smarty->compile_dir  = APP_TEMP_PATH .'/Compile/'. MODULE. '/';							//模板编译目录
			$smarty->cache_dir 	  = APP_TEMP_PATH .'/Cache/'. MODULE. '/';								//模板缓存目录
			$smarty->left_delimiter = C('LEFT_DELIMITER');												//左边界符号
			$smarty->right_delimiter = C('RIGHT_DELIMITER');											//右边界符
			$smarty->caching = C('CACHE_ON');															//缓存开启
			$smarty->cache_lifetime = C('CACHE_TIME');													//缓存时间
			// $smarty->allow_php_templates = true;
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

	public function registerPlu($name, $callback){
		return self::$smarty->register_block($name,$callback); //注册block，这个就是应用标签的基础
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
			$url = $url ? "window.location.href='". $url ."'" : 'window.history.back(-1)';
			include(ROOT_PATH.APP_PATH.'/'.MODULE.APP_TPL_PATH .'/success.html');
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
			$url = $url ? "window.location.href='". $url ."'" : 'window.history.back(-1)';
			include(ROOT_PATH.APP_PATH.'/'.MODULE.APP_TPL_PATH .'/error.html');

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
		include(ROOT_PATH.APP_PATH.'/'.MODULE.APP_TPL_PATH .'/notice.html');
	}
	/**
	 * [get_tpl 组合模板路径]
	 * @param  [type] $tpl [description]
	 * @return [type]      [description]
	 */
	protected function get_tpl($tpl = NULL){
		if(is_null($tpl)){
			$path = ROOT_PATH.APP_PATH.'/'.MODULE.APP_TPL_PATH .'/'. CONTROLLER .'/'. ACTION .'.html';
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