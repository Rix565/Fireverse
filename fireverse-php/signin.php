<?php
    include "connect.php";
    GLOBAL $db;
    GLOBAL $_SESSION;
?>
<!DOCTYPE html>
<html>
<body>
	<h1>
		Sign In - Fireverse
	</h1>
	<div id="container">
		<form method="post">
			<input type="text" name="username" placeholder="Nickname" required /><br/>
			<input type="text" name="password" placeholder="Password" required /><br/>
			<button type="submit" name="formsend" id="formsend">Connect</button><br/>
	    </form>
	    <?php
	        if(isset($_POST['formsend'])){
	        	$q = $db->query("SELECT * FROM `users` WHERE `pseudo` = '" .$_POST['username']. "'");
	        	$result = $q->fetch();
	        	if($result==true){
	        		if($_POST['password'] == $result['password']){
	        			$_SESSION['nickname'] = $_POST['username'];
	        			$_SESSION['password'] = $_POST['password'];

	        			echo "<p class=success>Connected succefully !</p>";
	        			header('Location: index.php');
	        		}else{
	        			echo "<p class=error>Incorrect nickname/password.</p>";
	        		}
	        	}else{
	        		echo "<p class=error>Incorrect nickname/password.</p>";
	        	}
	        }
	    ?>
	</div>
</body>
</html>