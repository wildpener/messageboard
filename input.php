<?php
include 'mysql.php';
?>
	<div style="width:100%;text-align:center">
	<FORM name="addForm" METHOD="POST" ACTION="input.php" > 
	用户：<INPUT TYPE="text" NAME="username" SIZE="28"/><br /> 
	内容：<TEXTAREA NAME="word" ROWS="8" COLS="30"></TEXTAREA><br /> 
	<INPUT TYPE="submit" name="submit" value="留言" /></FORM> 
	</div>
	<style>
	body{
		background-image:url(背景3.jpg);
		background-size:100%;
	    background-repeat:no-repeat;	
	}
	div.text a{
		text-decoration:none;
	}
	</style>
	
	<body>
	<div class='text'>
	<h1 align="center"><a href="view.php?p=1&time=<?=time()?>">查看留言</a ></h1><br></div>
	</body>
<?php
$db->sql_add();
?>