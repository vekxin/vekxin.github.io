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
$name=$_COOKIE['username'];
//echo "Hello, $name!";
?>
<!DOCTYPE html>
<!--HW7-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>index</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <span id="greeting"></span>
    <h1>My favorite celebrity!</h1>
    <nav>
      <a href="index.php">My favorite celebrity!</a> <br>
      <a href="merch.php">Our merch</a> <br>
      <a href="blog.php">Our posts</a><br>
    </nav>
  </header>

  <main>
    <p id='greeting'><?php echo "Hello, $name!";?></p>
    <h2>MEGAN THEE STALLION</h2>
    <h3>AKA Megan Pete AKA Tina Snow AKA Thee Hot Girl Coach</h3>
    <section>
      <Figure>
        <img src="https://www.rollingstone.com/wp-content/uploads/2024/10/Screenshot-2024-10-25-at-1.38.21%E2%80%AFPM-2.jpg?w=1581&h=1054&crop=1" >
        <figcaption>Megan Thee Stallion in her recent music video, "Bigger in Texas."</figcaption>
      </figure>
    </section>

    <section>
      <h3>Why is the H-Town Hottie my favorite celebrity?</h3>
      <p>Megan Thee Stallion has managed to build an incredible career as a rapper and hip-hop star, and graduated with a Bachelors of Science in Health Administration while dealing with loss, violence, and trauma in the public eye. She inspires her fans to pursue their creative passions, stay educated, work out, and stay on the grind 😛</p>
    </section>
    
    <section>
      Some of my favorite bars:
      <ul>
        <li>"Self made, asexual, and I'm always on point like a decimal" - Bigger in Texas</li>
        <li>"You would think 'through thick and thin' was a phrase that I invented!" - Accent (ft. Glorilla)</li>
        <li>"Ain't got no tea on me, this h* think she TMZ"- Rattle</li>
        <li>the entirety of Hiss</li>
      </ul>
    </section>
    
    <section>
      <h2>Some recent posts by other users:</h2>
      <div>
        <b>bodyodyody</b> replied: She was really the one who woke up the Drake BBL allegations last year if we think about it... give her her flowers! 
      </div>
      <div>
        <b>malicious666</b> replied: 6 foot big foot bad foot good foot 1 fish 2 fish red fish blue fish... here is <a href="scarf1.html" target="_blank" rel= "opener" id="scarf">proof</a> she is a LIAR!!! stream <a href="scarf2.html" target="_blank" rel= "opener" id="picture">Bigfoot</a>
      </div>
      <div>
        <b>stallioncharts</b> replied: waittt she looks so good here
      </div>
    </section>
    
  </main>
  <footer>
    <hr>
    <small>
      &copy; Kevin Tran 2025
    </small>
  </footer>
</body>

</html>
