<?php
/**
* 路由处理类
*/
class Router
{
    private static $path;
    private static $SE_STRING;
    public static $ary_url;

    function __construct()
    {
        self::$path = 'http://'. $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];
        self::$path = str_replace('\\', '/', self::$path);
        self::$SE_STRING=str_replace(self::$path, '', $_SERVER['REQUEST_URI']);    //计算出index.php后面的字段 index.php/controller/methon/id/3
        self::$SE_STRING=trim(self::$SE_STRING,'/');
        // echo $SE_STRING.'<br>';die;
        //这里需要对$SE_STRING进行过滤处理。
        self::$ary_url=array(
                'module'    => 'index',
                'controller'=> 'index',
                'method'    => 'index',
                'pramers'   => array()
            );
    }

    public static function pauseUrl(){
        //var_dump($this->ary_url);
        $ary_se=explode('/', self::$SE_STRING);
        $se_count=count($ary_se);

        //路由控制
        if($se_count==1 and $ary_se[0]!='' ){
            self::$ary_url['module']=$ary_se[0];

        }else if($se_count == 2 && $ary_se[0]!='' && $ary_se[1]!=''){
            self::$ary_url['module']=$ary_se[0];
            self::$ary_url['controller']=$ary_se[1];
        }else if($se_count>2){//计算后面的参数，key-value
            self::$ary_url['module']=$ary_se[0];
            self::$ary_url['controller']=$ary_se[1];
            self::$ary_url['method']=$ary_se[2];
            if($se_count>3 and ($se_count + 1)%2!=0){ //没有形成key-value形式
                die('url参数错误');
            }else{
                for($i=3;$i < $se_count;$i=$i+2){
                    $ary_kv_hash=array(strtolower($ary_se[$i])=>$ary_se[$i+1]);
                    self::$ary_url['pramers']=array_merge(self::$ary_url['pramers'],$ary_kv_hash);
                }
            }
        }

        return $this->ary_url;
    }

    public static function getPramers(){
        return $this->ary_url['pramers'];
    }
}
    


?>