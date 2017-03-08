<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Utils;
require_once __DIR__."/../Model/Request.php";
use Model\Request;
/**
 * Description of RequstUtils
 *
 * @author Administrator
 */
class RequstUtils {
    //put your code here
    private static $Requst_array=Array();
     public static function Create($data) {
        $roomid= rand(0, 999999);
        if(array_key_exists($roomid, (array)self::$Requst_array))
                    return self::Create();
        $data["requestID"]=$roomid;
        $data["date"]= date("y-m-d h:i:s");
        $temp=new Request($data);
        self::$Requst_array[$roomid]=$temp;
        return $roomid;
    }
    public static function getALL() {
        return json_encode(self::$Requst_array);
    }
    public static function Remove($requestID) {
        unset(self::$Requst_array[$requestID]); 
    }
}