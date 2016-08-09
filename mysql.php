<?php
class sql{
	public function sql_conn(){
		if(mysql_connect('localhost','root','wildpen')!=FALSE){
		mysql_select_db('mesboard');
		mysql_query("set names 'utf8'");

		return TRUE;
		}	
		else {
			echo "mysql connect error!";
			return FALSE;
		}
	}
	
	public function sql_add(){
		$this->sql_conn();
		if($_POST['submit']){ 
		mysql_query("INSERT INTO message(id,username,word,time_at) VALUES(NULL, '$_POST[username]', '$_POST[word]', NOW())");
			//echo 'Add OK!';
		}
	}
	
	public function sql_del(){
		$this->sql_conn();	
		$id = $_GET['id'];
		mysql_query("DELETE FROM message WHERE id=$id");
	}
	
	public function sql_edit(){
		$this->sql_conn();	
		$id = $_POST['id'];
		mysql_query("UPDATE message SET username='$_POST[username]',word='$_POST[word]',time_at=NOW() WHERE id=$id");
	
	}
}

		$db=new sql();
?>