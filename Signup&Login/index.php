<?php


require_once 'includes/config_session.inc.php'; // avem nevoie de o sesiune valabila
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Document</title>
  </head>
  <body>

<h3>
  <?php

   output_username();
   ?>

</h3>

<?php

if(!isset($_SESSION["user_id"])) { ?>
  <h3>Login</h3>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <button>Login</button>

      </form>

<?php } ?>



    <?php
    check_login_errors();
    ?>

    <?php

    if(!isset($_SESSION["user_id"])) { ?>
      <h3>Signup</h3>
         <form action="includes/signup.inc.php" method="post">

           <?php

           signup_inputs()

            ?>

           <button>Signup</button>

         </form>

    <?php } ?>




    <?php

    check_signup_errors(); // output, deci intra la view


    ?>


    <?php

    if(isset($_SESSION["user_id"])) { ?>
      <br>
          <form action="includes/logout.inc.php" method="post">

            <button>Logout</button>

          </form>


    <?php } ?>



  </body>
</html>
