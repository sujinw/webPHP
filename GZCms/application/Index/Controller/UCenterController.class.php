<?php 
/**
* 用户中心
*/
class UCenterController extends ValiloginController{

	public function index(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);
		$info = K('User')->getInfoById($uid);

		$this->assign('uid',$uid);
		$this->assign('info',$info);

		$this->v();
	}

	public function uc(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);

		$data = K('User')->userCenter($uid);
		// p($data);

		$this->assign('uid',$uid);
		$this->assign('data',$data);
		$this->v();
	}

	public function alist(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);

		$data = K('User')->userCenter($uid);
		if($data){
			$this->assign('data',$data);
		}else{
			$this->assign('data',0);
		}
		$this->assign('uid',$uid);
		$this->v();
	}
	//成为作者
	public function mkauthor(){
		
		if(IS_AJAX){
			$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
			$uid = $this->vali($uid);
			if(M('user')->where("id='".$uid."'")->update(array('is_author'=>1))){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	//验证权限
	public function vali($uid){
		$arr = explode('?',$uid);
		#p($arr);
		if(count($arr) > 1){
			$uid = $arr[0];
		}
		#p($uid);
		if($uid != $_SESSION['userid']){
			$this->error('您没有权限查看此页面...',U('Index/ucenter/index',array('uid'=>$_SESSION['userid'])));
		}else{
			return $uid;
		}
	}

	//投稿
	public function tougao(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);
		$isAuthor = K('User')->isAuthor($uid);
		if($isAuthor){
			$a = 1;
		}else{
			$a = 0;
		}
		if(!$cate = K('ArticleCate')->treeData()){
			$cate = 0;
		}
		$this->assign('cate',$cate);
		$this->assign('uid',$uid);
		$this->assign('isauthor',$a);
		$this->v();
	}

	//ajax处理图片上传
	public function ajaxImages(){
		$temp = 'Upload/Temp/'.date("Y/m/d");

		if(!is_dir($temp)){
			Dir::create($temp);
		}
		 #p($_FILES);die;#filename
		if(isset($_FILES['wangEditorH5File'])){
			$upload = new Upload($temp);
			$files = $upload->upload();
			if($files){
				echo $files[0]['path'];
			}else{
				echo "错误";
			}
		}
	}

	//处理投稿内容
	public function addArticle(){
		if(IS_POST){
			if(empty($_POST['title']) || empty(strip_tags($_POST['details'],'<img>'))){
				$this->error("文章内容或标题不能为空",U('addArticle'));
			}
			 #p($_FILES);die;
			$data = array(
				'title' 	=> $_POST['title'],
				'source'	=> $_POST['source'],
				'tags'		=> $_POST['tags'],
				'cid'		=> $_POST['cid'],
				#'digest'	=> $_POST['digest'],
				'display'	=> $_POST['display'],
				'excerpt'	=> isset($_POST['excerpt']) ? $_POST['excerpt'] : substr(strip_tags($_POST['details']),0,150),
				'details'	=> $_POST['details'],
				'author'	=> isset($_POST['author'])?$_POST['author']:$_SESSION['username'],
                'uid'       => $_POST['uid']
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
						#p($val);
						copy($val, $newFile);
						Dir::del($val);
						// Dir::del($old);
					}
				}
			}elseif(count($results[0]) == 1){
//                    echo 1;
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
            #p($_FILES);die;
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
				$this->success("文章添加成功",U('ucenter/alist',array('p'=>1,'uid'=>$data['uid'])));
			}else{
				$this->error('文章添加失败',U('addArticle'));
			}
		}
	}
	//发件箱
	public function mailcompose(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);
		$user = M('user')->field(array('username','id','nickname'))->where("id='".$uid."'")->one();

		if(IS_POST){
			p($_POST);
			if(empty($_POST['to_uid']) || empty($_POST['title']) || empty($_POST['content'])){
				$this->error('必填项不能为空。。。',U('mailcompose',array('uid'=>$uid)));
			}
			$tuser = M('user')->field(array('username','id','nickname'))->where("id='".$_POST['to_uid']."'")->one();
			$data = array();
			$sdata=array();
			$sdata['date'] = time();
			$sdata['from_uid']=$user['id'];
			$sdata['from_username']=$user['username'];
			$sdata['from_nickname']=$user['nickname'];
			$sdata['title']=$_POST['title'];
			$sdata['content']=$_POST['content'];
			$data['to_uid']=$tuser['id'];
			$data['to_username']=$tuser['username'];
			$data['to_nickname']=$tuser['nickname'];

			if(K('Message')->sendMessage($sdata,$data)){
				$this->success('信息发送成功了',U('mail'));
			}else{
				$this->error('发送失败',U('mailcompose',array('uid'=>$uid)));
			}

		}
		$this->assign('uid',$uid);
		$this->v();
	}

	//收件箱
	public function mailbox(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);

		if($res=K('Message')->mailbox($uid)){
			$arr=array();
			foreach ($res as $v) {
				$v['date'] = dateaway($v['date']);
				$arr[]=$v;
			}
			$this->assign('messages',$arr);
		}else{
			$this->assign('messages',0);
		}



		$this->assign('uid',$uid);
		$this->v();
	}

	//阅读站内信
	public function maildetail(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$mid = isset($_GET['mid']) ? $_GET['mid'] : 0;
		$uid = $this->vali($uid);
		M('message_receiver')->where("mid='".$mid."'")->update(array('is_readed'=>1));
		$mes = M('message_sender')->where("mid='".$mid."'")->one();
		$mes['date'] = maildate($mes['date']);

		$mes['page'] = K('Message')->nextmess($mid,$uid);

		if($mes){
			$this->assign('mes',$mes);
		}else{
			$this->assign('mes',0);
		}

		$this->assign('uid',$uid);
		$this->assign('mid',$mid);

		$this->v();
	}

    //会员资料
    public function userDes(){
	    $uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
	    $uid = $this->vali($uid);

	    $data = K('User')->userCenter($uid);
	     #p($data);

	    $this->assign('uid',$uid);
	    $this->assign('data',$data);
        $this->v();
    }

	//会员评论留言
	public function userReply(){
		$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
		$uid = $this->vali($uid);
		$res = K('User')->userReply($uid);
		$arr = [];
		foreach($res as $v){
			$v['time'] = dateaway($v['create_time']);
			$arr[]=$v;
		}
		#p($arr);

		if($res){
			$this->assign('res',$arr);
		}else{
			$this->assign('res',0);
		}
		$this->v();
	}
}
?>