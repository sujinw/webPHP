<?php
/**
* 文章操作控制器
*/
class ArticleController extends CommonController{
	//添加文章
	public function add(){
		$column = K('Column')->getColumnType();
		$column = alread_column(Data::tree($column,'name','id','parent_id'));
		$this->assign('column',$column);
		$this->display();
	}
	public function addAjax(){
		// if(!IS_AJAX)$this->error('你访问的页面不存在','');
		$cate = K('Article')->getColumnBycolId($_POST['id']);
		// p($_POST['id']);
		// p($cate);die;
		echo json_encode($cate);
	}
	//添加文章表单处理
	public function addHander(){
		// p($_FILES);
		// p($_POST);
		preg_match_all('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\">/i', $_POST['details'], $result,PREG_SET_ORDER);
		$dir = MYPHP_TEMP_PATH ."/Article/".$_POST['column_id'].'/'.$_POST['category_id'];
		is_dir($dir) || mkdir($dir, 0777, true);
		chmod($dir,0777);

		$aid = (int)file_get_contents(MYPHP_TEMP_PATH.'/Dbid/Article/Article/dbid.txt');
		$fileName = $dir.'/'.date('Y-m-d').'-'.$_POST['column_id'].'-'.$_POST['category_id'].'-'.($aid+1).'.txt';
		$data = array();
		foreach ($result as $v) {
			$data[]=$v[0];
		}
		// p($fileName);die;
		file_put_contents($fileName,serialize($data));
		$details = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\">/i', "<baseImg/>", $_POST['details']);
		if(isset($_FILES['thumb'])){
			$upload = new Upload('Upload/Article/images/'.date("Y/m/d"));
			$files = $upload->upload();
		}
		// p($files);
		// die;
		$articleData = array(
			'column_id' => $_POST['column_id'],
			'category_id' => $_POST['category_id'],
			'title' => $_POST['title'],
			'tags' => $_POST['tags'],
			'recommend' => $_POST['recommend'],
			'author' => isset($_POST['author']) ?  $_POST['author'] : $_SESSION['uname'],
			'source' => $_POST['source'],
			'details' => $_POST['details'],
			'display' => $_POST['display'],
			'thumb' => empty($files[0]['path'])?"":$files[0]['path'],
			'image' => $fileName,
			'create_time' => time()
		);
		$articleData['details'] = $details;
		if(K('Article')->addArticle($articleData)){
			$this->success('文章添加成功',__APP__.'?c=Article&a=listArticle');
		}else{
			$this->error('文章添加失败');
		}
	}
	public function articlePicAjax(){
		if(!IS_AJAX){
			$this->error('你访问的页面不存在');
		}
		$data = $_POST;
		// p($data);die;
	}
	// 文章列表
	public function listArticle(){
		
		$db = M('article');
		$total = $db->count(); 
		// p($total);die;
		$params = array(
            'total_rows'=>$total, #(必须)
            'method'    =>'', #(必须)
            'parameter' =>'index.php?p=?',  #(必须)
            'now_page'  =>$_GET['p'],  #(必须)
            'list_rows' =>5, #(可选) 默认为15
		);
		$page = new Page($params);
		$now = ((int)$_GET['p']-1) * (int)$params['list_rows'];
		$end = $params['list_rows'];
		// p(K('Article')->listData($now,$end));die;
		$this->assign('article',K('Article')->listData($now,$end));
		$this->assign('page',$page->show(1));
		$this->display();
	}
	//文章分类
	public function categroy(){
		$cate = M('article_category')->where('display=1')->all();
		$this->assign('cate',$cate);
		$this->display();
	}
	//添加分类
	public function addCategory(){
		$field = array('id','name','parent_id');
		$column = M('column')->field($field)->all();
		// p($column);die;
		if(empty($column)){
			$column = 0;
		}
		$column = Data::tree($column,'name','id','parent_id');
		$this->assign('column',$column);		
		$this->display();
	}
	//添加栏目表单处理
	public function addCategoryHander(){
		// p($_POST);die;
		$categroy = $_POST;
		$categroy['creat_time'] = time();
		if(M('article_category')->add($categroy)){
			$this->success('成功添加文章分类',__APP__.'?c=article&a=categroy');
		}else{
			$this->error('添加文章失败');
		}
	}
}
?>