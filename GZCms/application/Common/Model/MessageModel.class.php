<?php
/**
* 站内信操作模型
*/
class MessageModel extends Model{
	
	public $table = 'message_sender';
	public $rectable = 'message_receiver';

	public function sendMessage($sdata,$data){
		$res = $this->add($sdata);//添加到发件人表
		if($res){
			$data['mid']=$res;
			$fields="";
			$values="";
			foreach ($data as $k => $v) {
				$fields .= '`' . $this->_safe_str($k) . '`,';
				$values .= "'" . $this->_safe_str($v) . "',";
			}
			$fields = trim($fields, ',');
			$values = trim($values, ',');

			$sql = "INSERT INTO " . C('DB_PREFIX') . $this->rectable . " (". $fields .") VALUES (". $values .")";
			$result = $this->exe($sql);
			if($result){
				$path = APP_CACHE_PATH . '/DataBase_id';
				$Dir = new Dir();
				if(!is_dir($path)){
					$file = $Dir->create($path) ? $path .'/'. $this->table . '.txt' : NULL;
					$recfile = $Dir->create($path) ? $path .'/'. C('DB_PREFIX') . $this->rectable . '.txt' : NULL;
				}else{
					$file = $path .'/'. $this->table . '.txt';
					$recfile = $path .'/'. C('DB_PREFIX') . $this->rectable . '.txt';
				}
				
				if(!is_null($file) || !is_null($recfile)){
					if(file_put_contents($file, $res) || file_put_contents($recfile, $result)){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			}
		}
	}

	public function mailbox($tuid){
		$sql = "SELECT * FROM ".$this->table." AS s,".C("DB_PREFIX").$this->rectable." AS re WHERE to_uid='".$tuid."' AND s.mid=re.mid AND s.is_send=1";
		// echo $sql;
		$res = $this->query($sql);

		if($res){
			return $res;
		}else{
			return false;
		}
	}

	public function returnnread($uid){
		$sql = "SELECT * FROM ".C("DB_PREFIX").$this->rectable." WHERE is_readed=0 AND to_uid='".$uid."'";
		$res = $this->query($sql);
		if($res){
			return $res;
		}else{
			return false;
		}
	}

	public function nextmess($mid,$uid){
		$data = array();
		$sql = "SELECT `mid` FROM ".C("DB_PREFIX").$this->rectable." WHERE to_uid='".$uid."'";
		$res = $this->query($sql);
		$arr = array();
		foreach ($res as $v) {
			foreach ($v as $t) {
				$arr[]=$t;
			}
		}
		foreach ($arr as $k => $v) {
			if($v == $mid){
				// p($k);
				$data['next'] = $k+1>=count($arr) ? $arr[$k] : $arr[$k+1];
				$data['pre'] = $k-1 <= 0 ? $arr[$k] : $arr[$k-1];
			}
		}
		return $data;
	}

	/**
	 * [_safe_str sql字符串安全转义]
	 * @param  [type] $str [description]
	 * @return [type]      [description]
	 */
	private function _safe_str($str){
		if(get_magic_quotes_gpc()){
			$str = stripslashes($str);
		}
		return self::$link->real_escape_string($str);
	}
}
?>