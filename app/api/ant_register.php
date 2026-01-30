<?php
require_once __DIR__ . "/db.php";

$input = json_decode(file_get_contents("php://input"), true);
$mac = $input["mac_address"] ?? "";
$mac = trim($mac);

if ($mac === "") {
  http_response_code(400);
  echo json_encode(["error" => "mac_address required"]);
  exit;
}

$hash = hash("sha256", $mac);
$conn = db();

$stmt = $conn->prepare("INSERT INTO ant_table (node_mac, mac_hash, status) VALUES (?, ?, 'Trusted')
                        ON DUPLICATE KEY UPDATE status='Trusted'");
$stmt->bind_param("ss", $mac, $hash);
$stmt->execute();

echo json_encode(["ok" => true, "mac" => $mac, "hash" => $hash, "status" => "Trusted"]);
