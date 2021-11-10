<?php 

$name = $email = $password = $address = $linkedin_url = " ";
$notname = $notemail = $notpassword = $notaddress = $notlinkedin_url = " ";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  if (empty($_POST["name"])) {
    $notname = "Name Cannot be empty";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $notname = "name must be in letters";
    }
  }
  
  if (empty($_POST["email"])) {
    $notemail = "Email Cannot be empty";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $notemail= "email must end with @email";
    }
  }
  if (empty($_POST["password"])) {
    $notpassword = "you must enter a password";
  } else {
    $password = test_input($_POST["password"]);
    if (strlen($password) < 6) {
      $notpassword = " password must be more than 6 character";
    }
  }
  if (empty($_POST["address"])) {
    $notaddress = "you must enter your address";
  } else {
    $address = test_input($_POST["address"]);
    if (strlen($address) < 10) {
      $notaddress= " address must be more than 10 character";
    }
  }
  
  if (empty($_POST["linkedin_url"])) {
    $notlinkedin_url = " please enter your linked in url";
  } else {
    $linkedin_url = test_input($_POST["linkedin_url"]);
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$linkedin_url)) {
      $notlinkedin_url = "wrong url";
    }    
  }
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<html>
  <head>
    
    <style>
      span {
        color: red;
      }
    </style>
  </head>
  <body>
    <form method="post" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> " >
  
  Name: <input type="text" name="name">
  <span> <?php echo $notname;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span> <?php echo $notemail;?></span>
  <br><br>
  Password: <input type="text" name="password">
  <span > <?php echo $notpassword;?></span>
  <br><br>
  Address: <input type="text" name="address">
  <span><?php echo $notaddress;?></span>
  <br><br>
  Linked in: <input type="text" name="linkedin_url">
  <span><?php echo $notlinkedin_url;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">   
    </form>
   <?php
echo "<h2>result:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $password;
echo "<br>";
echo $address;
echo "<br>";
echo $linkedin_url;
?> 
    
  </body>
  
</html>