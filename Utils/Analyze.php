<?php
namespace Utils;
require_once __DIR__ ."\Contains.php";
require_once __DIR__ ."\RequestUtils.php";
require_once __DIR__ ."\RongUtils.php";
require_once __DIR__ ."\UserUtils.php";
require_once __DIR__ ."\TalkUtils.php";
use Utils\UserUtils;
use Lib;
class Analyze {
    public static $LOGIN=null;
    public static $PUSH=null;
    public static $GET=null;
    public static $REGIST=null;
    public static $OUT=null;
    
    public static function deal($d,$conn) {

    $data= json_decode($d,true); 
        if($data['type']==null)
             return Array("code"=>400,"message"=>"指令错误");
        if(!UserUtils::islogged($data)){
             switch ($data['type']) {
            case Contains::$LOGIN:
                
               //回调自定义函数
                 return  call_user_func(self::$LOGIN, $d,$conn);
            case Contains::$REGIST:
                
                return  call_user_func($this->REGIST, $d,$conn);
            default:
                 return Array("code"=>401,"message"=>"请先登录");
         }
        }
        else
        switch ($data['type']) {
            case Contains::$PUSH:
                 call_user_func($this->PUSH, $d);
                 return;
            case Contains::$GET:
                 call_user_func($this->GET, $d);
                 return;
             case Contains::$OUT:
                 call_user_func($this->OUT, $d);
                return;
            default:
                 return Array("code"=>404);
         }
    }
}
