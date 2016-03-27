<?php
/**
* 内容查看控制器
*/
class ViewController extends AuthorController{
	
	public function article(){
		$aid = isset($_GET['aid']) ? $_GET['aid'] : 0;
		$uid = isset($_SESSION['gz_userid'])?$_SESSION['gz_userid']:0;
		K('Article')->saveHits($aid);
		if($rep = K('Reply')->selectReply($aid)){
			$rep = $rep;
		}else{
			$rep =0;
		}
		$this->assign('article',K('Article')->getArticle($aid));
		$this->assign('rep',$rep);
		$this->assign('uid',$uid);
		$this->v();
	}

	//处理文章评论
	public function addReply(){
		// p($_POST);

		if(IS_POST){
			if($_POST['go']){
				$data = array(
					'aid'	=> $_POST['aid'],
					'uid'	=> $_POST['uid'],
					'rcontent' => $_POST['rcontent'],
					'create_time' => time()
				);

				if(K('Reply')->addReply($data)){
					$this->success('评论成功,正在跳转至文章页面...',U('Index/view/article',array('aid'=>$data['aid'])));
				}else{
					$this->error('评论失败...',U('Index/view/article'));
				}
			}
		}
	}

	//ajax点赞
	public function ajaxzan(){
		// p($_POST);
		$rid = $_POST['rid'];
		$uid = isset($_SESSION['userid']) ? $_SESSION['userid'] :0;
		if($zan = K('Zan')->saveZan($uid,$rid,3)){
			echo json_encode(array('zan'=>$zan['zan']));
		}else{
			echo 0;
		}
	}
}
?>