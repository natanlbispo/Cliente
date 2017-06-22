<?php

namespace SABolsas\Database;

use PDO;
use Exception;

final class TConnection {
    private static $conn;
    
    private function __construct(){
        
    }
    
    public static function open()
    {
        if (empty(self::$conn)) {
            self::$conn = TConnection::newConnect();
        }
    }
    
    public static function get() {
        return self::$conn;
    }
    
    public static function close() {
        if (self::$conn) {
            self::$conn = NULL;
        }
    }
    
    public static function newConnect() {
        if (file_exists("App/Config/my_sabolsas.ini")) {
            $db = parse_ini_file("App/Config/my_sabolsas.ini");
        } else {
            throw new Exception("Arquivo my_sabolsas.ini não encontrado");
        }
        
        $user = isset($db['user']) ? $db['user'] : NULL;
        $pass = isset($db['pass']) ? $db['pass'] : NULL;
        $name = isset($db['name']) ? $db['name'] : NULL;
        $host = isset($db['host']) ? $db['host'] : NULL;
        $port = isset($db['port']) ? $db['port'] : NULL;
        
        $port = $port ? $port : '3306';
        $conn = new PDO("mysql:host={$host};port={$port};dbname={$name}", $user, $pass);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    
    
}