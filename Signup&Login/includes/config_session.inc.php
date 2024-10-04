<?php

ini_set('session.use_only_cookies', 1); // fiecare session ID e transmis doar prin cookies, nu si prin URL
ini_set('session.use_strict_mode', 1);  // OBLIGATORIU // website foloseste seesion ID creat doar de server

session_set_cookie_params([

      'lifetime' => 1800,
      'domain' => 'localhost',   // domeniu generat de xampp
      'path' => '/',
      'secure' => true, // doar cu conexiune https, nu http
      'httponly' => true

]);

session_start();

// verificam daca avem user logat sau nu
// ca sa stim cum regeneram id ul sesiunii
if(isset($_SESSION["user_id"])) {

  if (!isset($_SESSION["last_regeneration"])) {

  regenerate_session_id_loggedin();

  } else {

     $interval  = 60 * 30;
     if(time() - $_SESSION["last_regeneration"] >= $interval ) {

       regenerate_session_id_loggedin();

     }

  }



} else {

  if (!isset($_SESSION["last_regeneration"])) {

  regenerate_session_id();

  } else {

     $interval  = 60 * 30;
     if(time() - $_SESSION["last_regeneration"] >= $interval ) {

       regenerate_session_id();

     }

  }


}


function regenerate_session_id() {

  session_regenerate_id(true);
  $_SESSION["last_regeneration"] = time();

}

function regenerate_session_id_loggedin() {

  session_regenerate_id(true);

  $userId = $_SESSION["user_id"];
  $newSessionId = session_create_id();
  $sessionId =  $newSessionId . "_" . $userId;
  session_id($sessionId);

  $_SESSION["last_regeneration"] = time();

}
