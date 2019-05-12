<?php
require '../../common/Manager.php';

    $receiver=$_POST['receiver'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $sender=$_SESSION['username'];


    require '../../db/MysqlConn.php';
    $db2=MysqlConn::getInstance();
    $result= $db2->returnQuery("select * from user where username='$sender'");
    if($result){
        $row = $result->fetch_array();
        $sender=new mailManager($row['QQ'],$row['EmailPassword'],$receiver,$title,$content);
        //echo $row['QQ']." ".$row['EmailPassword'];
        $stat=$sender->sendMail();
        if($stat){
           // $time=time();
            $id=$row["id"];
            $query="INSERT INTO email_record (user_id,receiver,title,content,date) VALUES ($id,'$receiver','$title','$content',NOW())";
            $result1=$db2->voidQuery($query);
       }
        header("Location:http://localhost/phpbasic/core/view/mailForm.php?statue=1");
    }else{
        header("Location:http://localhost/phpbasic/core/view/mailForm.php?statue=0");
    }



