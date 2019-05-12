<?php
/**
 * Created by PhpStorm.
 * User: 27751
 * Date: 2019/4/10
 * Time: 17:36
 */
require 'errorDealConfig.php';
$errorInfo=$_GET['error'];
echo "sth bad happen,click here to ";
$redicLocation='../../'.$errorDealer[$errorInfo];
?>
<a href="<?=$redicLocation?>">here</a>