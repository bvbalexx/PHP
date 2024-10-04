<?php

declare (strict_types=1);

function get_user(object $pdo, string $username) {

  $query = "SELECT * FROM users WHERE username = :username;"; // username e placeholder

  // Folosim prepared statements pentru a evita sql injection
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(":username", $username);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result;

  // Daca gasim usernameul, result este un array cu toate informatiile
  // Daca nu gasim, este bool false

}
