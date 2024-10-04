<?php
// MODEL - functii care interactioneaza doar cu baza de date

declare(strict_types=1);

// nu trebuie require dbh.inc.php pentru ca in signup s-a dat require in ordinea corecta

function get_username(object $pdo, string $username) {

 $query = "SELECT username FROM users WHERE username = :username;"; // username e placeholder

// Folosim prepared statements pentru a evita sql injection
 $stmt = $pdo->prepare($query);
 $stmt->bindParam(":username", $username);
 $stmt->execute();

 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 return $result;



}

function get_email(object $pdo, string $email) {

 $query = "SELECT email FROM users WHERE email = :email;"; // username e placeholder

// Folosim prepared statements pentru a evita sql injection
 $stmt = $pdo->prepare($query);
 $stmt->bindParam(":email", $email);
 $stmt->execute();

 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 return $result;



}

function set_user(object $pdo, string $username, string $pwd, string $email)
{

  $query = "INSERT INTO users (username, pwd, email) VALUES
  (:username, :pwd, :email);";

  $stmt = $pdo->prepare($query);

  // Hashing pwd
  $options = [

    'cost' => 12


  ];

  $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":pwd", $hashedpwd);
  $stmt->bindParam(":email", $email);

  $stmt->execute();

}
