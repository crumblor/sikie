<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sikie</title>
    <link rel="stylesheet" href="styles.css">
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
<?php
    require "functions.php";
    require "Database.php";
    $config = require("config.php");

    $db = new Database($config["database"]);

    $kids = $db->query("SELECT * FROM children")->fetchAll();
    $dbgifts = $db->query("SELECT * FROM gifts")->fetchAll();

    foreach ($dbgifts as &$gift) {
    $gift["required"] = 0;
}

    foreach($kids as $kid) {
        $result = $db->query("SELECT letter_text FROM letters WHERE sender_id = " . $kid["id"])->fetch();
        $letter_text = $result["letter_text"];
            
        $gifts = explode(": ", $letter_text);
        $gifts = explode(".", $gifts[1]);
        $gifts = explode(",", $gifts[0]);

        foreach($gifts as $gift) {
            dd($gift);
        }
    }
?>
</body>
</html> 