<?php
function db() {
  $host = getenv("DB_HOST") ?: "localhost";
  $name = getenv("DB_NAME") ?: "fog_security";
  $user = getenv("DB_USER") ?: "root";
  $pass = getenv("DB_PASS") ?: "";

  $mysqli = new mysqli($host, $user, $pass, $name);
  if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "DB connection failed"]);
    exit;
  }
  $mysqli->set_charset("utf8mb4");
  return $mysqli;
}
header("Content-Type: application/json; charset=utf-8");
