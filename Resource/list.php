<html>
<head><title>To Do List</title></head>
<body>
	<? 
		$con = mysql_connect("localhost", "phpuser","some_pass") or die(mysql_error());
		mysql_select_db("ToDoList") or die(mysql_error());	
		session_start();
		$name = $_SESSION['uname'];
		if(isset($_POST['removeID'])){
			$del = $_POST['removeID'];
			mysql_query("delete from tasks where '$del' = taskid");
		}  
		if(isset($_POST['Task'])){
			$task = $_POST['Task'];
			$prio = $_POST['Prio'];
			mysql_query("insert into tasks(username,priority,task) values('$name','$prio','$task')");		
		}
		$mysql = mysql_query("select * from tasks where username = '$name' order by priority");
		echo "$name's To do List  <table border='2'>";
		while ($var = mysql_fetch_assoc($mysql)){
			$task = $var["task"];
			$tid = $var["taskid"];
			
			echo "
				<tr>
					<td>$task</td>
					<td>
						<form method='POST' action='list.php'>
							<input type='hidden' name='removeID' value='$tid'>
							<input type='submit' value='Done' />
						</form>
					</td>
				</tr>";
		}echo "</table>";
		
		mysql_close($con);
	?> 

	<h2></h2>
	<form method="POST" action="list.php">
		Enter a New Task <input type="text" name="Task" /><br/>
                Select Priority <select  name="Prio">
		<option value=1>1</option>
		<option value=2>2</option>
		<option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
		</select>
		<input type="submit" />
	</form>
</body>
</html>
