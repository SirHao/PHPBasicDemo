<?php include "../../Resource/index.php";
require "../../common/Manager.php";
header("content-type:text/html;charset=utf-8"); ?>

    <div class="col-xs-12 col-sm-12 col-md-6 " id="scl">
        <form action="../action/mailSender.php" method="post" class="form-horizontal" role="form">
            <div class="form-group col-sm-12">
                <label for="email" class="col-sm-2 control-label">邮件</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="email" name="receiver">
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="title" class="col-sm-2 control-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="title" name="title" >
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label for="content" class="col-sm-2 control-label">文本框</label>
                <div class=" col-sm-10">
                    <textarea class="form-control" rows="13" name="content" placeholder="content" style="OVERFLOW:hidden"></textarea>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <label  class="col-sm-6 control-label"></label>
                <button class="btn btn-default control-label" type="submit">发送</button><div class="form-group col-sm-12">
                    <?php if(!empty($_GET['statue'])){
                        if($_GET['statue']==1) echo "邮件状态：<span>succcess！</span>";
                        else "邮件状态：<span>fail!请确保您绑定邮箱！</span>"."<a href='http://localhost/phpbasic/core/view/mailBind.php'>click here to bind</a>";
                    }?>
                </div>
                </div>
        </form>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6" id="record">
                <div v-for="item in record">
                    <div class="mdui-typo-display-1-opacity"><i class="mdui-icon material-icons">&#xe0be;</i>{{item.title}}</div>

                    <div class="mdui-chip">
                        <span class="mdui-chip-title">{{item.date}}</span>
                    </div>

                    <div class="mdui-chip">
                        <span class="mdui-chip-icon"><i class="mdui-icon material-icons">face</i></span>
                        <span class="mdui-chip-title">{{item.receiver}}</span>
                    </div>
                    <br>
                    <br>
                </div>
    </div>

<?php
require '../../db/MysqlConn.php';
$db2=MysqlConn::getInstance();
$username=$_SESSION['username'];
$owner=$db2->returnQuery("select * from user where username='$username'");
$row = $owner->fetch_array();
$id=$row['id'];
$articles=$db2->returnQuery("select * from email_record where user_id=$id");
$row=$articles->fetch_all(MYSQLI_BOTH);
$article_array=array();
$n=0;
while($n<mysqli_num_rows($articles)){
    //echo "接收者".$row[$n]["receiver"]."标题".$row[$n]["title"]."内容".$row[$n]["content"]."日期".$row[$n]['date']."<br/>";
    $article_array[$n]["receiver"]=$row[$n]["receiver"];
    $article_array[$n]["title"]=$row[$n]["title"];
    $article_array[$n]['content']=$row[$n]["content"];
    $article_array[$n]['date']=$row[$n]["date"];
    $n++;
}
$jsona=json_encode($article_array);
//echo $jsona;
?>

</body>

<script>
    var app=new Vue({
        el:"#record",
        data:{
            record:<?= $jsona?>
        }

    })
</script>
</html>