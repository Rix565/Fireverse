<?php
    include "connect.php";
    GLOBAL $db;
?>
<!DOCTYPE html>
<html>
<body>
	<h1>
		Sign Up - Fireverse
	</h1>
	<div id="container">
    <form method="post">
			<input type="text" name="username" placeholder="Nickname" required /><br/>
			<input type="text" name="password" placeholder="Password" required /><br/>
			<input type="text" name="cpassword" placeholder="Confirm Password" required /><br/>
			<button type="submit" name="formsend" id="formsend">Sign Up</button><br/>
			<p class="info">
				Tip : If when you click on "Sign Up" and the page reloads with no confirmation/error message it means that the nickname is already used.
			</p>

	    </form>
	    <?php
	        if(isset($_POST['formsend'])){
	        	if(!empty($_POST['username']) && !empty($_POST['cpassword']) && !empty($_POST['password'])){
	        		if($_POST['password'] == $_POST['cpassword']){
	        			$q = $db->query('INSERT INTO `users`(`pseudo`, `password`) VALUES ("' .$_POST['username']. '", "' .$_POST['password']. '")');
	        	        echo "<p class=success>Created account !</p>";
	        	        $_SESSION['nickname'] = $_POST['username'];
	        			$_SESSION['password'] = $_POST['password'];

	        			header('Location: index.php');
	        		}else{
	        			echo "<p class=error>Password could not match !";
	        			exit;
	        		}
	        	}else{
	        		echo "<p class='error'>Requied fields empty !</p>";
	        		exit;
	        	}
	        }
	    ?>
	</div>
</body>
</html>