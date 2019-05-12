<?php
$imgnames = $_FILES['codeFile']['name'];
$tmps = $_FILES['codeFile']['tmp_name'];
$number=(int)$_POST['number'];
$filepath="../../Resource/code/";
$i=0;
for($i=0;$i<$number;$i++){
    if(move_uploaded_file($tmps[$i],$filepath.$imgnames[$i])){
        echo "上传成功";
    }else{
        echo "上传失败";
    }
}
header("Location:http://localhost/phpbasic/core/view/codeForm.php?statue=1");
?>
