<?php include "../../Resource/index.php";
require "../../common/Manager.php";
header("content-type:text/html;charset=utf-8"); ?>
<div id="app1" class="col-xs-12 col-sm-12 col-md-6 ">

    <button type="button" @click="addnode()"  class="btn btn-success">添加</button>
    <button type="button" @click="deletenode()"  class="btn btn-danger">删除</button>
    <form action="../action/codeUpLoader.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <p>{{message}}</p>
        <input type="text" id="number" name="number" v-model="message" onfocus=this.blur()>
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
                }?></div>
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


