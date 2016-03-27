<?php 

/**
* 文章管理
*/
class ArticleController extends AdminController{
	//文章分类
	public function articleCate(){
	
		$user = K('ArticleCate')->treeData();

		$this->assign('data',$user);
		$this->display();
	}

	//添加文章分类
	public function addCate(){
		$cate = K('ArticleCate');
		if(IS_AJAX){
			if($cate->validate($_POST['cname'])){
				echo 1;
			}else{
				echo 0;
			}
			return;
		}elseif(IS_POST){
			$data = $_POST;
			$data['create_time'] = time();

			if($cate->validate($data['cname'])){
				if($cate->addCate($data)){
					$this->success('添加成功',U('articleCate'));
				}else{
					$this->error('添加失败',U('addCate'));
				}
			}else{
				$this->error('分类已经存在',U('addCate'));
			}
			return;
		}
		$data = $cate->treeData();
		if(empty($data)){
			$cate = 0;
		}

		$this->assign('data',$data);
		$this->display();
	}

	//编辑分类
	public function editCate(){
		$cid = isset($_GET['cid']) ? $_GET['cid'] : 0;

		$cate = K('ArticleCate')->getCate($cid);
		$data = K('ArticleCate')->treeData();
		if(empty($data)){
			$cate = 0;
		}
		$this->assign('cate',$cate);

		$this->assign('data',$data);

		$this->display();
	}

	//删除分类
	public function ajaxDelCate(){
		$cid = isset($_POST['cid']) ? $_POST['cid'] : 0;
		
		$ar = M('article_category')->where("cid='".$cid."'" )->update(array('is_delete'=>1));
		$cr =  M('article_category')->where("pid='".$cid."'")->update(array('is_delete'=>1));
		 
		if($ar){
			$status = 1;
			$messages = "文章分类删除成功了";
			$arr = array('status' => $status, 'message' => $messages );

			echo json_encode($arr);
		}
		if(!$cid || !$ar ||!$cr){
			$status = 0;
			$messages = "请选择正确的文章分类进行操作";
			$arr = array('status' => $status, 'message' => $messages );

			echo json_encode($arr);
		}
	}
	//文章列表
	public function articleList(){
		$total = (int)file_get_contents(APP_CACHE_PATH .'/DataBase_id/gz_article.txt');
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
		$result = K('Article')->getArticleLimit($now.','.$end);

		$this->assign('page',$page->show(1));
		$this->assign('article',$result);
		$this->display();
	}

	//添加文章
	public function addArticle(){
		if(IS_POST){
			if(empty($_POST['title']) || empty(strip_tags($_POST['details'],'<img>'))){
				$this->error("文章内容或标题不能为空",U('addArticle'));
			}
			// p($_FILES);die;
			$data = array(
				'title' 	=> $_POST['title'],
				'source'	=> $_POST['source'],
				'tags'		=> $_POST['tags'],
				'cid'		=> $_POST['cid'],
				'digest'	=> $_POST['digest'],
				'display'	=> $_POST['display'],
				'excerpt'	=> isset($_POST['excerpt']) ? $_POST['excerpt'] : substr(strip_tags($_POST['details']),0,150),
				'details'	=> $_POST['details'],
				'author'	=> isset($_POST['author'])?$_POST['author']:$_SESSION['uname']
			);
			//处理ajax上传图片的问题
			$reg = '/\<img.*?src="(.*?)\".*?>/is';
			preg_match_all( $reg , $data['details'] , $results );
			// p($results);die;
			if(count($results[0]) > 1){
				// p($results[1]);die;
				foreach($results[1] as $val){
					$dir = explode("/",$val);
					$newDir = $dir[0]."/ArticleImages/".$dir[2]."/".$dir[3]."/".$dir[4];
					$newFile = $newDir ."/". $dir[5];
					// $old = $dir[0]."/".$dir[1]."/".$dir[2];
					if(Dir::create($newDir)){
						p($val);
						copy($val, $newFile);
						Dir::del($val);
						// Dir::del($old);
					}
				}
			}elseif(count($results[0]) == 1){
				//echo 1;
				$dir = explode("/",$results[1][0]);
				// p($dir);
				$newDir = $dir[0]."/ArticleImages/".$dir[2]."/".$dir[3]."/".$dir[4];
				$newFile = $newDir ."/". $dir[5];
				// $old = $dir[0]."/".$dir[1]."/".$dir[2];

				if(Dir::create($newDir)){
					copy($results[1][0],$newFile);
					Dir::del($results[1][0]);
					// Dir::del($old);
				}

			}else{
				$this->error('文章已经上传成功，但是内容图片可能不能正常显示，请返回编辑');
			}
			$data['details'] = str_replace('Temp','ArticleImages',$data['details']);

			if(isset($_FILES['thumb'])){
				$path = 'Upload/ArticleImages/'.date("Y/m/d");
				$upload = new Upload($path);
				$file = $upload->upload();
			}
			if($file){
				$data['thumb'] = $file[0]['path'];

				$data['create_time'] = time();
			}else{
				$this->error('图片上传不成功',U('addArticle'));
			}

			if(K('Article')->addArticle($data)){
				#die;
				$this->success("文章添加成功",U('articleList',array('p'=>1)));
			}else{
				$this->error('文章添加失败',U('addArticle'));
			}
		}

		if(!$cate = K('ArticleCate')->treeData()){
			$cate = 0;
		}
		$this->assign('cate',$cate);
		$this->display();
}

	//编辑文章
	public function edit(){
		$aid = isset($_GET['aid']) ? $_GET['aid'] : 0;
		if(!$aid){
			$this->error('请返回选择文章进行编辑处理',U('articleList'));
		}

		$data = K('Article')->getArticle($aid);

		if(!$cate = K('ArticleCate')->treeData()){
			$cate = 0;
		}
		$this->assign('cate',$cate);
		$this->assign('data',$data);
		$this->display();
	}
	//异步上传图片
	public function ajaxArticlePic(){
		// if(!IS_AJAX) return;
		$temp = 'Upload/Temp/'.date("Y/m/d");

		if(!is_dir($temp)){
			Dir::create($temp);
		}
		// p($_FILES);die;#filename
		if(isset($_FILES['file'])){
			$upload = new Upload($temp);
			$files = $upload->upload();
			if($files){
				echo $files[0]['path'];
			}else{
				echo "错误";
			} 
		}
	}

	//ajax异步移动文章到回收站
	public function ajaxDel(){
		$aid = isset($_POST['aid']) ? $_POST['aid'] : 0;
		
		$ar = M('article')->where("aid='".$aid."'")->update(array('display'=>0));
		if($ar){
			$status = 1;
			$messages = "文章删除成功了";
			$arr = array('status' => $status, 'message' => $messages );

			echo json_encode($arr);
		}
		if(!$aid || !$ar){
			$status = 0;
			$messages = "请选择正确的文章进行操作";
			$arr = array('status' => $status, 'message' => $messages );

			echo json_encode($arr);
		}

	}
	
}
?>