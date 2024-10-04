<?php

declare(strict_types=1);

function check_signup_errors() {

if(isset($_SESSION['errors_signup'])){

    $errors = $_SESSION['errors_signup'];

    echo "<br>";
    foreach ($errors as $error) {

       echo '<p>' . $error . '</p>';
    }

    unset($_SESSION['errors_signup']); // imediat cum nu mai avem nevoie de datele din sesiune, le stergem
}
 else if (isset($_GET["signup"]) AND $_GET["signup"] === "success" ) {

    echo '<br>';
    echo '<p>Signup succes!</p>';
 }
}


function signup_inputs(){


  if(isset($_SESSION["signup_data"]["username"])  &&
  !isset($_SESSION["errors_signup"]["username_taken"]))
  {
     echo '<input type="text" name="username" placeholder="Username" value = "' .
     $_SESSION["signup_data"]["username"] . '">';

  }
  else {

    echo '<input type="text" name="username" placeholder="Username">';
  }

  echo '<input type="password" name="pwd" placeholder="Password">';

  if(isset($_SESSION["signup_data"]["email"])  &&
  !isset($_SESSION["errors_signup"]["email_used"]) &&
  !isset($_SESSION["errors_signup"]["invalid_email"]))
  {
    echo '<input type="text" name="email" placeholder="email" value = "' .
    $_SESSION["signup_data"]["email"] . '">';

  }
  else {

    echo '<input type="text" name="email" placeholder="email">';
  }


}
