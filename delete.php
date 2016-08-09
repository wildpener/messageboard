<?php
include 'mysql.php';

$db->sql_del();

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=gbk" />
<body>
<font face="宋体" size="7">删除成功！</font><br>
<a href="view.php?p=1&time=<?=time()?>">点击这里返回</a >
</body>
</html>