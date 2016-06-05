<?php

class Database
{

    public $query;

    

    private static $instance;

    private function __construct ()
    {
        
    }

    private function __clone ()
    {}

    public static function getInstance ()
    {
        if (null === self::$instance) {
            self::$instance = new PDO(
                'mysql://hostname=' . HOSTNAME . ';dbname=' . DBNAME, DBUSER, 
                DBPASS, array(
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ));
        }
        return self::$instance;
    }
    
    public function query($sqlStmt, $resultType = false, $className = false)
    {
        $result = $this->con->query($sqlStmt);
        
        if($resultType == 'object') {
            return $result->fetchAll(PDO::FETCH_OBJ);
        } elseif($resultType == 'class') {
            return $result->fetchAll(PDO::FETCH_CLASS, $className);
        }
    }
}