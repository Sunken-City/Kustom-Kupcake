<html>
<head><title>To Do list App</title></head>
<body>


	<? 
		if(isset($_POST['name'])){
			$name  = ($_POST['name']);
			$pass = ($_POST['PW']);
			$DBchoice = ($_POST['dbs1']);
			
			if($DBchoice == 1){
				$db = new PDO('pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=Danny1031');
				
			}
			else	{
				$db = new PDO('mysql:host=localhost;dbname = ToDoList', 'phpuser', 'some_pass');
			}
			
			$query = $db->prepare("select * from users where username = '$name' && Password = '$pass' ");
			$query->execute();
			
			if($query < 1){
				header("Location: error.php");
			}
			else{
				header("Location: list.php");
				session_start();
				$_SESSION['uname'] = $name;			
			}
			
		}






		$con = mysql_connect("localhost", "phpuser","some_pass") or die(mysql_error());
		mysql_select_db("ToDoList") or die(mysql_error());			
		if(isset($_POST['name'])){
			$name  = ($_POST['name']);
			$pass = ($_POST['PW']);
			$mysql = mysql_query("select * from users where username = '$name' && Password = '$pass' ");
			if(mysql_num_rows($mysql) < 1){
				header("Location: error.php");
			}
			else{
				header("Location: list.php");
				session_start();
				$_SESSION['uname'] = $name;			
			}
		}
	?>
	<h2>To do List app By Gustavo Castillo</h2>
	<form method="POST" action="index.php">
		Insert your Username: <input type="text" name="name" /><br/>
		Insert your Password: <input type="password" name="PW" /><br/>
		Postgres <input type="radio" name="dbs1" value=1><br>
		MYsql <input type="radio" name="dbs1" value=2><br>
		<button name='s'> Sign-in </button>
		
	</form>
        <form method="POST" action="register.php">
        <button name = 'a'> Register for this app</button>
	</form>
		
		
</body>
</html>


