<?php
/**
* Rbac权限控制模型
*/
class ColumnModel extends Model{
	//角色表
	public $table = "column";
	public $type_table = "column_type";

	public function AddRole($data){
		// $role = $this->add()
	}
	public function getColumnType(){
		$sql = "SELECT * FROM ".$this->table ." AS c,".C("DB_PREFIX").$this->type_table." AS t WHERE c.col_type=t.tid AND c.display=1";
		return $this->query($sql);
	}

}
?>