<?php
require '../db/MysqlConn.php';
//登录

//if(!isset($_POST['submit'])){
//    exit('非法访问!');
//}

$username = $_POST['username'];
$password = $_POST['password'];

$connector=new MysqlConn();
$result=$connector->returnQuery("select * from user where username='$username'");
$row = $result->fetch_assoc();
if($password===$row['password']){
    session_start();//开启session
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['createTime'] = time();
    header("Location:../index.php");
}else{
    header("Location:../index.php?error=1");
}

