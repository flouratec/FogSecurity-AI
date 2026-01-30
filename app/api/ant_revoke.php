<?php
require_once __DIR__ . "/db.php";

$input = json_decode(file_get_contents("php://input"), true);
$mac = trim($input["mac_address"] ?? "");

if ($mac === "") {
  http_response_code(400);
  echo json_encode(["error" => "mac_address required"]);
  exit;
}

$hash = hash("sha256", $mac);
$conn = db();

$stmt = $conn->prepare("UPDATE ant_table SET status='Banned' WHERE mac_hash=?");
$stmt->bind_param("s", $hash);
$stmt->execute();

echo json_encode(["ok" => true, "mac" => $mac, "hash" => $hash, "status" => "Banned"]);
