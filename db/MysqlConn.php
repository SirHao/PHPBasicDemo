<?php
/**
 * Created by PhpStorm.
 * User: 27751
 * Date: 2019/4/10
 * Time: 16:23
 */
class MysqlConn{

    private $connectConfig=array(
        'host' =>'localhost',
        'port'=>'3306',
        'db' =>'localhost',
        'db_user' =>'root',
        'db_psw' =>'991002',
        'db_name' =>'phpdb'
    );
    private $conn;
    private static $instance;
    public function __construct()
    {
        $this->conn = new mysqli($this->connectConfig['host'],
                                $this->connectConfig['db_user'],
                                $this->connectConfig['db_psw'],
                                $this->connectConfig['db_name']);
        if ($this->conn->connect_error) {
            die("连接失败: " . $this->conn->connect_error);
        }
    }

    public function returnQuery($sqlQuery){
        $reult=$this->conn->query($sqlQuery);
        return $reult;
    }

    public function voidQuery($sqlQuery){
        if ($this->conn->query($sqlQuery) === TRUE){
            return TRUE;
        }
        else
            return FALSE;
    }
    public static function getInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance= new self();
        }
        return self::$instance;
    }

}
?>



