<?php
namespace Lib;
use Lib;
use config\db_config;
require_once __DIR__ .'/../config/db_config.php';
class mydb {
    private $db;
    public function __construct() {
        $dsn= db_config::$DB_TYPE.":host=".db_config::$DB_ADDRESS.";dbname=".db_config::$DB_NAME;
        $username=db_config::$DB_USER;
        $password= db_config::$DB_PASSWORD;
        try {
            $this->db=new \PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            die ("Error!: " );
        }
    }
    public  function exec($param) {
        return $this->db->exec($param);
    }
    public  function qurey($param) {
        $res=$this->db->query($param);
        return $res->fetchAll();
    }
}