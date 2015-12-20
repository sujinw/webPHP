<?php
/**
* 
*/
class TemplateModel extends Model{
	
	public $table = 'template';

	// 获取默认的样式返回tsign
	public function getTemplate(){
		return $this->field('tsign')->where('selected=1')->one()['tsign'];
	}
}
?>