<?php
use Utils\Contains;

require_once __DIR__ . '/../Utils/Contains.php';
//        $con->send(json_encode(array("type"=> Contains::$LOGIN,"id","pwd")));
//        $con->send();
error_reporting(E_ALL);
set_time_limit(0);
echo "<h2>TCP/IP Connection</h2>\n";

$port = 2345;
$ip = "192.168.31.174";

/*
 +-------------------------------
 *    @socket连接整个过程
 +-------------------------------
 *    @socket_create
 *    @socket_connect
 *    @socket_write
 *    @socket_read
 *    @socket_close
 +--------------------------------
 */

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
}else {
    echo "OK.\n";
}
$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
}else {
    echo "connect success\n";
}
$in=json_encode(array("type"=> Contains::$LOGIN,"id"=>"JspStudy","pwd"=>"JspStudy"));
if(!socket_write($socket, $in, strlen($in))) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
}else {
    echo "send success";
}

while($out = socket_read($socket, 8192)) {
    echo $out;
}
socket_close($socket);

?>