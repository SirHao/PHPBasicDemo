<?php
session_start();
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");

echo BASE_PATH;
if(empty($_SESSION['username']) or time()-$_SESSION['createTime']>3000){
    header("Location:http://localhost/phpbasic/common/error/error.php?error=loginNeed");
    exit();
}