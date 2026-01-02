#!/usr/local/bin/php
<?php 
//from lecture

session_save_path(__DIR__ . '/sessions/'); //goes into the sessions folder
session_name('myWebpage');
session_start();

$incorrect_submission=false;
if (isset($_POST['Password'])){
  validate($_POST['Password'], $incorrect_submission);
}

function validate($submission, &$incorrect_submission){
  $file = fopen('h_password.txt','r') or die('Unable to find the hashed password.');
  //open file with hashed pw
  $hashed_password = fgets($file); //read hashed pw
  $hashed_password = trim($hashed_password); //trim white spaces
  fclose($file);

  $submission = trim($submission); //trim submitted pw
  $hashed_submission = hash('md2', $submission); //hash submitted pw
  
  if(isset($_COOKIE['username'])){
    if ($hashed_password !== $hashed_submission){ //the passwords dont match
     $_SESSION['loggedin'] = false;
      $incorrect_submission = true; 
    //echo 'Invalid Password!';
    } else {// the passwords do match
      $_SESSION['loggedin'] = true; 
    //if(isset($_COOKIE['username'])){ //if a username is validated it's saved as a cookie
      header('Location: index.php');
      exit;
    }
  } 
}
?>
<!DOCTYPE html>
<!--HW7-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src= "username.js" defer></script>
  <script src= "login.js" defer></script> 
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Welcome! Ready to check out my webpage?</h1>
  </header>

  <main>
    <h2>Enter a username.</h2>
    <p>So that you can make your own posts and purchases, select a username and password.</p>

    
      <fieldset>
        <section>
          <label for="UserID">Username: </label>
          <input type="text" id="UserID" name="Username" value='<?php if (isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>'/>
        </section>
        <section>
            <form method="POST" action= "<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="PasswordID">Password: </label>
                <input type="password" id="PasswordID" name="Password" />
                <input type="Submit" value="Login" id="Login">
            </form>
        </section>
      </fieldset>
      <?php if((isset($_POST['Password']))&&($incorrect_submission===true)){
          if($_POST['Password']!=='') {echo "Invalid Password!";}
          }?>
  </main>

  <footer>
    <hr>
    <small>
      &copy; Kevin Tran 2025
    </small>
  </footer>
</body>

</html>