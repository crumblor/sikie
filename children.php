<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sikie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="snowflakes" aria-hidden="true">
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
  <div class="snowflake">
    <div class="inner">❅</div>
  </div>
</div>
<h1>Siko Vestules</h1>
<hr>
<?php
    require "functions.php";
    require "Database.php";
    $config = require("config.php");

    $db = new Database($config["database"]);

    $kids = $db->query("SELECT * FROM children")->fetchAll();

    foreach($kids as $kid) {
        echo "<div class='letter'>";
            echo "<h3>" . $kid["firstname"] . " " . $kid["middlename"] . " " . $kid["surname"] . " " . $kid["age"] . "</h3>";

            $result = $db->query("SELECT letter_text FROM letters WHERE sender_id = " . $kid["id"])->fetch();
            
            echo "<p>" . $result["letter_text"] . "</p>";

        echo "</div>";
        echo "<hr>";
    }
?>
</body>
</html>