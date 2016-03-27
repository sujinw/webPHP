<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/27
 * Time: 20:23
 */

/**
 * Class Images验证上传文件夹下的文件是否全是在数据库，多余的删除
 */
class Images{
    public static function main($filsname, $table,$fielName){
        //获取数据库中所有的图片信息
        return self::valiData($filsname, $table,$fielName);
    }

    public static function valiData($filsname = null, $table = null,$fieldName = array()){
        if( is_null($filsname) || is_null($table) || count($fieldName)){
            //实例化表
            $res = M($table)->field($fieldName)->all();
            #p($res);
            //正则匹配Upload/ArticleImages/2016/02/02/68171454417342.jpg
            $images = [];
            $file = "/".str_replace("/","\/",$filsname)."/";
            #p($file);
            foreach($res as $key => $val){
                foreach($val as $v){
                    #p($v);
                    preg_match($file,$v,$matches);
                    #p($matches);
                    $images[] = $matches;
                }
            }

           if(count($images) || !empty($images)){
                return true;
           }else{
               return false;
           }
        }
    }
}