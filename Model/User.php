<?php
namespace Model;
require_once __DIR__."/../Lib/mydb.php";
require_once __DIR__."/../Utils/Contains.php";
require_once __DIR__."/../Utils/RongUtils.php";
use Lib\mydb;
use Utils\RongUtils;
use Model;
use Utils\Contains;
class User{
    private static $db=null;
    public $id;
    public $pwd;
    
    public function __construct($array) {
        $this->id=$array['id'];
         $this->pwd=$array['pwd'];
    }
    public function getkey(){
        if(self::$db==null)
            self::$db =new mydb();
        $sql="select * from users where username='".$this->id."'and password = '".$this->pwd."';";
        $dd=self::$db->qurey($sql);
      if(count($dd)){
         return RongUtils::get($dd[0]['username']);
      }
      return json_encode(array("code"=> Contains::$LOGIN_FAILD,"message"=>"用户名或者密码错误"));
    }
    public function jion(){
        if(self::$db==null)
            self::$db =new mydb();
        $sql="insert into users(username,password) values('".$this->id."','".$this->pwd."');";
        $dd=self::$db->exec($sql);
    }
    public function changepwd($pwd) {
//         if(self::$db==null)
//            self::$db =new mydb();
//        $sql="insert into users(username,password) values('".$this->id."','".$this->pwd."');";
//        $dd=self::$db->exec($sql);
    }
}