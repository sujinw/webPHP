<?php 
/**
* 控制器父类
*/
class Controller extends SmartyView{
	public function __construct(){
		Hook::listen('CONTROLLER_START');
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
		Hook::listen("VIEW_START");
		$path = $this->get_tpl($tpl);
		if(!is_file($path)) halt($path . '模板文件不存在');

		if(C('SMARTY_ON')){
			parent::display($path);
		}else{
			extract($this->var);
			include $path;
		}
		 Hook::listen("VIEW_START");
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

    /**
     * 析构函数
     */
    public function __destruct()
    {
        Hook::listen('CONTROLLER_END');
    }
}
?>