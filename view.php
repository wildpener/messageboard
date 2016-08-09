<?php
	include 'mysql.php';
	
	$db->sql_conn();
	
	$page=$_GET['p'];
//	echo $page;
?>
	<!--<FORM name="addForm" METHOD="POST" ACTION="view.php" > 
	用户：<INPUT TYPE="text" NAME="username" /><br /> 
	内容：<TEXTAREA NAME="word" ROWS="8" COLS="30"></TEXTAREA><br /> 
	<INPUT TYPE="submit" name="submit" value="留言" /></FORM> -->
	

<html>
<style>

	body{
		background-image:url(背景5.jpg);
		background-size:100%;
	    background-repeat:no-repeat;	
	}

	div.page{
		text-align:center;
	}
	div.content{
		height:500;
	}
	div.tt a{
		text-decoration:none;
	}
	div.page a{
		border:#e0e0e0 1px solid;text-decoration:none;padding:2px 5px 2px 5px;margin:2px;
	}
	div.page span.current{
		border:#000099 1px solid;background-color:#000099;padding:5px 5px 5px 5px;margin:2px;color:#fff;font-weight:bold;
	}
	div.page span.disable{
		border:#eee 1px solid;padding:2px 5px 2px 5px;margin:2px;color:#ddd;
	}
	div.page form{
		display:inline;
	}
</style>
<body>	 

<?php	
	//设置页数
	$pagesize=5;
  //传入页码
	
	echo "<div class='content'>";
	
		$sql="SELECT * FROM message LIMIT ".($page-1)*$pagesize .",$pagesize";

	$query=mysql_query($sql);
	while($val=mysql_fetch_array($query)){
?>
		
<table width=500 border="0" align="center" cellpadding="$pagesize" cellspacing="1" bgcolor="#add3ef"> 		
		
<tr bgcolor="#eff3ff">
<td>用户：<font color="red"><?=$val[username] ?></font><div align="right"><a href="edit.php?id=<?=$val[id]?>">编辑</a>  |  <a href="delete.php?id=<?=$val[id]?>">删除</a></div></td> 
</tr> 
<tr bgColor="#ffffff"> 
<td>内容：<?=$val[word]?></td> 
</tr> 
<tr bgColor="#ffffff"> 
<td><div align="right">发表日期：<?=$val[time_at]?></div></td> 
</tr>
<?php	}
	?>
	
</table>
</div>
<div class='tt'>
<h1 align="center"><a href="input.php">继续留言</a ><br>
</div>
</body>
</html>

<?php

//获取总条数

$total_result=mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM message"));
$total=$total_result[0];
//计算页数
$total_pages=ceil($total/$pagesize);
//显示分页条
$page_banner="<div class='page'>";
if($page>1){
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
}
else{
	$page_banner.="<span class='disable'>首页</a></span>";
	$page_banner.="<span class='disable'><上一页</a></span>";
}

//显示页码数
$showpage=5;
//计算页面偏移量
$pageoffset=($showpage-1)/2;
//初始化数据
$start=1;
$end=$total_pages;
if($total_pages>$showpage){
	if($page>$pageoffset+1){
		$page_banner.="...";
	}
	
	if($page>$pageoffset){
		$start=$page - $pageoffset;
		$end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
	}
	else{
		$start=1;
		$end=$total_pages>$showpage?$showpage:$total_pages;
	}
	if($page+$pageoffset>$total_pages){
		$start=$start-($page + $pageoffset-$end);
	}
}

for($i=$start;$i<=$end;$i++){
	if($page==$i){
		$page_banner.="<span class='current'>{$i}</span>";
	}
	else{
		$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
	}
}

if($total_pages>$showpage&&$total_pages>$page+$pageoffset){
	$page_banner.="...";
	
}

if($page<$total_pages){
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
	$page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
}
else{
	$page_banner.="<span class='disable'>尾页</a></span>";
	$page_banner.="<span class='disable'>下一页></a></span>";
}

$page_banner.="共{$total_pages}页,";
$page_banner.="<form action='view.php' method='get'>";
$page_banner.="到第<input type='text' size='2' name='p'>页";
$page_banner.="<input type='submit' value='确定'>";
$page_banner.="</form></div>";
	echo $page_banner;
?>