		<?php
			//54.200.82.84
			session_start();
			$_SESSION['uname'] = $name;
			header("Location: http://54.200.82.84/Kustom-Kupcake/cupcakeOrder.php");

		?>