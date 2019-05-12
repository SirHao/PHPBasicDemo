<?php
//$a="1,111111,2,13,12";
//$b="1,1,2,13,12";
////echo "done";
//exec('python a.py '.$a.' '.$b,$out,$res);
//print_r($out);
$list=scandir("./");
//echo $list;
$counter=count($list);
for($i=0;$i<$counter;$i=$i+1){
    echo "<pre>";
    echo $list[$i];
}
echo "<pre>";print_r($list);//echo "<pre>";

$pyList=glob("./Resource/code/*.py");
print_r($pyList);
?>