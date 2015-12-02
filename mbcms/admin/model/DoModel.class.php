<?php
/**
 * 
 * @authors rukic
 * @date    2015-03-21 16:18:28
 */

require_once '/../main/model/ModelBase.class.php';
require_once '/../main/lib/uploadedFile.class.php';
require_once '/../main/Dao/DaoArticle.class.php';
require_once '/../main/Dao/DaoUser.class.php';
require_once './Dao/DaoFenlei.class.php';

class DoModel extends ModelBase {
	
    //执行逻辑
    public function preform(){
        $uploadFile = new FileUpload();
        $uploadFile -> set("maxsize", 2000000);
        $uploadFile -> set("allowtype", array("gif", "png", "jpg","jpeg"));
        $uploadFile -> set("israndname", true);


        if($this->params['safe']['type'] == "addArticle"){
            $path = "../uploadfile/article/".$this->params['safe']['fenlei_id']."/";
            $uploadFile -> set("path", $path);

            if($uploadFile -> upload('fm_img')){
                $data = array(
                    'uid' => 1,
                    'title' =>  $this->params['safe']['title'],
                    'contents' => $this->params['safe']['contents'],
                    'fenlei_id' => $this->params['safe']['fenlei_id'],
                    'fm_img' => $path.$uploadFile->getFileName(),
                    'time' => time()
                );
                $DaoArticle = new DaoArticle();
                $DaoArticle -> insertArticle($data);
            }else {
                //获取上传失败以后的错误提示
                throw new Exception('error_file_upload',$uploadFile->getErrorMsg());
            }
        }elseif($this->params['safe']['type'] == "addUser"){
            $path = "../uploadfile/user_img/".$this->params['safe']['user_name']."/";
            $uploadFile -> set("path", $path);

 
            if($uploadFile -> upload('user_img')){
                $data = array(
                    'user_name' => $this->params['safe']['user_name'],
                    'user_nickname' => $this->params['safe']['user_nickname'],
                    'user_password' => md5($this->params['safe']['password']),
                    'user_qm' =>"这家伙还没写签名呢！",
                    'user_img' =>$path.$uploadFile->getFileName(),
                    'user_inTime' =>time() 
                );
                $DaoUser = new DaoUser();
                $DaoUser->addUser($data);
            }else{
                 //获取上传失败以后的错误提示
                throw new Exception('error_file_upload',$uploadFile->getErrorMsg());
            }
        }elseif($this->params['safe']['type'] == "addfenlei"){
            $path = "../uploadfile/Fenlei/";
            $uploadFile -> set("path", $path);
            if($uploadFile -> upload('fenlei_img')){
                $data = array(
                    'name' => $this->params['safe']['name'],
                    'time' => time(),
                    'fenlei_img' => $path.$uploadFile->getFileName()
                );
                $DaoFenlei = new DaoFenlei();
                $DaoFenlei -> addFenlei($data);
            }
        }

    }

    //检测参数
    public function checkparams(){
    	if(empty($this->user_info)){
            throw new Exception("error_name", 1);
            
        }

    }
}