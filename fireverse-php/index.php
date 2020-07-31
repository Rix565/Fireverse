<?php
    include "connect.php";
    global $db;
?>
<!DOCTYPE html>
<html>
<body>
    <h1>
        Fireverse
    </h1>
    <h3>
        A very lite testing social network.
    </h3>
    <?php
        if(!empty($_SESSION['nickname']) && !empty($_SESSION['password'])){
            echo "<p class='info'>Connected as " .$_SESSION['nickname']. "</p>";
        }else{
            echo'<div id="container"><a href="signin.php"><button>Sign in</button></a><a href="signup.php"><button>Sign up</button></a></div>';
        }
        $q = $db->query('SELECT * FROM posts');
        while ($posts = $q->fetch()) {
            echo "<p>" .$posts['author']. " posted :</p><p>" .$posts['content']. "</p>";
        }
        if(!empty($_SESSION['nickname']) && !empty($_SESSION['password'])){
            echo '<div id="container"><form method=post><input type="text" name="contentpost" placeholder="Content of post" required /><button type="submit" name="submitpost">Post</button></form></div>';
            if(isset($_POST['submitpost'])){
                if(!empty($_POST['contentpost'])){
                    $post = $db->query("INSERT INTO `posts`(`author`, `content`) VALUES ('".$_SESSION['nickname']. "', '" .$_POST['contentpost']. "')")
                    header('Location: index.php');
                }
            }
        }
    ?>
</body>
</html>
