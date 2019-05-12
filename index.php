<?php include "Resource/index.php"?>

<div class="mdui-container" style="position: absolute;left: 80%;top: 600px" >
    <button class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-fab" mdui-dialog="{target: '#example-1'}"
            style="background-color: #ff4834;font-size: small ;color: #c7ddef" id="draggable">login</button>

    <div class="mdui-dialog" id="example-1" style="width: 300px;">
        <div class="mdui-dialog-title">Are you sure?</div>
        <div class="mdui-dialog-content">
            <form class="form-horizontal" action="userManage/login_process.php" method="post">
                <fieldset>

                    <div class="control-group">
                        <label class="control-label" for="input01">用户名</label>
                        <div class="controls">
                            <input type="text" placeholder="placeholder" class="input-xlarge" name="username">
                            <p class="help-block"请输入用户名</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">密码</label>
                        <div class="controls">
                            <input type="password" placeholder="placeholder" name="password" class="input-xlarge search-query">
                            <p class="help-block">请输入密码</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button class="btn" type="submit">登陆</button>
                            <?php
                            if(!Empty($_GET['error']) and $_GET['error']==1){
                                echo "<span>wrong!</span>";}?>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="mdui-dialog-actions">
            <button class="mdui-btn mdui-ripple" mdui-dialog-close>cancel</button>
            <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>erase</button>
        </div>
    </div>
</div>

<div id="app1" class="col-xs-12 col-sm-12 col-md-6 ">
    <p>{{message}}</p>
    <button type="button" @click="addnode()"  class="btn btn-warning">添加</button>
    <button type="button" @click="deletenode()"  class="btn btn-warning">删除</button>
    <form action="../action/codeUpLoader.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div v-for="n in message" class="form-group col-sm-10">
            <label for="codeFile" class="col-sm-2 control-label">代码文件</label>
            <div class="col-sm-10">
                <input type="file" class="file"  id="codeFile" name="codeFile[]">
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label  class="col-sm-6 control-label"></label>
            <button class="btn btn-default control-label" type="submit">发送</button><div class="form-group col-sm-12">
                <?php if(!empty($_GET['statue'])){
                    if($_GET['statue']==1) echo "上传状态：<span>succcess！</span>";
                    else "上传失败<span>请重试</span>";
                }?>

            </div>
    </form>
</div>

<script>
    new Vue({
        el: '#app1',
        data:{
            message:1
        },
        methods:{
            addnode:function(){
                this.message=this.message+1;
            },
            deletenode:function(){
                if(this.message>1){
                    this.message=this.message-1;
                }
            }
        }
    })
</script>


</body>
</html>