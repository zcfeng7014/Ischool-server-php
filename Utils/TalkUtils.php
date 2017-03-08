<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Utils;
require_once __DIR__."/../Model/Talking.php";
/**
 * Description of TalkUtils
 *
 * @author Administrator
 */
class TalkUtils {
    //put your code here
     private static $room_array=Array();
     public static function Create($data) {
        $roomid= rand(0, 999999);
        if(array_key_exists($roomid, (array)self::$room_array))
                    return self::Create();
        $data["roomid"]=$roomid;
        $temp=new \Model\Talking($data);
        self::$room_array[$roomid]=$temp;
        return $roomid;
    }
    public static function getALL() {
        return json_encode(self::$room_array);
    }
    public static function Remove($roomid) {
        unset(self::$room_array[$roomid]); 
    }
}