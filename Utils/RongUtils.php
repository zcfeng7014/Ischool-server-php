<?php
namespace Utils;
use config\rong_config;
require_once __DIR__."/../API/rongcloud.php";
require_once __DIR__ .'/../config/rong_config.php';
class RongUtils {
    private static $rong=null;
    public static function get($param) {
        if(self::$rong==null)
            self::$rong=new \RongCloud(rong_config::$appKey, rong_config::$appSecret);
        $result = self::$rong->user()->getToken($param, 'username', 'http://www.rongcloud.cn/images/logo.png');
        return $result;
    }
}
