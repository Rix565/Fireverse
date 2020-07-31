<?php
    include "./library/db.php";
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
            echo "<p class='info'>Connected as {$_SESSION['nickname']}</p>";
        }else{
            echo'<div id="container"><a href="signin.php"><button>Sign in</button></a><a href="signup.php"><button>Sign up</button></a></div>';
        }
        $query = $db->prepare("SELECT * FROM posts");
        $query->execute();
        while ($posts = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<p>" .$posts['author']. " posted :</p><p>" .$posts['content']. "</p>";
        }
        if(!empty($_SESSION['nickname']) && !empty($_SESSION['password'])){
            echo '<div id="container"><form method=post><input type="text" name="contentpost" placeholder="Content of post" required /><button type="submit" name="submitpost">Post</button></form></div>';
            if(isset($_POST['submitpost'])){
                if(!empty($_POST['contentpost'])){
                    $query_post = $db->query("INSERT INTO `posts`(`author`, `content`) VALUES (':nickname', ':contentpost')");
                    $query_post->bindValue("nickname", $_SESSION['nickname']);
                    $query_post->bindValue("contentpost", $_POST['contentpost']);
                    $query_post->execute();
                    header('Location: index.php'); 
                }else{
                    echo "<p class='error'>The post's content is empty !</p>";
                }
            }
        }
    ?>
</body>
</html>
