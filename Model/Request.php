<?php
namespace Model;

class Request {
    //put your code here
    public $requestID;
    public $sponsor;//发起者ID
    public $date;   //发起时间
    public $content;
    public $place;
    function __construct($data) {
        $this->requestID=$data["requestID"];
        $this->sponsor=$data["sponsor"];
        $this->content=$data["content"];
        $this->date=$data["date"];
        $this->place=$data["place"];
    }
}
