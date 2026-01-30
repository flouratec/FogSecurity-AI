<?php
require_once __DIR__ . "/db.php";

$input = json_decode(file_get_contents("php://input"), true);
$session_id = trim($input["session_id"] ?? "");
$current_node = trim($input["current_node"] ?? "");
$state = $input["state"] ?? null;

if ($session_id === "" || $current_node === "") {
  http_response_code(400);
  echo json_encode(["error" => "session_id and current_node required"]);
  exit;
}

$conn = db();
$state_json = $state ? json_encode($state, JSON_UNESCAPED_UNICODE) : null;

$stmt = $conn->prepare("INSERT INTO routing_table (session_id, current_node, session_state)
                        VALUES (?, ?, ?)
                        ON DUPLICATE KEY UPDATE current_node=VALUES(current_node), session_state=VALUES(session_state)");
$stmt->bind_param("sss", $session_id, $current_node, $state_json);
$stmt->execute();

echo json_encode(["ok" => true, "session_id" => $session_id, "current_node" => $current_node]);
