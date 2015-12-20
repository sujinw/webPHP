<?php
/**
* 栏目控制器
*/
class ColumnController extends CommonController{
	//添加栏目	
	public function add(){
		// p(K('Column')->getColumnType());die;
		$field = array('id','name','parent_id');
		$column = M('column')->field($field)->all();
		$type = M('column_type')->where("display=1")->all();
		// p($type);die;
		if(empty($column)){
			$column = 0;
		}
		$column = alread_column(Data::tree($column,'name','id','parent_id'));
		// p($column);die;
		$this->assign('column',$column);
		$this->assign('type',$type);		
		$this->display();
	}
	//添加栏目表单处理
	public function addHander(){
		// p($_POST);
		$post = $_POST;
		$data = array(
			'name' => $post['name'],
			'parent_id' => $post['parent_id'],
			'remark' => $post['remark'],
			'display' => $post['display'],
			'creat_time'=>time()
		);
		$column = M('column');
		$c = $column->where("name='".$data['name']."'")->one();
		if($c){
			$this->error('栏目已经存在');
		}else{
			if($column->add($data)){
				$this->success('添加成功',__APP__.'?c=Column&a=columnList');
			}else{
				$this->error('添加失败');
			}
		}
	}
	//栏目列表
	public function columnList(){
		$column = K('Column')->getColumnType();
		// $column = M('column')->where('display=1 AND is_delete=1')->all();
		// p(Data::tree($column,'name','id','parent_id'));
		$this->assign('column',Data::tree($column,'name','id','parent_id'));
		$this->display();
	}
	//栏目分类
	public function columnType(){
		$type=M('column_type')->all();
		$this->assign('type',$type);
		$this->display();
	}
	//添加栏目分类
	public function addColumnType(){
		$this->display();
	}
	//添加栏目分类表单处理
	public function addColumnTypeHander(){
		$type = $_POST;
		$type['creat_time'] = time();
		// p($type);
		if(M('column_type')->add($type)){
			$this->success('添加分类成功',__APP__.'?c=Column&a=columnType');
		}else{
			$this->error('添加失败');
		}
	}
}
?>