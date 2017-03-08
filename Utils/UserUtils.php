<?php
namespace Utils;
require_once __DIR__."/../Model/User.php";
require_once __DIR__."/../Utils/Contains.php";

use Model\User;
use Utils\Contains;
/**
 * Description of UserUtils
 *
 * @author Administrator
 */
class UserUtils {
    //put your code here
    //put your code here
     private static $user_array=Array();
     public static function Create($data) {
        
       $user=new User((Array)json_decode($data));
       $res=$user->getkey();
      
       $res= (Array)json_decode($res);
       if($res["code"]!= Contains::$LOGIN_FAILD){
           self::$user_array[$user->id]=$user;
       }
       return json_encode($res);
    }
    public static function islogged($param) {
        if(isset($param["userid"]))
        if(self::$user_array[$param["userid"]]==null)
            return true;
        else
            return false;
    }
    public static function getALL() {
        return self::$user_array;
    }
    public static function Remove($roomid) {
        unset(self::$user_array[$roomid]); 
    }
}
