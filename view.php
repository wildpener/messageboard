<?php
	include 'mysql.php';

	
?>
	<FORM name="addForm" METHOD="POST" ACTION="view.php" > 
	用户：<INPUT TYPE="text" NAME="username" /><br /> 
	内容：<TEXTAREA NAME="word" ROWS="8" COLS="30"></TEXTAREA><br /> 
	<INPUT TYPE="submit" name="submit" value="留言" /></FORM> 
	

	 

<?php	

		$db->sql_add();
	$query=mysql_query("SELECT * FROM message ORDER BY id");
	while($val=mysql_fetch_array($query)){
?>
		
<table width=500 border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#add3ef"> 		
		
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
	
