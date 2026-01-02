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

$db= new SQLite3('credit.db'); 
//$db->exec('DROP TABLE usercredit;');

$STATEMENT='CREATE TABLE IF NOT EXISTS usercredit(username TEXT, credits REAL)';
$db->exec($STATEMENT);
//$tablename=$_COOKIE['username'];
$tablename='kevin';

$STATEMENT="SELECT username, credits FROM usercredit WHERE username='{$tablename}'";
$results=$db->query($STATEMENT);
if($results){//if the user exists in the table it will return a resource
  // while($row=$results->fetchArray()){
  //   echo "{$row['username']}";
  // }
  //echo 'hi';
} else {//if the user doesn't exist returns false
  $STATEMENT="INSERT INTO usercredit(username, credits) VALUES ('{$tablename}', 20)";
  $db->exec($STATEMENT);
}
//$db->close();
?>
<!DOCTYPE html>
<!--HW7-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Our Merchandise</title>
  <script src="merch.js" defer></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Our Merchandise</h1>
    <nav>
      <a href="index.php">My favorite celebrity!</a> <br>
      <a href="merch.php">Our merch</a> <br>
      <a href="blog.php">Our posts</a><br>
    </nav>
  </header>

  <main>
    <section>
      <h2>Wuthering Waves Jiyan-themed items.</h2>
      <p>Please have a look around. Our new members are awarded with $20.00 in credit. You can add credit at anytime with a coupon code. When you want to make a purchase, please select the checkboxes of the items you wish to purchase and click the "Checkout" button below.</p>
      <p id='creditamt'></p>
      <table>

        <tbody>
          <tr>
            <td> 
              <!--top left: figure-->
              <img src="https://wuwamerch.com/wp-content/uploads/wuwa-jiyan-q-version-figure-catch-echo-1.webp" alt="Jiyan Figure">
              <h3>Wuwa Jiyan Q-Version Figure-Catch Echo</h3>
              <input type="checkbox">
              <span></span>
              <p>PVC & ABS<br>
                4.33 * 2.76 * 4.33 inches | 11 * 7 * 11 cm
              </p>
            </td>
            
            <td>
              <!--top right: standee-->
              <img src="https://wuwamerch.com/wp-content/uploads/wuwa-standee-resonator-artwork-1.webp"  alt="Jiyan Standee">
              <h3>Wuwa Jiyan Standee – Resonator Artwork</h3>
              <input type="checkbox">
              <span></span>
              <p>Offset Printing | Hot Stamping Silver | Acrylic<br>
                10.28 * 7.87 inches | 26.1 * 20 cm
              </p>
            </td>
          </tr>

          <tr>
            <td>
              <!--bottom left: badge-->
              <img src="https://wuwamerch.com/wp-content/uploads/wuwa-jiyan-badge-zinc-alloy-1.webp"  alt="Jiyan Badge">
              <h3>Wuwa Jiyan Badge – Zinc Alloy</h3>
              <input type="checkbox">
              <span></span>
              <p>Zinc Alloy | Enamel Imitation | Transparent Hollow Paint | Polarized Paint<br>
                2.52 * 2.76 inches | 6.4 * 7 cm
              </p>
            </td>

            <td>
              <!--bottom right: photocard-->
              <img src="https://wuwamerch.com/wp-content/uploads/wuwa-jiyan-cards-wutherium-geographic-featured-album-1.webp"  alt="Jiyan Photocards">
              <h3>Wuwa Jiyan Cards - Wutherium Geographic Featured Album</h3>
              <input type="checkbox">
              <span></span>
              <p>Wuwa Cards* 1 set（Each set including a photo card and a PET card) <br> PET card – 4.02 * 2.99 inches | 10.2 * 7.6 cm <br>
                Photo card – 3.50 * 2.48 inches | 8.9 * 6.3 cm</p>
            </td>
          </tr>

        </tbody>
      </table>
      
      <fieldset>
        <label for="couponBox">Coupon code:</label>
        <input type="text" id="couponBox"> <br>
        <input type="button" value="Checkout" id="checkoutButton">
        <p id="bottomP"></p>
      </fieldset>
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