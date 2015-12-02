<?php
/**
 * 
 * @authors  rukic
 * @date    2015-04-03 20:20:56
 */

require_once 'ModelBase.class.php';
require_once DIR."/main/Dao/DaoArticle.class.php";
require_once DIR."/main/Dao/DaoReply.class.php";
class viewModel extends ModelBase {

    //执行逻辑
    public  function preform(){
        $aid = $this->result['params']['safe']['articleid'];
    	$DaoArticle = new DaoArticle();
    	$info = $DaoArticle->getArticleInfoById($aid);

        $DaoReply = new DaoReply();
        $replyList = $DaoReply->selectReplyByArticleId($aid);

        if (!empty($info)) {
            $arr = array(
                '`link`' => $info[0]['link'] + 1
            );
            $where = array(
                'id' => $aid
            );

            $DaoArticle->updateArticle($arr, $where);
        }

       if(!empty($info) && !empty($replyList)){
           $this->result['info']['article'] = $info;
           $this->result['info']['reply'] = $replyList;
        }

    }


	//检测参数
    public function checkparams(){

    }
}