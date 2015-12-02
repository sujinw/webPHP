<?php
/**
 * 
 * @authors Black
 * @date    2015-03-21 16:18:28
 */

require_once 'ActionBase.class.php';
require_once ADMINDIR . "/model/DoModel.class.php";
require_once ADMINDIR . "/Dao/DaoAdminUser.class.php";

class DoAction extends ActionBase {
	
    public function action(){
    	//页面展示
    	$IndexModel = new DoModel();
    	$result = $IndexModel->getResult($this->user_info);

        if($result['code'] == 1 && $result['error_msg'] == 'error_name'){
            $this->checkLogin();
            exit;
        }

        $this->tpl->assign($result);
        if($result['params']['safe']['type'] == 'websitesitting'){
       	    $filesname = "websitesitting.txt";
        
             $data []= array(
        		'webtitle' => $result['params']['safe']['webtitle'], 
        		'weblogo' => $result['params']['safe']['weblogo'],
        		'webseo' => $result['params']['safe']['webseo'],
        		'webdes' => $result['params']['safe']['webdes'],
        		'webcopyright' => $result['params']['safe']['webcopyright']
        		);

    	    if(file_put_contents($filesname,serialize($data))){
    		  $this->tpl->assign("succ","保存成功，3秒后进行跳转<a href='index.php?action=WebsiteSitting'>返回</a>");
    		  $this->tpl->assign("url","index.php?action=WebsiteSitting");

    	    }
        }else if($result['params']['safe']['type'] == 'getAdminUser'){
            $DaoAdminUser = new DaoAdminUser();
        }else if($result['params']['safe']['type'] == 'addArticle'){
            if(empty($result['error_msg'])){
                $this->tpl->assign("succ","保存成功，3秒后进行跳转<a href='index.php?action=addArticle'>继续添加</a>");
                $this->tpl->assign("url","index.php?action=articleList");
            }
        }else if($result['params']['safe']['type'] == 'addUser'){
            if(empty($result['error_msg'])){
                $this->tpl->assign("succ","保存成功，3秒后进行跳转|<a href='index.php?action=addArticle'>继续添加</a>");
                $this->tpl->assign("url","index.php?action=articleList");
            }
        }else if($result['params']['safe']['type'] == 'addfenlei'){
            print_r($result);
            if(empty($result['error_msg'])){
                $this->tpl->assign("succ","保存成功，3秒后进行跳转|<a href='index.php?action=addFenlei'>继续添加</a>");
                $this->tpl->assign("url","index.php?action=FenleiList");
            }

        }

        $this->tpl->assign('admin_name',$this->user_info['admin_name']);
        
    	$this->tpl->display('succ.tpl');
    }
}