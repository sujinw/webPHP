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
}
?>