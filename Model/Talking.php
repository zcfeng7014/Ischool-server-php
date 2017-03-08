<?php
namespace Model;
require_once __DIR__."/../Lib/mydb.php";
use Lib\mydb;
use Model;
class Talking {
    //put your code here
    public $question;
    public $description;
    public $date;   //发起时间
    public $roomid;
    function __construct($data) {
        $this->question=$data["question"];
        $this->date=$data["date"];
        $this->roomid=$data["roomid"];
        $this->description=$data["description"];
    }
}
