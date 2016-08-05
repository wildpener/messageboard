<?php
include 'mysql.php';

$db->sql_conn();

$id=$_GET[id]; 
$query="SELECT * FROM message WHERE id =$id"; 
$result=mysql_query($query); 
$change=mysql_fetch_array($result);
?>

<FORM METHOD="POST" ACTION="edit_ok.php"> 
<input type="hidden" name="id" value="<?=$change[id]?>"> 
用户<INPUT TYPE="text" NAME="username" value="<?=$change[username]?>"/><br /> 
内容<TEXTAREA NAME="word" ROWS="8" COLS="30"><?=$change[word]?></TEXTAREA><br />
<INPUT TYPE="submit" name="submit" value="保存"/> 
</FORM> 

