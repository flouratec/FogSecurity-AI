<?php
// Simple router
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($path === "/" || $path === "/dashboard") {
  readfile(__DIR__ . "/dashboard.html");
  exit;
}

http_response_code(404);
echo "Not Found";
