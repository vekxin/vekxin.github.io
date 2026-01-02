#!/usr/local/bin/php
<?php 
session_save_path(__DIR__ . '/sessions/'); //goes into the sessions folder
session_name('myWebpage');
session_start();
if($_SESSION['loggedin']===false){
    header('Location: login.php');
} else if ($_SESSION['loggedin']===true && !(isset($_COOKIE['username']))) {
    header('Location: login.php');
}
?>

<!--replace with shebang when submitting -->
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Our Posts</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <header>
      <h1>Blog Posts</h1>
      <nav>
      <a href="index.php">My favorite celebrity!</a> <br>
      <a href="merch.php">Our merch</a> <br>
      <a href="blog.php">Our posts</a><br>
    </nav>
    </header>

    <main>
      <form method="POST" action="post.php">
        <label for="AuthorID" >Author: </label>
        <input type="text" name="Author" id="AuthorID" value='<?php if (isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>' >
        <br>
        <label for="TextareaID"> Content: </label>
        <textarea id="TextareaID" name="Content"></textarea>
        <input type="submit" value="Post">
      </form>
      
      <section>
          <h1>Posts by other users:</h1>
          <?php 
            $file=@fopen('posts.txt', 'r');
            if($file){
              echo '<p>';
              while(!feof($file)){
                $line=fgets($file);
                echo $line, '<br>';
              }
              echo '</p>';
              fclose($file);
            }
          ?>
      </section>
    </main>

    <footer>
      <hr>
      <small>
        &copy; Kevin Tran, 2025
      </small>
    </footer>
  </body>

</html>