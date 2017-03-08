<?php
use Workerman\Worker;
use Utils\Analyze;
use Utils\UserUtils;
require_once __DIR__ . '/Workerman/Autoloader.php';
require_once __DIR__ . '/Utils/Analyze.php';
require_once __DIR__ . '/Utils/UserUtils.php';
// 创建一个Worker监听2345端口，使用http协议通讯
$http_worker = new Worker("tcp://0.0.0.0:2345");
// 启动4个进程对外提供服务
$http_worker->count = 4;
$http_worker->connections= array();
Analyze::$LOGIN= function ($d,$conn){
    global $http_worker;
    
    $res=UserUtils::Create($d);
     $conn->send($res);
    print_r(UserUtils::getALL());
    $res= (array)json_decode($res);
    if($res["code"]==200){
    $http_worker->connections[$res["userId"]]=$conn;
    }
   
};
// 接收到浏览器发送的数据时回复hello world给浏览器
$http_worker->onMessage = function($connection, $data)    
{ 
    $res=Analyze::deal($data,$connection);
};
// 运行worker
Worker::runAll();